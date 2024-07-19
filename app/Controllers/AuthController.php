<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;


class AuthController extends BaseController
{
    // protected $helpers = ['url', 'form', 'common'];

    public function index()
    {
        return view('authentication/login/index', [
            "title" => "Login | Warehouse"
        ]);
    }

    public function indexRegister()
    {
        return view('authentication/register/index', [
            "title" => "Register | Warehouse"
        ]);
    }

    public function forgot()
    {
        return view('authentication/forgot/index', [
            "title" => "Forgot Password | Warehouse"
        ]);
    }

    public function register()
    {
        require_once APPPATH . 'Helpers/common.php';

        try {
            $rules = [
                'name' => [
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => 'Fullname is required.',
                        'string' => 'Full name must be a valid string.'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email is required.',
                        'valid_email' => 'You must provide a valid email address.'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password is required.'
                    ]
                ],
                'confirm_password' => [
                    'rules' => 'matches[password]',
                    'errors' => [
                        'matches' => 'Password confirmation does not match the password.'
                    ]
                ]
            ];

            // Validate the input data
            if (!$this->validate($rules)) {
                // If validation fails, get the validation messages
                $errors = $this->validation->getErrors();
                session()->setFlashdata('alertError', $errors);

                return redirect()->back()->withInput();
            }

            $request = $this->request->getPost();

            $payload = [
                "uid" => getUid(),
                "name" => $request['name'],
                "email" => $request['email'],
                "password" => password_hash($request['password'], PASSWORD_BCRYPT),
                "role_id" => 3
            ];

            $userModel = new UsersModel();
            $userModel->insert($payload);

            session()->setFlashdata('alertSuccess', 'User successfully created.');
            return redirect()->to('/login');
        } catch (\Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }

    public function login()
    {
        try {
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email is required.',
                        'valid_email' => 'You must provide a valid email address.'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password is required.'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                $errors = $this->validation->getErrors();
                session()->setFlashdata('alertError', $errors);

                return redirect()->back()->withInput();
            }

            $request = $this->request->getPost();
            $userModel = new UsersModel();
            $roleModel = new RoleModel();


            $user = $userModel->where('email', $request['email'])->first();

            if ($user) {
                $checkRole = $roleModel->find($user['role_id']);

                if ($checkRole) {
                    $user['role'] = $checkRole['name']; // Tambahkan data role ke dalam data user
                }

                if (password_verify($request['password'], $user['password'])) {
                    session()->set('isLoggedIn', true);
                    session()->set('user', [
                        'id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'image' => $user['image'],
                        'role' => $user['role']
                    ]);

                    return redirect()->to('/');
                } else {
                    session()->setFlashdata('alertError', ['Incorrect password.']);
                    return redirect()->back()->withInput();
                }
            } else {
                session()->setFlashdata('alertError', ['Email or Password incorrect.']);
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('alertSuccess', 'You have been logged out.');

        return redirect()->to('/login');
    }
}

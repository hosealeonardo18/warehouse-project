<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;
use Exception;

class UserController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('master_data/users/index', [
            "title" => "Users | Warehouse App"
        ]);
    }

    public function datatables()
    {
        try {
            $draw = $this->request->getGet('draw');
            $start = $this->request->getGet('start');
            $length = $this->request->getGet('length');
            $searchValue = null;
            if ($this->request->getGet('search')) {
                $searchValue = $this->request->getGet('search')['value'] ?? null;
            }

            // Mendapatkan instance dari model User
            $userModel = new UsersModel();

            // Panggil metode dari model untuk mendapatkan data
            $data = $userModel->getUsersWithRoles($start, $length, $searchValue);

            // Menyiapkan respons JSON yang sesuai dengan format yang diharapkan oleh DataTables
            $response = [
                'draw' => intval($draw),
                'recordsTotal' => $data['totalData'],
                'recordsFiltered' => $data['totalData'], // Jumlah data tanpa filter dan jumlah total sama dalam contoh ini
                'data' => $data['users'],
            ];

            return $this->respond($response);
        } catch (\Throwable $th) {
            // Handle exception
            return $this->failServerError($th->getMessage());
        }
    }

    public function store()
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
            ];

            // Validate the input data
            if (!$this->validate($rules)) {
                // If validation fails, get the validation messages
                $errors = $this->validation->getErrors();
                session()->setFlashdata('alertError', $errors);

                return redirect()->back()->withInput();
            }

            $request = $this->request->getPost();
            $email = $request['email'];

            $userModel = new UsersModel();
            $checkUser = $userModel->where('email', $email)->first();

            if ($checkUser) throw new Exception("User has been registered. please using another email.", 422);

            $payload = [
                "uid" => getUid(),
                "name" => $request['name'],
                "email" => $request['email'],
                "password" => password_hash($request['password'], PASSWORD_BCRYPT),
                "role_id" => $request['role']
            ];

            $userModel->insert($payload);

            session()->setFlashdata('alertSuccess', 'Successfully created User.');
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }

    public function update($uid)
    {
        try {
            // Mengambil data dari permintaan
            $request = $this->request->getPost();
            $currents = ["name", "email", "role_id"];

            // Mengambil model pengguna
            $userModel = new UsersModel();
            $users = $userModel->where('uid', $uid)->first();

            // Cek jika pengguna tidak ditemukan
            if (!$users) {
                throw new Exception('User not found', 404);
            }

            $payload = [];
            foreach ($currents as $current) {
                // Menyaring dan memeriksa perubahan data
                if (isset($request[$current]) && $request[$current] !== $users[$current]) {
                    if ($current === "role_id") {
                        $payload[$current] = (int)$request[$current]; // Konversi ke integer
                    } else {
                        $payload[$current] = $request[$current];
                    }
                }
            }

            // Jika payload tidak kosong, lakukan pembaruan
            if (!empty($payload)) {
                $userModel->where('uid', $uid)->set($payload)->update();
                session()->setFlashdata('alertSuccess', 'Successfully updated User.');
            } else {
                session()->setFlashdata('alertInfo', 'No changes were made.');
            }

            return redirect()->back()->withInput();
        } catch (Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }

    public function destroy($uid)
    {
        try {
            $userModel = new UsersModel();

            // Hapus pengguna langsung dengan menggunakan UID
            if ($userModel->where('uid', $uid)->delete()) {
                session()->setFlashdata('alertSuccess', 'Successfully Delete User.');
            } else {
                session()->setFlashdata('alertError', 'Failed to delete user.');
            }

            return redirect()->back()->withInput();
        } catch (Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }
}

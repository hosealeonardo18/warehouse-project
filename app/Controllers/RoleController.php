<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use CodeIgniter\API\ResponseTrait;
use Exception;

class RoleController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('master_data/roles/index', [
            "title" => "Roles | Warehouse App"
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

            $roleModel = new RoleModel();

            $data = $roleModel->getAllRoles($start, $length, $searchValue);

            $response = [
                'draw' => intval($draw),
                'recordsTotal' => $data['totalData'],
                'recordsFiltered' => $data['totalData'],
                'data' => $data['roles'],
            ];

            return $this->respond($response);
        } catch (\Throwable $th) {
            // Handle exception
            return $this->failServerError($th->getMessage());
        }
    }

    public function store()
    {
        try {
            $request = $this->request->getPost();

            $rules = [
                'name' => [
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => 'Role name is required.',
                        'string' => 'Role name must be a valid string.'
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

            $payload = [
                "name" => $request["name"]
            ];

            $roleModel = new RoleModel();
            $roleModel->insert($payload);

            session()->setFlashdata('alertSuccess', "Successfully created role.");
            return redirect()->back()->withInput();
        } catch (Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }

    public function update($id)
    {
        try {
            // Mengambil data dari permintaan
            $request = $this->request->getPost();
            $currents = ["name"];

            // Mengambil model pengguna
            $roleModel = new RoleModel();
            $roles = $roleModel->where('id', $id)->first();

            // Cek jika pengguna tidak ditemukan
            if (!$roles) {
                throw new Exception('Role not found', 404);
            }

            $payload = [];
            foreach ($currents as $current) {
                // Menyaring dan memeriksa perubahan data
                if (isset($request[$current]) && $request[$current] !== $roles[$current]) {
                    $payload[$current] = $request[$current];
                }
            }

            // Jika payload tidak kosong, lakukan pembaruan
            if (!empty($payload)) {
                $roleModel->where('id', $id)->set($payload)->update();
                session()->setFlashdata('alertSuccess', 'Successfully updated Role.');
            } else {
                session()->setFlashdata('alertInfo', 'No changes were made.');
            }

            return redirect()->back()->withInput();
        } catch (Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $roleModel = new RoleModel();

            // Hapus pengguna langsung dengan menggunakan id
            if ($roleModel->where('id', $id)->delete()) {
                session()->setFlashdata('alertSuccess', 'Successfully Delete role.');
            } else {
                session()->setFlashdata('alertError', 'Failed to delete role.');
            }

            return redirect()->back()->withInput();
        } catch (Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }
}

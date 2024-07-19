<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WarehouseModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class WarehouseController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('master_data/warehouse/index', [
            "title" => "Warehouse | Warehouse App"
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

            $warehouseModel = new WarehouseModel();

            $data = $warehouseModel->getAllWarehouseWithUser($start, $length, $searchValue);

            $response = [
                'draw' => intval($draw),
                'recordsTotal' => $data['totalData'],
                'recordsFiltered' => $data['totalData'],
                'data' => $data['warehouse'],
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
                "uid" => getUid(),
                "name" => $request["name"],
                "pj_user_uid" => $request["pj_user"],
            ];

            $warehouseModel = new WarehouseModel();
            $warehouseModel->insert($payload);

            session()->setFlashdata('alertSuccess', 'Successfully created Warehouse.');
            return redirect()->back()->withInput();
        } catch (Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }

    public function update($uid)
    {
        try {
            // Mengambil data dari permintaan
            $request = $this->request->getPost();
            $currents = ["name", "pj_user_uid"];

            // Mengambil model pengguna
            $warehouseModel = new WarehouseModel();
            $warehouses = $warehouseModel->where('uid', $uid)->first();

            // Cek jika pengguna tidak ditemukan
            if (!$warehouses) {
                throw new Exception('Warehouse not found', 404);
            }

            $payload = [];
            foreach ($currents as $current) {
                // Menyaring dan memeriksa perubahan data
                if (isset($request[$current]) && $request[$current] !== $warehouses[$current]) {
                    $payload[$current] = $request[$current];
                }
            }

            // Jika payload tidak kosong, lakukan pembaruan
            if (!empty($payload)) {
                $warehouseModel->where('uid', $uid)->set($payload)->update();
                session()->setFlashdata('alertSuccess', 'Successfully updated warehouse.');
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
            $warehouseModel = new WarehouseModel();

            // Hapus pengguna langsung dengan menggunakan id
            if ($warehouseModel->where('uid', $uid)->delete()) {
                session()->setFlashdata('alertSuccess', 'Successfully Delete warehouse.');
            } else {
                session()->setFlashdata('alertError', 'Failed to delete warehouse.');
            }

            return redirect()->back()->withInput();
        } catch (Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }
}

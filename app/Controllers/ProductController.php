<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class ProductController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('master_data/products/index', [
            "title" => "Products | Warehouse App"
        ]);
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
                        'required' => 'Product name is required.',
                        'string' => 'Product name must be a valid string.'
                    ]
                ],
                'qty' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'qty name is required.',
                        'string' => 'qty name must be a valid string.'
                    ]
                ],
                'warehouse_uid' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'warehouse name is required.'
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
                "qty" => $request["qty"],
                "warehouse_uid" => $request["warehouse_uid"],
            ];

            $productModel = new ProductModel();
            $productModel->insert($payload);

            session()->setFlashdata('alertSuccess', 'Successfully created Product.');
            return redirect()->back()->withInput();
        } catch (Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
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

            $productModel = new ProductModel();

            $data = $productModel->getAllProductWithWarehouse($start, $length, $searchValue);

            $response = [
                'draw' => intval($draw),
                'recordsTotal' => $data['totalData'],
                'recordsFiltered' => $data['totalData'],
                'data' => $data['product'],
            ];

            return $this->respond($response);
        } catch (\Throwable $th) {
            // Handle exception
            return $this->failServerError($th->getMessage());
        }
    }

    public function update($uid)
    {
        try {
            // Mengambil data dari permintaan
            $request = $this->request->getPost();
            $currents = ["name", "qty", "warehouse_uid"];

            // Mengambil model pengguna
            $productModel = new ProductModel();
            $warehouses = $productModel->where('uid', $uid)->first();

            // Cek jika pengguna tidak ditemukan
            if (!$warehouses) {
                throw new Exception('Product not found', 404);
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
                $productModel->where('uid', $uid)->set($payload)->update();
                session()->setFlashdata('alertSuccess', 'Successfully updated Product.');
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
            $productModel = new ProductModel();

            // Hapus pengguna langsung dengan menggunakan id
            if ($productModel->where('uid', $uid)->delete()) {
                session()->setFlashdata('alertSuccess', 'Successfully Delete Product.');
            } else {
                session()->setFlashdata('alertError', 'Failed to delete Product.');
            }

            return redirect()->back()->withInput();
        } catch (Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }
}

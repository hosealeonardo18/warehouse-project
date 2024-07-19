<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StockModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Session;
use Exception;

class StockController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('warehouse/stock/index', [
            "title" => "Stock Request | Warehouse App"
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

            $stockModel = new StockModel();

            $session = Session();
            $user = $session->get('user.uid');

            $data = $stockModel->getAllStockRequestWithRelation($user, $start, $length, $searchValue);

            $response = [
                'draw' => intval($draw),
                'recordsTotal' => $data['totalData'],
                'recordsFiltered' => $data['totalData'],
                'data' => $data['stock'],
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
                'product_uid' => [
                    'rules' => 'required|string',
                    'errors' => [
                        'required' => 'Role name is required.',
                        'string' => 'Role name must be a valid string.'
                    ]
                ],
                'qty' => [
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

            $session = Session();

            $payload = [
                "uid" => getUid(),
                "product_uid" => $request["product_uid"],
                "qty" => $request["qty"],
                "user_uid" => $session->get('user.uid'),
            ];

            $stockModel = new StockModel();
            $stockModel->insert($payload);

            session()->setFlashdata('alertSuccess', "Successfully created stock request.");
            return redirect()->back()->withInput();
        } catch (Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }

    public function destroy($uid)
    {
        try {
            $stockModel = new StockModel();

            // Hapus pengguna langsung dengan menggunakan UID
            if ($stockModel->where('uid', $uid)->delete()) {
                session()->setFlashdata('alertSuccess', 'Successfully Delete Stock Request.');
            } else {
                session()->setFlashdata('alertError', 'Failed to delete Stock Request.');
            }

            return redirect()->back()->withInput();
        } catch (Exception $e) {
            session()->setFlashdata('alertError', ['exception' => $e->getMessage()]);
            return redirect()->back()->withInput();
        }
    }
}

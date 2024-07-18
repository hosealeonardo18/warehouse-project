<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        return view('master_data/users/index', [
            "title" => "Login | Warehouse"
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
}

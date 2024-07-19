<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class HelperController extends BaseController
{
    public function getAllRoles()
    {
        try {
            $roleModel = new RoleModel();
            $roles = $roleModel->getAll();

            $response = [
                'error' => 0,
                'statusCode' => 200,
                'dataCount' => count($roles),
                'message' => 'Successfully retrieved all data roles.',
                'data' => $roles
            ];

            return $this->response->setJSON($response);
        } catch (Exception $e) {
            $response = [
                'error' => 0,
                'statusCode' => $e->getCode(),
                'message' => $e->getMessage(),
            ];

            return $this->response->setJSON($response);
        }
    }

    public function getAllUser()
    {
        try {
            $userModel = new UsersModel();
            $users = $userModel->getAll();

            $response = [
                'error' => 0,
                'statusCode' => 200,
                'dataCount' => count($users),
                'message' => 'Successfully retrieved all data users.',
                'data' => $users
            ];

            return $this->response->setJSON($response);
        } catch (Exception $e) {
            $response = [
                'error' => 0,
                'statusCode' => $e->getCode(),
                'message' => $e->getMessage(),
            ];

            return $this->response->setJSON($response);
        }
    }
}

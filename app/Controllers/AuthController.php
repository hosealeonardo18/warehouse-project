<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;


class AuthController extends BaseController
{
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

    public function logout()
    {
        return view('authentication/login/index', [
            "title" => "Login | Warehouse"
        ]);
    }

    public function forgot()
    {
        return view('authentication/forgot/index', [
            "title" => "Forgot Password | Warehouse"
        ]);
    }
}

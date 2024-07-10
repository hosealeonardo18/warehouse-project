<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class HomeController extends BaseController
{
    public function index(): string
    {
        return view('dashboard/index', [
            "title" => "Dashboard | Warehouse"
        ]);
    }
}

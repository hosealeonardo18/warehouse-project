<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthMiddleware implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = $request->getUri()->getPath();
        $excludedRoutes = ['login', 'register', 'forgot'];

        if (session()->get('isLoggedIn')) {
            if (in_array($uri, $excludedRoutes)) {
                return redirect()->to('/');
            }
        } else {
            if (!in_array($uri, $excludedRoutes)) {
                return redirect()->to('/login');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}

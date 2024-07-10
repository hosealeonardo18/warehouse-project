<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  dashboard
$routes->get('/', 'HomeController::index');

// auth
$routes->get('/login', 'AuthController::index');
$routes->get('/register', 'AuthController::indexRegister');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/forgot', 'AuthController::forgot');

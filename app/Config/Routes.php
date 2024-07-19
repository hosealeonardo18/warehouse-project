<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */


$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'HomeController::index');
    $routes->get('/logout', 'AuthController::logout');

    // users
    $routes->get('/users', 'UserController::index');
    $routes->get('/datatables/users', 'UserController::datatables');
    $routes->post('/users', 'UserController::store');
    $routes->delete('/users/(:any)/delete', 'UserController::destroy/$1');


    // helper
    $routes->get('/helper/get/roles', 'HelperController::getAllRoles');
});

$routes->get('/login', 'AuthController::index');
$routes->get('/register', 'AuthController::indexRegister');
$routes->get('/forgot', 'AuthController::forgot');

$routes->post('/register', 'AuthController::register');
$routes->post('/login', 'AuthController::login');

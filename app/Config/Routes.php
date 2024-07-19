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
    $routes->put('/users/(:any)/update', 'UserController::update/$1');

    // roles
    $routes->get('/roles', 'RoleController::index');
    $routes->get('/datatables/roles', 'RoleController::datatables');
    $routes->post('/roles', 'RoleController::store');
    $routes->delete('/roles/(:any)/delete', 'RoleController::destroy/$1');
    $routes->put('/roles/(:any)/update', 'RoleController::update/$1');


    // warehouses
    $routes->get('/warehouses', 'WarehouseController::index');
    $routes->get('/datatables/warehouses', 'WarehouseController::datatables');
    $routes->post('/warehouses', 'WarehouseController::store');
    $routes->delete('/warehouses/(:any)/delete', 'WarehouseController::destroy/$1');
    $routes->put('/warehouses/(:any)/update', 'WarehouseController::update/$1');

    // products
    $routes->get('/products', 'ProductController::index');



    // helper
    $routes->get('/helper/get/roles', 'HelperController::getAllRoles');
    $routes->get('/helper/get/users', 'HelperController::getAllUser');
});

$routes->get('/login', 'AuthController::index');
$routes->get('/register', 'AuthController::indexRegister');
$routes->get('/forgot', 'AuthController::forgot');

$routes->post('/register', 'AuthController::register');
$routes->post('/login', 'AuthController::login');

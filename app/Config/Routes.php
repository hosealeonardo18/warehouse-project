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
    $routes->get('/datatables/products', 'ProductController::datatables');
    $routes->post('/products', 'ProductController::store');
    $routes->delete('/products/(:any)/delete', 'ProductController::destroy/$1');
    $routes->put('/products/(:any)/update', 'ProductController::update/$1');


    // Stock Request
    $routes->get('/stock-request', 'StockController::index');
    $routes->get('/datatables/stock-request', 'StockController::datatables');
    $routes->post('/stock-request', 'StockController::store');
    $routes->delete('/stock-request/(:any)/delete', 'StockController::destroy/$1');

    // Purchase Request
    $routes->get('/purchase-request', 'PurchaseController::index');

    // helper
    $routes->get('/helper/get/roles', 'HelperController::getAllRoles');
    $routes->get('/helper/get/users', 'HelperController::getAllUser');
    $routes->get('/helper/get/warehouses', 'HelperController::getAllWarehouse');
    $routes->get('/helper/get/products', 'HelperController::getAllProducts');
});

$routes->get('/login', 'AuthController::index');
$routes->get('/register', 'AuthController::indexRegister');
$routes->get('/forgot', 'AuthController::forgot');

$routes->post('/register', 'AuthController::register');
$routes->post('/login', 'AuthController::login');

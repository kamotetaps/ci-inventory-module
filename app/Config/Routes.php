<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('dashboard', 'AuthController::dashboard',['filter' => 'auth']);


// $routes->get('user', 'User::index');
$routes->get('user', 'User::index',  ['filter' => 'auth']);

$routes->get('user/login', 'User::login');
$routes->post('user/login', 'User::login');

$routes->get('user/logout', 'User::logout');

$routes->get('user/add', 'User::add',  ['filter' => 'auth']);
$routes->post('user/add', 'User::add',  ['filter' => 'auth']);


$routes->get('user/edit', 'User::edit',  ['filter' => 'auth']);
$routes->post('user/edit', 'User::edit',  ['filter' => 'auth']);

$routes->get('user/delete', 'User::delete',  ['filter' => 'auth']);
$routes->post('user/delete', 'User::delete',  ['filter' => 'auth']);



//Inventory
//Categories
$routes->get('inventory/categories', 'Inventory\Categories::index');





$routes->get('inventory/categories/add', 'Inventory\Categories::add', ['filter' => 'auth']);
$routes->post('inventory/categories/add', 'Inventory\Categories::add', ['filter' => 'auth']);
$routes->get('inventory/categories/edit', 'Inventory\Categories::edit', ['filter' => 'auth']);
$routes->post('inventory/categories/edit', 'Inventory\Categories::edit', ['filter' => 'auth']);
$routes->get('inventory/categories/delete', 'Inventory\Categories::delete', ['filter' => 'auth']);
$routes->post('inventory/categories/delete', 'Inventory\Categories::delete', ['filter' => 'auth']);

$routes->get('inventory/items', 'Inventory\Items::index', ['filter' => 'auth']);
$routes->get('inventory/items/add', 'Inventory\Items::add', ['filter' => 'auth']);
$routes->post('inventory/items/add', 'Inventory\Items::add', ['filter' => 'auth']);
$routes->get('inventory/items/edit', 'Inventory\Items::edit', ['filter' => 'auth']);
$routes->post('inventory/items/edit', 'Inventory\Items::edit', ['filter' => 'auth']);
$routes->get('inventory/items/delete', 'Inventory\Items::delete', ['filter' => 'auth']);
$routes->post('inventory/items/delete', 'Inventory\Items::delete', ['filter' => 'auth']);

$routes->get('inventory/suppliers', 'Inventory\Suppliers::index', ['filter' => 'auth']);
$routes->get('inventory/suppliers/add', 'Inventory\Suppliers::add', ['filter' => 'auth']);
$routes->post('inventory/suppliers/add', 'Inventory\Suppliers::add', ['filter' => 'auth']);
$routes->get('inventory/suppliers/edit', 'Inventory\Suppliers::edit', ['filter' => 'auth']);
$routes->post('inventory/suppliers/edit', 'Inventory\Suppliers::edit', ['filter' => 'auth']);
$routes->get('inventory/suppliers/delete', 'Inventory\Suppliers::delete', ['filter' => 'auth']);
$routes->post('inventory/suppliers/delete', 'Inventory\Suppliers::delete', ['filter' => 'auth']);

$routes->get('inventory/item-locations', 'Inventory\ItemLocations::index');
$routes->get('inventory/item-locations/add', 'Inventory\ItemLocations::add', ['filter' => 'auth']);
$routes->post('inventory/item-locations/add', 'Inventory\ItemLocations::add', ['filter' => 'auth']);
$routes->get('inventory/item-locations/edit', 'Inventory\ItemLocations::edit', ['filter' => 'auth']);
$routes->post('inventory/item-locations/edit', 'Inventory\ItemLocations::edit', ['filter' => 'auth']);
$routes->get('inventory/item-locations/delete', 'Inventory\ItemLocations::delete', ['filter' => 'auth']);
$routes->post('inventory/item-locations/delete', 'Inventory\ItemLocations::delete', ['filter' => 'auth']);

$routes->get('inventory/assignments', 'Inventory\ItemAssignmentController::index', ['filter' => 'auth']);
$routes->get('inventory/assignments/add', 'Inventory\ItemAssignmentController::add', ['filter' => 'auth']);
$routes->post('inventory/assignments/add', 'Inventory\ItemAssignmentController::add', ['filter' => 'auth']);
$routes->get('inventory/assignments/edit', 'Inventory\ItemAssignmentController::edit', ['filter' => 'auth']);
$routes->post('inventory/assignments/edit', 'Inventory\ItemAssignmentController::edit', ['filter' => 'auth']);
$routes->get('inventory/assignments/delete', 'Inventory\ItemAssignmentController::delete', ['filter' => 'auth']);
$routes->post('inventory/assignments/delete', 'Inventory\ItemAssignmentController::delete', ['filter' => 'auth']);

$routes->get('inventory/transactions', 'Inventory\TransactionsController::index', ['filter' => 'auth']);
$routes->get('inventory/transactions/add', 'Inventory\TransactionsController::add', ['filter' => 'auth']);
$routes->post('inventory/transactions/add', 'Inventory\TransactionsController::add', ['filter' => 'auth']);
$routes->get('inventory/transactions/edit', 'Inventory\TransactionsController::edit', ['filter' => 'auth']);
$routes->post('inventory/transactions/edit', 'Inventory\TransactionsController::edit', ['filter' => 'auth']);
$routes->get('inventory/transactions/delete', 'Inventory\TransactionsController::delete', ['filter' => 'auth']);
$routes->post('inventory/transactions/delete', 'Inventory\TransactionsController::delete', ['filter' => 'auth']);

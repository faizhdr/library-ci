<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->post('/auth/proses', 'AuthController::proses');
$routes->get('/logout', 'AuthController::logout');

$routes->group('', ['filter' => 'auth:admin'], function($routes) {

    $routes->get('/dashboard_admin', 'DashboardController::index_admin');
    $routes->post('/dashboard_admin/update_status/(:num)', 'DashboardController::updateStatus/$1');

    $routes->get('/pinjam', 'PinjamController::index');

    $routes->get('/buku', 'BukuController::index');
    $routes->get('/buku/show/(:num)', 'BukuController::show/$1');
    $routes->get('/buku/create', 'BukuController::create');
    $routes->post('/buku/store', 'BukuController::store');
    $routes->get('/buku/edit/(:num)', 'BukuController::edit/$1');
    $routes->post('/buku/update/(:num)', 'BukuController::update/$1');
    $routes->get('/buku/delete/(:num)', 'BukuController::delete/$1');

    $routes->get('/kategori', 'KategoriController::index');
    $routes->get('/kategori/create', 'KategoriController::create');
    $routes->post('/kategori/store', 'KategoriController::store');
    $routes->get('/kategori/edit/(:num)', 'KategoriController::edit/$1');
    $routes->post('/kategori/update/(:num)', 'KategoriController::update/$1');
    $routes->get('/kategori/delete/(:num)', 'KategoriController::delete/$1');

    $routes->get('/user', 'UserController::index');
    $routes->get('/user/create', 'UserController::create');
    $routes->post('/user/store', 'UserController::store');
    $routes->get('/user/edit/(:num)', 'UserController::edit/$1');
    $routes->post('/user/update/(:num)', 'UserController::update/$1');
    $routes->get('/user/delete/(:num)', 'UserController::delete/$1');
});

$routes->group('', ['filter' => 'auth:user'], function($routes) {
    $routes->get('/list_pinjam_per_user', 'PinjamController::listPinjamPerUser');
    $routes->get('/list_buku', 'PinjamController::listBuku');
    $routes->get('/pinjam/create/(:num)', 'PinjamController::create/$1');
    $routes->post('/pinjam/store', 'PinjamController::store');
});




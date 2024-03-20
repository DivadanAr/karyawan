<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('karyawan', function ($routes) {
    $routes->get('/', 'Karyawan::index');
    $routes->get('create', 'Karyawan::create');
    $routes->post('store', 'Karyawan::store');
    $routes->get('edit/(:num)', 'Karyawan::edit/$1');
    $routes->delete('delete/(:num)', 'Karyawan::delete/$1');
    $routes->get('detail/(:num)', 'Karyawan::detail/$1');
    $routes->post('update/(:num)', 'Karyawan::update/$1');
});

$routes->group('olahraga', function ($routes) {
    $routes->get('/', 'Olahraga::index');
    $routes->get('create', 'Olahraga::create');
    $routes->post('store', 'Olahraga::store');
    $routes->get('detail/(:num)', 'Olahraga::detail/$1');
    $routes->get('edit/(:num)', 'Olahraga::edit/$1');
    $routes->post('update/(:num)', 'Olahraga::update/$1');
    $routes->delete('delete/(:num)', 'Olahraga::delete/$1');
});

$routes->group('makanan', function ($routes) {
    $routes->get('/', 'Makanan::index');
    $routes->get('create', 'Makanan::create');
    $routes->post('store', 'Makanan::store');
    $routes->get('detail/(:num)', 'Makanan::detail/$1');
    $routes->get('edit/(:num)', 'Makanan::edit/$1');
    $routes->post('update/(:num)', 'Makanan::update/$1');
    $routes->delete('delete/(:num)', 'Makanan::delete/$1');
});

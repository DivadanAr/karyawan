<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/karyawan', 'Karyawan::index');
$routes->get('/olahraga', 'Olahraga::index');
$routes->get('/makanan', 'Makanan::index');

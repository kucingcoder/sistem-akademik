<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['filter' => 'umum'], function ($routes) {
    $routes->get('/', 'Home::Index');

    $routes->post('/auth', 'Autentikasi::Masuk');
});

$routes->group('', ['filter' => 'sesi'], function ($routes) {
    $routes->get('/auth', 'Autentikasi::Keluar');

    $routes->get('/dashboard', 'Dashboard::Index');

    $routes->get("/pelaksanaan-kbm/(:segment)/(:segment)/(:segment)", "PelaksanaanKBM::index/$1/$2/$3");
    $routes->post('/pelaksanaan-kbm/simpan-absensi', 'PelaksanaanKBM::SimpanAbsensi');
});

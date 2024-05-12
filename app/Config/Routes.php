<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['filter' => 'umum'], function ($routes) {
    $routes->get('/', 'Home::Index');

    $routes->post('/auth', 'Auth::Masuk');
});

$routes->group('', ['filter' => 'sesi'], function ($routes) {
    $routes->get('/auth', 'Auth::Keluar');

    $routes->get('/dashboard', 'Dashboard::Index');
});

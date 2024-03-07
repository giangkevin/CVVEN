<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('auth', function(RouteCollection $routes){
    $routes->match(['get', 'post'], 'login', 'Auth::login');
    $routes->match(['get','post'], 'register', 'Auth::register');
});
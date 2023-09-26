<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/dashboard', 'User::dashboard');

$routes->get('/user/login', 'User::login');
$routes->post('/user/login', 'User::login');
$routes->get('/logout', 'User::logout');
$routes->get('/user/register', 'User::create');
$routes->post('/user/create', 'User::store');


$routes->get('/login/(:any)', 'Login::find/$1');



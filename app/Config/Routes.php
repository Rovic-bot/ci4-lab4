<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('items', 'Items::index');
$routes->get('items/create', 'Items::create');
$routes->post('items/store', 'Items::store');
$routes->get('items/edit/(:num)', 'Items::edit/$1');
$routes->post('items/update/(:num)', 'Items::update/$1');
$routes->get('items/delete/(:num)', 'Items::delete/$1');

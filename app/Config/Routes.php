<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('Admin', static function ($routes) {
    $routes->get('', 'Admin\Main::dashboard');

    $routes->group('form', static function ($routes) {
        $routes->get('', 'Admin\Main::form_index');
        $routes->get('getDatatable', 'Admin\Main::getDatatable');
        $routes->post('action', 'Admin\Main::form_action');
    });

    $routes->group('gender', static function ($routes) {
        $routes->get('', 'Admin\Gender::index');
        $routes->get('getDatatable', 'Admin\Gender::getDatatable');
        $routes->post('action', 'Admin\Gender::form_action');
    });

    $routes->group('address', static function ($routes) {
        $routes->get('', 'Admin\Address::index');
        $routes->get('add', 'Admin\Address::add_address');
        $routes->get('edit/(:num)', 'Admin\Address::edit_page/$1');
        $routes->post('update_data/(:num)', 'Admin\Address::update_data/$1');
        $routes->get('getDatatable', 'Admin\Address::getDatatable');
        $routes->post('action', 'Admin\Address::form_action');
    });


    $routes->group('user', static function ($routes) {
        $routes->get('', 'Admin\User::index');
        $routes->get('add', 'Admin\User::add_user');
        $routes->get('edit/(:num)', 'Admin\User::edit_page/$1');
        $routes->post('update_data/(:num)', 'Admin\User::update_data/$1');
        $routes->get('getDatatable', 'Admin\User::getDatatable');
        $routes->post('action', 'Admin\User::form_action');
    });

    $routes->group('customer', static function ($routes) {
        $routes->get('', 'Admin\Customer::index');
        $routes->get('add', 'Admin\Customer::add_customer');
        $routes->get('edit/(:num)', 'Admin\Customer::edit_page/$1');
        $routes->post('update_data/(:num)', 'Admin\Customer::update_data/$1');
        $routes->get('getDatatable', 'Admin\Customer::getDatatable');
        $routes->post('action', 'Admin\Customer::form_action');
    });
});

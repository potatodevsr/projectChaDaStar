<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('login', static function ($routes) {
    $routes->get('', 'Admin\Login::index');
    $routes->post('getUserLogin', 'Admin\Login::getUserLogin');
});

$routes->group('Admin', static function ($routes) {
    $routes->get('', 'Admin\Main::dashboard', ['filter' => 'auth']);

    $routes->group('form', static function ($routes) {
        $routes->get('', 'Admin\Main::form_index', ['filter' => 'auth']);
        $routes->get('getDatatable', 'Admin\Main::getDatatable', ['filter' => 'auth']);
        $routes->post('action', 'Admin\Main::form_action', ['filter' => 'auth']);
    });

    $routes->group('gender', static function ($routes) {
        $routes->get('', 'Admin\Gender::index', ['filter' => 'auth']);
        $routes->get('getDatatable', 'Admin\Gender::getDatatable', ['filter' => 'auth']);
        $routes->post('action', 'Admin\Gender::form_action', ['filter' => 'auth:action,2']);
    });

    $routes->group('address', static function ($routes) {
        $routes->get('', 'Admin\Address::index', ['filter' => 'auth']);
        $routes->get('add', 'Admin\Address::add_address', ['filter' => 'auth']);
        $routes->get('edit/(:num)', 'Admin\Address::edit_page/$1', ['filter' => 'auth']);
        $routes->post('update_data/(:num)', 'Admin\Address::update_data/$1', ['filter' => 'auth']);
        $routes->get('getDatatable', 'Admin\Address::getDatatable', ['filter' => 'auth']);
        $routes->post('action', 'Admin\Address::form_action', ['filter' => 'auth:action,3']);
    });

    $routes->group('user', static function ($routes) {
        $routes->get('', 'Admin\User::index', ['filter' => 'auth']);
        $routes->get('add', 'Admin\User::add_user', ['filter' => 'auth']);
        $routes->get('edit/(:num)', 'Admin\User::edit_page/$1', ['filter' => 'auth']);
        $routes->post('update_data/(:num)', 'Admin\User::update_data/$1', ['filter' => 'auth']);
        $routes->get('getDatatable', 'Admin\User::getDatatable', ['filter' => 'auth']);
        $routes->post('action', 'Admin\User::form_action', ['filter' => 'auth:action,4']);
    });

    $routes->group('customer', static function ($routes) {
        $routes->get('', 'Admin\Customer::index', ['filter' => 'auth']);
        $routes->get('add', 'Admin\Customer::add_customer', ['filter' => 'auth']);
        $routes->get('edit/(:num)', 'Admin\Customer::edit_page/$1', ['filter' => 'auth']);
        $routes->post('update_data/(:num)', 'Admin\Customer::update_data/$1', ['filter' => 'auth']);
        $routes->get('getDatatable', 'Admin\Customer::getDatatable', ['filter' => 'auth']);
        $routes->post('action', 'Admin\Customer::form_action', ['filter' => 'auth:action,5']);
    });
});

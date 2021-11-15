<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/dashboard', 'MainController::index',['filter' => 'LoggedOnly']);
$routes->get('/profile', 'MainController::profile',['filter' => 'LoggedOnly']);

// ROUTE FOR USER CONTROLLER
$routes->group('user', ['filter' => 'LoggedOnly'], function ($routes) {
    $routes->get('', 'UserController::index');
    $routes->get('list', 'UserController::list');
    // $routes->get('list', 'UserController::list');
    $routes->get('add', 'UserController::add');
    $routes->post('adduser', 'UserController::adduser');
    $routes->post('edituser', 'UserController::edituser');
    $routes->get('edit/(:num)', 'UserController::edit/$1');
    $routes->get('detail/(:num)', 'UserController::detail/$1');
    $routes->post('delete/(:num)', 'UserController::delete/$1');
});


// ROUTE FOR BARANG CONTROLLER
$routes->group('barang', ['filter' => 'LoggedOnly'], function ($routes) {
    $routes->get('', 'BarangController::index');
    $routes->get('list', 'BarangController::barang');
    $routes->get('add', 'BarangController::add');
    $routes->post('barangpost', 'BarangController::barangadd');
    
    $routes->get('edit/(:num)', 'BarangController::edit/$1');
    $routes->post('barangedit/(:num)', 'BarangController::barangedit/$1');
    $routes->get('detail/(:num)', 'BarangController::detail/$1');
    
    $routes->get('stok', 'Stok::index');
});

$routes->group('transaction', ['filter' => 'LoggedOnly'], function ($routes) {
    $routes->get('', 'Transaction::index');
});

// MAKING ROUTE FOR AUTH
$routes->get('/login', 'AuthController::login',['filter' => 'NotLogged']);
$routes->post('/postlogin', 'AuthController::postlogin',['filter' => 'NotLogged']);
$routes->get('/register', 'AuthController::register',['filter' => 'NotLogged']);
$routes->post('/postregister', 'AuthController::postregister',['filter' => 'NotLogged']);
$routes->get('/logout', 'AuthController::logout');

// $routes->get('/about', 'PageController::about');

// $routes->get('/about', 'PageController::about');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
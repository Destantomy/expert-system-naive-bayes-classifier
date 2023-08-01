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
$routes->get('/', 'Logs::logon');
$routes->get('/toLogin', 'Logs::logon');
$routes->get('/Logs/toLogin', 'Logs::logon');
$routes->get('/toSignup', 'Logs::signup');
$routes->get('/Logs/toSignup', 'Logs::signup');
$routes->get('/Logs/toSignup-admin', 'Logs::signupAdmin');
$routes->get('/toSignup-admin', 'Logs::signupAdmin');
$routes->get('/akun/(:num)', 'Admin_dataPengguna::deleteDataPengguna/$1');
$routes->get('/hapusAkun/(:num)', 'User_menu::hapusAkunSaya/$1');
$routes->get('/artikel/(:num)', 'Admin_seputarGigi::deleteDataArtikel/$1');
$routes->get('/penyakit/(:num)', 'Admin_dataPenyakit::hapusDataPenyakit/$1');
$routes->get('/gejala/(:num)', 'Admin_datagejala::hapusDataGejala/$1');
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

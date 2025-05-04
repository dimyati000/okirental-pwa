<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Beranda');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// route since we don't have to scan directories.
$routes->get('/', 'LandingPage::index');
$routes->get('/login', 'Auth::index');
$routes->post('/logout', 'Auth::logout');
$routes->post('/check_auth', 'Auth::check_auth');
$routes->get('/beranda', 'Beranda::index', ['filter' => 'auth']);
// Master Pelanggan
$routes->get('/pelanggan', 'Pelanggan::index', ['filter' => 'auth']);
$routes->post('/pelanggan/read-data/(:num)', 'Pelanggan::read_data/$1',);
$routes->post('/pelanggan/load-modal', 'Pelanggan::load_modal');
$routes->post('/pelanggan/save', 'Pelanggan::save');
$routes->post('/pelanggan/delete', 'Pelanggan::delete');
// Master Mobil
$routes->get('/mobil', 'Mobil::index', ['filter' => 'auth']);
$routes->post('/mobil/read-data/(:num)', 'Mobil::read_data/$1');
$routes->post('/mobil/load-modal', 'Mobil::load_modal');
$routes->post('/mobil/save', 'Mobil::save');
$routes->post('/mobil/delete', 'Mobil::delete');
// Master Jaminan
$routes->get('/jaminan', 'Jaminan::index', ['filter' => 'auth']);
$routes->post('/jaminan/read-data/(:num)', 'Jaminan::read_data/$1');
$routes->post('/jaminan/load-modal', 'Jaminan::load_modal');
$routes->post('/jaminan/save', 'Jaminan::save');
$routes->post('/jaminan/delete', 'Jaminan::delete');
/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

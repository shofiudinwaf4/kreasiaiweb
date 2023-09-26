<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('layanan/(:segment)', 'Home::Layanan/$1');
$routes->add('admin/logout', 'Admin\Admin::logout');
$routes->group('admin', ['filter' => 'noauth'], function ($routes) {
    $routes->add('', 'Admin\Admin::login');
    $routes->add('login', 'Admin\Admin::login');
    $routes->add('lupapassword', 'Admin\Admin::lupapassword');
    $routes->add('resetpassword', 'Admin\Admin::resetpassword');
});
$routes->group('login', ['filter' => 'noauth'], function ($routes) {
    $routes->add('', 'Admin\Admin::login');
});
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->add('sukses', 'Admin\Admin::sukses');
});
$routes->group('homeadmin', ['filter' => 'auth'], function ($routes) {
    $routes->add('', 'Admin\HomeAdmin::index');
    $routes->add('layanan', 'Admin\HomeAdmin::Layanan');
    $routes->add('detaillayanan/(:segment)', 'Admin\HomeAdmin::DetailLayanan/$1');
    $routes->add('tambahlayanan', 'Admin\HomeAdmin::TambahLayanan');
    $routes->add('save', 'Admin\HomeAdmin::Save');
    $routes->add('editlayanan/(:segment)', 'Admin\HomeAdmin::EditLayanan/$1');
    $routes->add('update/(:segment)', 'Admin\HomeAdmin::Update/$1');
    $routes->add('galerilayanan/(:segment)', 'Admin\HomeAdmin::GaleriLayanan/$1');
    $routes->add('tambahgalerilayanan', 'Admin\HomeAdmin::TambahGaleriLayanan');
    $routes->add('savegaleri', 'Admin\HomeAdmin::SaveGaleri');
    $routes->add('tambahpaketlayanan', 'Admin\HomeAdmin::TambahPaketLayanan');
    $routes->add('daftarpaket/(:segment)', 'Admin\HomeAdmin::DaftarPaket/$1');
    $routes->add('savepaket', 'Admin\HomeAdmin::SavePaket');
    $routes->add('editpaket/(:segment)', 'Admin\HomeAdmin::EditPaket/$1');
    $routes->add('updatepaket/(:segment)', 'Admin\HomeAdmin::UpdatePaket/$1');
    // $routes->delete('delete/(:num)', 'Admin\HomeAdmin::Delete/$1');
});
$routes->group('klien', ['filter' => 'auth'], function ($routes) {
    $routes->add('daftarklien', 'Admin\Klien::DaftarKlien');
    $routes->add('tambahklien', 'Admin\Klien::TambahKlien');
    $routes->add('save', 'Admin\Klien::Save');
    $routes->add('editklien/(:segment)', 'Admin\Klien::EditKlien/$1');
    $routes->add('update/(:segment)', 'Admin\Klien::Update/$1');
});
$routes->group('setting', ['filter' => 'auth'], function ($routes) {
    $routes->add('perusahaan', 'Admin\Setting::Perusahaan');
    $routes->add('editPerusahaan/(:segment)', 'Admin\Setting::EditPerusahaan/$1');
    $routes->add('updatePerusahaan)', 'Admin\Setting::UpdatePerusahaan');
});
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

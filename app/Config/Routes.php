<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::CekLogin');
$routes->get('/register', 'Auth::Register');
$routes->post('/register', 'Auth::CekRegister');


// Anggota 
$routes->get('/anggota', 'Anggota::index');
$routes->get('/anggota/buku', 'Anggota::Buku');
$routes->get('/anggota/buku/entry', 'Anggota::EntryBuku');
$routes->post('/anggota/buku', 'Anggota::SimpanBuku');

// Penerbitan 
$routes->get('/anggota/penerbitan', 'Anggota::Penerbitan');
$routes->get('/anggota/penerbitan/entry', 'Anggota::EntryPenerbitan');
$routes->post('/anggota/penerbitan/entry', 'Anggota::SimpanPengajuan');
$routes->post('/getbuku', 'Anggota::GetBukuId');

$routes->get('/anggota/riwayat', 'Anggota::Riwayat');
$routes->get('/anggota/pembayaran', 'Anggota::Pembayaran');
$routes->get('/anggota/pembayaran/upload', 'Anggota::UploadPembayaran');
$routes->post('/anggota/pembayaran/confirm', 'Anggota::ConfirmPembayaran');


// Buku 
$routes->post('admin/buku/setpublik', 'Admin::SetPublic');
$routes->post('admin/buku/setcover', 'Admin::SetCover');
$routes->post('admin/buku/simpancover', 'Admin::SaveCover');




$routes->get('/anggota/akun', 'Anggota::Akun');
$routes->get('/anggota/logout', 'Anggota::Logout');



// Admin 
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/logout', 'Admin::Logout');
$routes->get('/admin/buku', 'Admin::Buku');
$routes->get('/admin/buku/entry', 'Admin::EntryBuku');
$routes->post('/admin/buku', 'Admin::SaveBuku');

// Penerbitan 
$routes->get('/admin/penerbitan/baru', 'Admin::PenerbitanBaru');
$routes->get('/admin/penerbitan/list', 'Admin::ListPenerbitan');
$routes->get('/admin/penerbitan/detail/(:any)', 'Admin::DetailPengajuan/$1');
$routes->get('/admin/penerbitan/pembayaran/hapus/(:any)', 'Admin::HapusPembayaran/$1');

$routes->get('/admin/penerbitan/pembayaran', 'Admin::LihatPembayaran');
$routes->post('/admin/penerbitan/confpembayaran', 'Admin::KonfirmPembayaran');

// Pembayaran 
$routes->get('/admin/pembayaran', 'Admin::Pembayaran');
// Anggota 
$routes->get('/admin/anggota', 'Admin::Anggota');
$routes->get('/admin/anggota/detail/(:any)', 'Admin::DetailAnggota/$1');


// Print 

$routes->get('/print/buku', 'Admin::PrintBuku');
$routes->get('/print/penerbitan', 'Admin::PrintPenerbitan');
$routes->get('/print/pembayaran', 'Admin::PrintPembayaran');
$routes->get('/print/anggota', 'Admin::PrintAnggotas');
$routes->get('/print/anggota/(:segment)', 'Admin::PrintAnggota/$1');
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

<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// login 
$routes->get('/', 'Auth::login');
$routes->post('/valid_login', 'Auth::valid_login');
$routes->get('/auth/activate/(:any)', 'Auth::activate/$1');

// register
$routes->get('/register', 'Auth::register');
$routes->post('/valid_register', 'Auth::valid_register');

// logout
$routes->get('/logout', 'Auth::logout');

// beranda
$routes->get('/beranda', 'Beranda::index');
$routes->get('/modal', 'Beranda::modal');

// komentar
$routes->get('/komentar', 'Komentar::index'); 
$routes->get('/galeri/(:num)', 'Komentar::galeri/$1');
$routes->post('/komentar-save/(:num)', 'Komentar::save/$1');
$routes->get('/komentar-delete/(:num)/(:num)', 'Komentar::delete/$1/$2');

// upload
$routes->get('/upload', 'Upload::index');
$routes->post('/upload-save', 'Upload::save');
$routes->get('/upload-save', 'Upload::save');
$routes->post('/search', 'Upload::search');
$routes->get('/delete/(:num)', 'Upload::delete/$1');
$routes->get('/edit/(:num)', 'Upload::edit/$1');
$routes->post('/edit/update/(:num)', 'Upload::update/$1');

// like
$routes->get('/like/(:num)', 'Like::like/$1');
$routes->get('/unlike/(:num)', 'Like::unlike/$1');

// profil
$routes->get('/profil-postingan/(:num)', 'Profil::index/$1');
$routes->get('/edit-profil', 'Editprofil::index');
$routes->post('/editprofil-update/(:num)', 'Editprofil::update/$1');

// seting akun
$routes->get('/setting-akun', 'Profil::settings');
$routes->post('/setting-akun/save/(:num)', 'Profil::updatesettings/$1');

// album/suka
$routes->get('/profil-album', 'Profil::album');
$routes->get('/profil-create-album', 'Profil::createalbum');
$routes->post('/save-album', 'Profil::savealbum');
$routes->get('/edit-album/(:num)', 'Profil::editalbum/$1');
$routes->post('/update-album/(:num)', 'Profil::updatealbum/$1');
$routes->get('/delete-album/(:num)', 'Profil::deletealbum/$1'); 
$routes->get('/add-foto-album/(:num)/(:num)', 'Upload::addfotoalbum/$1/$2');
// buat routes untuk deletealbum
$routes->get('delete-foto-album/(:num)/(:num)', 'Profil::deletefoto/$1/$2');

$routes->delete('/delete-foto-album/(:num)/(:num)', 'Profil::deletefoto/$1/$2');
$routes->get('/galeri-album/(:num)', 'Profil::galerialbum/$1');
$routes->get('/profil-suka/(:num)', 'Profil::suka/$1');

// user(profil orang lain)
$routes->get('/profil-user/(:num)', 'User::userpostingan/$1');
$routes->get('/profil-user-album/(:num)', 'User::useralbum/$1');
$routes->get('/profil-user-suka/(:num)', 'User::usersuka/$1');

// buat routes untuk contoh 
$routes->get('/contoh', 'Beranda::contoh');


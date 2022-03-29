<?php

namespace Config;

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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
$routes->setPrioritize();

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Index Route
$routes->get('/', 'Home::index');

// Admin Panel Routes
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/login', 'Login::index');
$routes->get('/admin/logout', 'Login::logout');

// View pages in panel
$routes->get('/admin/(:any)', 'Admin::view/$1', ['priority' => 1]);

// User login authentication
$routes->post('/admin/login/auth', 'Login::login');

// User Management
$routes->post('/admin/users/createUser', 'Admin::createUser');
$routes->post('/admin/users/updateUser', 'Admin::updateUser');
$routes->post('/admin/users/deleteUser', 'Admin::deleteUser');

//User Profile
$routes->get('/admin/profile', 'Profile::index');
$routes->post('/admin/profile/changepassword', 'Profile::changePassword');
$routes->post('/admin/profile/update', 'Profile::updateProfile');

// Settings Management
$routes->post('/admin/settings/updateSettings', 'Admin::updateSettings');
$routes->post('/admin/settings/updateEmail', 'Admin::updateEmail');

// News Management
$routes->post('/admin/news/createNews', 'Admin::createNews');
$routes->post('/admin/news/editNews', 'Admin::editNews');
$routes->post('/admin/news/deleteNews', 'Admin::deleteNews');

// Gallery Management
$routes->get('/admin/gallery', 'Gallery::index');
$routes->get('/admin/gallery/(:any)', 'Gallery::view/$1');
$routes->post('/admin/gallery/createAlbum', 'Gallery::createAlbum');
$routes->post('/admin/gallery/editAlbum', 'Gallery::editAlbum');
$routes->post('/admin/gallery/deleteAlbum', 'Gallery::deleteAlbum');
$routes->post('/admin/gallery/deletePicture', 'Gallery::deletePicture');

// Contact Form
$routes->post('/contact-us/send', 'Contact::Send');

// Main sub-pages

//Blog
$routes->get('/blog', 'Blog::index');
$routes->get('/blog/view/(:any)', 'Blog::view/$1');
$routes->addRedirect('/blog/.*/', '/blog');

//Gallery
$routes->get('/portfolio', 'Gallery::portfolio');

$routes->get('/(:any)', 'Pages::view/$1', ['priority' => 1]);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

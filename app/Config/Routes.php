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

// Contact Form
$routes->post('/contact-us/send', 'Contact::Send');

// Main sub-pages

//Blog
$routes->get('/blog', 'Blog::index');
$routes->get('/blog/view/(:any)', 'Blog::view/$1');
$routes->addRedirect('/blog/.*/', '/blog');

//Gallery
$routes->get('/portfolio', 'Gallery::portfolio');

$routes->get('(:any)', 'Pages::view/$1', ['priority' => 2]);

// Admin Panel Routes
$routes->group('/admin', function($routes) {
	$routes->add('/', 'Admin::index');
	$routes->add('(:any)', 'Admin::view/$1', ['priority' => 1]);
	$routes->add('login', 'Login::index');
	$routes->add('logout', 'Login::logout');
	$routes->post('login/auth', 'Login::auth');

	$routes->group('users', function($routes) {
		$routes->post('createUser', 'Admin::createUser');
		$routes->post('updateUser', 'Admin::updateUser');
		$routes->post('deleteUser', 'Admin::deleteUser');
	});

	$routes->group('profile', function($routes) {
		$routes->get('', 'Profile::index');
		$routes->post('changepassword', 'Profile::changePassword');
		$routes->post('update', 'Profile::updateProfile');
	});

	$routes->group('news', function($routes) {
		$routes->post('createNews', 'Admin::createNews');
		$routes->post('editNews', 'Admin::editNews');
		$routes->post('deleteNews', 'Admin::deleteNews');
	});

	$routes->group('gallery', function($routes) {
		$routes->get('', 'Gallery::index');
		$routes->get('(:any)', 'Gallery::view/$1');
		$routes->post('createAlbum', 'Gallery::createAlbum');
		$routes->post('editAlbum', 'Gallery::editAlbum');
		$routes->post('deleteAlbum', 'Gallery::deleteAlbum');
		$routes->post('deletePicture', 'Gallery::deletePicture');
	});

	$routes->group('settings', function($routes) {
		$routes->post('updateSettings', 'Admin::updateSettings');
		$routes->post('updateEmail', 'Admin::updateEmail');
	});
});

// Contact Form
$routes->post('/contact-us/send', 'Contact::Send');
// Main sub-pages
$routes->get('/blog', 'Blog::index');
$routes->get('/blog/view/(:any)', 'Blog::view/$1');
$routes->addRedirect('/blog/.*/', '/blog');
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

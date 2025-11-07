<?php
namespace Config;

use CodeIgniter\Router\RouteCollection;

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/contact', 'Home::contact');

// Admin routes
$routes->group('admin', function($routes) {
    // Auth routes
    $routes->get('login', 'Admin\Auth::login');
    $routes->post('login', 'Admin\Auth::attemptLogin');
    $routes->get('register', 'Admin\Auth::register');
    $routes->post('register', 'Admin\Auth::attemptRegister');
    $routes->get('logout', 'Admin\Auth::logout');
    
    // Protected routes
    $routes->group('', ['filter' => 'auth'], function($routes) {
        $routes->get('dashboard', 'Admin\Dashboard::index');
        
        // Site Info
        $routes->get('site-info', 'Admin\SiteInfo::index');
        $routes->post('site-info/update', 'Admin\SiteInfo::update');
        
        // Projects
        $routes->get('projects', 'Admin\Projects::index');
        $routes->get('projects/create', 'Admin\Projects::create');
        $routes->post('projects/store', 'Admin\Projects::store');
        $routes->get('projects/edit/(:num)', 'Admin\Projects::edit/$1');
        $routes->post('projects/update/(:num)', 'Admin\Projects::update/$1');
        $routes->delete('projects/delete/(:num)', 'Admin\Projects::delete/$1');
   
        // Skills Routes
    $routes->get('skills', 'Admin\Skills::index');
    $routes->get('skills/create', 'Admin\Skills::create');
    $routes->post('skills/store', 'Admin\Skills::store');
    $routes->get('skills/edit/(:num)', 'Admin\Skills::edit/$1');
    $routes->post('skills/update/(:num)', 'Admin\Skills::update/$1');
    $routes->post('skills/delete/(:num)', 'Admin\Skills::delete/$1');
    $routes->post('skills/toggle/(:num)', 'Admin\Skills::toggleStatus/$1');
    
     
        // Social Links
        $routes->get('social-links', 'Admin\SocialLinks::index');
        $routes->post('social-links/update', 'Admin\SocialLinks::update');
        
        // Contacts
        $routes->get('contacts', 'Admin\Contacts::index');
        $routes->post('contacts/read/(:num)', 'Admin\Contacts::markAsRead/$1');
        $routes->post('contacts/delete/(:num)', 'Admin\Contacts::delete/$1');
    });
});
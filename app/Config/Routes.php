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
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->add('(en|nl)', 'Home::index/$1');

$routes->add('projects', 'Projects::index');
$routes->add('(en|nl)/projects', 'Projects::index/$1');

$routes->add('categorie/(:any)', 'Projects::categorie/$1');
$routes->add('(en|nl)/categorie/(:any)', 'Projects::categorie/$2/$1');

$routes->add('projects/(:any)', 'Projects::view_project/$1');
$routes->add('(en|nl)/projects/(:any)', 'Projects::view_project/$2/$1');

$routes->add('services', 'Services::index');
$routes->add('(en|nl)/services', 'Services::index/$1');

$routes->add('contact', 'Contact::index');
$routes->add('(en|nl)/contact', 'Contact::index/$1');

$routes->add('contact/quote', 'Contact::quote');
$routes->add('(en|nl)/contact/quote', 'Contact::quote/$1');

$routes->add('admin/projects/(:any)/delete', 'Admin/Projects::delete/$1');

// Admin protected pages with AuthCheck
$routes->group('', ['filter'=>'AuthCheck'], function ($routes){
    // routes protected by this filter
    $routes->get('/admin', 'Admin/Home::index');

    $routes->get('admin/projects', 'Admin\Projects::index');

    $routes->get('admin/projects/new-project', 'Admin\Projects::new_project');
    $routes->add('admin/projects/save-draft', 'Admin\Projects::save_draft');
    $routes->add('admin/projects/publish', 'Admin\Projects::publish');

    $routes->get('admin/projects/update/(:any)', 'Admin\Projects::update/$1');
    $routes->get('admin/projects/update-validation/(:any)', 'Admin\Projects::update_validation/$1');
    $routes->get('admin/projects/delete/(:any)', 'Admin\Projects::delete/$1');
    
    //$routes->post('admin/projects/upload_image', 'admin/projects/upload_image');


    $routes->get('/admin/categories', 'Admin\Categories::index');
    $routes->get('/admin/categories/add', 'Admin\Categories::add');
    $routes->get('/admin/categories/add-validation', 'Admin\Categories::add_validation');
    $routes->get('/admin/categories/update/(:any)', 'Admin\Categories::update/$1');
    $routes->get('/admin/categories/update-validation/(:any)', 'Admin\Categories::update_validation/$1');
    $routes->get('/admin/categories/delete/(:any)', 'Admin\Categories::delete/$1');

    $routes->get('/admin/testimonials', 'Admin\Testimonials::index');
    $routes->get('/admin/Testimonials/add', 'Admin\Testimonials::add');
    $routes->get('/admin/Testimonials/add-validation', 'Admin\Testimonials::add_validation');
    $routes->get('/admin/Testimonials/update/(:any)', 'Admin\Testimonials::update/$1');
    $routes->get('/admin/Testimonials/update-validation/(:any)', 'Admin\Testimonials::update_validation/$1');
    $routes->get('/admin/Testimonials/delete/(:any)', 'Admin\Testimonials::delete/$1');

    $routes->get('/admin/team', 'Admin\Team::index');
    $routes->get('/admin/team/add', 'Admin\Team::add');
    $routes->get('/admin/team/add-validation', 'Admin\Team::add_validation');
    $routes->get('/admin/team/update/(:any)', 'Admin\Team::update/$1');
    $routes->get('/admin/team/update-validation/(:any)', 'Admin\Team::update_validation/$1');
    $routes->get('/admin/team/delete/(:any)', 'Admin\Team::delete/$1');

    $routes->get('/admin/faq', 'Admin\Faq::index');
    $routes->get('/admin/faq/add', 'Admin\Faq::add');
    $routes->get('/admin/faq/add-validation', 'Admin\Faq::add_validation');
    $routes->get('/admin/faq/update/(:any)', 'Admin\Faq::update/$1');
    $routes->get('/admin/faq/update-validation/(:any)', 'Admin\Faq::update_validation/$1');
    $routes->get('/admin/faq/delete/(:any)', 'Admin\Faq::delete/$1');

    $routes->get('/admin/social', 'Admin\Social::index');

    $routes->get('/admin/seo', 'Admin\Seo::index');
    $routes->get('/admin/seo/page-meta/(:any)', 'Admin\Seo::page_meta/$1');
    $routes->get('/admin/seo/update-page-meta/(:any)', 'Admin\Seo::update_page_meta/$1');
    $routes->get('/admin/seo/update-page-meta-validation/(:any)', 'Admin\Seo::update_page_meta_validation/$1');

    $routes->get('/admin/translations', 'Admin\Translations::index');
    $routes->get('/admin/translations/(fr|en|nl)', 'Admin\Translations::index/$1');
    $routes->get('/admin/translations/language-validation/(fr|en|nl)', 'Admin\Translations::language_validation/$1');
});

// Super Admin protected pages with SuperAdminCheck
$routes->group('', ['filter'=>'SuperAdminCheck'], function ($routes){
    // routes protected by this filter
    $routes->get('admin/admins', 'Admin/Admins::index');
    $routes->get('admin/activity', 'Admin/Activity::index');
    $routes->get('admin/settings', 'Admin/Settings::index');
});

// redirect user to dashbord if logged in
$routes->group('', ['filter'=>'LoggedinCheck'], function ($routes){
    // routes protected by this filter
    $routes->get('admin/authentication', 'Admin/Authentication::index');
    $routes->get('admin/authentication/login-validation', 'Admin/Authentication::login_validation');
    $routes->get('admin/authentication/forgot-password', 'Admin/Authentication::forgot_password');
    $routes->get('admin/authentication/forgot-password-validation', 'Admin/Authentication::forgot_password_validation');
    $routes->get('admin/authentication/reset-password', 'Admin/Authentication::reset_password');
    $routes->get('admin/authentication/reset-password-validation', 'Admin/Authentication::reset_password_validation');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

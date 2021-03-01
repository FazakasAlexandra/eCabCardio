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
$routes->setDefaultController('Home');
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
$routes->get('/', 'Home::index');
$routes->get('/', 'UsersLogin::index');
$routes->match(['get','post'],'/register', 'UsersLogin::register');

// GET PATIENTS ROUTE
$routes->get('/patients/offset/(:any)', 'Patients::index/$1');

// GET PATIENTS AND ORDER ROTUE 
// $1 = offset, $2 = order
$routes->get('/patients/offset/(:any)/(:any)', 'Patients::index/$1/$2');

// CONSULT PATIENT
// $1 = patient_id
$routes->get('/patients/(:any)/consult', 'Consults::Index/$1'); 
// POST PATIENT
// $1 = patient_id
$routes->post('/patients/(:any)/consult', 'Consults::Index/$1'); 

// GET PATIENT HISTORY 
// $1 = patient_id
$routes->get('/patients/history/(:any)', 'Patients::history/$1'); 

// GET SINGLE PATIENT 
// $1 = patient_id
$routes->get('/patients/(:any)', 'Patients::getPatient/$1'); 

// GET SINGLE PATIENT 
// $1 = patient_id
$routes->post('/patients/(:any)', 'Patients::update/$1'); 

// GET ALL CITIES
$routes->get('/cities', 'Cities::index');

// GET SINGLE COUNTY
$routes->get('/counties/(:any)', 'Counties::index/$1'); 

// GET CONSULT HISTORY
// $1 = consult_id
$routes->get('/consults/history/(:any)', 'Consults::history/$1');

// GET CONSULT MEDICAL LETTER
// $1 = consult_id
$routes->get('/consults/(:any)/letter', 'Consults::getMedicalLetter/$1');

// GET CONSULT IMAGES
// $1 = consult_id
$routes->get('/consults/(:any)/files', 'Consults::getConsultFiles/$1');

// UPLOAD CONSULT IMAGES
// $1 = consult_id
$routes->post('/consults/(:any)/files', 'Consults::storeConsultFiles/$1');

// GET SINGLE CONSULT 
// $1 = consult_id
$routes->get('/consults/(:any)', 'Consults::getSingleConsult/$1');

// ADMIN ROUTES FOR UPDATING FILES
$routes->get('/admin/examinations/dltexam/(:any)', 'Admin::dltexam/$1');

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

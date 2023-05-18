<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'receipt/home';
$route['404_override'] = 'pdf_admin/url_handler';
$route['admin'] = 'admin/certificate-detail';

$route['home'] = 'receipt/home';

$route['certificate-pdf/(:num)'] = 'pdf_admin/print/$1';
$route['admin/certificate-detail'] = 'pdf_admin/certificate_detail';
$route['admin/certificate-detail/add'] = 'pdf_admin/certificate_add';
$route['admin/certificate-detail/edit/(:num)'] = 'pdf_admin/certificate_update/$1';
$route['admin/certificate-detail/view/(:num)'] = 'pdf_admin/certificate_view/$1';
$route['admin/certificate-detail/delete/(:num)'] ='pdf_admin/certificate_delete/$1';

$route['admin/dashboard'] = 'pdf_admin/dashboard';
$route['admin'] = 'pdf_admin/index';

$route['trainee-certificate-pdf/(:num)'] = 'pdf_admin/trainee_print/$1';
$route['admin/trainee-certificate-detail'] = 'pdf_admin/trainee_certificate_detail';
$route['admin/trainee-certificate-detail/add'] = 'pdf_admin/trainee_certificate_add';
$route['admin/trainee-certificate-detail/edit/(:num)'] = 'pdf_admin/trainee_certificate_update/$1';
$route['admin/trainee-certificate-detail/view/(:num)'] = 'pdf_admin/trainee_certificate_view/$1';
$route['admin/trainee-certificate-detail/delete/(:num)'] ='pdf_admin/trainee_certificate_delete/$1';

$route['admin/instructors-detail'] = 'pdf_admin/instructors_detail';
$route['admin/instructors-detail/add'] = 'pdf_admin/instructors_add';
$route['admin/instructors-detail/edit/(:num)'] = 'pdf_admin/instructors_update/$1';
$route['admin/instructors-detail/view/(:num)'] = 'pdf_admin/instructors_view/$1';
$route['admin/instructors-detail/delete/(:num)'] ='pdf_admin/instructors_delete/$1';


$route['admin/id-card-generator-detail'] = 'pdf_admin/id_card_generator_detail';
$route['admin/id-card-generator-detail/add'] = 'pdf_admin/id_card_generator_detail_add';
$route['admin/id-card-generator-detail/delete/(:num)'] ='pdf_admin/id_card_generator_detail_delete/$1';

$route['translate_uri_dashes'] = TRUE;

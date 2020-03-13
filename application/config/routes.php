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

// Welcome page  //
$route['default_controller'] = 'welcome';
$route['about'] = 'welcome/about';
$route['contact'] = 'welcome/contact';
$route['faq'] = 'welcome/faq';
$route['privacy_policy'] = 'welcome/privacy_policy';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// Welcome page  //

	
// search page  //
$route['translator'] = 'search';
$route['translator-detail/(:any)/(:num)'] = 'search/translatordetail/$1';
$route['booking'] = 'search/booking';
$route['booked'] = 'search/bookingvendor';
// search page  //	
	

// user page  //
$route['signup'] = 'user/register';
$route['signin'] = 'user';
$route['logout'] = 'user/logout';
// user page  //


// vendor page  //
$route['vendor-signup'] = 'vendor/register';
$route['vendor-signin'] = 'vendor';
$route['vendor-logout'] = 'vendor/logout';
// vendor page  //



$route['catalog/(:num)'] = 'welcome/catalog/$1';
$route['catalog/(:num)/(:num)'] = 'welcome/catalog/$1/$2';

$route['blog/(:num)'] = 'userblog/readmore/$1';
$route['blog'] = 'userblog';
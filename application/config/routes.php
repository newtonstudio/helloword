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
$route['about'] = "myfrontend/about";
$route['products'] = "myfrontend/products";
$route['product-detail/(:num)/(:any)'] = "myfrontend/productDetail/$1/$2";
$route['contactus'] = "myfrontend/contactus";
$route['contactus_submit'] = "myfrontend/contactus_submit";
$route['contact_us_thanks'] = "myfrontend/contact_us_thanks";
$route['generatePageView'] = "myfrontend/generatePageView";
$route['pageViewChart'] = "myfrontend/pageViewChart";


$route['api/googlelogin'] = "api_manage/googlelogin";
$route['api/facebooklogin'] = "api_manage/facebooklogin";

$route['api/getContactList'] = "api_manage/getContactList";

$route['api/getPageView/(:num)'] = "api2_manage/getPageView/$1";
$route['api/forloop/(:num)'] = "api2_manage/forloop/$1";

$route['complicated'] = "myfrontend/complicated";
$route['complicated_submit'] = "myfrontend/complicated_submit";


$route['magicdoor/login'] = "login_manage/login";
$route['magicdoor/login_submit'] = "login_manage/login_submit";

$route['magicdoor'] = "magicdoor_manage";
$route['magicdoor/logout'] = "logout_manage/logout";
$route['magicdoor/dashboard'] = "magicdoor_manage/dashboard";

$route['magicdoor/generatePageView'] = "magicdoor_manage/generatePageView";

$route['scheduler/getPrice'] = "scheduler_manage/getPrice";

$route['default_controller'] = 'myfrontend/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

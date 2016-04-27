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
|	http://codeigniter.com/user_guide/general/routing.html
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
| When you set the option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Main/Home';
$route['home'] = 'Main/Home';

// User Auth
$route['login'] = 'Main/Login';
$route['login/(:any)'] = 'Main/Login/$1';
$route['register'] = 'Main/Login/signup';
$route['register/(:any)'] = 'Main/Login/signup/$1';
$route['profile'] = 'Main/Profile';
$route['forgotpassword'] = 'Main/Login/forgotpassword';
$route['reset/(:any)/(:any)/(:any)']  = 'Main/Login/passwrdreset/$1/$2/$3';
$route['passwordreset/(:any)']  = 'Main/Login/passwordreset/$1';
$route['passwordreset']  = 'Main/Login/passwordreset';

// Dashboard
$route['dashboard'] = 'Main/Dashboard';
$route['dashboard/phd'] = 'Main/Dashboard/getgroup/Phd';
$route['dashboard/awards'] = 'Main/Dashboard/getgroup/Award';
$route['dashboard/masters'] = 'Main/Dashboard/getgroup/Master';
$route['dashboard/internships'] = 'Main/Dashboard/getgroup/Internship';
$route['dashboard/bachelors'] = 'Main/Dashboard/getgroup/Bachelor';
$route['dashboard/startups'] = 'Main/Dashboard/getgroup/Startup';
$route['dashboard/philantropy'] = 'Main/Dashboard/getgroup/Philantropy';
$route['dashboard/postdoctorate'] = 'Main/Dashboard/getgroup/Postdoctorate';
$route['dashboard/essay'] = 'Main/Dashboard/getgroup/Essay';
$route['dashboard/mba'] = 'Main/Dashboard/getgroup/Mba';
$route['dashboard/loan'] = 'Main/Dashboard/getgroup/Loan';
$route['dashboard/posts/(:any)'] = 'Main/Dashboard/getpost/$1';
$route['contact'] = 'Main/Dashboard/contact';
$route['about'] = 'Main/About';

// 404
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

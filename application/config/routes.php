<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['404_override'] = '';

$route['default_controller'] = 'pos/dashboard';

/*Login*/
$route['pos-auth'] = 'pos/auth_api';
$route['pos-login'] = 'pos/login';
$route['pos-signout'] = 'pos/login/signout';

/*Dashboard*/
$route['pos-dashboard'] = 'pos/dashboard';

/*Admin*/
$route['pos-admin'] = 'pos/admin';
$route['pos-admin-create'] = 'pos/admin/create';
$route['pos-admin-save'] = 'pos/admin_api/create';
$route['pos-admin-delete'] = 'pos/admin_api/delete';
$route['pos-admin-edit/(:any)'] = 'pos/admin/edit/$1';
$route['pos-admin-update'] = 'pos/admin_api/update';

/*Order*/
$route['pos-product-find'] = 'pos/product/find';
$route['pos-product-order'] = 'pos/product/order';
$route['find-product-by-location'] = 'pos/product_api/find_by_location';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
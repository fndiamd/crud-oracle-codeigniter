<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
	| Frontend Routes
*/

// GET METHOD

$route['default_controller'] = 'ViewController';
$route['register'] = 'ViewController/register';
$route['sign-in'] = 'ViewController/signin';
$route['create-article'] = 'ViewController/createArtikel';
$route['read/article/(:any)'] = 'ViewController/readArtikel/$1';
// POST METHOD

$route['register-validation'] = 'DataController/registerValidation';
$route['signin-validation'] = 'DataController/signinValidation';
$route['logout'] = 'DataController/logout';
$route['article-validation'] = 'DataController/articleValidation';
$route['post-komentar/(:any)'] = 'DataController/komentar/$1';

/*
	| Backend Routes
*/

//GET METHOD
$route['admin'] = 'ViewController/adminValidation';
$route['admin/login'] = 'ViewController/adminLogin';
$route['admin/manage-user'] = 'ViewController/viewUser';
$route['admin/manage-artikel'] = 'ViewController/viewArtikel';
$route['admin/manage-komentar'] = 'ViewController/viewKomentar';
$route['admin/logout'] = 'ViewController/adminLogout';
$route['admin/artikel/edit/(:any)'] = 'ViewController/updateArtikel/$1';

//POST METHOD
$route['admin/login-validation'] = 'DataController/loginAdmin';
$route['admin/post/update/artikel/(:any)'] = 'DataController/updateArtikel/$1';
$route['admin/user/delete/(:any)'] = 'DataController/deleteUser/$1';
$route['admin/komentar/delete/(:any)'] = 'DataController/deleteKomentar/$1';
$route['admin/artikel/delete/(:any)'] = 'DataController/deleteArtikel/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

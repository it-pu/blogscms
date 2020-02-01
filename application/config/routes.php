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
$route['default_controller'] = 'c_login/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard']='c_content/index';
$route['article']='c_content/article';
$route['add_article']='c_content/add_article';
$route['about']='c_content/about';
$route['edit_article/(:any)']='c_content/edit_article/$1';
$route['show_category']='c_content/show_category';
$route['category'] = 'c_content/category';
$route['contact']='c_content/contact';
$route['login']='c_login/login';

// ======== CRUD ====== //

$route['__load_article'] = 'c_content/show_article';
$route['__save_article'] = 'c_content/save_article';
$route['__update_article'] = 'c_content/update_article';
$route['__delete_article'] = 'c_content/delete_article';
$route['__save_category']='c_content/save_category';
$route['__update_category']='c_content/update_category';
$route['__delete_category']='c_content/delete_category';
$route['__show_editarticle/(:any)'] = 'c_content/show_editarticle/$1';
$route['__show_about']='c_content/show_about';
$route['__update_about']='c_content/update_about';
$route['__load_contact'] = 'c_content/show_contact';

// summernote
$route['__upload_img'] = 'c_content/upload_image';

// ====== LOGIN ========= //

$route['__cek_login'] = 'c_login/cek_login';






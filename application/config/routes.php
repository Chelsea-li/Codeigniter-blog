<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['categories'] = 'categories/index';
$route['posts/create'] = 'posts/create';
$route['posts/edit/(:any)'] = 'posts/edit/$1';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['administrator'] = 'admin/login';
$route['jemaator'] = 'user/auth';
$route['artikel'] = 'blog';
$route['artikel'] = 'blog/index';
$route['artikel/(:any)'] = 'blog/detail/$1';
$route['blog/archive/(:any)'] = 'blog/archive/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

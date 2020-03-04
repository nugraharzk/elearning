<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Auth
$route['auth'] = 'Auth/index';
$route['auth/login'] = 'Auth/index';
$route['auth/logout'] = 'Auth/doLogout';
$route['auth/register'] = 'Auth/register';

// Dashboard
$route['dashboard'] = 'Dashboard/index';

// Kelas
$route['kelas'] = 'Kelas/index';
$route['kelas/tambah'] = 'Kelas/tambahKelas';
$route['kelas/(:any)'] = 'Kelas/detail/$1';

// Default Routes
$route['default_controller'] = 'Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

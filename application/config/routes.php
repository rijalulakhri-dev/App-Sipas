<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Main';

$route['list_surat'] = 'Permohonan/index';
$route['add_surat'] = 'Permohonan/create';
$route['pro_surat_add'] = 'Permohonan/create_process';
$route['surat/process'] = 'Main/process_surat_add';
$route['track_surat'] = 'Permohonan/detail';
$route['del_surat/(:any)'] = 'Permohonan/delete/$1';

// buat surat
$route['create_surat'] = 'Surat/index';
// laporan surat
$route['laporan'] = 'Surat/laporan';
$route['form_disposisi'] = 'Surat/form_disposisi';
$route['cetak/(:any)'] = 'Surat/cetak_excel/$1';

$route['cetak_pdf/(:any)'] = 'Surat/cetak_pdf/$1';

// Lembaran disposisi
// $route['lembar_disposisi'] = 'Surat/lembar_disposisi';
$route['get_disp_pimpinan/(:any)'] = 'Surat/get_disposisi_pimpinan/$1';

$route['disposisi_pimpinan/(:any)'] = 'Surat/disposisi_pimpinan/$1';
$route['lembar_disposisis/(:any)'] = 'Surat/lembar_disposisi/$1';
$route['pro_disposisi/(:any)'] = 'Surat/process_disposisi/$1';

$route['pro_update/(:any)'] = 'Surat/process_update/$1';


$route['list_petugas'] = 'Admin/index';
$route['daftar_petugas'] = 'Admin/daftar';
$route['pro_daftar'] = 'Admin/proses_daftar';
$route['delete/(:any)'] = 'Admin/delete/$1';

$route['update_petugas/(:any)'] = 'Admin/update_petugas/$1';
$route['pro_update_petugas'] = 'Admin/proses_update_petugas';



$route['login'] = 'Auth/login';
$route['logout'] = 'Auth/logout';
$route['proses_login'] = 'Auth/proses_login';

$route['404_error'] = 'Main/error';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

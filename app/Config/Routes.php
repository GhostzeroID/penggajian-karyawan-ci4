<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('home', 'Home::index');
$routes->get('/login1', 'Home::index');
$routes->post('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');
$routes->get('/gantipassword', 'GantiPassword::index');
$routes->post('/prosesganti', 'GantiPassword::gantiPassword');
$routes->get('/gantipass', 'Pegawai\GantiPassword::index');
$routes->post('/prosesgantipassword', 'Pegawai\GantiPassword::gantiPassword');

$routes->get('/admin', 'Admin\Dashboard::index');

// crud data jabatan
$routes->get('/datajabatan', 'Admin\DataJabatan::index');
$routes->get('/tambahdatajabatan', 'Admin\DataJabatan::tambahData');
$routes->post('/prosestambahdatajabatan', 'Admin\DataJabatan::tambahDataJabatan');
$routes->get('/editdatajabatan/(:num)', 'Admin\DataJabatan::editData/$1');
$routes->post('/proseseditdatajabatan', 'Admin\DataJabatan::prosesEditData');
$routes->get('/hapusdatajabatan/(:num)', 'Admin\DataJabatan::hapusData/$1');
// crud data jabatan
// crud data pegawai
$routes->get('/datapegawai', 'Admin\DataPegawai::index');
$routes->get('/tambahdatapegawai', 'Admin\DataPegawai::tambahData');
$routes->post('/prosestambahdatapegawai', 'Admin\DataPegawai::tambahDataPegawai');
$routes->get('/editdatapegawai/(:num)', 'Admin\DataPegawai::editData/$1');
$routes->post('/proseseditdatapegawai', 'Admin\DataPegawai::prosesEditData');
$routes->get('/hapusdatapegawai/(:num)', 'Admin\DataPegawai::hapusData/$1');

// crud data pegawai

$routes->match(['get', 'post'], 'dataabsensi', 'Admin\DataAbsensi::index');
$routes->get('/tambahdatakehadiran', 'Admin\DataAbsensi::tambahData');
$routes->post('/prosestambahdataabsensi', 'Admin\DataAbsensi::tambahDataKehadiran');
$routes->get('/editdataabsensi/(:num)', 'Admin\DataAbsensi::editData/$1');
$routes->post('/proseseditdataabsensi', 'Admin\DataAbsensi::prosesEditData');
$routes->get('/cetakdataabsensi', 'Admin\DataAbsensi::cetakAbsensi');
$routes->get('/hapusdataabsensi/(:num)', 'Admin\DataAbsensi::hapusData/$1');

$routes->get('/potongangaji', 'Admin\PotonganGaji::index');
$routes->get('/tambahdatapotongan', 'Admin\PotonganGaji::tambahData');
$routes->post('/prosestambahpotongan', 'Admin\PotonganGaji::tambahDataPotongan');
$routes->get('/editdatapotongan/(:num)', 'Admin\PotonganGaji::editData/$1');
$routes->post('/proseseditdatapotongan', 'Admin\PotonganGaji::prosesEditData');
$routes->get('/hapusdatapotongan/(:num)', 'Admin\PotonganGaji::hapusData/$1');


$routes->match(['get', 'post'], 'datagaji', 'Admin\DataGaji::index');
$routes->get('/tambahdatagaji', 'Admin\DataGaji::tambahData');
$routes->post('/prosestambahgaji', 'Admin\DataGaji::tambahDataGaji');
$routes->get('/editdatagaji/(:num)', 'Admin\DataGaji::editData/$1');
$routes->post('/proseseditdatagaji', 'Admin\DataGaji::prosesEditData');
$routes->get('/cetakdatagaji', 'Admin\DataGaji::cetakGaji');
$routes->get('/hapusdatagaji/(:num)', 'Admin\DataGaji::hapusData/$1');

$routes->match(['get', 'post'], 'laporandataabsesni', 'Admin\DataAbsensi::laporanAbsensi');
$routes->match(['get', 'post'], 'laporandataabsensipegawai', 'Admin\DataAbsensi::filterDataOrang');

$routes->match(['get', 'post'], 'laporandatagaji', 'Admin\DataGaji::laporanSlipGaji');
$routes->match(['get', 'post'], 'laporandatagajipegawai', 'Admin\DataGaji::filterData');

$routes->get('/pegawai', 'Pegawai\Dashboard::index');
$routes->get('/datapegawaiuser', 'Pegawai\DataPegawai::index');
$routes->get('/datagajipegawai', 'Pegawai\DataGaji::index');
$routes->match(['get', 'post'], 'laporandatagajifilter', 'Pegawai\DataGaji::filterData');


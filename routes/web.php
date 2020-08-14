<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// route for masien views
Route::get('/dashboard/pasien/tambah/{id}', 'Pasien@tambah');
Route::post('/dashboard/pasien/tambah/{id}', 'Pasien@proses_tambah');
Route::get('/dashboard/pasien','Pasien@index');
Route::get('/dashboard/pasien/hapus/{id}','Pasien@hapus');
Route::get('/dashboard/pasien/edit/{id}','Pasien@edit');
Route::post('/dashboard/pasien/edit/{id}','Pasien@proses_edit');
Route::get('/dashboard/pasien/obat','Pasien@obat');
Route::get('/dashboard/pasien/obat/{id}','Pasien@proses_pembelian');
Route::post('/dashboard/pasien/obat/{id}','Pasien@proses_pembelian_obat');
Route::get('/dashboard/pasien/obat/checkout/{id}','Pasien@checkout_obat');
Route::post('/dashboard/pasien/obat/checkout/{id}','Pasien@proses_checkout_obat');
Route::get('/dashboard/pasien/payment/success/{id}', 'Payment@index');
Route::get('/dashboard/pasien/indexGrafik', 'Pasien@indexGrafik');


// route for janji views
Route::post('/','FrontPage@proses_janji');
Route::get('/dashboard/janji', 'Janji@index');
Route::get('/dashboard/janji/edit/{id}', 'Janji@edit');
Route::post('/dashboard/janji/edit/{id}', 'Janji@proses_edit');
Route::get('/cancel/{id}', 'Janji@cancel');

// route for authentication
Route::get('/login', 'User@index');
Route::post('/login', 'User@login');
Route::get('/forgot','User@forgot');
Route::post('/forgot','User@proses_forgot');
Route::get('/login/dokter', 'User@index_dokter');
Route::post('/login/dokter', 'User@login_dokter');

// route for dokter
Route::get('/dashboard/dokter', 'Dokter@index');
Route::get('/dashboard/dokter/tambah', 'Dokter@tambah');
Route::post('/dashboard/dokter/tambah', 'Dokter@proses_tambah');
Route::get('/dashboard/dokter/hapus/{id}', 'Dokter@proses_hapus');
Route::get('/dashboard/dokter/edit/{id}', 'Dokter@edit');
Route::post('/dashboard/dokter/edit/{id}', 'Dokter@proses_edit');

// route for front page views
Route::get('/','FrontPage@index');


// route for antrian
Route::get('/dashboard/antrian/tambah', 'Antrian@tambah');
Route::post('/dashboard/antrian/tambah', 'Antrian@proses_tambah');
Route::get('/dashboard/antrian/reset','Antrian@reset');
Route::get('/dashboard/antrian', 'Antrian@index');
Route::get('/dashboard/antrian/print/{id}', 'Antrian@print');
Route::get('/dashboard/antrian', 'Antrian@index');
Route::get('/dashboard/antrian/hapus/{id}', 'Antrian@hapus');
Route::get('/antrian/daftar/{email}/{date}', 'Antrian@tambahonline');


// route for print
Route::get('/dashboard/invoice/{id}', 'Invoice@index');


// route for dashboard and profile
Route::get('/dashboard/profile','Profile@index');
Route::get('/dashboard', 'Dashboard@index');
Route::get('/dashboard/covid', 'StatusCovid@index');
Route::get('/dashboard/logout', 'Dashboard@logout');


// route for keuangan
Route::get('/dashboard/keuangan', 'KeuanganController@index');
Route::post('/dashboard/keuangan', 'KeuanganController@proses');
Route::get('/dashboard/keuangan/result/{dari}/{sampai}', 'KeuanganController@result');

// route for report
Route::get('/dashboard/report/manufaktur-obat', 'ReportAll@manufaktur_obat');
Route::post('/dashboard/report/manufaktur-obat', 'ReportAll@filter_manufaktur_obat');
Route::get('/dashboard/report/manufaktur-obat/{id}', 'ReportAll@manufaktur_obat_detail');
Route::get('/dashboard/report/pasien', 'ReportAll@pasien');

// route for obat
Route::get('/dashboard/tambah/obat', 'Tambah@tambah_obat');
Route::post('/dashboard/tambah/obat', 'Tambah@proses_tambah_obat');
Route::get('/dashboard/obat', 'Obat@index');
Route::get('/dashboard/obat/check','PurchaseOrder@ajaxObat')->name('o-check');

// route for adding anything
Route::get('/dashboard/akun/tambah', 'Akun@tambah');
Route::post('/dashboard/akun/tambah', 'Akun@proses_tambah');
Route::get('/dashboard/tambah/spesialis', 'Tambah@spesialis');
Route::post('/dashboard/tambah/spesialis', 'Tambah@tambah_spesialis');
Route::post('/dashboard/tambah/spesialis/file', 'Tambah@tambah_file_spesialis');
Route::get('/dashboard/tambah/manufaktur/{id}', 'Tambah@manufaktur');
Route::post('/dashboard/tambah/manufaktur/{id}', 'Tambah@proses_manufaktur');


// route for see account
Route::get('/dashboard/akun/hapus/{id}', 'Akun@hapus');
Route::get('/dashboard/akun/edit/{id}', 'Akun@edit');
Route::post('/dashboard/akun/edit/{id}', 'Akun@proses_edit');
Route::get('/dashboard/akun','Akun@index');
Route::get('/akun/check', 'Akun@check');
Route::get('/akun/verifikasi/{email}', 'Akun@verifikasi');

// route for add log user activity
Route::get('/dashboard/logging-user','LoggingUser@index');

//payment gateway 
Route::get('/dashboard/payments/manufaktur/bri', 'APIPaymentGateway@_initTOKENBRI');

// route for manufakturing
Route::get('/dashboard/manufaktur', 'Manufaktur@index');
Route::get('/dashboard/manufaktur/detail/{id}','Manufaktur@detail');

// route purchase order
Route::get('/dashboard/purchase-order', 'Tambah@tambahPurchaseOrder');
Route::post('/dashboard/purchase-order', 'Tambah@prosestambahPurchaseOrder');
Route::get('/dashboard/purchase-order/list','PurchaseOrder@index');
Route::get('/dashboard/purchase-order/detail/{id}/{nama}', 'PurchaseOrder@detailPO');
Route::get('/dashboard/purchase-order/edit/{id}', 'PurchaseOrder@edit');
Route::post('/dashboard/purchase-order/edit/{id}', 'PurchaseOrder@proses_edit');
Route::get('/dashboard/purchase-order/hapus/{id}', 'PurchaseOrder@hapus');

// route for approve
Route::get('/dashboard/purchase-order/approve/{id}', 'Pembelian@approve');


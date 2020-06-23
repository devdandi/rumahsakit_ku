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

Route::get('/', 'User@index');
Route::post('/login', 'User@login');
Route::get('/dashboard', 'Dashboard@index');
Route::get('/dashboard/dokter', 'Dokter@index');
Route::get('/dashboard/dokter/tambah', 'Dokter@tambah');
Route::get('/dashboard/logout', 'Dashboard@logout');
Route::get('/dashboard/akun/tambah', 'Akun@tambah');
Route::post('/dashboard/akun/tambah', 'Akun@proses_tambah');
Route::get('/akun/verifikasi/{email}', 'Akun@verifikasi');
Route::get('/dashboard/akun','Akun@index');
Route::get('/akun/check', 'Akun@check');
Route::get('/dashboard/akun/hapus/{id}', 'Akun@hapus');
Route::get('/dashboard/akun/edit/{id}', 'Akun@edit');
Route::post('/dashboard/akun/edit/{id}', 'Akun@proses_edit');
Route::get('/dashboard/tambah/spesialis', 'Tambah@spesialis');
Route::post('/dashboard/tambah/spesialis', 'Tambah@tambah_spesialis');
Route::post('/dashboard/tambah/spesialis/file', 'Tambah@tambah_file_spesialis');
Route::get('/dashboard/logging-user','LoggingUser@index');


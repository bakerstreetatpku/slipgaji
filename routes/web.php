<?php

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

// Route::get('/', function () {
    // return view('welcome');
// });

Route::get('/','pegawaiController@index');
Route::get('/pegawai','pegawaiController@index');
Route::post('/pegawai/store','pegawaiController@store');
Route::post('/pegawai/cari','pegawaiController@cari');
Route::post('/pegawai/hapus','pegawaiController@hapus');


Route::get('/periodeabsen','periodeabsenController@index');
Route::post('/periodeabsen/store','periodeabsenController@store');
Route::post('/periodeabsen/cari','periodeabsenController@cari');
Route::post('/periodeabsen/hapus','periodeabsenController@hapus');


Route::get('/absen','absenController@index');
Route::post('/absen/store','absenController@store');
Route::post('/absen/cari','absenController@cari');
Route::post('/absen/hapus','absenController@hapus');


Route::get('/gaji','gajiController@index');
Route::post('/gaji/store','gajiController@store');
Route::post('/gaji/cari','gajiController@cari');
Route::post('/gaji/hapus','gajiController@hapus');

Route::get('/cetakgaji','cetakgajiController@index');
Route::post('/cetakgaji/store','cetakgajiController@store');
Route::post('/cetakgaji/cari','cetakgajiController@cari');
Route::post('/cetakgaji/hapus','cetakgajiController@hapus');
Route::get('/cetakgaji/cetak','cetakgajiController@cetak');


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/belajar', "SiswaController@index");
Route::get('/DataKelas', "KelasController@index");

Route::get('/RuteSatu', function () {
    echo '<h1>Rute Satu Berhasil</h1>';
});

Route::get('/RuteDua', function () {
    echo '<h1>Rute Dua Berhasil</h1>';
});

Route::get('/RuteTiga', function () {
    echo '<h1>Rute Tiga Berhasil</h1>';
});

Route::get('/ViewSatu', 'SiswaController@coba1');
Route::get('/ViewDua', 'SiswaController@coba2');
Route::get('/ViewTiga', 'SiswaController@coba3');

Route::get('/siswa', 'SiswaController@index');
Route::get('/siswa/create', 'SiswaController@create');
Route::post('/siswa', 'SiswaController@store');

Route::get('/dashboard', function () {
    return view('dashboard');
});
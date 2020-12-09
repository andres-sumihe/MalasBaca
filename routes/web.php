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
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('loginPage');
});

Route::get('/loginError', function () {
    return view('failedLogin');
});

Route::post('/checkLogin', 'LoginController@checkLoginFunction')->name('loginCheck');

//Route CRUD Buku
Route::get('/admin/readBuku', 'BukuController@readBuku');
Route::get('/admin/insertBuku', 'BukuController@insertBuku')->name('insertBuku');
Route::post('/admin/saveBuku', 'BukuController@saveBuku')->name('saveBuku');
Route::get('/admin/deleteBuku/{id_buku}', 'BukuController@deleteBuku')->name('deleteBuku');
Route::get('/admin/updateBuku/{id_buku}', 'BukuController@updateBuku')->name('updateBuku');
Route::post('/admin/saveUpdate', 'BukuController@saveUpdate');

//Route CRUD Pengguna
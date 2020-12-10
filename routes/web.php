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

//Login
Route::get('/', function () {
    return view('loginPage');
});

Route::get('/loginError', function () {
    return view('failedLogin');
});

Route::post('/checkLogin', 'LoginController@checkLoginFunction')->name('loginCheck');

//Login Admin
Route::get('/admin/login', function () {
    return view('adminloginPage');
});

Route::get('/admin/success', function () {
    return view('adminsuccessLogin');
});

Route::get('/admin/logout', 'LoginController@LogoutAdmin');
Route::post('/AdmincheckLogin', 'LoginController@AdmincheckLoginFunction')->name('adminloginCheck');

//Route CRUD Buku
Route::get('/admin', 'BukuController@readBuku');
Route::get('/admin', 'BukuController@insertBuku')->name('insertBuku');
Route::post('/admin/buku/insert', 'BukuController@saveBuku')->name('saveBuku');
Route::get('/admin/deleteBuku/{id_buku}', 'BukuController@deleteBuku')->name('deleteBuku');
//Route::get('/admin/updateBuku/{id_buku}', 'BukuController@updateBuku')->name('updateBuku');
Route::post('/admin/updateBuku/{id_buku}', 'BukuController@saveUpdateBuku');

//Tambahan Fungsi Untuk Buku(Test)
Route::get('cariBuku', 'BukuController@cariBuku')->name('cariBuku');
Route::post('cariBukuResult', 'BukuController@cariBukuResult')->name('cariBukuResult');

//Route CRUD Pengguna
Route::get('/admin', 'PenggunaController@readPengguna');
Route::get('/admin/insertPengguna', 'PenggunaController@insertPengguna')->name('insertPengguna');
Route::post('/admin/savePengguna', 'PenggunaController@savePengguna')->name('savePengguna');
Route::get('/admin/deletePengguna/{nim_pengguna}', 'PenggunaController@deletePengguna')->name('deletePengguna');
Route::get('/admin/updatePengguna/{nim_pengguna}', 'PenggunaController@updatePengguna')->name('updatePengguna');
Route::post('/admin/saveUpdatePengguna', 'PenggunaController@saveUpdatePengguna');

//Route CRUD Admin
Route::get('/admin/readAdmin', 'AdminController@readAdmin');
Route::get('/admin/insertAdmin', 'AdminController@insertAdmin')->name('insertAdmin');
Route::post('/admin/saveAdmin', 'AdminController@saveAdmin')->name('saveAdmin');
Route::get('/admin/deleteAdmin/{id_Admin}', 'AdminController@deleteAdmin')->name('deleteAdmin');
Route::get('/admin/updateAdmin/{id_Admin}', 'AdminController@updateAdmin')->name('updateAdmin');
Route::post('/admin/saveUpdateAdmin', 'AdminController@saveUpdateAdmin');

//Route CRUD Peminjaman
Route::get('/admin/readPeminjaman', 'PeminjamanController@readPeminjaman');
Route::get('/admin/insertPeminjaman', 'PeminjamanController@insertPeminjaman')->name('insertPeminjaman');
Route::post('/admin/savePeminjaman', 'PeminjamanController@savePeminjaman')->name('savePeminjaman');
Route::get('/admin/deletePeminjaman/{id_Peminjaman}', 'PeminjamanController@deletePeminjaman')->name('deletePeminjaman');
Route::get('/admin/updatePeminjaman/{id_Peminjaman}', 'PeminjamanController@updatePeminjaman')->name('updatePeminjaman');
Route::post('/admin/saveUpdatePeminjaman', 'PeminjamanController@saveUpdatePeminjaman');

//File Upload
// Route::get('admin', 'BukuController@fileUpload')->name('file.upload');
// Route::post('admin', 'BukuController@fileUploadPost')->name('file.upload.post');

//Dashboard
Route::get('/Dashboard', function () {
    return view('home');
});
Route::get('/Dashboard', 'BukuController@readBuku_Dashboard');

/*
Route::get('/admin', function () {
    return view('adminhome');
});
*/

Route::get('/admin', 'BukuController@readBuku');

//Ganti Password
Route::post('/gantipassword','PenggunaController@gantipassword');


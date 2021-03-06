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

Route::post('/checkLogin', 'LibController@checkLoginFunction')->name('loginCheck');

//Login admin
Route::get('/admin/login', function () {
    return view('adminloginPage');
});

Route::get('/admin/success', function () {
    return view('adminsuccessLogin');
});

Route::get('/admin/logout', 'LibController@LogoutAdmin');
Route::post('/AdmincheckLogin', 'LibController@AdmincheckLoginFunction')->name('adminloginCheck');

//Route CRUD Buku
// Route::get('/admin', 'BukuController@insertBuku')->name('insertBuku');
// Route::post('/admin/buku/insert', 'BukuController@saveBuku')->name('saveBuku');
// Route::get('/admin/deleteBuku/{id_buku}', 'BukuController@deleteBuku')->name('deleteBuku');
// Route::post('/admin/updateBuku/{id_buku}', 'BukuController@saveUpdateBuku');
Route::get('/admin/buku', 'LibController@readBuku');
Route::get('/admin/buku/insert', 'LibController@insertBuku')->name('insertBuku');
Route::post('/admin/buku/save', 'LibController@saveBuku')->name('saveBuku');
Route::get('/admin/deleteBuku/{id_buku}', 'LibController@deleteBuku')->name('deleteBuku');
Route::post('/admin/updateBuku/{id_buku}', 'LibController@saveUpdateBuku');


//Tambahan Fungsi Untuk Buku(Test)
Route::get('cariBuku', 'LibController@cariBuku')->name('cariBuku');
Route::post('cariBukuResult', 'LibController@cariBukuResult')->name('cariBukuResult');

//Route CRUD Pengguna
Route::post('/admin/saveUpdatePengguna/{nim_pengguna}', 'LibController@saveUpdatePengguna');
Route::get('/admin/Pengguna', 'LibController@readPengguna');
Route::get('/admin/insertPengguna', 'LibController@insertPengguna')->name('insertPengguna');
Route::post('/admin/savePengguna', 'LibController@savePengguna')->name('savePengguna');
Route::get('/admin/deletePengguna/{nim_pengguna}', 'LibController@deletePengguna')->name('deletePengguna');
Route::get('/admin/updatePengguna/{nim_pengguna}', 'LibController@updatePengguna')->name('updatePengguna');
Route::post('/admin/saveUpdatePengguna', 'LibController@saveUpdatePengguna');

//Route CRUD admin
Route::get('/admin/readAdmin', 'LibController@readAdmin');
Route::get('/admin/insertAdmin', 'LibController@insertAdmin')->name('insertAdmin');
Route::post('/admin/saveAdmin', 'LibController@saveAdmin')->name('saveAdmin');
Route::get('/admin/deleteAdmin/{id_Admin}', 'LibController@deleteAdmin')->name('deleteAdmin');
Route::get('/admin/updateAdmin/{id_Admin}', 'LibController@updateAdmin')->name('updateAdmin');
Route::post('/admin/saveUpdateAdmin', 'LibController@saveUpdateAdmin');

//Route CRUD Peminjaman
Route::get('/admin/readPeminjaman', 'LibController@readPeminjaman');
Route::get('/admin/insertPeminjaman', 'LibController@insertPeminjaman')->name('insertPeminjaman');
Route::post('/admin/savePeminjaman', 'LibController@savePeminjaman')->name('savePeminjaman');
Route::get('/admin/deletePeminjaman/{id_Peminjaman}', 'LibController@deletePeminjaman')->name('deletePeminjaman');
Route::get('/admin/updatePeminjaman/{id_Peminjaman}', 'LibController@updatePeminjaman')->name('updatePeminjaman');
Route::post('/admin/saveUpdatePeminjaman/{id_peminjaman}', 'LibController@saveUpdatePeminjaman');

//Route CRUD Pengumuman
Route::get('/admin/readPengumuman', 'LibController@readPengumuman');
Route::get('/admin/readPengumuman_Dashboard', 'LibController@readPengumuman_Dashboard');
Route::get('/admin/insertPengumuman', 'LibController@insertPengumuman')->name('insertPengumuman');
Route::post('/admin/savePengumuman', 'LibController@savePengumuman')->name('savePengumuman');
Route::get('/admin/deletePengumuman/{id_Pengumuman}', 'LibController@deletePengumuman')->name('deletePengumuman');
Route::post('/admin/updatePengumuman/{id_pengumuman}', 'LibController@saveUpdatePengumuman');

Route::get('/Dashboard', function () {
    return view('home');
});

Route::get('/admin', function () {
    return view('admin');
});

//Ganti Password
Route::post('/gantipassword','LibController@gantipassword');
Route::get('/Dashboard', 'LibController@readBuku_Dashboard');
Route::get('/admin', 'LibController@readBuku'); 


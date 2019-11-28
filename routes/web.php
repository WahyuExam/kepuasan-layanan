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

Route::get('/login','HomeController@login');
Route::post('/login','HomeController@loginCheck');
Route::get('/logout','HomeController@logout');

// kuisioner imk
Route::get('/','KuisionerController@home');
Route::get('/user/kuisioner-ikm','KuisionerController@formKuisionerIkm');
Route::post('/user/kuisioner-ikm','TransaksiController@formKuisionerIkmSimpan');

// kuisioner kepuasan
Route::get('/user/kuisioner-kepuasan-pelayanan/{id}','KuisionerController@formKuisionerkepuasan');
Route::post('/user/kuisioner-kepuasan-pelayanan/{id}','TransaksiController@formKuisionerkepuasanSimpan');

Route::get('/jam','TransaksiController@jam');
Route::get('/jam2','TransaksiController@jam2');


Route::group(['middleware' => 'login.auth'],function(){
	Route::get('/admin/list-pertanyaan','PertanyaanController@listPertanyaan');
	Route::get('/admin/create-pertanyaan','PertanyaanController@formCreate');
	Route::post('/admin/create-pertanyaan','PertanyaanController@formCreateSimpan');
	Route::get('/admin/ubah-pertanyaan/{id}','PertanyaanController@formEdit')->name('ubah.pertanyaan');
	Route::post('/admin/ubah-pertanyaan/{id}','PertanyaanController@formEditSimpan');
	Route::get('/admin/lihat-pertanyaan/{id}','PertanyaanController@lihatPertanyaan')->name('lihat.pertanyaan');
	Route::get('/admin/hapus-pertanyaan/{id}','PertanyaanController@hapusPertanyaan')->name('hapus.pertanyaan');

	// hasil kuisioner
	Route::get('/admin/list-hasil-responden/{tgl}','TransaksiController@listResponden');
	Route::get('/admin/list-hasil-responden-ajax/{ket}/{tgl}','TransaksiController@listRespondenAjax');
	Route::get('/admin/list-hasil-responden-lihat-detail/{id}','TransaksiController@lihatDetail');	

	// laporan
	Route::get('/admin/laporan/form','TransaksiController@formLaporan');
	Route::post('/admin/laporan/index/','TransaksiController@laporanIndex');
	Route::get('/admin/laporan/index/cetak-pdf/{tgl}','TransaksiController@cetakIndexPdf');
});




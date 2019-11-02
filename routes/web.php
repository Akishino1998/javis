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
    // return view('welcome');
    return redirect('/home');
});
// ================================================================================
//Authentifikasi
Route::get('/login','AuthController@index');
Route::post('/login','AuthController@cek_data');
Route::get('/register','AuthController@index2');
Route::post('/register','AuthController@daftar');
Route::get('/biodata','AuthController@bio');
Route::post('/biodata','AuthController@update_bio');
Route::post('/biodata-alamat','AuthController@update_alamat');
Route::post('/biodata-foto','AuthController@upload_foto');

//home 
Route::get('/home','HomeController@index');

Route::get('/servis','HomeController@create_servis');
Route::post('/servis','HomeController@set_servis');

Route::get('/lokasi-jemput-antar','HomeController@set_lokasi');
Route::post('/lokasi-jemput-antar','HomeController@update_lokasi');

Route::get('/list-servis','HomeController@list_servis');
Route::get('/daftar-elektronikku','HomeController@daftar_elektronikku');



Route::get('/keluar', function () {
    session()->flush();
    return redirect('/home');

});



// ===========================================================
//Route Admin
Route::get('/admin/dasboard','AdminController@index');
Route::get('/admin/dasboard/{id_order}/{id_user}','AdminController@show');
Route::post('/admin/dasboard/addkurir','AdminController@addkurir');
Route::post('/admin/dasboard/addkelengkapan','AdminController@addkelengkapan');
Route::post('/admin/dasboard/addteknisi','AdminController@addteknisi');
Route::post('/admin/dasboard/cancel-servis','AdminController@calcel_servis');
Route::post('/admin/dasboard/reload-notif','AdminController@reload_notif');
Route::post('/admin/dasboard/addkurirantar','AdminController@addkurirantar');
Route::post('/admin/dasboard/addhargaservis','AdminController@addhargaservis');
Route::get('/admin/servis-pending','AdminController@servis_pending');
Route::get('/admin/servis-penjemputan','AdminController@servis_penjemputan');
Route::get('/admin/servis-masuk','AdminController@servis_masuk');
Route::get('/admin/servis-proses','AdminController@servis_proses');




Route::get('login-admin','AdminController@login');
Route::get('register-admin','AdminController@register');
Route::get('data-user','AdminController@data_user');
Route::get('data-customer','AdminController@data_customer');

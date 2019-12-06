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
//auth
Route::get('/login','AuthController@login');
Route::post('/login','AuthController@loginProses');
Route::get('/register','AuthController@register');
Route::post('/register','AuthController@registerProses');


Route::get('/', function () {
    // return view('welcome');
    return redirect('/home');
});

//home 

Route::get('/home','HomeController@index');
Route::get('/servis/{id}','HomeController@servis');
Route::post('/servis','HomeController@servisMasuk');

Route::get('/cari_sp',function(){
    return view('cari_sp');
});

//method
Route::get('/getType/{id}', 'MethodController@getType');
//method admin
Route::get('/getMerk/{id}', 'MethodController@getMerk');
Route::get('/getTipe/{id}','MethodController@getTipe');
Route::get('/getKerusakan/{id}','MethodController@getKerusakan');

Route::get('/keluar', function () {
    session()->flush();
    return redirect('/home');

});

//admin
Route::get('/enkrip',function(){
    return password_hash("123456", PASSWORD_DEFAULT);
});
Route::get('/admin/login','AdminController@login');
Route::post('/admin/login','AdminController@verifikasilogin');
Route::get('/admin/logout', function () {
    session()->flush();
    
    return redirect('/admin/login');
});
Route::get('/admin','AdminController@index');
Route::get('/admin/daftar-harga','AdminController@daftar_harga');
Route::get('/admin/daftar-harga/{id_elektronik}','AdminController@daftarHargaFilterElektronik');

Route::get('/admin/addHargaServis','AdminController@tambahDataHargaServis');

//admin input data
Route::get('/admin/inputMerk/{merk}/{id}','InputDataController@inputMerk');
Route::get('/admin/inputTipe/{merk}/{id}','InputDataController@inputTipe');
Route::post('/admin/inputKerusakan','InputDataController@inputKerusakan');
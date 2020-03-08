<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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

//auth
Route::get('/logout', function () {
    Session::flush();
    return redirect('/home');
});
Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@loginProses');
Route::get('/register','AuthController@register');
Route::post('/register','AuthController@registerProses');
Route::get('/user-setting','AuthController@userSetting');
Route::get('/biodata','AuthController@biodataUser');
Route::POST('/biodata','AuthController@biodataUserAdd');
Route::get('/edit-foto','AuthController@editFoto');
Route::POST('/edit-foto','AuthController@editFotoAdd');
//user device
Route::get('/mygadget','AuthController@gadget');
Route::get('/servisku','UserController@servis');



//home 
Route::get('/daftar-servis','HomeController@daftarServis');
Route::get('/cari-servis','HomeController@cariServis');
Route::get('/home','HomeController@index');
Route::get('/servis/{id}','HomeController@servis');
Route::post('/servis','HomeController@servisMasuk');
Route::get('/detail-servis','HomeController@detailServis');
Route::get('/iklan/{id}','HomeController@itemServis');
// Route::post('/pesan_servis','HomeController@pesan');
Route::get('/kontak','HomeController@kontak');
Route::post('/pesan-servis','OrderController@index');
Route::get('/pesan-servis/{id}','OrderController@pesanServis');
Route::post('/setLokasiPenjemputan','OrderController@setLokasiPenjemputan');


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
    return password_hash("admin", PASSWORD_DEFAULT);
});
Route::get('/admin/login','AdminController@login');
Route::post('/admin/login','AdminController@verifikasilogin');
Route::get('/admin/logout', function () {
    session()->flush();
    
    return redirect('/admin/login');
});
Route::get('/admin','AdminController@index');
Route::get('/admin/servis-masuk','AdminController@servis_masuk');
Route::get('/admin/daftar-harga','AdminController@daftar_harga');
Route::get('/admin/daftar-harga/{id_elektronik}','AdminController@daftarHargaFilterElektronik');
Route::get('/admin/addHargaServis','AdminController@tambahDataHargaServis');


//admin input data
Route::get('/admin/inputMerk/{merk}/{id}','InputDataController@inputMerk');
Route::get('/admin/inputTipe/{merk}/{id}','InputDataController@inputTipe');
Route::get('/admin/inputKerusakan/{kerusakan}','InputDataController@inputKerusakan');
Route::post('/admin/inputKerusakan','InputDataController@inputHarga');
Route::post('/admin/updateData','InputDataController@updateData');
Route::get('/admin/deleteData/{id}','InputDataController@deleteData');
 
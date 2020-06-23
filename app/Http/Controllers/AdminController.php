<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\RefHargaServis;;
use App\RefElektronik;
use App\RefMerk;
use App\RefType;
use App\RefKerusakan;
use App\RefDistributor;
use App\AdminUser;
use App\UserElektronik;

use App\ServisMasuk;
use App\UserAkun;
use App\UserBiodata;

class AdminController extends Controller
{
    function index(){
        // return ServisMasuk::all()->first()->KelengkapanUnit;
        $servisMasuk = ServisMasuk::all()->where('status','<','4')->COUNT();
        return view('admin.index', compact("servisMasuk"));
    }
    function servis_masuk(){ 

        $user = UserAkun::all();
        $data = ServisMasuk::all();
        // return $user->where('username','admin')->first()->UserBiodata->nama;
        return view('admin.servisMasuk', compact('data','user'));
    }
    function login(){
        
        return view('admin.login');
    }
    function verifikasilogin(Request $request){
        
        $username = $request->username;
        $password = $request->password;
        
        $stat = AdminUser::all()->where('username',$username)->COUNT();
        if($stat != 0){
            $user = AdminUser::all()->where('username',$username)->first();
            if (password_verify($password, $user->password)) {
                // echo 'Password is valid!';
                Session::put('username-admin', $username);
                Session::put('nama', $user->nama);
                Session::put('level', $user->level);
                return redirect('/admin');
                
                // return Session::get('nama');
            } else {
                return redirect('/admin/login')->with('alert','1');
            }
        }else{
            return redirect('/admin/login')->with('alert','1');
        }
        
        
        
    } 
     
    function daftar_harga(){
        $refElektronik = RefElektronik::all();
        $data = RefHargaServis::all();
        // $tes = RefType::all();
        // return $tes->find(1012)->RefHargaServis;
        return view('admin.daftar_harga', compact('data','refElektronik'));
    }
    function daftarHargaFilterElektronik($id_elektronik){
        $id_elektronik = $id_elektronik;
        $refElektronik = RefElektronik::all();
        $data = RefHargaServis::all();
        return view('admin.daftar_harga_detail', compact('data','refElektronik','id_elektronik'));
    }
    function tambahDataHargaServis(){
        $refElektronik = RefElektronik::all();
        $refMerk = RefMerk::all();
        $refType = RefType::all();
        $RefKerusakan = RefKerusakan::all();
        return view('admin.addHarga', compact('refElektronik','refMerk','refType','RefKerusakan'));
    } 

    function addPelanggan(){
        return view('admin.addPelanggan');
    }
    function checkUsernameUser(Request $request){
        $user = UserAkun::all()->where('username',$request->username)->COUNT();
        return $user;
    }
    function addUsername(Request $request){
        // return password_hash($request->password, PASSWORD_DEFAULT);
        $user = new UserAkun;
        $user->username = $request->username;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->save();
        
        $userBiodata = UserBiodata::where('username', $request->username)->first();
        $userBiodata->nama = $request->nama;
        $userBiodata->no_hp = $request->no_hp;
        $userBiodata->email = $request->email;
        $userBiodata->alamat = $request->alamat;
        $userBiodata->save();
        return redirect("/admin/servis-masuk")->with('status','inputServis');
    }

}

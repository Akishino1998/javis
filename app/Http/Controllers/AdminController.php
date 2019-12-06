<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\HargaServisHP;
use App\RefElektronik;
use App\RefMerk;
use App\RefType;
use App\RefKerusakan;
use App\RefDistributor;
use App\AdminUser;
class AdminController extends Controller
{

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
    function index(){
        return view('admin.index');
        // return view('index_admin');
    } 
    function daftar_harga(){
        $refElektronik = RefElektronik::all();
        // $data = HargaServisHP::all();
        $data = DB::select('select * from ref_harga_servis_hp');
        return view('admin.daftar_harga', compact('data','refElektronik'));
    }
    function daftarHargaFilterElektronik($id_elektronik){
        $id_elektronik = $id_elektronik;
        $refElektronik = RefElektronik::all();
        $data = HargaServisHP::all()->where('id_ref_elektronik',$id_elektronik);
        return view('admin.daftar_harga_detail', compact('data','refElektronik','id_elektronik'));
    }
    function tambahDataHargaServis(){
        $refElektronik = RefElektronik::all();
        $refMerk = RefMerk::all();
        $refType = RefType::all();
        $RefKerusakan = RefKerusakan::all();
        $refDistributor = RefDistributor::all();
        return view('admin.addHarga', compact('refElektronik','refMerk','refType','RefKerusakan','refDistributor'));
    } 

}

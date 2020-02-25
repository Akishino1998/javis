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
        $refDistributor = RefDistributor::all();
        $data = DB::select('SELECT tb_admin.username,tb_admin.nama,ref_distributor.id_distributor , id_ref_harga,ref_harga_servis.id_ref_kerusakan, ref_elektronik.id_ref_elektronik, ref_merk.id_merk, ref_harga_servis.id_detail_merk, jenis_elektronik, nama_merk, ref_detail_merk.`type`, ref_kerusakan.jenis_kerusakan, ref_harga_servis.harga_sparepart, ref_distributor.nama_distributor, ref_harga_servis.total_harga, ref_harga_servis.garansi_hari, ref_harga_servis.lama_perbaikan_hari, ref_harga_servis.foto
FROM ref_elektronik, ref_merk, ref_detail_merk, ref_kerusakan, ref_harga_servis, ref_distributor, tb_admin
WHERE ref_elektronik.id_ref_elektronik = ref_merk.id_ref_elektronik 
AND ref_merk.id_merk = ref_detail_merk.id_merk
AND  ref_detail_merk.id_detail_merk = ref_harga_servis.id_detail_merk
AND ref_kerusakan.id_ref_kerusakan = ref_harga_servis.id_ref_kerusakan
AND ref_harga_servis.id_distributor = ref_distributor.id_distributor 
AND ref_harga_servis.username = tb_admin.username ');
        return view('admin.daftar_harga', compact('data','refElektronik','refDistributor'));
    }
    function daftarHargaFilterElektronik($id_elektronik){
        $id_elektronik = $id_elektronik;
        $refElektronik = RefElektronik::all();
        $refDistributor = RefDistributor::all();
        $data = DB::select('SELECT tb_admin.username,tb_admin.nama,ref_distributor.id_distributor , id_ref_harga,ref_harga_servis.id_ref_kerusakan, ref_elektronik.id_ref_elektronik, ref_merk.id_merk, ref_harga_servis.id_detail_merk, jenis_elektronik, nama_merk, ref_detail_merk.`type`, ref_kerusakan.jenis_kerusakan, ref_harga_servis.harga_sparepart, ref_distributor.nama_distributor, ref_harga_servis.total_harga, ref_harga_servis.garansi_hari, ref_harga_servis.lama_perbaikan_hari, ref_harga_servis.foto
        FROM ref_elektronik, ref_merk, ref_detail_merk, ref_kerusakan, ref_harga_servis, ref_distributor, tb_admin
        WHERE ref_elektronik.id_ref_elektronik = ref_merk.id_ref_elektronik 
        AND ref_merk.id_merk = ref_detail_merk.id_merk
        AND  ref_detail_merk.id_detail_merk = ref_harga_servis.id_detail_merk
        AND ref_kerusakan.id_ref_kerusakan = ref_harga_servis.id_ref_kerusakan
        AND ref_harga_servis.id_distributor = ref_distributor.id_distributor 
        AND ref_harga_servis.username = tb_admin.username
AND ref_elektronik.id_ref_elektronik ='.$id_elektronik);
        return view('admin.daftar_harga_detail', compact('data','refElektronik','id_elektronik','refDistributor'));
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

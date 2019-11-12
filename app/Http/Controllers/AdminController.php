<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HargaServisHP;
use App\RefElektronik;
use App\RefMerk;
use App\RefType;
class AdminController extends Controller
{
    function index(){
        return view('admin.index');
        // return view('index_admin');
    } 
    function daftar_harga(){
        $refElektronik = RefElektronik::all();
        $data = HargaServisHP::all();
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
        return view('admin.addHarga', compact('refElektronik','refMerk','refType'));
    }

}

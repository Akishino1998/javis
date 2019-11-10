<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HargaServisHP;
use App\RefElektronik;
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

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefElektronik;
use App\RefMerk;
use App\RefType;

class HomeController extends Controller
{
    public function index(){
        $refElektronik = RefElektronik::all()->where('ready','Y');
        return view('index', compact('refElektronik'));
    }
    public function servis($id){
        $refElektronik = RefElektronik::all()->where('ready','Y');
        $refMerk = RefMerk::all();
        $refType = RefType::all();
        return view('servis',compact('refElektronik','id', 'refMerk','refType'));
    }
    public function servisMasuk(Request $req){
        $merk = $req->merk;
        $type = $req->type;
        $jemput = $req->jemput;
        $antar = $req->antar;
        if($jemput == "1" || $antar == "1"){
            return view('set_lokasi');
        }else{
            return "sukses";
        }
    }
}

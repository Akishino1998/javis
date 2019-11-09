<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\RefElektronik;
use App\RefMerk;
use App\RefType;
use App\UserAkun;
use App\UserAlamat;
use App\UserBiodata;
use App\UserElektronik;

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
    public function servisMasuk(Request $request){
        $username = "akishino";
        $id_ref_elektronik = $request->id_ref_elektronik;
        $merk = $request->merk;
        $type = $request->type;
        $jemput = $request->jemput;
        $antar = $request->antar;

        $id = UserElektronik::all()->COUNT() + 1;
        DB::table('tb_user_elektronik')->insert([
            'id_user_elektronik' => $id,
            'username' => $username,
            'id_ref_elektronik' => $id_ref_elektronik,
            'id_merk' => $merk,
            'id_detail_merk' => $type,
        ]);  


        // 'kode_unik' => Str::random(5),
        if($jemput == "1" || $antar == "1"){
            return view('set_lokasi');
        }else{
            return "sukses";
        }
    }
}

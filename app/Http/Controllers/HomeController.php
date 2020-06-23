<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\RefElektronik;
use App\RefHargaServis;
use App\RefKerusakan;
use App\RefMerk;
use App\RefType;
use App\UserAkun;
use App\UserAlamat;
use App\UserBiodata;
use App\UserElektronik;

class HomeController extends Controller
{
    public function index(){
        
        $refElektronik = RefElektronik::all(); 
        $data = RefHargaServis::all();
        return view('index', compact('data','refElektronik'));
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



        // 'kode_unik' => Str::random(5),
        if($jemput == "1" || $antar == "1"){
            return view('set_lokasi');
        }else{
            return "sukses";
        }
    }
    function detailServis(){
         return view('detailBarang');
    }
    function kontak(){
        return view('kontak');
    }
    function daftarServis(){
        $refElektronik = RefElektronik::all();
        $data = RefHargaServis::all();
        return view('daftarServis', compact('data','refElektronik'));
    }
    function cariServis(){
        $refElektronik = RefElektronik::all();
        $cari = $_GET['cari'];
        $data = RefHargaServis::all();
        return view('daftarServis', compact('data','refElektronik'));
    }
    function itemServis($id){
        $data = RefHargaServis::find($id);
        return view('singelItem',compact('data'));
    }
    function pesan(Request $request){
        // return $request;
        $no_hp = $request->no_hp ;
        $nama = $request->nama_user;
        $kerusakan = $request->jenis_kerusakan."|".$request->merk."|".$request->type;
        $text = "Nama%20:%20".$nama."%0ANo.Hp%20:%20".$no_hp."%0AKerusakan%20:%20". $kerusakan;

        return redirect("https://api.whatsapp.com/send?phone=6285828949395&text=%2aNOTIFIKASI%20SERVIS%2a%0A%0ATelah%20Masuk%20Servisan%0A".$text);
        // return "https://api.whatsapp.com/send?phone=&text=%2aNOTIFIKASI%20SERVIS%2a%20Telah%20Masuk%20Servisan;

    }
    function testi(){
        // return 1;
        return view('testimoni');
    }
    
    


    
}

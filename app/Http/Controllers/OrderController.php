<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\RefHargaServis;
use App\UserAkun;
use App\UserBiodata;
use App\UserAlamat;
use App\ElektronikUser;
use App\ServisMasuk;
use App\UserElektronik;
use App\RefElektronik;
use App\RefMerk;
use App\RefType;
use App\RefKerusakan;

class OrderController extends Controller
{
    function index(Request $request){
        $user_javis = Session::get('user-javis');
        $data = UserAkun::where('username',$user_javis)->first();
        if($data->complete == "N"){
            return redirect('/biodata')->with('bio','n');
        }
        $data = RefHargaServis::all()->where('id_ref_harga',$request->id)->first();
        $idElektronikUser = ElektronikUser::all()->COUNT();
        DB::table('tb_user_elektronik')->insert([
            'id_user_elektronik' => $idElektronikUser+1,
            'username' => $user_javis,
            'id_detail_merk' => $data->id_detail_merk,
            'warna_hp' => $request->warna,
            'keterangan' => $request->keterangan
        ]);
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $kodeUnik = "#".substr(str_shuffle($permitted_chars), 0, 6);
        $idServisMasuk = ServisMasuk::all()->COUNT();
        DB::table('tb_servis_masuk')->insert([
            'id_servis_masuk' => $idServisMasuk+1,
            'id_user_elektronik' => $idElektronikUser+1,
            'id_ref_kerusakan' => $data->id_ref_kerusakan,
            'kode_unik' => $kodeUnik,
        ]);    
        return redirect('/pesan-servis/'.(1+$idServisMasuk));
    }
    function pesanServis($id){
        $user_javis = Session::get('user-javis');
        $dataUser = UserBiodata::all()->where('username',$user_javis)->first();
        $dataAlamatUser = UserAlamat::all()->where('id_user_biodata',$dataUser->id_user_biodata)->first();
        $dataElektronik = UserElektronik::all()->where('username',$user_javis)->first();
        $dataServisMasuk = ServisMasuk::all()->where('id_servis_masuk',$id)->first();
        $refKerusakan = RefKerusakan::all()->where('id_ref_kerusakan',$dataServisMasuk->id_ref_kerusakan)->first();

        //dataElektro
        $refType = RefType::all()->where('id_detail_merk',$dataElektronik->id_detail_merk)->first();
        $refMerk = RefMerk::all()->where('id_merk',$refType->id_merk)->first();
        $refElektronik = RefElektronik::all()->where('id_ref_elektronik',$refMerk->id_ref_elektronik)->first();

        return view('user.pesan_servis', compact('refKerusakan','dataUser','dataAlamatUser','dataElektronik','dataServisMasuk','refType','refMerk','refElektronik'));
    }
    function setLokasiPenjemputan(Request $request){
        // return $request;
        DB::table('tb_servis_masuk')->where('id_servis_masuk',$request->id_servis_masuk)->update([
            'penyebab_rusak'=> $request->sebabkerusakan,
            'keterangan' =>$request->keterangan
        ]);
        DB::table('tb_alamat_jemput')->insert([
            'id_servis_masuk' => $request->id_servis_masuk,
            'alamat_jemput' => $request->alamat,
            'lat' => $request->lat,
            'lng' => $request->lng
        ]);    
    }
}

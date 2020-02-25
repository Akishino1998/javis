<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\RefElektronik;
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
        $data =DB::select('SELECT tb_admin.username,tb_admin.nama, id_ref_harga,ref_harga_servis.id_ref_kerusakan, ref_elektronik.id_ref_elektronik, ref_merk.id_merk, ref_harga_servis.id_detail_merk, jenis_elektronik, nama_merk, ref_detail_merk.`type`, ref_kerusakan.jenis_kerusakan, ref_harga_servis.harga_sparepart, ref_distributor.nama_distributor, ref_harga_servis.total_harga, ref_harga_servis.garansi_hari, ref_harga_servis.lama_perbaikan_hari, ref_harga_servis.foto
FROM ref_elektronik, ref_merk, ref_detail_merk, ref_kerusakan, ref_harga_servis, ref_distributor, tb_admin
WHERE ref_elektronik.id_ref_elektronik = ref_merk.id_ref_elektronik 
AND ref_merk.id_merk = ref_detail_merk.id_merk
AND  ref_detail_merk.id_detail_merk = ref_harga_servis.id_detail_merk
AND ref_kerusakan.id_ref_kerusakan = ref_harga_servis.id_ref_kerusakan
AND ref_harga_servis.id_distributor = ref_distributor.id_distributor 
AND ref_harga_servis.username = tb_admin.username ');
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
    function detailServis(){
         return view('detailBarang');
    }
    function kontak(){
        return view('kontak');
    }
    function daftarServis(){
        $refElektronik = RefElektronik::all();
        $data =DB::select('SELECT tb_admin.username,tb_admin.nama, id_ref_harga,ref_harga_servis.id_ref_kerusakan, ref_elektronik.id_ref_elektronik, ref_merk.id_merk, ref_harga_servis.id_detail_merk, jenis_elektronik, nama_merk, ref_detail_merk.`type`, ref_kerusakan.jenis_kerusakan, ref_harga_servis.harga_sparepart, ref_distributor.nama_distributor, ref_harga_servis.total_harga, ref_harga_servis.garansi_hari, ref_harga_servis.lama_perbaikan_hari, ref_harga_servis.foto
FROM ref_elektronik, ref_merk, ref_detail_merk, ref_kerusakan, ref_harga_servis, ref_distributor, tb_admin
WHERE ref_elektronik.id_ref_elektronik = ref_merk.id_ref_elektronik 
AND ref_merk.id_merk = ref_detail_merk.id_merk
AND  ref_detail_merk.id_detail_merk = ref_harga_servis.id_detail_merk
AND ref_kerusakan.id_ref_kerusakan = ref_harga_servis.id_ref_kerusakan
AND ref_harga_servis.id_distributor = ref_distributor.id_distributor 
AND ref_harga_servis.username = tb_admin.username ');
        return view('daftarServis', compact('data','refElektronik'));
    }
    function cariServis(){
        $refElektronik = RefElektronik::all();
        $cari = $_GET['cari'];


        $data = DB::select('SELECT tb_admin.username,tb_admin.nama, id_ref_harga,ref_harga_servis.id_ref_kerusakan, ref_elektronik.id_ref_elektronik, ref_merk.id_merk, ref_harga_servis.id_detail_merk, jenis_elektronik, nama_merk, ref_detail_merk.`type`, ref_kerusakan.jenis_kerusakan, ref_harga_servis.harga_sparepart, ref_distributor.nama_distributor, ref_harga_servis.total_harga, ref_harga_servis.garansi_hari, ref_harga_servis.lama_perbaikan_hari, ref_harga_servis.foto
        FROM ref_elektronik, ref_merk, ref_detail_merk, ref_kerusakan, ref_harga_servis, ref_distributor, tb_admin
        WHERE ref_elektronik.id_ref_elektronik = ref_merk.id_ref_elektronik 
        AND ref_merk.id_merk = ref_detail_merk.id_merk
        AND  ref_detail_merk.id_detail_merk = ref_harga_servis.id_detail_merk
        AND ref_kerusakan.id_ref_kerusakan = ref_harga_servis.id_ref_kerusakan
        AND ref_harga_servis.id_distributor = ref_distributor.id_distributor 
        AND ref_harga_servis.username = tb_admin.username 
        AND  ref_merk.nama_merk LIKE "%'.$cari.'%" 
        GROUP BY ref_harga_servis.id_ref_harga' );
        return view('daftarServis', compact('data','refElektronik'));
    }
    function itemServis($id){
        // $data = DB::get('select * from ref_harga_servis_hp WHERE id_ref_harga='.$id);
        // dd($data);
        
        $datas = DB::select('SELECT tb_admin.username,tb_admin.nama,ref_harga_servis.deskripsi, id_ref_harga,ref_harga_servis.id_ref_kerusakan, ref_elektronik.id_ref_elektronik, ref_merk.id_merk, ref_harga_servis.id_detail_merk, jenis_elektronik, nama_merk, ref_detail_merk.`type`, ref_kerusakan.jenis_kerusakan, ref_harga_servis.harga_sparepart, ref_distributor.nama_distributor, ref_harga_servis.total_harga, ref_harga_servis.garansi_hari, ref_harga_servis.lama_perbaikan_hari, ref_harga_servis.foto
        FROM ref_elektronik, ref_merk, ref_detail_merk, ref_kerusakan, ref_harga_servis, ref_distributor, tb_admin
        WHERE ref_elektronik.id_ref_elektronik = ref_merk.id_ref_elektronik 
        AND ref_merk.id_merk = ref_detail_merk.id_merk
        AND  ref_detail_merk.id_detail_merk = ref_harga_servis.id_detail_merk
        AND ref_kerusakan.id_ref_kerusakan = ref_harga_servis.id_ref_kerusakan
        AND ref_harga_servis.id_distributor = ref_distributor.id_distributor 
        AND ref_harga_servis.username = tb_admin.username 
        AND ref_harga_servis.id_ref_harga = "'.$id.'"');
        // dd($datas);
        return view('singelItem',compact('datas'));
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
    
    


    
}

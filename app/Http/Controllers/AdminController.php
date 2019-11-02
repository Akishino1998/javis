<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ModelView_Servis;
use App\User;
use App\OrderServis;
use App\OrderServisAddress;
use App\Kurir;
use App\Teknisi;
use App\OrderCancel;
use App\OrderFinish;
use DateTime;
class AdminController extends Controller
{
    public function index(){
        $data = ModelView_Servis::all()->where('status','Pending');
        $data_kurir = Kurir::all();
        // dd($data_kurir);
        $pending = OrderServis::all()->where('status','Pending')->COUNT('id_order_servis');
        $accept = OrderServis::all()->where('status','Accept')->COUNT('id_order_servis');
        $jemput = OrderServis::all()->where('status','Penjemputan')->COUNT('id_order_servis');
        // dd($pending);
        return view('admin.index', compact('data', 'data_kurir','pending','accept','jemput'));
    }
    public function show($id_order, $id_user){
        $id_user = $id_user;
        $id_order = $id_order;
        $data = OrderServis::all()->where('id_order_servis',$id_order)->first();
        // return $data->jemput;
        $data_address = OrderServisAddress::all()->where('id_transaksi',$id_order)->first();
        return $data_address->latitude."|".$data_address->longtitude."|".$data_address->no_hp_penerima."|".$id_order;

    }
    public function addkurir(Request $request){
        // dd($request);
        $id_order = $request->id_tx;
        $perkiraan_harga = $request->perkiraan1." ".$request->perkiraan2;
        $now = new DateTime();
        // $id_admin = Session::get('id_admin');
        $id_admin = '1';
        DB::table('tb_order_servis_address')
            ->where('id_transaksi', $id_order)
            ->update([
                'id_kurir' => $request->kurir
        ]);
        DB::table('tb_order_servis')
            ->where('id_order_servis', $id_order)
            ->update([
                'status' => 'Penjemputan',
                'id_admin' => $id_admin,
                'tanggal_penjemputan' => $now,
                'perkiraan_harga' => $perkiraan_harga,
        ]);
        return $request;
    }
    public function addkelengkapan(Request $request){
        $text = $request->kelengkapan;
        $id_order = $request->id_tx2;
        $perkiraan_harga = $request->taksiran1." - ".$request->taksiran2;
        // $id_admin = Session::get('id_admin');
        $id_admin = '1';
        $now = new DateTime();
        DB::table('tb_order_servis')
            ->where('id_order_servis', $id_order)
            ->update([
                'kelengkapan' => $text,
                'id_admin' => $id_admin,
                'status' => 'Accept',
                'tanggal_masuk' => $now,
                'perkiraan_harga' => $perkiraan_harga,
        ]);
        return $request;
    }
    public function addteknisi(Request $request){
        DB::table('tb_order_servis')
            ->where('id_order_servis', $request->id_tx)
            ->update([
                'id_teknisi' => $request->teknisi,
                'status' => 'Servis',
        ]);
        return $request;
    }
    public function addkurirantar(Request $request){
        // $id_admin = Session::get('id_admin');
        $id_admin = '1';
        $id_order = $request->id_tx;
        $now = new DateTime();
        DB::table('tb_order_servis_address')
            ->where('id_transaksi', $id_order)
            ->update([
                'id_kurir_antar' => $request->kurir,
        ]);
        DB::table('tb_order_servis')
            ->where('id_order_servis', $id_order)
            ->update([
                'status' =>  'Pengantaran',
                'harga_servis' => $request->harga_servis,
        ]);
        return $request;
    }
    public function addhargaservis(Request $request){
        // $id_admin = Session::get('id_admin');
        $id_admin = '1';
        $id_order = $request->id_tx;
        $now = new DateTime();
        DB::table('tb_order_servis')
            ->where('id_order_servis', $id_order)
            ->update([
                'status' =>  'Pengantaran',
                'harga_servis' => $request->harga_servis,
        ]);
        
        DB::table('tb_order_finish')->insert([
            'id_order_servis' => $id_order,
            'id_admin' => $id_admin,
            'keterangan' => $request->keterangan,
            'tanggal' => $now,
            'biaya' => $request->harga_servis,
            'garansi' => $request->garansi
            ]);
         return $request;
    }
    public function calcel_servis(Request $request){
        $id_order = $request->id_tx2;
        // $id_admin = Session::get('id_admin');
        $id_admin = '1';
        $now = new DateTime();
        DB::table('tb_order_servis')
            ->where('id_order_servis', $id_order)
            ->update([
                'status' => 'Calcel',
        ]);
        $data = OrderCancel::all()->where('id_order_servis',$id_order)->COUNT('id_order_calcel');
        if($data == 0){
            DB::table('tb_order_cancel')->insert([
            'id_order_servis' => $id_order,
            'id_admin' => $id_admin,
            'keterangan' => $request->keterangan_calcel,
            'tanggal_cancel' => $now,
            ]);
        }
        return $request;
        
    }
    public function reload_notif(){
        $pending = OrderServis::all()->where('status','Pending')->COUNT('id_order_servis');
        $accept = OrderServis::all()->where('status','Accept')->COUNT('id_order_servis');
        $jemput = OrderServis::all()->where('status','Penjemputan')->COUNT('id_order_servis');
        // dd($pending);
        return $pending."|".$accept."|".$jemput;
    }
    public function servis_pending(){
        $data = ModelView_Servis::all()->where('status','Pending');
        $data_kurir = Kurir::all();
        return view('admin.pending', compact('data', 'data_kurir'));
    }
    public function servis_penjemputan(){
        $data = ModelView_Servis::all()->where('status','Penjemputan');
        $data_kurir = Kurir::all();
        return view('admin.penjemputan', compact('data', 'data_kurir'));
    }
    public function servis_masuk(){
        $data = ModelView_Servis::all()->where('status','Accept');
        $data_teknisi = Teknisi::all();
        return view('admin.servis_masuk', compact('data', 'data_teknisi'));
    }
    public function servis_proses(){
        $data = ModelView_Servis::all()->where('status','Servis');
        $data_kurir = Kurir::all();
        return view('admin.servis_proses', compact('data', 'data_kurir'));
    }
}

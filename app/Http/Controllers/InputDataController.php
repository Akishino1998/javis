<?php

namespace App\Http\Controllers;

use App\RefHargaServis;
use App\RefMerk;
use App\RefType;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class InputDataController extends Controller
{
    function inputMerk($merk, $id){
        RefMerk::create(['id_ref_elektronik'=>$id,'nama_merk'=>$merk]);
        return $merk."+".$id;
    }
    function inputTipe($merk, $id){
        
        RefType::create(['id_merk'=>$id,'type'=>$merk]);
        return $merk."+".$id;
    }
    function inputHarga(Request $request){
        // return $request->all();
        $total_harga = '';
        for($i = 0; $i < strlen($request->total_harga);$i++){
            if($request->total_harga[$i] != '.'){
                $total_harga = $total_harga.$request->total_harga[$i];
            }
        }
        $username_admin = Session::get('username-admin');
        $foto = "foto.jpg";
        if ($request->hasFile('foto')) {
            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $image->move("foto-produk",$fileName);
            $foto = $fileName;
        }
        
        $hargaServis = new RefHargaServis;
        $hargaServis->id_detail_merk = $request->id_detail_merk;
        $hargaServis->id_ref_kerusakan = $request->id_ref_kerusakan;
        $hargaServis->user_admin = $username_admin;
        $hargaServis->total_harga = $total_harga;
        $hargaServis->garansi_hari = $request->garansi_hari;
        $hargaServis->lama_perbaikan_hari = $request->lama_perbaikan_hari;
        $hargaServis->foto = $foto;
        $hargaServis->save();
        
        return redirect('/admin/daftar-harga');
    }
    function updateData(Request $request){
        // return $request;
        if ($request->hasFile('foto')) {
            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            $image->move("foto-produk",$fileName);
            
            $hargaServis = RefHargaServis::find($request->id_ref_harga);
            $hargaServis->total_harga = $request->harga_total;
            $hargaServis->garansi_hari = $request->garansi;
            $hargaServis->foto = $fileName;
            $hargaServis->save();
        }else{
            $hargaServis = RefHargaServis::find($request->id_ref_harga);
            $hargaServis->total_harga = $request->harga_total;
            $hargaServis->garansi_hari = $request->garansi;
            $hargaServis->foto = $request->old_foto;
            $hargaServis->save();
        }
        // return $request;
        return redirect('/admin/daftar-harga');
    }

    function deleteData($id){
        $data = RefHargaServis::find($id);
    	$data->delete();
        return redirect('/admin/daftar-harga');
    }
    function inputKerusakan($kerusakan){
        DB::table('ref_kerusakan')->insert([
            'jenis_kerusakan' => $kerusakan
        ]);  
        return $kerusakan;
    }
}

<?php

namespace App\Http\Controllers;

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
        DB::table('ref_merk')->insert([
            'id_ref_elektronik' => $id,
            'nama_merk' =>$merk
        ]);  
        return $merk."+".$id;
    }
    function inputTipe($merk, $id){
        DB::table('ref_detail_merk')->insert([
            'id_merk' => $id,
            'type' =>$merk
        ]);  
        return $merk."+".$id;
    }
    function inputKerusakan(Request $request){
        $harga_sparepart = '';
        for($i = 0; $i < strlen($request->harga_sparepart);$i++){
            if($request->harga_sparepart[$i] != '.'){
                $harga_sparepart = $harga_sparepart.$request->harga_sparepart[$i];
            }
        }
        $total_harga = '';
        for($i = 0; $i < strlen($request->total_harga);$i++){
            if($request->total_harga[$i] != '.'){
                $total_harga = $total_harga.$request->total_harga[$i];
            }
        }
        // return $total_harga;
        $username_admin = Session::get('username-admin');
        $foto = "none.jpg";
        if ($request->hasFile('foto')) {
            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image->getRealPath());
            $img->resize(300, 400, function ($constraint) {
                $constraint->aspectRatio();                 
            });
            $img->stream();
            $foto = $fileName;
            Storage::disk('local')->put('public/foto-produk/'.$fileName, $img, 'public');
        }
        
        DB::table('ref_harga_servis')->insert([
            'id_detail_merk' => $request->id_detail_ref,
            'id_ref_kerusakan' => $request->id_ref_kerusakan,
            'harga_sparepart' => $harga_sparepart,
            'id_distributor' => $request->id_distributor,
            'total_harga' => $total_harga,
            'garansi_hari' => $request->garansi,
            'lama_perbaikan_hari' => $request->lama_perbaikan_hari,
            'foto' => $foto,
            'username'=> $username_admin,
        ]);  
        return redirect('/admin/daftar-harga');
    }
}

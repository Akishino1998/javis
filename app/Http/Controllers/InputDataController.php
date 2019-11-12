<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InputDataController extends Controller
{
    function inputMerk($merk, $id){
        DB::table('ref_merk')->insert([
            'id_ref_elektronik' => $id,
            'nama_merk' =>$merk
        ]);  
        return $merk."+".$id;
    }
}

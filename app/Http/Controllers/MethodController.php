<?php

namespace App\Http\Controllers;

use App\RefMerk;
use Illuminate\Http\Request;
use App\RefType;

class MethodController extends Controller
{
     function getType($id){
        $banyakRef = RefType::all()->where('id_merk',$id)->COUNT();
        $refType = RefType::all()->where('id_merk',$id);
        $text = '<select name="type" id="cardholder" requierd="true" pattern=""><option>----</option>';
        foreach($refType as $item){
            $text = $text.'<option value="'.$item->id_detail_merk.'">'.$item->type.'</option>	';
        }
        $text = $text.'</select>';
        if($banyakRef==0){
            $text = '<input id="cardholder" type="text" name="type" requierd="true" maxlength="50" placeholder="Contoh : Redmi Note 8 Pro">';
        }
        return $text;
    }
    //admin
    function getMerk($id){
        $banyakRef = RefMerk::all()->where('id_ref_elektronik',$id)->count();
        $refMerk = RefMerk::all()->where('id_ref_elektronik',$id);
        $text = '<option value="1">---Pilih Merk---</option>';
        foreach($refMerk as $item){
            if($item->nama_merk == "Tidak Tau"){
                // $text = $text.'<option value="'.$item->id_merk.'">'.$item->nama_merk.'</option>	';
            }else{
                $text = $text.'<option value="'.$item->id_merk.'">'.$item->nama_merk.'</option>	';
            }
        }
        if($banyakRef==0){
            $text = '<input type="text" class="form-control" id="input_merk" placeholder="Contoh : Xiaomi" name="merk">';
        }
        return $text;
    }
    function getTipe($id){
        $banyakRef = RefType::all()->where('id_merk',$id)->COUNT();
        $refType = RefType::all()->where('id_merk',$id);
        $text = '<';
        foreach($refType as $item){
            if($item->nama_merk == "Tidak Tau"){
                // $text = $text.'<option value="'.$item->id_merk.'">'.$item->nama_merk.'</option>	';
            }else{
                $text = $text.'<option value="'.$item->id_detail_merk.'">'.$item->type.'</option>	';
            }
        }

        return $text;
    }
}

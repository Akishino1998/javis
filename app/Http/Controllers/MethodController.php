<?php

namespace App\Http\Controllers;

use App\RefMerk;
use Illuminate\Http\Request;
use App\RefType;
use App\RefKerusakan;
use App\RefHargaServis;

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
        $refType = RefType::all()->where('id_merk',$id);
        $text = '<option value="1">---Pilih Tipe---</option>';
        foreach($refType as $item){
            if($item->nama_merk == "Tidak Tau"){
                // $text = $text.'<option value="'.$item->id_merk.'">'.$item->nama_merk.'</option>	';
            }else{
                $text = $text.'<option value="'.$item->id_detail_merk.'">'.$item->type.'</option>	';
            }
        }

        return $text;
    }
    function remove_element($array,$value) {
        return array_diff($array, (is_array($value) ? $value : array($value)));
      }
    function getKerusakan($id){
        $refHargaServis = RefHargaServis::all()->where('id_detail_merk',$id); 
        $RefKerusakan = RefKerusakan::all();
        $text = '<option value="1">---Pilih Kerusakan---</option>';
        foreach ($RefKerusakan as $items) {
            $text = $text.'<option value="'.$items->id_ref_kerusakan.'">'.$items->jenis_kerusakan.'</option>	';
        }
        
        
        
        return $text;
        // return $id;
        // $text.'<option value="'.$item->id_ref_kerusakan.'">'.$item->jenis_kerusakan.'</option>';
    }
}

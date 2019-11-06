<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RefType;

class MethodController extends Controller
{
    function getType($id){
        $banyakRef = RefType::all()->where('id_merk',$id)->COUNT();
        $refType = RefType::all()->where('id_merk',$id);
        $text = '<select name="type" id="cardholder" requierd="true" pattern="">';
        foreach($refType as $item){
            $text = $text.'<option value="'.$item->id_detail_merk.'">'.$item->type.'</option>	';
        }
        $text = $text.'</select>';
        if($banyakRef==0){
            $text = '<input id="cardholder" type="text" name="type" requierd="true" maxlength="50" placeholder="Contoh : Redmi Note 8 Pro">';
        }
        return $text;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefElektronik extends Model
{
    protected $table = "ref_elektronik";
    protected $primaryKey = "id_ref_elektronik";
    public function RefMerk(){
        return $this->hasMany('App\RefMerk', 'id_ref_elektronik', 'id_ref_elektronik');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefMerk extends Model
{
    protected $table = "ref_merk";
    protected $primaryKey = "id_merk";
    protected $fillable = ['id_ref_elektronik','nama_merk'];
    public function RefElektronik()
    {
        return $this->belongsTo('App\RefElektronik','id_ref_elektronik','id_ref_elektronik');
    }
    public function RefType(){
        return $this->hasMany('App\RefType', 'id_merk', 'id_merk');
    }
}

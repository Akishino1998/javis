<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefType extends Model
{
    protected $table = "ref_detail_merk";
    protected $primaryKey = "id_detail_merk";
    protected $fillable = ['id_merk','type'];
    public function RefMerk()
    {
        return $this->belongsTo('App\RefMerk','id_merk','id_merk');
    }
    public function RefHargaServis(){
        return $this->hasMany('App\RefHargaServis', 'id_detail_merk', 'id_detail_merk');
    }
    public function ServisMasuk(){
        return $this->hasMany('App\ServisMasuk', 'ref_detail_merk', 'id_detail_merk');
    }
    
}

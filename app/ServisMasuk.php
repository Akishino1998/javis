<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServisMasuk extends Model
{
    protected $table = "tb_servis_masuk";
    protected $primaryKey = "id_servis_masuk";
    public function RefType()
    {
        return $this->belongsTo('App\RefType','ref_detail_merk','id_detail_merk');
    }
    public function KelengkapanUnit(){
        return $this->hasMany('App\KelengkapanUnit', 'id_servis_masuk', 'id_servis_masuk');
    }
}

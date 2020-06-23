<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelengkapanUnit extends Model
{
    protected $table = "tb_kelengkapan_unit";
    protected $primaryKey = "id_kelengkapan";
    public function ServisMasuk()
    {
        return $this->belongsTo('App\ServisMasuk','id_servis_masuk','id_servis_masuk');
    }
}

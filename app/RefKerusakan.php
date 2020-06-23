<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefKerusakan extends Model
{
    protected $table = "ref_kerusakan";
    protected $primaryKey = "id_ref_kerusakan";
    public function RefHargaServis(){
        return $this->hasMany('App\RefHargaServis', 'id_ref_kerusakan', 'id_ref_kerusakan');
    }
}

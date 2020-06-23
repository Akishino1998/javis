<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefHargaServis extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = "ref_harga_servis";
    protected $primaryKey = "id_ref_harga";
    protected $fillable = ['id_detail_merk','id_ref_kerusakan','id_teknisi','total_harga','garansi_hari','lama_perbaikan_hari','foto','deskripsi'];
    public function RefKerusakan()
    {
        return $this->belongsTo('App\RefKerusakan','id_ref_kerusakan','id_ref_kerusakan');
    }
    public function RefType()
    {
        return $this->belongsTo('App\RefType','id_detail_merk','id_detail_merk');
    }
}

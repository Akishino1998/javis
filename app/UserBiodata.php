<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBiodata extends Model
{
    protected $table = "tb_user_biodata";
    protected $primaryKey = "id_user_biodata";
    // protected $timestamps = false;
    public function UserAkun(){
        return $this->hasOne('App\UserAkun', 'username', 'username');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAkun extends Model
{
    protected $table = "tb_user_akun";
    // protected $primaryKey = "username";
    public function UserBiodata()
    {
        return $this->belongsTo('App\UserBiodata','username','username');
    }
}

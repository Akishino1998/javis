<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    protected $table = 'tb_user_account';
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    public function UserAccount()
    {
        return $this->hasOne('App\User','id_user');
    }
}

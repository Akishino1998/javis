<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'username';
    public function User(){
	    return $this->belongsTo('App\UserAccount','id_user');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = "tb_admin";
    protected $primaryKey = "username";
    public $incrementing = false;
}

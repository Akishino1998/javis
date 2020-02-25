<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\UserAkun;

class OrderController extends Controller
{
    function index(){
        $data = UserAkun::where('username',Session::get('user-javis'))->first();
        if($data->complete == "N"){
            return redirect('/biodata')->with('bio','n');
        }
    }
}

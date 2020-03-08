<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function gadget(){
        return view('user.mygadget');
    }
    function servis(){
        return view('user.servis');
    }
}

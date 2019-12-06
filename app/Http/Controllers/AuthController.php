<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAkun;
use App\UserBiodata;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    function login(){
        return view('login');
    }
    function loginProses(Request $request){
        $username = $request->username;
        $password = $request->password;
        
        $stat = UserAkun::all()->where('username',$username)->COUNT();
        if($stat != 0){
            $user = UserAkun::all()->where('username',$username)->first();
            if (password_verify($password, $user->password)) {
                $biodata = UserBiodata::all()->where('username',$username)->first();
                Session::put('username-user', $biodata->username);
                Session::put('nama-user', $biodata->nama);
                return redirect('/home');
            } else {
                return redirect('/login')->with('alert','1');
            }
        }else{
            return redirect('/login')->with('alert','1');
            // return 3;
        }
        
    }
    function register(){
        return view('register');
    }
    function registerProses(Request $request){
        $username = $request->username;
        $password = password_hash($request->password, PASSWORD_DEFAULT);

        $stat = UserAkun::all()->where('username',$username)->COUNT();
        if($stat == 0){
            DB::table('tb_user_akun')->insert([
                'username' => $username,
                'password' => $password,
            ]);  
            Session::put('username-user', $username);
            // Session::put('nama-user', $nama);
            return redirect('/home')->with('alert','1');
        }else{
            return redirect('/register')->with('alert','1');
        }
        
        return $request;
        
    }
}
  
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAkun;
use App\UserBiodata;
use App\UserAlamat;
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
        
        $stat = DB::table('tb_user_akun')->where('username', $username)->get();

        // dd($stat->count());
        if($stat->count() >= 0){
            $user = UserAkun::where('username',$username)->first();
            // return $user;
            if (password_verify($password, $user->password)) {
                $biodata = UserBiodata::all()->where('username',$username)->first();
                Session::put('user-javis', $biodata->username);
                $_SESSION["user-javis"] = $biodata->username;

                Session::put('nama-user-javis', $biodata->nama);
                $_SESSION["nama-user-javis"] = $biodata->nama;
                // return $_SESSION["user-javis"];
                return redirect('/home');
            } else {
                // echo "password salah";
                return redirect('/login')->with('alert','1');
            }
        }else{
            // return redirect('/login')->with('alert','1');
            // return 3;
        }
        
    }
    function register(){
        return view('register');
    }
    function registerProses(Request $request){
        $username = $request->username;
        $password = password_hash($request->password, PASSWORD_DEFAULT);

        $stat = DB::table('tb_user_akun')->where('username', $username)->get();

        if($stat->count() == 0){
            DB::table('tb_user_akun')->insert([
                'username' => $username,
                'password' => $password,
            ]);  
            Session::put('user-javis', $username);
            return redirect('/home')->with('alert','2');
        }else{
            return redirect('/register')->with('alert','1');
        }
        
        return $request;
        
    }
    function biodataUser(){
        $user = Session::get('user-javis');
        
        $data = UserBiodata::where('username',$user)->first();
        
        $alamat = UserAlamat::where('id_user_biodata',$data->id_user_biodata)->first();

        return view('user.user_profile',compact('data','alamat'));
    }
    function biodataUserAdd(Request $request){
        // dd($request);
        DB::table('tb_user_biodata')->where('id_user_biodata', $request->id_user_biodata)
            ->update([
                'nama'=>$request->nama,
                'tgl_lahir'=>$request->tgl_lahir,
                'no_hp'=>$request->no_hp,
                'email'=>$request->email,
        ]);
        DB::table('tb_user_biodata_alamat')->where('id_user_biodata', $request->id_user_biodata)
            ->update([
                'alamat'=>$request->alamat,
                'lat'=>$request->lat,
                'lng'=>$request->lng
        ]);
        Session::put('nama-user-javis', $request->nama);
        return redirect('/biodata')->with('notice','2');
    }
    function userSetting(){
        
        return view('user.index');
    } 
    function editFoto(){
        $user = Session::get('user-javis');
        $data = UserBiodata::where('username',$user)->first();
        return view('user.editFoto', compact('data'));
    }
    function editFotoAdd(Request $request){
        // return $request;
        $foto = "none.jpg";
        if ($request->hasFile('foto')) {
            $image      = $request->file('foto');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            $image->move("foto-profile",$fileName);
            
            DB::table('tb_user_biodata')->where('id_user_biodata', $request->id_user_biodata)
                ->update([
                    'foto'=>$fileName,
            ]);
        }
        return redirect('/biodata')->with('notice','1');
    }
    
}
  
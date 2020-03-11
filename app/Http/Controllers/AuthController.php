<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAkun;
use App\UserBiodata;
use App\UserAlamat;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    function login(){
        return view('login');
    }
    function loginProses(Request $request){
        $username = $request->username;
        $password = $request->password;
        
        $user = UserAkun::where('username',$username)->first();
        if($user){
            if (password_verify($password, $user->password)) {
                Session::put('user-javis', $user->username);
                $_SESSION["user-javis"] = $user->username;
                $nama=$user->username;
                $biodata = UserBiodata::where('username',$user->username)->first();
                if($biodata){
                    $nama=$biodata->nama==NULL?$user->username:$biodata->nama;
                }
                Session::put('nama-user-javis', $nama);
                $_SESSION["nama-user-javis"] = $nama;
                // return $_SESSION["user-javis"];
                return redirect('/home');
            } else {
                // echo "password salah";
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

        $stat = UserAkun::where('username', $username)->first();

        if(!$stat){
            UserAkun::insert([
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
        
        $data = UserBiodata::where('username',$user)
        ->join('tb_user_biodata_alamat','tb_user_biodata_alamat.id_user_biodata','=','tb_user_biodata.id_user_biodata')
        ->first();
        return view('user.user_profile',compact('data'));
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

    function editPasswordEdit(Request $request){
        $user = Session::get('user-javis');
        if($request->password!=$request->confirm_password){
            return redirect('/biodata')->with('notif',['warning','Gagal Konfirmasi Password Tidak Sama']);
        }
        $stat = UserAkun::where('username', $user)->first();
        if(Hash::check($request->old_password, $stat->password)){
            UserAkun::where('username',$user)->update([
                'password' => password_hash($request->password, PASSWORD_DEFAULT),
            ]);  
            Session::put('user-javis', $user);
            return redirect('/biodata')->with('notif',['success','Berhasil Mengganti Password']);
        }else{
            return redirect('/biodata')->with('notif',['warning','Gagal Mengganti Password']);
        }
    }
    
}
  
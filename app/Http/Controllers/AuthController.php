<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\User;
use App\UserAccount;
// use Flash;
use File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
// use Imagine;
class AuthController extends Controller
{
    public function index(){
        // Session::flush();
        return view('login');   
    }
    public function cek_data(Request $request){
        $username = $request->username;
        $password = $request->password;
        // dd($password);
        $data = UserAccount::all()->where('username',$username)->first();
        $data2 = UserAccount::all()->where('username',$username)->COUNT('username');
        
        if($data2 >= 1){
            if($password == $data->password){
                $data3 = User::all()->where('id_user',$data->id_user)->first();
                Session::put('id_user', $data->id_user);
                Session::put('nama', $data3->nama_depan);

                // return redirect('home');
                return redirect('home')->with('login','success');
            }else{
                return redirect('login')->with('alert','1')->with('username',$username);
            }
        }else{
            return redirect('login')->with('alert','2');
        }
    }
    public function index2(){
        // Session::flush();
        return view('register');   
    }
    public function daftar(Request $request){
        $cek = UserAccount::all()->where('username',$request->username);
        // dd($cek);
        if(count($cek)==0){
            $id_user = User::all()->MAX('id_user')+1;
            //2018-12-07 02:08:20
            DB::table('tb_user')->insert([
                'id_user' => $id_user,
                'nama_depan' => $request->username,
                'created_at' => date("Y-m-d h:i:s"),
            ]);

            DB::table('tb_user_account')->insert([
                'username' => $request->username,
                'password' => $request->password,
                'id_user' => $id_user,
            ]);     
            return redirect('login')->with('login','1');
        }else{
            return redirect('register')->with('register','failed');
        }
    }
    public function bio(){
        if(Session::has('id_user')){
        
            $id_user = Session::get('id_user');
            $data = User::all()->where('id_user',$id_user)->first();
            // dd($data->id_user);
            return view('biodata',compact('data'));
        }else{
            // dd();
            return redirect('login')->with('login','failed');
        }
        
    }
    public function update_bio(Request $request){
        $id_user = Session::get('id_user');
        $nama_depan = null;
        $nama_belakang = null;
        $tanggal_lahir = null;
        $jenis_kelamin = null;
        $no_hp = null;
        $email = null;
        if($request->nama_depan){
            $nama_depan = $request->nama_depan;
        }
        if($request->nama_belakang){
            $nama_belakang = $request->nama_belakang;
        }
        // return $request->tanggal_lahir;
        if($request->tanggal_lahir){
            $tanggal_lahir = $request->tanggal_lahir;
        }
        // return $tanggal_lahir;
        if($request->jenis_kelamin== 'L' || $request->jenis_kelamin=='P'){
            $jenis_kelamin = $request->jenis_kelamin;
        }
        if($request->no_hp){
            $no_hp = $request->no_hp;
        }
        if($request->email){
            $email = $request->email;
        }
        DB::table('tb_user')
            ->where('id_user', $id_user)
            ->update([
                'nama_depan' => $nama_depan, 
                'nama_belakang' => $nama_belakang,
                'jenis_kelamin' => $jenis_kelamin,
                'tanggal_lahir' => $tanggal_lahir,
                'no_hp' => $no_hp,
                'email' => $email
            ]);
        return $request;
    }
    public function update_alamat(Request $request){
        $id_user = Session::get('id_user');
        $alamat = null;
        $no_rumah = null;
        $rt = null;
        $rw = null;
        $provinsi = null;
        $kabupaten = null;
        $kecamatan = null;
        $kelurahan = null;
        $kode_pos = null;
        $longtitude = null;
        $latitude = null;
        if($request->alamat){
            $alamat = $request->alamat;
        }
        if($request->no_rumah){
            $no_rumah = $request->no_rumah;
        }
        if($request->rt){
            $rt = $request->rt;
        }
        if($request->rw){
            $rw = $request->rw;
        }
        if($request->provinsi){
            $provinsi = $request->provinsi;
        }
        if($request->kabupaten){
            $kabupaten = $request->kabupaten;
        }
        if($request->kecamatan){
            $kecamatan = $request->kecamatan;
        }
        if($request->kelurahan){
            $kelurahan = $request->kelurahan;
        }
        if($request->kode_pos){
            $kode_pos = $request->kode_pos;
        }
        if($request->longtitude){
            $longtitude = $request->longtitude;
        }
        if($request->latitude){
            $latitude = $request->latitude;
        }
        
        DB::table('tb_user')
            ->where('id_user', $id_user)
            ->update([
                'alamat' => $alamat,
                'no_rumah' => $no_rumah,
                'rt' => $rt,
                'rw' => $rw,
                'provinsi' => $provinsi,
                'kabupaten' => $kabupaten,
                'kecamatan' => $kecamatan,
                'kelurahan' => $kelurahan,
                'kode_pos' => $kode_pos,
                'longtitude' => $longtitude,
                'latitude' => $latitude,
            ]);
        return $request;

    }
    public function upload_foto(Request $request){
        // dd($request);
        if ($request->hasFile('foto')) {
            $image      = $request->file('foto');
            // dd($image);
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->resize(300, 400, function ($constraint) {
                $constraint->aspectRatio();                 
            });
            // dd($img);
            $img->stream(); // <-- Key point

            //dd();
            Storage::disk('local')->put('public/'.$fileName, $img, 'public');
            // $contents = Storage::get('file.jpg');
            // $size = Storage::size($img);
            // return Storage::download('foto/'.$fileName);

            $id_user = Session::get('id_user');
             DB::table('tb_user')
            ->where('id_user', $id_user)
            ->update([
                'foto' => $fileName,
            ]);
            // return Storage::url($fileName);
            return redirect('/biodata');
        }else{
            return 1;
        }
        // return $request->hasFile('photo');
    }

}

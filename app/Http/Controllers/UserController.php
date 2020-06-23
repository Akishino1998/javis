<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\UserAkun;
use App\ServisMasuk;
use App\Chat;
class UserController extends Controller
{
    function gadget(){
        return view('user.mygadget');
    }
    function servis(){
        $user = Session::get('user-javis');
        $data=ServisMasuk::where('tb_user_elektronik.username',$user)
        ->join('tb_user_elektronik','tb_user_elektronik.id_user_elektronik','=','tb_servis_masuk.id_user_elektronik')
        ->join('ref_detail_merk','ref_detail_merk.id_detail_merk','=','tb_user_elektronik.id_detail_merk')
        ->join('ref_merk','ref_merk.id_merk','=','ref_detail_merk.id_merk')
        ->get();
        return view('user.servis',compact('data'));
    }

    function chatUser(){
        $user = Session::get('user-javis');
        $data=ServisMasuk::where('tb_user_elektronik.username',$user)
        ->join('tb_user_elektronik','tb_user_elektronik.id_user_elektronik','=','tb_servis_masuk.id_user_elektronik')
        ->join('ref_detail_merk','ref_detail_merk.id_detail_merk','=','tb_user_elektronik.id_detail_merk')
        ->join('ref_merk','ref_merk.id_merk','=','ref_detail_merk.id_merk')
        ->get();
        return view('user.chat',compact('data'));
    }

    function inputChat(Request $request){
        $teknisi=$request->teknisi;
        $percakapan=$request->percakapan;
        $user = Session::get('user-javis');
        $chat=Chat::where('username_teknisi',$teknisi)->where('username_user',$user)->first();
        if($chat){
            $b=json_decode($chat->percakapan);
            $a=['from'=>'1','pesan'=>$percakapan,'date'=>date('Y-m-d H:i:s')];
            array_push($b,$a);
            $data=[
                'percakapan'=>json_encode($b),
                'updated_at'=>date('Y-m-d H:i:s'),
                'status'=>'0'
            ];
            Chat::where('username_teknisi',$teknisi)
            ->where('username_user',$user)
            ->update($data);
        }else{
            $c=json_encode([0=>['from'=>'1','pesan'=>$percakapan,'date'=>date('Y-m-d H:i:s')]]);
            Chat::insert([
                'percakapan'=>$c,
                'updated_at'=>date('Y-m-d H:i:s'),
                'created_at'=>date('Y-m-d H:i:s'),
                'status'=>'0',
                'username_teknisi'=>$teknisi,
                'username_user'=>$user
            ]);
        }
        return $this->chathtml($teknisi);
    }

    function chathtml($id){
        $user = Session::get('user-javis');
        $data=Chat::where('username_teknisi',$id)->where('username_user',$user)->first();
        if($data){
            $data->percakapan=json_decode($data->percakapan);
        }
        return view('user.html_chat',compact('data'))->render();
    }
}

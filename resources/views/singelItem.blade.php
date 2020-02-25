@extends('layouts.master')
@section('title','HOME | JAVIS')
@section('content')
{{-- <br><br><br> --}}
<style>
    form{
        margin-top: 14px;
    }
</style>
@foreach ($datas as $data)
<section class="welcome_area p_120">
    <div class="container">
        <div class="row welcome_inner">
            <div class="col-lg-5">
                <div class="welcome_img">
                <img class="img-fluid" src="{{ asset('foto-produk/') }}/{{ $data->foto }}" alt="" width="400">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="welcome_text">
                    <h4>{{ $data->nama_merk }} {{ $data->type }} - {{ $data->jenis_kerusakan }}</h4>
                    <p>{{ $data->deskripsi }}</p>
                    <div class="row">
                        <div class="col-sm-4">  
                            <div class="wel_item">
                                {{-- <i class="fa fa-money fa-4x" aria-hidden="true"></i> --}}
                                <script>
                                    var 	bilangan = {{ $data->total_harga }};
                                    var	reverse = bilangan.toString().split('').reverse().join(''),
                                    ribuan 	= reverse.match(/\d{1,3}/g);
                                    ribuan	= ribuan.join('.').split('').reverse().join('');
                                </script>
                                <h4>Rp. <script>document.write(ribuan);</script></h4>
                                <p>Harga</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="wel_item">
                                {{-- <i class="lnr lnr-book"></i> --}}
                                <h4>{{ $data->garansi_hari }} Hari</h4>
                                <p>Garansi</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="wel_item">
                                {{-- <i class="lnr lnr-users"></i> --}}
                                <h4>{{ $data->lama_perbaikan_hari }} Hari</h4>
                                <p>Lama Perbaikan</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <br><br>
                            <a href="/pesan-servis/{{ $data->id_ref_harga  }}">
                                <button type="button" class="genric-btn primary radius " >
                                    Order Servis Sekarang 
                                </button>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        {{-- <p class="ab_single_text">inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed.</p> --}}
    </div>
</section>
@endforeach
		
		    

@section('jquery')
    <script>
        function sendWA(){
            swal("Write something here:", {
                content: "input",
            })
        }
    </script>
@endsection
    


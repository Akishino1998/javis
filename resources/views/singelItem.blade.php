@extends('layouts.master')
@section('title','HOME | JAVIS')
@section('content')
{{-- <br><br><br> --}}
<style>
    form{
        margin-top: 14px;
    }
</style>
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
                    <h4>{{ $data->RefType->RefMerk->nama_merk }} {{ $data->RefType->type }} - {{ $data->RefKerusakan->jenis_kerusakan }}</h4>
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
                                <button type="button" class="genric-btn primary radius " data-toggle="modal" data-target="#myModal" >
                                    Order Servis Sekarang 
                                </button>
                                <form action="/pesan-servis" method="post">
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Lengkapi data ini, ya!</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <table>
                                                    <input type="text" name="id" id="id" class="form-control" value="{{ $data->id_ref_harga }}" hidden>
                                                        <tr>
                                                            <th>Harga Sparepart</th>
                                                            <td>:</td>
                                                            <td><input type="text" name="warna" id="warna" class="form-control" placeholder="Contoh : biru"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Keterangan</th>
                                                            <td>:</td>
                                                            <td><textarea name="keterangan" id="" cols="30" rows="5" placeholder="Warna biru, ada stiker javis di belakangnya"></textarea></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                        
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="genric-btn primary radius " >Order</button>
                                                    {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @csrf
                                </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        {{-- <p class="ab_single_text">inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed. inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed.</p> --}}
    </div>
</section>
		
		    

@section('jquery')
    <script>
        function orderServis(){
            swal("Lengkapi Data Berikut:", {
                content: "input",
            })
        }
    </script>
@endsection
    


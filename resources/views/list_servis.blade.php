@extends('layouts.master')
@section('title','List Servis | Nyervisga?')
@section('content')
	<style>
         #mapBox1 {
				height: 300px;
                width: 100%;
                bottom: 30px;
            }
            .form-foto{
                position: absolute;
            }
            .label-text{
                color: black;
            }
            .btn-next{
                margin-top: 75px;
            }
            .tickets_btn{
                width: 200px;
            }
            
    </style>
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    {{-- <link rel="stylesheet" href="css/jquery.dataTables.min.css"> --}}
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="row">
						<div class="col-4 text-banner">
							<div class="banner_content text-center">
								<h2>List Servis Elektronik {{ Session::get('nama') }}</h2>
								<div class="page_link">
                                    <p>Berikut dibawah ini adalah elektronik yang anda servis kepada kami.</p>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="col-2"></div>
					</div>
				</div>
			</div>
			
        </section>
		<!--================End Home Banner Area =================-->
		<section class="contact_area p_120">
            <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3>List Servis</h3>
                        </div>
                        <div class="col-lg-12">
                            <table id="myTable" class="display">
                                <thead>
                                    <tr>
                                        <th>Kode Unik</th>
                                        <th>Type Servis</th>
                                        <th>Merk</th>
                                        <th>No. Seri</th>
                                        <th>Kelengkapan</th>
                                        <th>Kerusakan</th>
                                        <th>Biaya</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_elektronik as $item)
                                    <tr>
                                        <td><b>{{ $item->kode_unik }}</b></td>
                                        @foreach ($elektronik as $items)
                                            @if ($item->id_elektronik == $items->id_elektronik)
                                                <td>{{ $items->nama_elektronik }}</td>
                                            @endif
                                        @endforeach
                                        
                                        <td>{{ $item->merk }}</td>
                                        <td>{{ $item->seri }}</td>
                                        <td>{{ $item->kelengkapan }}</td>
                                        <td>{{ $item->kerusakan }}</td>
                                        <td>{{ $item->biaya }}</td>
                                        <td>{{ $item->tanggal_masuk }}</td>
                                        <td>{{ $item->tanggal_keluar }}</td>
                                        <td>{{ $item->status }}</td>
                                        
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="col-lg-3">
                            <div class="contact_info">
                                <div class="info_item">
                                    <i class="lnr lnr-home"></i>
                                    <h6>California, United States</h6>
                                    <p>Santa monica bullevard</p>
                                </div>
                                <div class="info_item">
                                    <i class="lnr lnr-phone-handset"></i>
                                    <h6><a href="#">00 (440) 9865 562</a></h6>
                                    <p>Mon to Fri 9am to 6 pm</p>
                                </div>
                                <div class="info_item">
                                    <i class="lnr lnr-envelope"></i>
                                    <h6><a href="#">support@colorlib.com</a></h6>
                                    <p>Send us your query anytime!</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
            </div>
        </section>

        
        
@endsection

@section('jquery')
    
{{-- <script src="js/zebra_datepicker.min.js"></script> --}}
<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
<script>
    

    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>

@endsection
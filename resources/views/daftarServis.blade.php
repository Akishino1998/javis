@extends('layouts.master')
@section('title','HOME | JAVIS')
@section('content')

		<!--================Home Banner Area =================-->
        <br><br>
        <section class="blog_categorie_area">
            <div class="container">
                <div class="main_title">
        			<h2>Mau Servis Apa?</h2>
        			
                </div>
                <form class="form-inline" style="margin:40px;" method="GET" action="/cari-servis">
                    <!-- Search form -->
                    <input class="form-control" type="text" placeholder="Cari Gadgetmu..." aria-label="Search" name="cari">
                </form>
                <div class="row">
                    
                    <?php $t_item = 0; ?>		
					@foreach ($data as $item)
						@if ($t_item < 20)
							<div class="col-lg-3 col-sm-12">
								<a href="/iklan/{{ $item->id_ref_harga }}">
									<div class="service_item">
										<img  src="{{ asset('foto-produk/') }}/{{$item->foto}}" alt="" width="250" height="auto" class="img-iklan">
										<script>
											var 	bilangan = {{ $item->total_harga }};
											var	reverse = bilangan.toString().split('').reverse().join(''),
											ribuan 	= reverse.match(/\d{1,3}/g);
											ribuan	= ribuan.join('.').split('').reverse().join('');
										</script>
										<div class="text-harga2">{{ $item->nama_merk }} {{ $item->type }}</div>
										<div class="textpart2">Rp. <script>document.write(ribuan);</script></div>
										<div class="textmerk2">{{ $item->jenis_kerusakan }}</div>
									</div>
								</a>
							</div>
						@endif
						<?php $t_item++; ?>
					@endforeach
                    
                </div>
            </div>
        </section>
		
		
@endsection      
	


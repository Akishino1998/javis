@extends('layouts.master')
@section('title','HOME | Nyervisga?')
@section('content')
<link rel="stylesheet" href="{{ asset('css/multipicker.css') }}">
<link rel="stylesheet" href="{{ asset('css/servis.css') }}">
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-2">
							
						</div>
						<div class="col-lg-8">
								<div id="wrapper">
										<div id="container">
									  
										  <div id="info">
											@foreach ($refElektronik as $item)
												@if ($item->id_ref_elektronik == $id)
												<center><img id="product" src="{{ asset('img/produk') }}/{{ $item->gambar }}"/>	</center>
												<div id="price">
									  
														<h2>SERVIS {{ $item->jenis_elektronik }}</h2>
											
												</div>
												@endif
												
											@endforeach
									  
											
										  </div>
									  
										  <div id="payment">
									  
											<form class="formServis" id="checkout" method="POST" action="/servis">
									  
												{{-- <input class="card" id="visa" type="button1" name="card1" value="">
												<input class="card" id="mastercard" type="button2" name="card2" value=""> --}}
												
												<label>Merk</label>
												<select name="merk" id="cardnumber" requierd="true" pattern="" >
													<option value="1">---</option>
													@foreach ($refMerk as $items)
														@if ($items->id_ref_elektronik == $id)
															<option value="{{ $items->id_merk }}">{{ $items->nama_merk }}</option>	
														@endif
													@endforeach
												</select>

												<label>Type HP/No. Seri</label>
												<div class="type">
													<select name="type" id="cardholder" requierd="true" pattern="">
														<option value="">Pilih Merk Terlebih Dahulu</option>
													</select>
												</div>
												
												<center>
													<div class="page">
														<div class="page__toggle">
														  <label class="toggle">
															<input class="toggle__input" type="checkbox" name="jemput" value="1">
															<span class="toggle__label">
															  <span class="toggle__text">Jemput</span>
															</span>
														  </label>
														</div>
														<div class="page__toggle">
														  <label class="toggle">
															<input class="toggle__input" type="checkbox" name="antar" value="1">
															<span class="toggle__label">
															  <span class="toggle__text">Antar</span>
															</span>
														  </label>
														</div>
													</div>
												</center>
											  
											  
												<input type="hidden" name="id_ref_elektronik" value="{{ $id }}">
											  <input class="btn" type="submit" name="purchase" value="Purchase">
											  @csrf
											</form>
										  </div>
									  
										</div>
									  </div>
						</div>
					</div>
				</div>
            </div>
        </section>
@endsection      
	
@section('jquery')
	
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	{{-- <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script> --}}
	<script type="text/javascript" src="{{ asset('js/multipicker.js') }}"></script>

<script>

$('#cardnumber').change(function(){
	$id = $('#cardnumber').val();
	$.get('/getType/'+$id, function(data){
		$( ".type" ).empty();
		$('.type').append(data);
		console.log(data);
		
	});
	
});

</script>
<script>
		document.querySelector('.formServis').addEventListener('submit', function(e) {
		  var form = this;
		  e.preventDefault();
		  swal({
			title: "Sudah Yakin?",
			text: "Pastikan data yang kamu input sudah benar, ya!",
			icon: "warning",
			buttons: [
			  'Aku mau cek ulang.',
			  'Iya, aku yakin!'
			],
			// dangerMode: true,
		  }).then(function(isConfirm) {
			if (isConfirm) {
			  swal({
				title: 'Data Tersimpan',
				text: 'Sukses Disimpan kakak >_<',
				icon: 'success'
			  }).then(function() {
				form.submit();
			  });
			} 
		  });
		});
	</script>
	<script>
		// $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
	</script>
@endsection
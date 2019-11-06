@extends('layouts.master')
@section('title','HOME | Nyervisga?')
@section('content')
<link rel="stylesheet" href="{{ asset('css/multipicker.css') }}">
	<style>
	#container {
  width: 720px;
  height: 550px;
  margin-top: 150px;
  margin-bottom: 150px;
  box-shadow: 1px 1px 10px 2px rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  border-radius: 5px;
  overflow: hidden;
  background: #b3bead;
  background: -moz-linear-gradient(45deg, #b3bead 0%, #dfe5d7 60%, #fcfff4 100%);
  background: -webkit-linear-gradient(45deg, #b3bead 0%, #dfe5d7 60%, #fcfff4 100%);
  background: linear-gradient(45deg, #b3bead 0%, #dfe5d7 60%, #fcfff4 100%);
}

#info {
  width: 52%;
  height: 550px;
  float: left;
  background: linear-gradient(145deg, rgba(124,207,255,1) 46%, rgba(48,152,212,1) 74%);
}
#info #product {
  width: 200px;
  margin-top: 100px;
  
}
#info p {
  width: 100%;
  text-align: center;
  line-height: 1.5em;
  letter-spacing: 1px;
}
#info #price {
  width: 50%;
  margin: 0 auto;
  letter-spacing: 1px;
}
#info #price h2 {
  width: 100%;
  text-align: center;
  font-weight: 700;
  color: #000;
  padding-top: 10px;
}

#payment {
  width: 40%;
  float: right;
  padding: 95px 50px 25px 0;
}

#checkout {
  width: 100%;
}
#checkout input {
  margin-bottom: 15px;
}
#checkout select {
  margin-bottom: 15px;
}
#checkout label {
  float: left;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  font-size: 0.6em;
  padding: 0 0 5px 10px;
}
#checkout #cvc-label {
  margin-left: 25px;
}
#checkout .card {
  width: 29%;
  margin: 0 10% 25px 10%;
  border: none;
  background: none;
  height: 50px;
  cursor: pointer;
  -webkit-filter: grayscale(100%);
  filter: grayscale(100%);
}
#checkout .card:focus {
  -webkit-filter: none;
  filter: none;
}
#checkout #visa {
  background-image: url("http://enwaara.se/codepen/visa.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: cover;
}
#checkout #mastercard {
  background-image: url("http://enwaara.se/codepen/mastercard.png");
  background-repeat: no-repeat;
  background-position: center center;
  background-size: 118%;
}
#checkout #cardnumber, #checkout #cardholder, #checkout #cvc {
  width: 100%;
  background: none;
  border: 1px solid #6C7A89;
  padding: 8px 19px;
  -webkit-border-radius: 50px;
  -moz-border-radius: 50px;
  -ms-border-radius: 50px;
  border-radius: 50px;
}
#checkout #cardnumber:focus, #checkout #cardholder:focus, #checkout #cvc:focus {
  border: 1px solid #00b894;
}
#checkout ::-webkit-input-placeholder {
  text-transform: uppercase;
  font-size: 0.9em;
  color: #BDC3C7;
}
#checkout #cardnumber {
}
#checkout #cardnumber::-webkit-input-placeholder {
  font-size: 1em;
}
#checkout #left {
  width: 41%;
  border: 1px solid #6C7A89;
  -webkit-border-radius: 50px;
  -moz-border-radius: 50px;
  -ms-border-radius: 50px;
  border-radius: 50px;
  overflow: hidden;
  padding: 3px 5px;
  float: left;
}
#checkout #left #month, #checkout #left #year {
  background: none;
  border: none;
  padding: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  border-radius: 5px;
  float: left;
  font-size: 0.8em;
  letter-spacing: 3px;
  color: #BDC3C7;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}
#checkout #left #month option, #checkout #left #year option {
  background: #ECECEC;
}
#checkout #left p {
  float: left;
  padding-top: 2px;
  font-size: 1.2em;
  color: #BDC3C7;
}
#checkout #cvc {
  width: 48%;
  float: left;
  margin-left: 11%;
}
#checkout .btn {
  background: #00b894;
  border: none;
  width: 100%;
  padding: 12px 10px 10px 10px;
  -webkit-border-radius: 50px;
  -moz-border-radius: 50px;
  -ms-border-radius: 50px;
  border-radius: 50px;
  text-transform: uppercase;
  font-weight: 400;
  color: #ECECEC;
  cursor: pointer;
}
#checkout .btn:hover {
  background: #16A085;
}

</style>
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
									  
											<form class="formServis" id="checkout" method="POST" action="/servis-masuk">
									  
												{{-- <input class="card" id="visa" type="button1" name="card1" value="">
												<input class="card" id="mastercard" type="button2" name="card2" value=""> --}}
												
												<label>Merk</label>
												<select name="merk" id="cardnumber" requierd="true" pattern="" >
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
													<ul id="days">
														<li style="width:110px;font-size:15px">Jemput</li>
														<li style="width:110px;font-size:15px">Antar</li>
													</ul>
												</center>
											  
											  
									  
											  <input class="btn" type="submit" name="purchase" value="Purchase">
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
$("#days").multiPicker({ selector : "li" });

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
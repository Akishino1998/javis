@extends('layouts.master')
@section('title','Servis | Nyervisga')
@section('content')
	<style>
	.wrapper{
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	width: 20px;
	-ms-flex-wrap: wrap;
	    flex-wrap: wrap;
	-webkit-transform: translateY(-50%);
	        transform: translateY(-50%);
}

.switch_box{
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	max-width: 50px;
	min-width: 50px;
	-webkit-box-pack: center;
	    -ms-flex-pack: center;
	        justify-content: center;
	-webkit-box-align: center;
	    -ms-flex-align: center;
	        align-items: center;
	-webkit-box-flex: 1;
	    -ms-flex: 1;
	        flex: 1;
}

/* Switch 1 Specific Styles Start */

.box_1{
	background: #fff;
}

input[type="checkbox"].switch_1{
	font-size: 10px;
	-webkit-appearance: none;
	   -moz-appearance: none;
	        appearance: none;
	width: 3.5em;
	height: 1.5em;
	background: #ddd;
	border-radius: 3em;
	position: relative;
	cursor: pointer;
	outline: none;
	-webkit-transition: all .2s ease-in-out;
	transition: all .2s ease-in-out;
  }
  
  input[type="checkbox"].switch_1:checked{
	background: #0ebeff;
  }
  
  input[type="checkbox"].switch_1:after{
	position: absolute;
	content: "";
	width: 1.5em;
	height: 1.5em;
	border-radius: 50%;
	background: #fff;
	-webkit-box-shadow: 0 0 .25em rgba(0,0,0,.3);
	        box-shadow: 0 0 .25em rgba(0,0,0,.3);
	-webkit-transform: scale(.7);
	        transform: scale(.7);
	left: 0;
	-webkit-transition: all .2s ease-in-out;
	transition: all .2s ease-in-out;
  }
  
  input[type="checkbox"].switch_1:checked:after{
	left: calc(100% - 1.5em);
  }
	
/* Switch 1 Specific Style End */



	.banner_content{
		top: 40px;
	}
	.tab-content{
		/* display: none; */
	}
	.group 			  { 
  position:relative; 
  margin-bottom:45px; 
}
input 				{
  font-size:18px;
  padding:10px 10px 10px 5px;
  display:block;
  width:100%;
  border:none;
  border-bottom:1px solid #757575;
}
input:focus 		{ outline:none; }

/* LABEL ======================================= */
label 				 {
  color:#999; 
  font-size:18px;
  font-weight:normal;
  position:absolute;
  pointer-events:none;
  left:5px;
  top:10px;
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}

/* active state */
input:focus ~ label, input:valid ~ label 		{
  top:-20px;
  font-size:14px;
  color:#33ccff;
}

/* BOTTOM BARS ================================= */
.bar 	{ position:relative; display:block; width:300px; }
.bar:before, .bar:after 	{
  content:'';
  height:2px; 
  width:0;
  bottom:1px; 
  position:absolute;
  background:#33ccff; 
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}

/* active state */
input:focus ~ .bar:before, input:focus ~ .bar:after {
  width:185%;
}

/* HIGHLIGHTER ================================== */
.highlight {
  position:absolute;
  height:60%; 
  width:100px; 
  top:25%; 
  left:0;
  pointer-events:none;
  opacity:0.5;
}

/* active state */
input:focus ~ .highlight {
  -webkit-animation:inputHighlighter 0.3s ease;
  -moz-animation:inputHighlighter 0.3s ease;
  animation:inputHighlighter 0.3s ease;
}

/* ANIMATIONS ================ */
@-webkit-keyframes inputHighlighter {
	from { background:#33ccff; }
  to 	{ width:0; background:transparent; }
}
@-moz-keyframes inputHighlighter {
	from { background:#33ccff; }
  to 	{ width:0; background:transparent; }
}
@keyframes inputHighlighter {
	from { background:#33ccff; }
  to 	{ width:0; background:transparent; }
}
</style>

        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="row">
						<div class="col-4 text-banner">
							<div class="banner_content text-center">
								<h2>PILIH ELEKTRONIKMU</h2>
								<div class="page_link">
									<p>Pilih elektronik yang akan kamu servis, ya</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
        </section>
		<!--================End Home Banner Area =================-->
		

		

		
        
        <!--================Made Life Area =================-->
        <section class="made_life_area p_120">
        	<div class="container">
        		<div class="made_life_inner">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						
						@foreach ($data as $datas)
							<li class="nav-item">
								<a class="nav-link" id="{{ $datas->nama_elektronik }}-tab" data-toggle="tab" href="#{{ $datas->nama_elektronik }}" role="tab" aria-controls="{{ $datas->nama_elektronik }}" aria-selected="true">{{ $datas->nama_elektronik }}</a>
							</li>
						@endforeach
					</ul>
					<div class="tab-content" id="myTabContent">
					@foreach ($data as $datas)
						
							<div class="tab-pane fade" id="{{ $datas->nama_elektronik }}" role="tabpanel" aria-labelledby="{{ $datas->nama_elektronik }}-tab">
								<div class="row made_life_text">
									<div class="col-lg-6">
										<div class="left_side_text">
											<h3>Servis {{ $datas->nama_elektronik }}</h3>
											<h6></h6>
											{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p> --}}
											<form action="/servis" method="post" class="form-servis{{ $datas->id_elektronik }}">
												<div class="group">      
													<input type="text" required name="merk">
													<span class="highlight"></span>
													<span class="bar"></span>
													<label>Merk</label>
												</div>
												<div class="group">      
													<input type="text" required name="seri">
													<span class="highlight"></span>
													<span class="bar"></span>
													<label>Seri</label>
												</div>
												<div class="group">      
													<input type="text" required name="kerusakan">
													<span class="highlight"></span>
													<span class="bar"></span>
													<label>Kerusakan</label>
												</div>
												<div class="group">      
													<input type="text" required name="penyebab">
													<span class="highlight"></span>
													<span class="bar"></span>
													<label>Penyebab</label>
												</div>
												<div class="group">      
													<input type="text" name="catatan" value="Catatan Tambahan">
													<span class="highlight"></span>
													<span class="bar"></span>
													<label>Catatan</label>
												</div>
												<div class="container">
													<div class="row">
														<div class="col-6">
															<div class="wrapper">
																<div class="switch_box box_1">
																	<label for="switchbox">Jemput</label>
																	<input type="checkbox" class="switch_1" id="switchbox" name="jemput">
																</div>
															</div>
														</div>
														<div class="col-6">
															<div class="wrapper">
																<div class="switch_box box_1">
																	<label for="switchbox">Antar</label>
																	<input type="checkbox" class="switch_1" id="switchbox" name="antar">
																</div>
															</div>
														</div>
													</div>
												</div>
												<input type="hidden" value="{{ $datas->id_elektronik }}" name="id_elektronik">
												<button type="submit" class="main_btn">Mulai Servis</button>
												@csrf
											</form>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="chart_img">
											<img class="img-fluid" src="img/produk/{{ $datas->foto}}" alt="" width="400" height="400">
										</div>
									</div>
								</div>
							</div>
						
					@endforeach
						</div>
					</div>
        		</div>
        	</div>
        </section>
			<!--================End Made Life Area =================-->
			
			
	@endsection

	@section('jquery')
		<script>
	var slideIndex = [1,1];
	var slideId = ["mySlides1"]
	showSlides(1, 0);
	showSlides(1, 1);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  	var i;
  	var x = document.getElementsByClassName(slideId[no]);
  	if (n > x.length) {slideIndex[no] = 1}    
  	if (n < 1) {slideIndex[no] = x.length}
  	for (i = 0; i < x.length; i++) {
    	x[i].style.display = "none";  
	  }
	  
	  x[slideIndex[no]-1].style.display = "block"; 
	  console.log(slideIndex[no]); 
}


</script>
<script>
    document.querySelector('.form-servis1').addEventListener('submit', function(e) {
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
    document.querySelector('.form-servis2').addEventListener('submit', function(e) {
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
    document.querySelector('.form-servis3').addEventListener('submit', function(e) {
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
@endsection
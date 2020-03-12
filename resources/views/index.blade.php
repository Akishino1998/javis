@extends('layouts.master')
@section('title','HOME | JAVIS')
@section('content')

<style>
.testimonial-text{
	color: #000;
	font-size: 15px;
}
	.carousel {
	margin: 50px auto;
	padding: 0 70px;
}
.carousel .item {
	color: #999;
	overflow: hidden;
    min-height: 120px;
	font-size: 13px;
}
.carousel .media img {
	width: 80px;
	height: 80px;
	display: block;
	border-radius: 50%;
}
.carousel .testimonial {
	padding: 0 10px 0 10px ;
	position: relative;
}

.carousel .overview b {
	text-transform: uppercase;
	color: #1c47e3;
}
.carousel .carousel-indicators {
	bottom: -40px;
}
.carousel-indicators li, .carousel-indicators li.active {
	width: 18px;
    height: 18px;
	border-radius: 50%;
	margin: 1px 3px;
}
.carousel-indicators li {	
    background: #e2e2e2;
    border: 4px solid #fff;
}
.carousel-indicators li.active {
	color: #fff;
    background: #1c47e3;    
    border: 5px double;    
}
.card{
	margin: 0px 0px 20px 0px;
	border: 0px;
}
.card-banner{
	margin: 20px;
}
.container_fluid{
	padding-top: 80px;
}
.scroll { 
	padding-top: 20px;
	padding-left: 30px;
	padding-right: 30px;
    width: 100%;
  	height: 30vw;
    overflow-x: hidden; 
    overflow-x: auto; 
    text-align:justify; 
} 
.card-title{
	color: #ffff66;
	margin: 0px;
	font-size: 1.4vw;
	/* margin-top: 83%; */
	/* position: relative; */
}
.card-text{
	color: #FFFFFF;
	margin: 0px;
	padding: 0px;
	font-size: 1.2vw;
	/* margin-top: 95%; */
}
.card-img-overlay{
	font-family: 'Work Sans', sans-serif;
	padding-top: 78%;
	text-align: right;
	z-index: 50;
}
.img {
  width: 100%;
  height:auto;
}
.wishlist{
	position: absolute;
	float: right;
	top: 5px;
	color: crimson;
    left: 85%;
	z-index: 99;
}
.wishlist:hover{
	color: red;
}
</style>
		<!--================Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner">
				<div class="container_fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="autoplay">
								@foreach ($data as $item)
									
										<div class="card  text-white card-banner">
											<img class="card-img img " src="{{ asset('foto-produk/') }}/{{$item->foto}}" alt="Card image" >
											<h5 class="card-title wishlist"><i class="fa fa-star-o fa-2x" aria-hidden="true"></i></h5>
											<a href="/iklan/{{ $item->id_ref_harga}}"><div class="card-img-overlay">
												
												<script>
													var 	bilangan = {{ $item->total_harga }};
													var	reverse = bilangan.toString().split('').reverse().join(''),
													ribuan 	= reverse.match(/\d{1,3}/g);
													ribuan	= ribuan.join('.').split('').reverse().join('');
												</script>
												<h5 class="card-title ">Rp. <script>document.write(ribuan);</script></h5>
												
												<h5 class="card-text">{{ $item->jenis_kerusakan }}</h5>
												<h5 class="card-text">{{ $item->nama_merk }} {{ $item->type }}</h5>
											</div></a>
										</div>
									
								@endforeach
								
							  </div>
						</div>
					</div>
				</div>
            </div>
		</section>

		<!--================Welcome Area =================-->
        <section class="client_says_area p_120">
        	<div class="container">
        		<div class="row client_says_inner">
        			
        			<div class="col-lg-6">
        				<div class="says_item">
        				<img src="javis-logo.png" alt="" width="500" class="img">
        				</div>
        			</div>
					<div class="col-lg-6">
        				<div class="says_left">
        					<h4>Jasa Servis HP dan Laptop Samarinda <br>All Brand Software & Hardware Bergaransi </h4>
        					<p>JAVIS adalah start up yang di dirikan di Samarinda pada tanggal 1 November 2019. Kami menyediakan layanan Servis HP, iPad/ Tablet, Laptop dan Hardisk dengan antar jemput gratis. Perbaikan yang kami kerjakan meliputi kerusakan hardware dan software, baik OS Android, Apple maupun Windows.</p>
        				</div>
        			</div>
        		</div>
        	</div>
		</section>
		<section class="blog_area p_120">
            	<div class="container">
                	<div class="row">
						<div class="col-lg-4 col-md-5 col-sm-12">
							<div class="service_item">
								<link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">
								<h3>JAVIS.ID </h3>
								<h3 >AHLINYA SERVIS GADGET</h3>
								
								{{-- <p style="font-weight: bold; color:black; text-decoration:none"><img src="sosmed/wa.png" alt="" width="40"> : <a style="color:black;" href="https://wa.me/6285246719355">0885246719355</a> </p> --}}
							</div>
							<div class="blog_right_sidebar">
								<aside class="single_sidebar_widget search_widget">
									<aside class="single_sidebar_widget popular_post_widget scroll">
										<?php $t_item = 0; ?>									
										@foreach ($data as $item)
										
											@if ($t_item <= 10)
												
													<div class="media post_item ">
														<a href="/iklan/{{ $item->id_ref_harga}}">
															<img src="{{ asset('foto-produk/') }}/{{$item->foto}}" alt="post" width="100">
															<script>
																var 	bilangan = {{ $item->total_harga }};
																var	reverse = bilangan.toString().split('').reverse().join(''),
																ribuan 	= reverse.match(/\d{1,3}/g);
																ribuan	= ribuan.join('.').split('').reverse().join('');
															</script>
															<div class="media-body">
																<h3 >{{ $item->jenis_kerusakan }} {{ $item->nama_merk }} {{ $item->type }}</a>
																<p>Rp. <script>document.write(ribuan);</script></p>
															</div>
														</a>
													</div>
												
												<?php $t_item++; ?>
											@endif
										@endforeach
										<div class="br"></div>
										<h3 class="widget_title"><a href ="/daftar-servis">Cari Servis Lainnya?</a></h3>
									</aside>
								</aside>
							</div>
                		</div>
						<div class="col-lg-8 col-md-7 col-sm-12">
							<img src="alur_order2.jpg" alt=""  class="img">
						</div>
					</div>
				</div>
		</section>
		<section class="service_area service_white p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Apa Yang Bisa Kami Bantu?</h2>
        			{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> --}}
        		</div>
        		<div class="row service_inner">
					<?php $t_item = 0; ?>		
					@foreach ($data as $item)
						@if ($t_item < 12)
							
							<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
								<a href="/iklan/{{ $item->id_ref_harga}}">
									<div class="card  text-white ">
										<img class="card-img img " src="{{ asset('foto-produk/') }}/{{$item->foto}}" alt="Card image">
										<div class="card-img-overlay">
											<script>	
												var 	bilangan = {{ $item->total_harga }};
												var	reverse = bilangan.toString().split('').reverse().join(''),
												ribuan 	= reverse.match(/\d{1,3}/g);
												ribuan	= ribuan.join('.').split('').reverse().join('');
											</script>
											<h5 class="card-title ">Rp. <script>document.write(ribuan);</script></h5>
											<h5 class="card-text">{{ $item->jenis_kerusakan }}</h5>
											<h5 class="card-text">{{ $item->nama_merk }} {{ $item->type }}</h5>
										</div>
									</div>
								</a>
							</div>
							
						@endif
						<?php $t_item++; ?>
					@endforeach
					
				</div>
				
			</div>
			<center><a href="/daftar-servis" class="genric-btn info">Lihat Lainnya...</a></center>
		<section class="contact_area" style="padding:20px 0px 0px 0px;">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 style="color: #000;font-size: 26px;font-weight: 300;text-align: center;text-transform: uppercase;position: relative;margin: 30px 0 70px;">What <b>our customers</b> are saying</h1>
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<!-- Carousel indicators -->
							<ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#myCarousel" data-slide-to="1"></li>
								<li data-target="#myCarousel" data-slide-to="2"></li>
							</ol>   
							<!-- Wrapper for carousel items -->
							<div class="carousel-inner">
								<div class="item carousel-item active">
									<div class="row">
										<div class="col-sm-6">
											<div class="media">
												<div class="media-left d-flex mr-3">
													<img src="{{ asset('foto-profile/none.jpg') }}" alt="">
												</div>
												<div class="media-body">
													<div class="testimonial">
														<p class="testimonial-text">Bagus pokoknya hasil servisnya, soalnya saya sendiri yang servis</p>
														<p class="overview"><b>Rizky Alim Nurhuda</b>, Teknisi Bersertifikat BLK</p>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="media">
												<div class="media-left d-flex mr-3">
													<img src="{{ asset('foto-profile/none.jpg') }}" alt="">
												</div>
												<div class="media-body">
													<div class="testimonial">
														<p class="testimonial-text">Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra.</p>
														<p class="overview"><b>Antonio Moreno</b>, Web Developer</p>
													</div>
												</div>
											</div>
										</div>
									</div>			
								</div>
								<div class="item carousel-item">
									<div class="row">
										<div class="col-sm-6">
											<div class="media">
												<div class="media-left d-flex mr-3">
													<img src="{{ asset('foto-profile/none.jpg') }}" alt="">
												</div>
												<div class="media-body">
													<div class="testimonial">
														<p class="testimonial-text">Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</p>
														<p class="overview"><b>Paula Wilson</b>, Media Analyst</p>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="media">
												<div class="media-left d-flex mr-3">
													<img src="{{ asset('foto-profile/none.jpg') }}" alt="">
												</div>
												<div class="media-body">
													<div class="testimonial">
														<p class="testimonial-text">Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra.</p>
														<p class="overview"><b>Antonio Moreno</b>, Web Developer</p>
													</div>
												</div>
											</div>
										</div>
									</div>			
								</div>
								<div class="item carousel-item">
									<div class="row">
										<div class="col-sm-6">
											<div class="media">
												<div class="media-left d-flex mr-3">
													<img src="{{ asset('foto-profile/none.jpg') }}" alt="">
												</div>
												<div class="media-body">
													<div class="testimonial">
														<p class="testimonial-text">Lorem ipsum dolor sit amet, consec adipiscing elit. Nam eusem scelerisque tempor, varius quam luctus dui. Mauris magna metus nec.</p>
														<p class="overview"><b>Paula Wilson</b>, Media Analyst</p>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="media">
												<div class="media-left d-flex mr-3">
													<img src="{{ asset('foto-profile/none.jpg') }}" alt="">
												</div>
												<div class="media-body">
													<div class="testimonial">
														<p class="testimonial-text">Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget mi suscipit tincidunt. Utmtc tempus dictum. Pellentesque virra.</p>
														<p class="overview"><b>Antonio Moreno</b>, Web Developer</p>
													</div>
												</div>
											</div>
										</div>
									</div>			
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
        </section>
		<section class="contact_area p_120">
            <div class="container">
                <div class="main_title">
        			<h2>Temukan Kami</h2>
        			{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> --}}
				</div>
				
                <div class="row">
                    <div class="col-4">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="fa fa-building-o" aria-hidden="true"></i>
                                <h6>JAVIS SERVIS GADGET SAMARINDA</h6>
                                <p>Jl. Aw. Syahranie 4 Blok K. No.2 (Masuk Gapura Biru Depan Indogrosir Sempaja)</p>
                            </div>
                            <div class="info_item">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <h6><a href="#">Customer Care (WA & HP)</a></h6>
                                <p><a href="https://wa.me/6285246719355">085246719355</a></p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope"></i>
                                <h6><a href="#">Sosial Media</a></h6>
								{{-- <p><img src="sosmed/wa.png" alt="" width="20"> <a href="https://wa.me/6285246719355">085246719355</a></p> --}}
								<p><img src="sosmed/ig.png" alt="" width="30"><a href="https://www.instagram.com/servishp_javis">servishp_javis</a><br>
								<img src="sosmed/fb.png" alt="" width="30"><a href="https://www.facebook.com/javis.samarinda.9">Javis Samarinda</a></>
                            </div>
                        </div>
                    </div>
                    
					<div class="col-8">
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3939.214364065809!2d117.14717216186935!3d-0.4483436171332766!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe2fc6f0f016153b6!2sJAVIS%20%7C%20SERVIS%20GADGET%20SAMARINDA!5e0!3m2!1sid!2sid!4v1578757348770!5m2!1sid!2sid" width="750" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
					</div>
                </div>
            </div>
        </section>
		
		
@endsection      
	
@section('jquery')

<script>

	$( ".wishlist" ).on( "click", function() {
		$(this).empty();
		$(this).addClass('active-wishlist');
		$(this).append('<i class="fa fa-star fa-2x" aria-hidden="true"></i>');
	});
	$( ".active-wishlist" ).on( "click", function() {
		$(this).empty();
		$(this).removeClass('active-wishlist');
		$(this).append('<i class="fa fa-star-o fa-2x" aria-hidden="true"></i>');
	});
	

</script>
<script>
$('.autoplay').slick({
	dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
	responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
</script>
	@if(Session::has('login')){
		@if(Session::get('login')=='success'){
			<script>
				swal({
					title : "Login Berhasil!",
					text : "Selamat Beraktifitas",
					icon : "success",
					button : "Ok!",
				});	
			</script>
		}
		@endif
	}
	@endif
	@if(Session::has('notif')){
		<script>
			swal({
				title : "{{Session::get('notif')[1]}}",
				text : "",
				icon : "{{Session::get('notif')[0]}}",
				button : "Ok!",
			});	
		</script>
	@endif
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>


</script>
@endsection
@section('jquery')
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope-min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.js"></script>
        <!-- contact js -->
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/contact.js"></script>
        <!--gmaps Js-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
        <script src="js/gmaps.min.js"></script>
		<script src="js/theme.js"></script>

@endsection
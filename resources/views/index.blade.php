@extends('layouts.master')
@section('title','HOME | Nyervisga?')
@section('content')
	
{{-- CARD --}}
<div class="fullscreen-menu-container js-menu-container">
    <a class="menu-button js-menu-close">
        <div class="menu-icon is-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </a>
    <div class="fullscreen-menu">
        <div class="fullscreen-menu__image-container"></div>
        <h1 class="fullscreen-menu__title">Mau Servis Apa kak?</h1>
        <nav class="fullscreen-menu__nav">
            <ul>
				@foreach ($refElektronik as $items)
					<li>
						<h3>{{ $items->jenis_elektronik }}</h3>
						<a href="/servis/{{ $items->id_ref_elektronik }}"> <img src="{{ asset('img/produk') }}/{{ $items->gambar }}" width="100"> </a>
					</li>
				@endforeach
                
            </ul>
        </nav>
    </div>
</div>
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-5">
							<div class="banner_content">
								<h2>Servis Gedget?<br />JAVIS AJA! </h2>
								<p>Gak punya banyak waktu untuk servis hp?<br/><b>JAVIS</b> melayani antar-jemput elektronik yang akan di servis, lho!. </p>
								<a class="banner_btn js-menu-button" >Mulai Servis</a>
								{{-- <a class="banner_btn2" href="#">Download</a> --}}
							</div>
						</div>
						<div class="col-lg-7">
							<div class="home_left_img">
								<img src="img/hero_3.png" alt="" width="600" height="400">
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Work Area =================-->
        {{-- <section class="work_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Kenapa Harus Di Sini?</h2>
        			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
        		</div>
        		<div class="work_inner row">
        			<div class="col-lg-4">
        				<div class="work_item">
        					<i class="lnr "></i>
        					<a href="#"><h4>Stunning Visuals</h4></a>
        					<p>Here, I focus on a range of items and features that we use in life without giving them a second thought such as Coca Cola.</p>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="work_item">
        					<i class="lnr lnr-code"></i>
        					<a href="#"><h4>Stunning Visuals</h4></a>
        					<p>Here, I focus on a range of items and features that we use in life without giving them a second thought such as Coca Cola.</p>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="work_item">
        					<i class="lnr lnr-clock"></i>
        					<a href="#"><h4>Stunning Visuals</h4></a>
        					<p>Here, I focus on a range of items and features that we use in life without giving them a second thought such as Coca Cola.</p>
        				</div>
        			</div>
        		</div>
        	</div>
        </section> --}}
        <!--================End Work Area =================-->
        
        <!--================Made Life Area =================-->
        {{-- <section class="made_life_area p_120">
        	<div class="container">
        		<div class="made_life_inner">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
						<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Easy to use</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Unlimited Colors</a>
						</li>
						<li class="nav-item">
						<a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Unique Features</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" id="edge-tab" data-toggle="tab" href="#edge" role="tab" aria-controls="edge" aria-selected="false">Unique Features</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
							<div class="row made_life_text">
								<div class="col-lg-6">
									<div class="left_side_text">
										<h3>We’ve made a life <br />that will change you</h3>
										<h6>We are here to listen from you deliver exellence</h6>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
										<a class="main_btn" href="#">Get Started Now</a>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="chart_img">
										<img class="img-fluid" src="img/chart.jpg" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<div class="row made_life_text">
								<div class="col-lg-6">
									<div class="left_side_text">
										<h3>We’ve made a life <br />that will change you</h3>
										<h6>We are here to listen from you deliver exellence</h6>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
										<a class="main_btn" href="#">Get Started Now</a>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="chart_img">
										<img class="img-fluid" src="img/chart.jpg" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
							<div class="row made_life_text">
								<div class="col-lg-6">
									<div class="left_side_text">
										<h3>We’ve made a life <br />that will change you</h3>
										<h6>We are here to listen from you deliver exellence</h6>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
										<a class="main_btn" href="#">Get Started Now</a>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="chart_img">
										<img class="img-fluid" src="img/chart.jpg" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="edge" role="tabpanel" aria-labelledby="edge-tab">
							<div class="row made_life_text">
								<div class="col-lg-6">
									<div class="left_side_text">
										<h3>We’ve made a life <br />that will change you</h3>
										<h6>We are here to listen from you deliver exellence</h6>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
										<a class="main_btn" href="#">Get Started Now</a>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="chart_img">
										<img class="img-fluid" src="img/chart.jpg" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
        		</div>
        	</div>
        </section> --}}
        <!--================End Made Life Area =================-->
        
        <!--================Screen Area =================-->
        {{-- <section class="screen_area text-center p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Unique Screens that work perfectly</h2>
        			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
        		</div>
        		<img class="img-fluid" src="img/banner/home-left-1.png" alt="">
        	</div>
        </section> --}}
        <!--================End Screen Area =================-->
        
        <!--================Made Life Area =================-->
        {{-- <section class="made_life_area p_120">
        	<div class="container">
        		<div class="made_life_inner">
					<div class="row made_life_text">
						<div class="col-lg-6">
							<div class="left_side_text">
								<h3>We’ve made a life <br />that will change you</h3>
								<h6>We are here to listen from you deliver exellence</h6>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
								<a class="main_btn" href="#">Get Started Now</a>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="chart_img">
								<img class="img-fluid" src="img/browser.png" alt="">
							</div>
						</div>
					</div>
        		</div>
        	</div>
        </section> --}}
        <!--================End Made Life Area =================-->
        
        <!--================Price Area =================-->
        {{-- <section class="price_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Choose Your Price Plan</h2>
        			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
        		</div>
        		<div class="price_inner row">
        			<div class="col-lg-4">
        				<div class="price_item">
        					<div class="price_head">
        						<h4>Real Basic</h4>
        					</div>
        					<div class="price_body">
        						<ul class="list">
        							<li><a href="#">2.5 GB Space</a></li>
        							<li><a href="#">Secure Online Transfer</a></li>
        							<li><a href="#">Unlimited Styles</a></li>
        							<li><a href="#">Customer Service</a></li>
        						</ul>
        					</div>
        					<div class="price_footer">
        						<h3><span class="dlr">$</span> 39 <span class="month">Per <br />Month</span></h3>
        						<a class="main_btn" href="#">Get Started</a>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="price_item">
        					<div class="price_head">
        						<h4>Real Standard</h4>
        					</div>
        					<div class="price_body">
        						<ul class="list">
        							<li><a href="#">10 GB Space</a></li>
        							<li><a href="#">Secure Online Transfer</a></li>
        							<li><a href="#">Unlimited Styles</a></li>
        							<li><a href="#">Customer Service</a></li>
        						</ul>
        					</div>
        					<div class="price_footer">
        						<h3><span class="dlr">$</span> 69 <span class="month">Per <br />Month</span></h3>
        						<a class="main_btn" href="#">Get Started</a>
        					</div>
        				</div>
        			</div>
        			<div class="col-lg-4">
        				<div class="price_item">
        					<div class="price_head">
        						<h4>Real Ultimate</h4>
        					</div>
        					<div class="price_body">
        						<ul class="list">
        							<li><a href="#">Unlimited Space</a></li>
        							<li><a href="#">Secure Online Transfer</a></li>
        							<li><a href="#">Unlimited Styles</a></li>
        							<li><a href="#">Customer Service</a></li>
        						</ul>
        					</div>
        					<div class="price_footer">
        						<h3><span class="dlr">$</span> 99 <span class="month">Per <br />Month</span></h3>
        						<a class="main_btn" href="#">Get Started</a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section> --}}
        <!--================End Price Area =================-->
        
        <!--================Testimonials Area =================-->
        {{-- <section class="testimonials_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Feedback from Customers</h2>
        			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
        		</div>
        		<div class="testi_slider owl-carousel">
        			<div class="item">
        				<div class="testi_item">
							<div class="media">
								<div class="d-flex">
									<img src="img/testimonials/testi-1.png" alt="">
								</div>
								<div class="media-body">
									<p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware.</p>
									<h4>Mark Alviro Wiens</h4>
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</div>
								</div>
							</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="testi_item">
							<div class="media">
								<div class="d-flex">
									<img src="img/testimonials/testi-2.png" alt="">
								</div>
								<div class="media-body">
									<p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware.</p>
									<h4>Mark Alviro Wiens</h4>
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</div>
								</div>
							</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="testi_item">
							<div class="media">
								<div class="d-flex">
									<img src="img/testimonials/testi-1.png" alt="">
								</div>
								<div class="media-body">
									<p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware.</p>
									<h4>Mark Alviro Wiens</h4>
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</div>
								</div>
							</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="testi_item">
							<div class="media">
								<div class="d-flex">
									<img src="img/testimonials/testi-2.png" alt="">
								</div>
								<div class="media-body">
									<p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware.</p>
									<h4>Mark Alviro Wiens</h4>
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</div>
								</div>
							</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="testi_item">
							<div class="media">
								<div class="d-flex">
									<img src="img/testimonials/testi-1.png" alt="">
								</div>
								<div class="media-body">
									<p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware.</p>
									<h4>Mark Alviro Wiens</h4>
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</div>
								</div>
							</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="testi_item">
							<div class="media">
								<div class="d-flex">
									<img src="img/testimonials/testi-2.png" alt="">
								</div>
								<div class="media-body">
									<p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware.</p>
									<h4>Mark Alviro Wiens</h4>
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</div>
								</div>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section> --}}
        <!--================End Testimonials Area =================-->
        
        <!--================Made Life Area =================-->
        {{-- <section class="made_life_area made_white p_120">
        	<div class="container">
        		<div class="made_life_inner">
					<div class="row made_life_text">
						<div class="col-lg-6">
							<div class="chart_img">
								<img class="img-fluid" src="img/banner/home-left-1.png" alt="">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="left_side_text">
								<h3>We’ve made a life <br />that will change you</h3>
								<h6>We are here to listen from you deliver exellence</h6>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
								<a class="main_btn" href="#">Get Started Now</a>
							</div>
						</div>
					</div>
        		</div>
        	</div>
        </section> --}}
        <!--================End Made Life Area =================-->
        
        <!--================Impress Area =================-->
        {{-- <section class="impress_area p_120">
        	<div class="container">
        		<div class="impress_inner">
					<h2>Got Impressed to our features?</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
					<a class="banner_btn2" href="#">Request Free Demo</a>
        		</div>
        	</div>
        </section> --}}
        <!--================End Impress Area =================-->
@endsection      
	
@section('jquery')
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
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>


function openMenu() {
		$('.js-menu-container').addClass('is-open'); // Find element with the class 'js-menu-container' and apply an additional class of 'is-open'
	}


	function closeMenu() {
		$('.js-menu-container').removeClass('is-open'); // Find element with the class 'js-menu-container' and remove the class 'is-open'
	}

// Document Ready

	jQuery(document).ready(function($){ // When everything has finished loading

		$('.js-menu-button').click(function(){ // When the element with the class 'js-menu-button' is clicked
			openMenu(); // Run the openMenu function
		});

		$('.js-menu-close').click(function(){ // When the element with the class 'js-menu-close' is clicked
			closeMenu(); // Run the closeMenu function
		});

	});

// Keyboard Accessibility

	jQuery(document).keyup(function(e) { // Listen for keyboard presses

		if (e.keyCode === 27) { // 'Esc' key

			if ($('.js-menu-container').hasClass('is-open')) { // If the menu is open close it
				closeMenu(); // Run the closeMenu function
			}

		}

	});
</script>
@endsection
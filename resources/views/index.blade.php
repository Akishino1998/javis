@extends('layouts.master')
@section('title','HOME | JAVIS')
@section('content')
	

        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="autoplay">
								<div class="home_left_img">
									<img src="img/hero_3.png" alt="" width="300" height="400">
									<p>Harga</p>
								</div>
								<div class="home_left_img">
									<img src="img/hero_3.png" alt="" width="300" height="400">
								</div>
								<div class="home_left_img">
									<img src="img/hero_3.png" alt="" width="300" height="400">
								</div>
								<div class="home_left_img">
									<img src="img/hero_3.png" alt="" width="300" height="400">
								</div>
								<div class="home_left_img">
									<img src="img/hero_3.png" alt="" width="300" height="400">
								</div>
								<div class="home_left_img">
									<img src="img/hero_3.png" alt="" width="300" height="400">
								</div>
							  </div>
						</div>
						<div class="col-lg-7">
							{{-- <div class="home_left_img">
								<img src="img/hero_3.png" alt="" width="600" height="400">
							</div> --}}
						</div>
					</div>
				</div>
            </div>
        </section>

		<section class="service_area" style="margin-top:30px">
        	<div class="container">
        		<div class="row service_inner">
        			<div class="col-lg-4 col-md-6">
        				<div class="service_item">
        					<h3>Mau Servis Gadget-mu?? </h3>
        					<h3>Servis Hp? Servis Laptop?</h3>
							<h3>Ganti LCD? Ganti Baterai?</h3>
							<h1>JAVIS.id</h1>
							<p><a href="">Kontak WA : 085246719355</a> </p>
        				</div>
        			</div>
        		</div>
        	</div>
			</section>
		<section class="blog_area">
            <div class="container">
                <div class="row">
        
				<div class="col-5">
							<div class="blog_right_sidebar">
								<aside class="single_sidebar_widget search_widget">
									
									<div class="br"></div>
								<aside class="single_sidebar_widget popular_post_widget">
									<div class="media post_item">
										<img src="img/blog/popular-post/post1.jpg" alt="post">
										<div class="media-body">
											<a href="blog-details.html"><h3>Ganti LCD Laptop Acer Aspire</h3></a>
											<p>Rp.6******</p>
										</div>
									</div>
									<div class="media post_item">
										<img src="img/blog/popular-post/post2.jpg" alt="post">
										<div class="media-body">
											<a href="blog-details.html"><h3>Ganti Batrei Samsung J7</h3></a>
											<p>//harga</p>
										</div>
									</div>
									<div class="media post_item">
										<img src="img/blog/popular-post/post3.jpg" alt="post">
										<div class="media-body">
											<a href="blog-details.html"><h3>Ganti LCD Hp Xiaomi</h3></a>
											<p>//Harga</p>
										</div>
									</div>
									<div class="media post_item">
										<img src="img/blog/popular-post/post4.jpg" alt="post">
										<div class="media-body">
											<a href="blog-details.html"><h3>Matot Hp Vivo</h3></a>
											<p>//Harga</p>
										</div>
									</div>
									<div class="br"></div>
									<h3 class="widget_title"><a href ="#">Cari yang lain..?</a></h3>
								</aside>
							</div>
						</div>
        </section>
@endsection      
	
@section('jquery')


<script>
$('.autoplay').slick({
	dots: true,
	slidesToShow: 3,
	slidesToScroll: 3,
  	autoplay: true,
	autoplaySpeed: 2000,
	centerMode: true
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
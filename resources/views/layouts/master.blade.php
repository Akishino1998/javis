<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
{{-- @if(empty(Session::get('user-javis'))) 
	<script>window.location = "/login";</script>
@endif --}}
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{ asset('img/j.png') }}" type="image/png">
        <title>@yield('title')</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendors/owl-carousel/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendors/owl-carousel/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/lightbox/simpleLightbox.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/animate-css/animate.css') }}">
		<link rel="stylesheet" href="{{ asset('vendors/flaticon/flaticon.css') }}">
		<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
		<link rel="stylesheet" href="{{ asset('css/slick.css') }}">
		<link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="/home"><img src="{{ asset('javis-logo.png') }}" alt="" width="150"></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav justify-content-center">
								<li class="nav-item active"><a class="nav-link" href="\home">Home</a></li> 
								<li class="nav-item"><a class="nav-link" href="\daftar-servis">Jasa Servis</a>
								<li class="nav-item"><a class="nav-link" href="\testimoni">Testimoni</a>
								<li class="nav-item"><a class="nav-link" href="\kontak">Kontak Kami </a>
							</ul>
							<div class="input-group" style="width:400px;">
								<form  method="GET" action="/cari-servis">
									<input class="form-control form-control-sm" type="text" placeholder="Cari Merk HP" aria-label="Search"  name="cari">
								</form>
                            </div> 
							@if ( session()->has('user-javis') )
							
								<div class="dropdown">
									<div class="nav navbar-nav navbar-right "  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" >
										<li class="nav-item">
											<a href="/biodata" class="tickets_btn btn-account "> Hai, {{ Session::get('nama-user-javis') }}</a>
										</li>
									</div>
									<div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="/biodata" ><i class="fa fa-user" aria-hidden="true"></i> Biodata</a><div class="dropdown-divider"></div>
										<a class="dropdown-item" href="/mygadget"><i class="fa fa-mobile" aria-hidden="true"></i> Gadgetku</a><div class="dropdown-divider"></div>
										<a class="dropdown-item text-danger" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
									  </div>
								</div>
							@else
								<ul class="nav navbar-nav navbar-right" style="padding-right:5px;">
									<li class="nav-item"><a href="/register" class="tickets_btn btn_daftar">DAFTAR</a></li>
								</ul>
								<ul class="nav navbar-nav navbar-right">
									<li class="nav-item"><a href="/login" class="tickets_btn btn_login">LOGIN</a></li>
								</ul>
							@endif
						</div> 
					</div>
            	</nav>
            </div>
        </header>

        @yield('content')


        <footer class="footer_area p_120">
        	<div class="container">
        		<div class="row footer_inner">
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget ab_widget">
        					<div class="f_title">
        						<h3>About Me</h3>
        					</div>
        					<p>Aplikasi pemesanan jasa servis secara online. Melayani antar dan jemput servis juga ^_^</p>
        					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
{{-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> --}}
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        				</aside>
        			</div>
        			<div class="col-lg-5 col-sm-6">
        				<aside class="f_widget news_widget">
        					<div class="f_title">
        						{{-- <h3>Newsletter</h3> --}}
        					</div>
        					{{-- <p>Stay updated with our latest trends</p>
        					<div id="mc_embed_signup">
                                <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                                	<div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>		
                                    </div>				
                                    <div class="mt-10 info"></div>
                                </form>
                            </div> --}}
        				</aside>
        			</div>
        			<div class="col-lg-2">
        				<aside class="f_widget social_widget">
        					<div class="f_title">
        						<h3>Follow Me</h3>
        					</div>
        					<p>Sosial Media Kami</p>
        					<ul class="list">
        						<li><a href="https://www.facebook.com/javis.samarinda.9"><i class="fa fa-facebook-square"></i></a></li>
        						<li><a href="https://www.instagram.com/servishp_javis/"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
							</ul>
        				</aside>
        			</div>
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/stellar.js') }}"></script>
        <script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('vendors/isotope/isotope-min.js') }}"></script>
		<script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
		{{-- <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script> --}}
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('vendors/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('vendors/counter-up/jquery.counterup.min.js') }}"></script>
		<script src="{{ asset('js/mail-script.js') }}"></script>
		<script src="{{ asset('js/sweetalert.min.js') }}"></script>

		{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script> --}}
        <script src="{{ asset('js/gmaps.min.js') }}"></script>
		<script src="{{ asset('js/theme.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
		<script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
		<script src="{{ asset('js/slick.min.js') }}"></script>
    </body>
</html>
<script>

	$('.tickets_btn').mouseenter(function(){
		$('.dropdown').addClass("show");
		$('.dropdown-menu').addClass("show");
	});
	$('.dropdown-menu').mouseleave(function(){
		$('.dropdown').removeClass("show");
		$('.dropdown-menu').removeClass("show");
	});


</script>
@yield('jquery')

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{ asset('img/j.png') }}" type="image/png">
        <title>JASA SERVICE BISMILLAH</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/lightbox/simpleLightbox.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/animate-css/animate.css') }}">
        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    </head>
    <body>
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
           	
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('img/logo-javis.png') }}" alt="" width="150"></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav justify-content-center">
								<li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li> 
								<li class="nav-item"><a class="nav-link" href="about-us.html">Tentang Javis</a></li> 
								</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
		@yield('konten')
<!--================ start footer Area  =================-->	
<footer class="footer-area p_120">
	<div class="container">
		<div class="row">
			<div class="col-lg-3  col-md-6 col-sm-6">
				<div class="single-footer-widget tp_widgets">
				   <h6 class="footer_title">Top Products</h6>
					<ul class="list">
						<li><a href="#">Managed Website</a></li>
						<li><a href="#">Manage Reputation</a></li>
						<li><a href="#">Power Tools</a></li>
						<li><a href="#">Marketing Service</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-5 col-md-6 col-sm-6">
				<div class="single-footer-widget news_widgets">
					<h6 class="footer_title">Newsletter</h6>
					<p>You can trust us. we only send promo offers, not a single spam.</p>		
					<div id="mc_embed_signup">
						<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
							<div class="input-group d-flex flex-row">
								<input name="EMAIL" placeholder="Your email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
								<button class="btn sub-btn">Subscribe</button>		
							</div>									
							<div class="mt-10 info"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 offset-lg-1">
				<div class="single-footer-widget instafeed">
					<h6 class="footer_title">Instagram Feed</h6>
					<ul class="list instafeed d-flex flex-wrap">
						<li><img src="img/instagram/Image-01.jpg" alt=""></li>
						<li><img src="img/instagram/Image-02.jpg" alt=""></li>
						<li><img src="img/instagram/Image-03.jpg" alt=""></li>
						<li><img src="img/instagram/Image-04.jpg" alt=""></li>
						<li><img src="img/instagram/Image-05.jpg" alt=""></li>
						<li><img src="img/instagram/Image-06.jpg" alt=""></li>
						<li><img src="img/instagram/Image-07.jpg" alt=""></li>
						<li><img src="img/instagram/Image-08.jpg" alt=""></li>
					</ul>
				</div>
			</div>	
		</div>
		<div class="row footer-bottom d-flex justify-content-between align-items-center">
			<p class="col-lg-8 col-md-8 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			<div class="col-lg-4 col-md-4 footer-social">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-behance"></i></a>
			</div>
		</div>
	</div>
</footer>
<!--================ End footer Area  =================-->





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
<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="vendors/counter-up/jquery.counterup.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/theme.js"></script>
</body>
</html>
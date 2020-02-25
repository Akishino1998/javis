@extends('layouts.master')
@section('title','HOME | JAVIS')
@section('content')
        

        <br><br><br>
        
        <!--================Contact Area =================-->
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
        <!--================Contact Area =================-->
    
@endsection

        
@section('jquery')
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        {{-- <script src="js/popper.js"></script> --}}
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
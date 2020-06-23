@extends('layouts.master')
@section('title','HOME | JAVIS')
@section('content')
        

        <br><br><br>
        
        <!--================Contact Area =================-->
        <section class="contact_area p_120">
            <div class="container">
                <div class="section-top-border">
                    <center>
                        <img src="http://localhost:8000/javis-logo.png" alt="" width="150">
                    <h2 class="title_color"> IS TRUSTED</h2>
                    </center>
                    <div class="row gallery-item">
                        <?php $i = 1 ?>
                        @while ($i < 12)
                            {{-- <div class="col-md-3"> --}}
                                <img src="testimoni/{{ $i }}.jpg" alt="" width="20%" height="auto" style="margin:10px">
                            {{-- </div> --}}
                            <?php $i++; ?>
                        @endwhile
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
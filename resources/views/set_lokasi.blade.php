@extends('layouts.master')
@section('title','HOME | Nyervisga?')
@section('content')
	<style>
         #mapBox1 {
				height: 300px;
                width: 100%;
                bottom: 30px;
            }
            .form-foto{
                position: absolute;
            }
            .label-text{
                color: black;
            }
            .btn-next{
                margin-top: 75px;
            }
            .tickets_btn{
                width: 200px;
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
								<h2>ATUR LOKASI ANDA</h2>
								<div class="page_link">
                                    <p>Setting Lokasi Anda Dibawah ini. Pastikan lokasi anda benar, ya. Untuk penjemputan atau pengantaran.</p>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="col-2"></div>
                        <div class="col-6 btn-next">
                            <ul class="nav navbar-nav navbar-right">
								<li class="nav-item"><button class="tickets_btn btn-sudah">Sudah Sesuai</button></li>
							</ul>
                        </div>
					</div>
				</div>
			</div>
			
        </section>
		<!--================End Home Banner Area =================-->
		<section class="contact_area p_120">
            <div class="container">
                <div id="mapBox1"></div>
                
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="row contact_form" action="\lokasi-jemput-antar" method="post" id="contactForm" novalidate="novalidate">
                                <input type="hidden" name="latitude" id="latclicked" value="{{ $data_address->latitude }}" ><br>
                                <input type="hidden" name="longtitude" id="longclicked" value="{{ $data_address->longtitude }}"><br>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat" class="label-text">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" rows="1" placeholder="Alamat">{{ $data_address->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="no_rumah" class="label-text">No. Rumah</label>
                                        <input type="text" class="form-control" id="no_rumah" name="no_rumah" placeholder="No. Rumah" value="{{ $data_address->no_rumah }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="rt" class="label-text">RT</label>
                                        <input type="text" class="form-control" id="rt" name="rt" placeholder="RT" value="{{ $data_address->rt }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="rw" class="label-text">RW</label>
                                        <input type="text" class="form-control" id="rw" name="rw" placeholder="RW" value="{{ $data_address->rw }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="provinsi" class="label-text">Provinsi</label>
                                        <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi" value="{{ $data_address->provinsi }}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="kabupaten" class="label-text">Kabupaten</label>
                                        <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="Kabupaten" value="{{ $data_address->kabupaten }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="kecamatan" class="label-text">Kecamatan</label>
                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan" value="{{ $data_address->kecamatan }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="kelurahan">Kelurahan</label>
                                        <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Kelurahan" value="{{ $data_address->kelurahan }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kode_pos">Kode POS</label>
                                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode POS" value="{{ $data_address->kode_pos }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No. HP</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp_penerima" placeholder="Nomor Hp" value="{{ $data_pribadi->no_hp }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" value="submit" class="btn submit_btn">Simpan dan lanjutkan</button>    
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    
                                </div>
                                @csrf
                            </form>
                        </div>
                        {{-- <div class="col-lg-3">
                            <div class="contact_info">
                                <div class="info_item">
                                    <i class="lnr lnr-home"></i>
                                    <h6>California, United States</h6>
                                    <p>Santa monica bullevard</p>
                                </div>
                                <div class="info_item">
                                    <i class="lnr lnr-phone-handset"></i>
                                    <h6><a href="#">00 (440) 9865 562</a></h6>
                                    <p>Mon to Fri 9am to 6 pm</p>
                                </div>
                                <div class="info_item">
                                    <i class="lnr lnr-envelope"></i>
                                    <h6><a href="#">support@colorlib.com</a></h6>
                                    <p>Send us your query anytime!</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
            </div>
        </section>

        
        
@endsection

@section('jquery')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZkuHiUXYr2MnjteerrkucCJ8wUCu5-zo&callback=initMap" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

    
<script>
	var map;
    var markers = [];

    function initMap() {
        var latitude = $('#latclicked').val();
        var longtitude = $('#longclicked').val();
        var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
        map = new google.maps.Map(document.getElementById('mapBox1'), {
            zoom: 15,
            center: myLatLng,
			mapTypeId: 'roadmap'
        });
        console.log(myLatLng);
        addMarkerFirst();
        setMapOnAll(map)

        // This event listener will call addMarker() when the map is clicked.
        map.addListener('click', function(event) {
            addMarker(event.latLng);
            // console.log(event.latLng);
            document.getElementById('latclicked').value = event.latLng.lat();
            document.getElementById('longclicked').value =  event.latLng.lng();

            var input = document.getElementById('searchTextField');
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({"latLng":event.latLng}, function (results) {
              $("#alamat").val(results[0].formatted_address);
              $("#kode_pos").val(results[0].address_components[7].long_name);
              $("#provinsi").val(results[1].address_components[5].long_name);
              $("#kabupaten").val(results[1].address_components[4].long_name);
              $("#kecamatan").val(results[1].address_components[2].long_name);
              $("#kelurahan").val(results[1].address_components[3].long_name);
            });
        });
    }

      // Adds a marker to the map and push to the array.
    function addMarker(location) {
        setMapOnAll(null);
        var marker = new google.maps.Marker({
            position: location,
            map: map  
        });
        markers = [];
        markers.push(marker);
        
    }
    function addMarkerFirst() {
        setMapOnAll(null);
        var latitude = $('#latclicked').val();
        var longtitude = $('#longclicked').val();
        if(latitude != '' ||  longtitude != ''){
            var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
            // console.log(myLatLng);
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map  
            });
            markers = [];
            markers.push(marker);
        }
    }

    // Sets the map on all markers in the array.
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
	}
	
</script>
<script>
    $('.btn-sudah').click(function(){
        swal({
            title: "Sudah Yakin?",
            text: "Saat kamu melakukan servis, sistem akan segera menghubungi Anda untuk konfirmasi servis.",
            icon: "warning",
            buttons: [
                'Aku cek lagi deh!',
                'Yes, lanjutkan!'
            ],
        }).then(function(isConfirm) {
            if (isConfirm) {
                swal({
                    title: 'Selamat!',
                    text: 'Sebentar lagi, akan ada konfirmasi lebih lanjut!',
                    icon: 'success'
                }).then(function() {
                    window.location.href = "/list-servis";
                });
            }
        })
    });
</script>

@endsection
@extends('user.layouts.master')
@section('konten')
<style>
#map {
  height: 300px;
  width: auto;
}
</style>
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <h3 class="page-title">Data Order Servis</h3>
      </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row">

      <div class="col-lg-12">
        <div class="card card-small mb-4">
          <div class="card-header border-bottom">
            <h6 class="m-0">Data Servis Anda ( {{ $dataServisMasuk->kode_unik }} )</h6>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
              <div class="row">
                <div class="col">
                  <form action="/setLokasiPenjemputan" method="POST" >
                    <input type="number" class="form-control" name="id_user_biodata" value="{{ $dataUser->id_user_biodata }}" hidden>
                  <input type="text" name="id_servis_masuk" class="form-control" value="{{ $dataServisMasuk->id_servis_masuk }}" hidden>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <p>Anda Akan Servis {{ $refElektronik->jenis_elektronik }} {{ $refMerk->nama_merk }} {{ $refType->type }}
                            <br>Dengan Kerusakan {{ $refKerusakan->jenis_kerusakan }}</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="sebabkerusakan">Penyebab Kerusakan</label>
                          <input type="text" name="sebabkerusakan" class="form-control" >
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="alamat">Lokasi Penjemputan Servis</label>
                        <textarea class="form-control" rows="5" name="alamat" placeholder="Nama Jalan, Gang, No. Rumah, Patokan dll" required>{{ $dataAlamatUser->alamat }}</textarea>
                      </div>
                    </div>
                    
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <div id="locationField">
                          <input id="address" type="textbox" value="Samarinda">
                          <input id="submit" type="button" value="Cari">
                        </div>
                          <div id="map"></div>
                          <table id="address">
                            <tr>
                            <td class="wideField" colspan="3"><input class="text" id="lat" name="lat" value="{{ $dataAlamatUser->lat }}" hidden/></td>
                            </tr>
                            <tr>
                              <td class="wideField" colspan="3"><input class="text" id="lng" name="lng" value="{{ $dataAlamatUser->lng }}" hidden/></td>
                            </tr>
                          </table>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                          <label for="keterangan">Keterangan Lainnya</label>
                          <input type="text" name="keterangan" class="form-control" >
                        </div>
                    </div>
                    <button type="buttom" class="btn btn-accent">Simpan Data Servis</button>
                    @csrf
                  </form>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
@endsection
@section('jquery')
<script src="https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyCX4Y8PauSmYbB2CO2uNRIkzctLajGtclU"></script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZkuHiUXYr2MnjteerrkucCJ8wUCu5-zo&callback=initMap&&libraries=places">
</script>
<script>
  var lat = $('#lat').val();
  var lng = $('#lng').val();
  var map, infoWindow, lat, lng;
  var markers = [];
  var placeSearch, autocomplete, mapsAuto;
  function initMap() {
    var geocoder = new google.maps.Geocoder();
    autocomplete = new google.maps.places.Autocomplete(document.getElementById('address'), {types: ['geocode']});
    autocomplete.addListener('place_changed', fillInAddress);
    if(lat != 0 ){
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: parseFloat(lat), lng:parseFloat(lng)},
          zoom: 18,
          mapTypeId: 'roadmap'
        });
        var latlng = {lat: parseFloat(lat), lng:parseFloat(lng)};
        // addMarker(latlng, map);
        var marker = new google.maps.Marker({
          position: latlng,
          map: map
        });
        markers.push(marker);
        
    }else{
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -0.4931066500255696, lng: 117.12623200337448},
          zoom: 13,
          mapTypeId: 'roadmap'
        });
        // addMarker(latLng, map);
        
        
    }
    
    document.getElementById('submit').addEventListener('click', function() {
          geocodeAddress(geocoder, map);
    });
    
    google.maps.event.addListener(map, 'click', function(event) {
          addMarker(event.latLng, map);
    });
  }
  function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            setMapOnAll(null);
            markers = [];
            var marker = new google.maps.Marker({
              map: resultsMap,
              draggable:true,
              position: results[0].geometry.location
            });
            markers.push(marker);
            setLocation(location.lat, location.lng);
          } else {
            alert('Tidak Ditemukan!');
          }
        });
  }
    function fillInAddress() {
      var place = autocomplete.getPlace();
      var location = place.geometry.location;
      lat = location.lat();
      lng = location.lng();
      setLocaion(lat, lng);
      addMarker(location, map);
      map.setCenter(location);

    }
    function addMarker(location, map) {
        setMapOnAll(null);
        markers = [];
        var marker = new google.maps.Marker({
          position: location,
          map: map
        });
        markers.push(marker);
        lat = location.lat();
        lng = location.lng();
        setLocaion(lat, lng);
        console.log(location);
    }
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
    }
  function setLocaion(lat, lng){
      $("#lat").val(lat);
      $("#lng").val(lng);
  }

    

  </script>



@if(Session::has('notice')){
	@if(Session::get('notice') == '1'){
		<script>
			swal({
				title : "Lengkapi Biodata Dulu, ya!",
				text : "",
				icon : "warning",
				button : "Ok!",
			});	
		</script>
	}
  @endif
  @if(Session::get('notice') == '1'){
		<script>
			swal({
				title : "Foto Berhasil Diunggah!",
				text : "",
				icon : "success",
				button : "Ok!",
			});	
		</script>
	}
      
  @else{
    <script>
			swal({
				title : "Biodata Sudah Terisi!",
				text : "",
				icon : "success",
				button : "Ok!",
			});	
		</script>
  }
  @endif
}
@endif
@endsection
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
        <h3 class="page-title">Biodata Diri</h3>
      </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row">
      <div class="col-lg-4">
        <div class="card card-small mb-4 pt-3">
          <div class="card-header border-bottom text-center">
            <div class="mb-3 mx-auto">
              <label for="userProfilePicture" class="text-center w-100 mb-4">Foto Profile</label>
                <div class="edit-user-details__avatar m-auto">
                  <img src="{{ asset('foto-profile') }}/{{ $data->foto }}" alt="User Avatar">
                </div>
                <a href="/edit-foto"><button class="btn btn-sm btn-white d-table mx-auto mt-4"><i class="material-icons"></i>Ganti Foto</button></a>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card card-small mb-4">
          <div class="card-header border-bottom">
            <h6 class="m-0">Biodata Anda</h6>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item p-3">
              <div class="row">
                <div class="col">
                  <form action="/biodata" method="POST" >
                    <input type="number" class="form-control" name="id_user_biodata" value="{{ $data->id_user_biodata }}" hidden>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama Kamu..." name="nama" value="{{ $data->nama }}" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir"  name="tgl_lahir" value="{{ $data->tgl_lahir }}" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $data->email }}" required>
                      </div>
                    </div>
                    <div class="form-row no_hp">
                      <div class="form-group col-md-11">
                        <label for="no_hp">No. HP/WA  </label>
                        <input type="number" class="form-control" id="no_hp" placeholder="No. HP/WA" name="no_hp" value="{{ $data->no_hp }}" required>
                      </div>
                      <div class="form-group col-md-1">
                        <label for="no_hp2" style="color:white;">1</label>
                        <div class="form-control btn btn-primary btn-sm addPhone" id="no_hp2">+</div>
                      </div>
                      
                      
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea class="form-control" rows="5" name="alamat" placeholder="Nama Jalan, Gang, No. Rumah, Patokan dll" required>{{ $alamat->alamat }}</textarea>
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
                            <td class="wideField" colspan="3"><input class="text" id="lat" name="lat" value="{{ $alamat->lat }}" hidden/></td>
                            </tr>
                            <tr>
                              <td class="wideField" colspan="3"><input class="text" id="lng" name="lng" value="{{ $alamat->lng }}" hidden/></td>
                            </tr>
                          </table>
                        </div>
                    </div>
                    <button type="buttom" class="btn btn-accent">Update Account</button>
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


@if(Session::has('bio')){
	@if(Session::get('bio') == 'n'){
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
}
@endif

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
<script>
  var click = 1;
  $(".addPhone").on( "click", function() {
    $(".no_hp").append('<div class="form-group col-md-11"><input type="number" class="form-control" id="no_hp" placeholder="No. HP/WA" name="no_hp'+click+'"  required="true"></div><div class="form-group col-md-1"><div class="form-control btn btn-danger btn-sm addPhone" id="no_hp'+click+'">-</div></div>');
    click++;
  });

</script>
@endsection
@extends('admin.layouts.master')
@section('title','Servis Proses | Nyervisga?')
@section('konten')
    <style>
     #mapBox1 {
				height: 300px;
                width: 100%;
                top: 30px;
            }
            </style>

        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6"><h4 class="box-title">Daftar Servis Masuk</h4></div>
                                    
                                        <div class="col-2 btn-reload"></div>
                                    </div>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Kode Unik</th>
                                                    <th>Nama User</th>
                                                    <th>Jenis Elektronik</th>
                                                    <th>Kerusakan</th>
                                                    <th>Antar</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $number = 1; ?>
                                                @foreach ($data as $item)
                                                    <div >
                                                        <tr class="id-{{ $item->id_order }}">
                                                            <td><?php echo $number."."; $number++; ?></td>
                                                            <td>{{ $item->kode_unik }} </td>
                                                            <td> {{ $item->nama_user }} </td>
                                                            <td> {{ $item->nama_elektronik }} </td>
                                                            <td> {{ $item->kerusakan }} </td>
                                                            <td>{{ $item->antar }}</td>
                                                            <td> <span class="badge badge-pending">Proses</span> </td>
                                                            <td>
                                                                @if ($item->antar != 'Ya')
                                                                    <button class="btn btn-primary btn-submit" data-toggle="modal" data-target="#myModal" value="{{ $item->id_order }}/{{ $item->id_user }}">Selesai</button>
                                                                @else
                                                                    <button class="btn btn-primary btn-submit2" data-toggle="modal" data-target="#myModal2" value="{{ $item->id_order }}/{{ $item->id_user }}">Selesai</button>
                                                                @endif
                                                            </td>
                                                            {{-- <input type="hidden" value="{{ $item->id_order }}" name="id_order" id="id_order">  --}}
                                                            {{-- <input type="hidden" value="{{ $item->id_user }}" name="id_user" id="id_user">  --}}
                                                        </tr>
                                                    </div>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <form class="modal-content addharga-form" action="/admin/dasboard/addhargaservis" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Servis <span class="nama_user">ds</span></h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-6">
                                <label for="harga">Harga</label>
                                <div class="input-group" id="harga">
                                    <div class="input-group-addon" ><i class="fa fa-money"></i></div>
                                    <input class="form-control" name="harga_servis">
                                </div>
                                <label for="garansi">Garansi</label>
                                <div class="input-group" id="garansi">
                                    <input class="form-control" name="garansi">
                                </div>
                                <label for="textarea-input">Catatan</label>
                                <textarea name="keterangan" id="textarea-input" rows="9" placeholder="Catatan..." class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 161px;"></textarea>
                                
                            </div>
                            <div class="col-6">
                                <button type="submit" name="submit" class="btn btn-primary" >Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                
                            </div>
                        </div>  
                        <input type="hidden" name="id_tx" id="id_tx" value="" ><br>
                                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                    @csrf
                </form>
            </div>
        </div>
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <form class="modal-content kurir-form" action="/admin/dasboard/addkurirantar" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Servis <span class="nama_user">ds</span></h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-6">
                                <label for="kurir">Pilih Kurir</label>
                                <select class="custom-select" name="kurir" id="kurir" >
                                    {{-- <option selected>Pilih Kurir</option> --}}
                                    @foreach ($data_kurir as $item)
                                    <option value="{{ $item->id_kurir }}">{{ $item->nama_kurir }}</option>
                                    @endforeach
                                </select>
                                
                                <label for="harga">Harga</label>
                                <div class="input-group" id="harga">
                                    <div class="input-group-addon" ><i class="fa fa-money"></i></div>
                                    <input class="form-control" name="harga_servis">
                                </div>
                            </div>
                            <div class="col-6">
                                <button type="submit" name="submit" class="btn btn-primary" >Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                
                            </div>
                        </div>
                        <label for="mapBox1">Lokasi Antar</label>
                        <div id="mapBox1"></div>   
                        <input type="hidden" name="id_tx" id="id_tx2" value="" ><br>
                        <input type="hidden" name="latitude" id="latclicked" value="" ><br>
                        <input type="hidden" name="longtitude" id="longclicked" value=""><br>
                                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                    @csrf
                </form>
            </div>
        </div>
        @endsection
@section('jquery')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZkuHiUXYr2MnjteerrkucCJ8wUCu5-zo&callback=initMap" type="text/javascript"></script>
    <script>
    $('.btn-submit').click(function(){
        var id = $(this).val();
        $.get('dasboard/'+id, function(data){
            var res = data.split("|");
            $('#id_tx2').val(res[3]);
        });
    });
    $('.btn-submit2').click(function(){
        var id = $(this).val();
        $.get('dasboard/'+id, function(data){
            var res = data.split("|");
            $('#latclicked').val(res[0]);
            $('#longclicked').val(res[1]);
            $('#id_tx2').val(res[3]);
            initMap();
        });
    });
    
    </script>
    <script>
	var map;
    var markers = [];

    function initMap() {
        var latitude = $('#latclicked').val();
        var longtitude = $('#longclicked').val();
        // var latitude = "-0.4771566981485046";
        // var longtitude = "117.12204834056001";
        var myLatLng = {lat:parseFloat(latitude), lng: parseFloat(longtitude)};
        map = new google.maps.Map(document.getElementById('mapBox1'), {
            zoom: 15,
            center: myLatLng,
			mapTypeId: 'roadmap'
        });
        // console.log(myLatLng);
        addMarkerFirst();
        setMapOnAll(map)
    }
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
        // var latitude = "-0.4771566981485046";
        // var longtitude = "117.12204834056001";
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
    document.querySelector('.kurir-form').addEventListener('submit', function(e) {
      var form = this;
      e.preventDefault();
      swal({
        title: "Sudah Yakin?",
        text: "Pastikan data yang kamu input sudah benar, ya!",
        icon: "warning",
        buttons: [
          'Aku mau cek ulang.',
          'Iya, aku yakin!'
        ],
        // dangerMode: true,
      }).then(function(isConfirm) {
        if (isConfirm) {
            // form.submit();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/admin/dasboard/addkurirantar',
                method: 'post',
                data: $('.kurir-form').serialize(), // prefer use serialize method
                success:function(data){
                    console.log(data);  
                    // location.href = "/admin/servis-masuk";
                    var id = $('#id_tx').val();
                    // console.log(data->id_tx);
                    // $('.id-'.id).remove();
                }
            });
            swal({
                title: 'Kurir Ditambahkan',
                text: 'Sukses Disimpan kakak >_<',
                icon: 'success'
            }).then(function() {
                $('#myModal2').modal('hide');
          });
        } 
      });
    });
</script>
<script>
    document.querySelector('.addharga-form').addEventListener('submit', function(e) {
      var form = this;
      e.preventDefault();
      swal({
        title: "Sudah Yakin?",
        text: "Pastikan data yang kamu input sudah benar, ya!",
        icon: "warning",
        buttons: [
          'Aku mau cek ulang.',
          'Iya, aku yakin!'
        ],
        // dangerMode: true,
      }).then(function(isConfirm) {
        if (isConfirm) {
            // form.submit();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/admin/dasboard/addhargaservis',
                method: 'post',
                data: $('.addharga-form').serialize(), // prefer use serialize method
                success:function(data){
                    console.log(data);  
                    // location.href = "/admin/servis-masuk";
                    var id = $('#id_tx').val();
                    // console.log(data->id_tx);
                    // $('.id-'.id).remove();
                }
            });
            swal({
                title: 'Kurir Ditambahkan',
                text: 'Sukses Disimpan kakak >_<',
                icon: 'success'
            }).then(function() {
                $('#myModal2').modal('hide');
          });
        } 
      });
    });
</script>
@endsection
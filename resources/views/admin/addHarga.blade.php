@extends('admin.layouts.master')
@section('konten')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 text-sm-left mb-0">
                <h3 class="page-title">Tambah Data Harga</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
                <div class="col-12 mb-4">
                  <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                      <h6 class="m-0">Form Tambah Data Harga</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                      <form action="/admin/inputKerusakan" method="POST" class="inputListKerusakan dropzone dz-clickable" id="my-awesome-dropzone" enctype="multipart/form-data">
                        <li class="list-group-item p-3">
                          <div class="row">
                            <div class="col-sm-8 col-md-6">
                                <strong class="text-muted d-block mb-2">Data Elektronik</strong>
                                  <div class="row">
                                    <div class="form-group col-6">
                                      <label for="inputElektronik">Tipe Elektronik</label>
                                        <select id="inputState" class="form-control inputElektronik" name="id_ref_elektronik">
                                          <option selected="" value="1">Pilih Elektronik</option>
                                          @foreach ($refElektronik as $item)
                                            <option value="{{ $item->id_ref_elektronik }}">{{ $item->jenis_elektronik }}</option>
                                          @endforeach
                                        </select>
                                      </div> 
                                      <div class="form-group col-6" id="inputMerk">
                                        <div class="row">
                                          <div class="col-10">
                                            <label>Merk</label>
                                            <select id="inputState" class="form-control inputMerk" name="id_merk">
                                              <option value="1">---Pilih Tipe Elektronik Dulu---</option>
                                            </select> 
                                           </div>
                                          <div class="col-2">
                                            <button style="margin-top:30px;" onClick="inputMerk()" type="button" class="mb-2 btn btn-sm btn-primary mr-1">Tambah Merk</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  <div class="row">
                                    <div class="form-group col-6 offset-6" id="inputTipe">
                                      <div class="row">
                                        <div class="col-10">
                                          <label>Tipe</label>
                                          <select id="inputState"  class="form-control inputTipe" name="id_detail_ref">
                                            <option value="1">---Pilih Tipe Dulu---</option>
                                          </select>
                                        </div>
                                      <div class="col-2">
                                        <button style="margin-top:30px;" onClick="inputTipe()" type="button" class="mb-2 btn btn-sm btn-primary mr-1">Tambah Tipe</button>
                                      </div> 
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <div class="col-sm-12 col-md-6">
                            <strong class="text-muted d-block mb-2">Data Kerusakan Dan Harga</strong>
                              <div class="row">
                                <div class="form-group col-4">
                                  <label>Kerusakan</label>
                                  <select id="inputState" class="form-control inputKerusakan" name="id_ref_kerusakan">
                                    <option value="1">---Isi Data Elektronik---</option>
                                  </select>
                                </div> 
                                <div class="form-group col-4">
                                  <label>Garansi</label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control garansi" value="7" name="garansi" id="garansi" disabled>
                                    <div class="input-group-append">
                                      <span class="input-group-text">Hari</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group col-4">
                                  <label>Pengerjaan</label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control lama_perbaikan_hari" value="1" name="lama_perbaikan_hari" id="lama_perbaikan_hari" disabled>
                                    <div class="input-group-append">
                                      <span class="input-group-text">Hari</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-4">
                                  <label>Harga Sparepart</label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" class="form-control harga_sparepart" name="harga_sparepart" id="harga_sparepart"> 
                                  </div>
                                </div>
                                <div class="form-group col-4">
                                    <label>Harga User</label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                      </div>
                                      <input type="text" class="form-control total_harga" name="total_harga" id="total_harga"> 
                                    </div>
                                  </div>
                                <div class="form-group col-4">
                                  <label>Distributor</label>
                                  <select id="inputState" class="form-control" name="id_distributor" id="id_distributor">
                                    <option value="1">---Pilih Distributor---</option>
                                    @foreach ($refDistributor as $item)
                                        <option value="{{ $item->id_distributor }}">{{ $item->nama_distributor }}</option>
                                    @endforeach
                                  </select>
                                </div> 
                              </div>
                              <div class="row">
                                  <div class="col-12">
                                    <label>Foto Produk</label>
                                    <input type="file" name="foto"  accept='image/png, image/jpeg, image/jpg' class="form-control">
                                    {{-- <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" id="customFile2" required=""  accept='image/png, image/jpeg, image/jpg'>
                                        <label class="custom-file-label" for="customFile2">Choose file...</label>
                                    </div> --}}
                                    
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-4">
                                      <button style="margin-top:30px;" type="submit" class="mb-2 btn btn-sm btn-primary mr-1">Simpan</button>
                                    </div>
                              </div>
                          </div>
                        </div>
                      </li>
                      @csrf
                    </form>
                   </ul>
                </div>
              </div>
            </div>
            <!-- End Users By Device Stats -->
@endsection
@section('jquery')
<script src="{{ asset('js/jqueryMark.js') }}"></script>
<script>

$(document).ready( function () {
    $( '.harga_sparepart' ).mask('000.000.000', {reverse: true});
    $( '.total_harga' ).mask('000.000.000', {reverse: true});
    $( '.lama_perbaikan_hari' ).mask('00000', {reverse: true});
    $( '.garansi' ).mask('00000', {reverse: true});
});

$(".inputElektronik").change(function(){
	setMerk();
});

$(".inputMerk").change(function(){
	setTipe();
  
});
$(".inputTipe").change(function(){
	setKerusakan();
  $('#lama_perbaikan_hari').removeAttr('disabled');
  $('#garansi').removeAttr('disabled');
});

function setKerusakan(){
  $id = $('.inputTipe').val();
	$.get('/getKerusakan/'+$id, function(data){
		$(".inputKerusakan").empty();
		$('.inputKerusakan').append(data);
		console.log(data);
  });
}

function setMerk(){
  $id = $('.inputElektronik').val();
	$.get('/getMerk/'+$id, function(data){
		$(".inputMerk").empty();
		$('.inputMerk').append(data);
		console.log(data);
  });
}
function setTipe(){
  $id = $('.inputMerk').val();
	$.get('/getTipe/'+$id, function(data){
		$( ".inputTipe" ).empty();
		$('.inputTipe').append(data);
		console.log(data);
  });
}
function inputMerk(){
  swal({
  text: 'Masukkan Nama Kon...',
  content: "input",
  button: {
    text: "Search!",
    closeModal: false,
  },
})
.then(name => {
  if (!name) throw null 
     $id = $('.inputElektronik').val();
    $.get(`/admin/inputMerk/${name}/`+$id, function(data){
      console.log(data);
    });
})
.then(name => {
  setMerk();
  swal({
    title: "SUKSES MENAMBAHKAN DATA",
    text: name,
  });
})
.catch(err => {
  if (err) {
    swal("Tidak Benar!");
  } else {
    swal.stopLoading();
    swal.close();
  }
});
}

function inputTipe(){
  swal({
  text: 'Masukkan Tipe',
  content: "input",
  button: {
    text: "Search!",
    closeModal: false,
  },
})
.then(name => {
  if (!name) throw null 
     $id = $('.inputMerk').val();
    $.get(`/admin/inputTipe/${name}/`+$id, function(data){
      console.log(data);
    });
})
.then(name => {
  setTipe();
  swal({
    title: "SUKSES MENAMBAHKAN DATA",
    text: name,
  });
})
.catch(err => {
  if (err) {
    swal("Tidak Benar!");
  } else {
    swal.stopLoading();
    swal.close();
  }
});
}

</script>
<script>
    document.querySelector('.inputListKerusakan').addEventListener('submit', function(e) {
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
          swal({
            title: 'Data Tersimpan',
            text: 'Sukses Disimpan kakak >_<',
            icon: 'success'
          }).then(function() {
			      form.submit();
            // window.location.href = '/admin/daftar-harga';
          });
        } 
      });
    });
</script>
@endsection
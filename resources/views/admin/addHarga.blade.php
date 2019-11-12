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
                      
                      <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col-sm-8 col-md-6">
                                <strong class="text-muted d-block mb-2">Data Elektronik</strong>
                                <form>
                                    <div class="row">
                                        <div class="form-group col-6">
                                          <label for="inputElektronik">Tipe Elektronik</label>
                                            <select id="inputState" class="form-control inputElektronik">
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
                                                    <select id="inputState" class="form-control inputMerk">
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
                                                  <select id="inputState"  class="form-control inputTipe">
                                                      <option value="1">---Pilih Tipe Dulu---</option>
                                                  </select>
                                              </div>
                                              <div class="col-2">
                                                  <button style="margin-top:30px;" onClick="inputTipe()" type="button" class="mb-2 btn btn-sm btn-primary mr-1">Tambah Tipe</button>
                                              </div> 
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                          <div class="col-sm-12 col-md-6">
                            <strong class="text-muted d-block mb-2">Form Validation</strong>
                            <form>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Catalin" required="">
                                  <div class="valid-feedback">The first name looks good!</div>
                                </div>
                                <div class="form-group col-md-6">
                                  <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Vasile" required="">
                                  <div class="valid-feedback">The last name looks good!</div>
                                </div>
                              </div>
                              <div class="form-group">
                                <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="Username" value="catalin.vasile" required="">
                                <div class="invalid-feedback">This username is taken.</div>
                              </div>
                              <div class="form-group">
                                <select class="form-control is-invalid">
                                  <option selected="">Choose...</option>
                                  <option>...</option>
                                </select>
                                <div class="invalid-feedback">Please select your state.</div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
            </div>
            <!-- End Users By Device Stats -->
@endsection
@section('jquery')
<script>

$(".inputElektronik").change(function(){
	setMerk();
});

$(".inputMerk").change(function(){
	setTipe();
  
});
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

</script>
@endsection
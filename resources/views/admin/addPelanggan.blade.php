@extends('admin.layouts.master')
@section('konten')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 text-sm-left mb-0">
                <h3 class="page-title">Tambah Data Pelanggan</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card card-small mb-4">
                        <div class="card-header border-bottom">
                            <h6 class="m-0">Form Tambah Data Pelanggan</h6>
                        </div>
                        <br>
                        <ul class="list-group list-group-flush">
                            <form action="/addUsername" method="post" id="checkUsernameUser">
                                <div class="form-row mx-4" wfd-id="87">
                                    <div class="col-lg-8" wfd-id="92">
                                        <div class="form-row" wfd-id="93">
                                        <div class="form-group col-md-6" wfd-id="114">
                                            <label for="firstName" wfd-id="115">Username</label>
                                            <input type="text" class="form-control" id="username" name="username">
                                        </div>
                                        <div class="form-group col-md-6" wfd-id="112">
                                            <label for="lastName" wfd-id="113">Password</label>
                                            <input type="text" class="form-control" id="password" name="password" >
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-lg-2">
                                    <label for="lastName" wfd-id="113">Wajib Cek</label>
                                    <button class="btn btn-sm btn-white d-table ">Cek </button> 
                                </div>  
                                @csrf
                            </form>    
                        </ul>
                    </div>
                    <form action="/addUsername" method="post" id="formBiodata">
                        <div class="card card-small mb-4">
                            <br>
                            <ul class="list-group list-group-flush">
                                <div class="form-row mx-4" wfd-id="87">
                                <div class="col-lg-8" wfd-id="92">
                                    <div class="form-row" wfd-id="93">
                                        <input type="text" name="username" class="username">
                                        <input type="text" name="password" class="password" >
                                        <div class="form-group col-md-12" wfd-id="112">
                                            <label for="lastName" wfd-id="113">Nama</label>
                                            <input type="text" class="form-control" id="lastName" name="nama" required>
                                        </div>
                                    
                                        <div class="form-group col-md-6" wfd-id="102">
                                            <label for="phoneNumber" wfd-id="106">Nomor HP</label>
                                            <div class="input-group input-group-seamless" wfd-id="103">
                                            <div class="input-group-prepend" wfd-id="104">
                                                <div class="input-group-text" wfd-id="105">
                                                <i class="material-icons"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="+628XXXXXXXX" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="emailAddress">Email</label>
                                            <div class="input-group input-group-seamless">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <i class="material-icons"></i>
                                                </div>
                                            </div>
                                            <input type="email" class="form-control" id="email" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12" wfd-id="107">
                                            <label for="userLocation" wfd-id="111">Location</label>
                                            <div class="input-group input-group-seamless">
                                            <textarea name="alamat" id="alamat" cols="100%" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>        
                            </ul>
                            <div class="card-footer border-top" wfd-id="6">
                                <button class="btn btn-sm btn-accent ml-auto d-table mr-3">Simpan</button>
                              </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
            <!-- End Users By Device Stats -->
@endsection
@section('jquery')
<script src="{{ asset('js/jqueryMark.js') }}"></script>
<script>
    $( "#formBiodata" ).hide();

    $("#username").change(function(){
        $( "#formBiodata" ).hide();
    });

    function emptyField(ket){
        swal({
            title: ket+" kosong!",
            text: "Di isi dulu, ya!",
            icon: "warning",
            buttons: "danger"
            // dangerMode: true,
        });
    }
    document.querySelector('#checkUsernameUser').addEventListener('submit', function(e) {
        var form = this;
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if($("#username").val() == ""){
            emptyField("Username");
            return false;
        }
        if($("#password").val() == ""){
            emptyField("Password");
            return false;
        }
        $.ajax({
            url: '/checkUsernameUser',
            method: 'post',
            data: $('#checkUsernameUser').serialize(), // prefer use serialize method
            success:function(data){
                if(data == 0){
                    swal({
                        title: "Username Dapat Digunakan!",
                        text: "Usaha yang bagus wkkw!",
                        icon: "success",
                        buttons: "Oke"
                    });
                    $( "#formBiodata" ).show( "slow", function() {
                            // Animation complete.
                    });
                    $(".username").val($("#username").val());
                    $(".password").val($("#password").val());
                }else{
                    swal({
                        title: "Username Sudah Terdaftar!",
                        text: "Username lain, ya!",
                        icon: "warning",
                        buttons: "danger"
                        // dangerMode: true,
                    });
                }
            }
        });
        
    });
</script>

@endsection
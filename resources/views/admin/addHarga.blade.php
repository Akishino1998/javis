@extends('admin.layouts.master')
@section('konten')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-10 text-sm-left mb-0">
                <h3 class="page-title">Daftar Harga Service</h3>
                
              </div>
              <div class="col-2 mb-0">
                <a href="/admin/addHargaServis"><div class="bg-primary rounded text-white text-center p-3" style="cursor:pointer;box-shadow: inset 0 0 5px rgba(0,0,0,.2);">Tambah Data</div></a>
              </div>
              
            </div>
            <!-- End Page Header -->
            <!-- Small Stats Blocks -->
            <div class="row">
              @foreach ($refElektronik as $item)
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  @if ($id_elektronik == $item->id_ref_elektronik)
                    <div class="card-body p-0 d-flex" style="background:blue;">
                  @else
                    <div class="card-body p-0 d-flex" >
                  @endif
                  
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase"><a href="/admin/daftar-harga/{{ $item->id_ref_elektronik }}"> {{ $item->jenis_elektronik }} </a></span>
                        <h6 class="stats-small__value count my-3"><img src="{{ asset('img/produk/') }}/{{ $item->gambar  }}" alt="" height="50"></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <!-- End Small Stats Blocks -->
            <div class="row">
                <div class="col">
                  <div class="card card-small mb-4">
                    
                  </div>
                </div>
              </div>
            <!-- End Users By Device Stats -->
@endsection
@section('jquery')

@endsection
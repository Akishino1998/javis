@extends('admin.layouts.master')
@section('konten')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title">Data Transaksi Servis</h3>
              </div>
            </div>
            <!-- Small Stats Blocks -->
            <div class="row">
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase"><a href="#"> Servis Masuk </a></span>
                        <h6 class="stats-small__value count my-3">{{ $servisMasuk  }}</h6>
                      </div>
                    </div>
                  </div> 
                </div>
              </div>
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase"><a href="#">Servis Progres</a></span>
                        <h6 class="stats-small__value count my-3">-----</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase"><a href="#">Servis Selesai</a></span>
                        <h6 class="stats-small__value count my-3">-------</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase"><a href="#">Garansi</a></span>
                        <h6 class="stats-small__value count my-3">-----</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Small Stats Blocks -->
            <div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Transaksi Hari Ini</h6>
                  </div>
                  <div class="card-body p-0">
                    <table class="table mb-0" id="table_harga">
                      <thead class="bg-light text-center">
                        <tr>
                          <th>No</th>
                          <th>User</th>
                          <th>Kerusakan</th>
                          <th>Tgl Masuk</th>
                          <th>Tgl Keluar</th>
                          <th>Kode Unik</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="text-center">
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          <!-- End Users By Device Stats -->
            
@endsection
@section('jquery')
<script src="{{ asset('js/jqueryMark.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script>
       $(document).ready( function () {
        $('#table_harga').DataTable();
        // $( '.rupiah' ).mask('000.000.000', {reverse: true});
    } );
    </script>
@endsection
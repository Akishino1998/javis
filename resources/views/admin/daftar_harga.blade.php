@extends('admin.layouts.master')
@section('konten')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
 
            <!-- Small Stats Blocks -->
            <div class="row">
              @foreach ($refElektronik as $item)
              <div class="col-lg col-md-6 col-sm-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
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
                    <div class="card-header border-bottom">
                      <h6 class="m-0">Active Users</h6>
                    </div>
                    <div class="card-body p-0 pb-3 ">
                      <table class="table mb-0" id="table_harga">
                        <thead class="bg-light text-center">
                          <tr>
                            <th scope="col" class="border-0">Jenis Elektronik</th>
                            <th scope="col" class="border-0">Merk</th>
                            <th scope="col" class="border-0">Type</th>
                            <th scope="col" class="border-0">Kerusakan</th>
                            <th scope="col" class="border-0">Harga</th>
                            <th scope="col" class="border-0">Garansi (Hari)</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          @foreach ($data as $item)
                              <tr>
                                  <td>{{ $item->jenis_elektronik }}</td>
                                  <td>{{ $item->nama_merk }}</td>
                                  <td>{{ $item->type }}</td>
                                  <td>{{ $item->jenis_kerusakan }}</td>
                                  <td>{{ $item->total_harga }}</td>
                                  <td>{{ $item->garansi_hari }}</td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            <!-- End Users By Device Stats -->
@endsection
@section('jquery')

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/sc-2.0.1/datatables.min.js"></script>

    <script>
    $(document).ready( function () {
        $('#table_harga').DataTable();
    } );
    </script>
@endsection
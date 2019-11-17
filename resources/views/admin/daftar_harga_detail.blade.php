@extends('admin.layouts.master')
@section('konten')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('percobaan/css.css') }}">
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
                    <div class="card-header border-bottom">
                      <h6 class="m-0">Active Users</h6>
                    </div>
                    <div class="card-body p-0 pb-3 ">
                        <table class="table mb-0" id="table_harga">
                            <thead class="bg-light text-center">
                              <tr>
                                <th scope="col" class="border-0">Jenis</th>
                                <th scope="col" class="border-0">Merk</th>
                                <th scope="col" class="border-0">Type</th>
                                <th scope="col" class="border-0">Kerusakan</th>
                                @if (Session::get('level') == 1 or Session::get('level')==2)
                                  <th scope="col" class="border-0">Harga Part</th>
                                  <th scope="col" class="border-0">Distributor</th>
                                @endif 
                                <th scope="col" class="border-0">Harga</th>
                                <th scope="col" class="border-0">Garansi (Hari)</th>
                                
                                <th scope="col" class="border-0">Action</th>
                              </tr>
                            </thead>
                            <tbody class="text-center">
                              @foreach ($data as $item)
                                  <tr>
                                      <td>{{ $item->jenis_elektronik }}</td>
                                      <td>{{ $item->nama_merk }}</td>
                                      <td>{{ $item->type }}</td>
                                      <td>{{ $item->jenis_kerusakan }}</td>
                                      @if (Session::get('level') == "1" or Session::get('level')=="2")
                                        <td data-mask="Rp. 000.000.000">{{ $item->harga_sparepart }}</td>
                                        <td>{{ $item->nama_distributor }}</td>
                                      @endif
                                      <td data-mask="Rp. 000.000.000">{{ $item->total_harga }}</td>
                                      <td>{{ $item->garansi_hari }}</td>
                                      <td class="file-manager__item-actions">
                                        <div class="btn-group btn-group-sm d-flex justify-content-end" role="group" aria-label="Table row actions">
                                          <button type="button" class="btn btn-white active-light" data-toggle="modal" data-target="#myModal{{ $item->id_ref_harga }}">
                                              <i class="fa fa-eye"></i>
                                          </button>
                                          <div class="modal" id="myModal{{ $item->id_ref_harga }}">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                            
                                                  <!-- Modal Header -->
                                                  <div class="modal-header">
                                                    <h4 class="modal-title">{{ $item->nama_merk }} {{ $item->type }} - {{ $item->jenis_kerusakan }}</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  </div>
                                            
                                                  <!-- Modal body -->
                                                  <div class="modal-body">
                                                    <img src="{{ asset('storage/foto-produk') }}/{{ $item->foto }}" alt="" height="300">
                                                  </div>
                                            
                                                  <!-- Modal footer -->
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                  </div>
                                            
                                                </div>
                                              </div>
                                            </div>
                                          <button type="button" class="btn btn-white active-light">
                                            <i class="material-icons"></i>
                                          </button>
                                          <button type="button" class="btn btn-danger">
                                            <i class="material-icons"></i>
                                          </button>
                                        </div>
                                      </td>
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
<script src="{{ asset('js/jqueryMark.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>

    <script>
    $(document).ready( function () {
        $('#table_harga').DataTable();
    } );
    </script>
@endsection
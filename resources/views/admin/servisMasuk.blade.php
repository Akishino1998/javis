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
                          <th>Jenis Elektronik</th>
                          <th>Merk/Type</th>
                          <th>Tgl Masuk</th>
                          <th>Kerusakan</th>
                          <th>Penyebab Kerusakan</th>
                          <th>Kelengkapan</th>
                          <th>Status</th>
                          <th>Kode Unik</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php $no = 1; 
                      $statusServis = ["Pending","Penjemputan","Masuk","Cancel","Selesai"];?>
                      <tbody class="text-center">
                        @foreach ($data as $item)
                            <tr>
                              <td><?php echo $no; $no++ ?></td>
                              <td>{{ $item->jenis_elektronik }}</td>
                              <td>{{ $item->nama_merk }}-{{ $item->type }}</td>
                            <td>{{ $item->tgl_masuk }}</td>
                            <td>{{ $item->jenis_kerusakan }}</td>
                            
                            <td>{{ $item->penyebab_rusak }}</td>
                            <td>{{ $item->kelengkapan }}</td>
                            <td><?php echo $statusServis[$item->status-1]; ?></td>
                            <td>{{ $item->kode_unik }}</td>
                            <td><button type="button" class="btn btn-primary btn-sm">Ubah</button></td>
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
        // $( '.rupiah' ).mask('000.000.000', {reverse: true});
    } );
    </script>
@endsection
@extends('user.layouts.master')
@section('konten')

<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
      <span class="text-uppercase page-subtitle">Dashboard</span>
      <h3 class="page-title">Transaksi Servisku</h3>
    </div>
  </div>
    <div class="row">
        <div class="col-sm-12 mb-4 ">
            <div class="card card-small mb-4">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Merk</th>
                            <th>Kerusakan</th>
                            <th>Teknisi</th>
                            <th>Tanggal Masuk</th>
                            <th>Warna</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $value)
                        <tr>
                            <td>{{$value->nama_merk."-".$value->type}}</td>
                            <td>{{$value->penyebab_rusak}}</td>
                            <td>{{$value->username_teknisi}}</td>
                            <td>{{date('d F Y',strtotime($value->tgl_masuk))}}</td>
                            <td>{{$value->warna_hp}}</td>
                            <td><button type="button" class="btn btn-primary">Chat</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Merk</th>
                            <th>Kerusakan</th>
                            <th>Teknisi</th>
                            <th>Tanggal Masuk</th>
                            <th>Warna</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
      
      
@endsection
@section('jquery')
<script>

$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection
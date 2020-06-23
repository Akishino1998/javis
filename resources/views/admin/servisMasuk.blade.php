@extends('admin.layouts.master')
@section('konten')
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
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
                    <h6 class="m-0">Servis Masuk Hari Ini <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addServisan"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></h6>
                    <div class="modal fade" id="addServisan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Pilih Pemohon</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button> 
                          </div>
                          <form action="/daftar-pemohon" method="POST">
                            <div class="modal-body"  style="overflow:hidden;height:auto">
                              <div class="form-row">
                                  <div class=" col-md-10">
                                      <select class="custom-select" name="id_perusahaan" id="perusahaan">
                                        @foreach ($user as $item)
                                          <option value="{{ $item->username }}">{{  $item->username}} - {{ $item->UserBiodata->nama }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                  <div class="col-md-2">
                                    <a href="/tambah-pelanggan"><button  type="button" class="btn-success"><i class="fa fa-plus-square" aria-hidden="true"></i></button></a>
                                  </div>
                              </div>
                            </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                          @csrf
                          </form>
                        </div>
                      </div>
                    </div>
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
                          <th>Kelengkapan</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php $no = 1; 
                      // $statusServis = ["Pending","Penjemputan","Masuk","Cancel","Selesai"];?>
                      <tbody class="text-center">
                        @foreach ($data as $item)
                            <tr>
                              <td><?php echo $no; $no++ ?></td>
                              <td>{{ $item->RefType->RefMerk->RefElektronik->jenis_elektronik }}</td>
                              <td>{{ $item->RefType->RefMerk->nama_merk }}-{{ $item->RefType->type }}</td>
                              <td>{{ $item->waktu_masuk }}</td>
                            
                              <td>{{ $item->kerusakan }}</td>
                              <td>
                                @foreach ($item->KelengkapanUnit as $items)
                                    {{ $items->kelengkapan }},
                                @endforeach
                              </td>
                              <td>{{ $item->keterangan }}</td>
                              <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal{{ $item->id_servis_masuk }}"><i class="fa fa-qrcode" aria-hidden="true"></i></button>
                                <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button>
                              </td>
                            </tr>
                            <div class="modal fade" id="exampleModal{{ $item->id_servis_masuk }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">QR Code </h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button> 
                                  </div>
                                  <form action="/daftar-pemohon" method="POST">
                                    <div class="modal-body"  style="overflow:hidden;height:auto">
                                      <div class="form-row">
                                        <div class=" col-md-12">
                                          <center><img src="data:image/png;base64, {{  base64_encode(QrCode::format('png')->size(500)->generate(" $item->qr_code ")) }} " width="300"></center>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-primary">Print</button>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    @csrf
                                  </form>
                                </div>
                              </div>
                            </div>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
      $(document).ready( function () {
        $('#table_harga').DataTable();
        // $( '.rupiah' ).mask('000.000.000', {reverse: true});
      });
      $(document).ready(function() {
        document.getElementById('perusahaan').style.width="100%";
        document.getElementById('perusahaan').style.zIndex="99";
        $("#perusahaan").select2( {
          placeholder: "Pilih pelanggan",
          allowClear: true,
          dropdownParent: $("#addServisan")
        });
      });
      
    </script>
    @if (session('status'))
      <script>$("#addServisan").modal('show');</script>
    @endif
@endsection
@extends('admin.layouts.master')
@section('title','Servis Pending | Nyervisga?')
@section('konten')
    <style>
     #mapBox1 {
				height: 300px;
                width: 100%;
                top: 30px;
            }
            </style>

        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6"><h4 class="box-title">Daftar Servis Masuk</h4></div>
                                    
                                        <div class="col-2 btn-reload"></div>
                                    </div>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Kode Unik</th>
                                                    <th>Nama User</th>
                                                    <th>Jenis Elektronik</th>
                                                    <th>Kerusakan</th>
                                                    <th>Antar</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $number = 1; ?>
                                                @foreach ($data as $item)
                                                    <div >
                                                        <tr class="id-{{ $item->id_order }}">
                                                            <td><?php echo $number."."; $number++; ?></td>
                                                            <td>{{ $item->kode_unik }} </td>
                                                            <td> {{ $item->nama_user }} </td>
                                                            <td> {{ $item->nama_elektronik }} </td>
                                                            <td> {{ $item->kerusakan }} </td>
                                                            <td>{{ $item->antar }}</td>
                                                            <td> <span class="badge badge-complete">Masuk</span> </td>
                                                            <td><button class="btn btn-primary btn-submit" data-toggle="modal" data-target="#myModal" value="{{ $item->id_order }}/{{ $item->id_user }}">Edit</button>
                                                            <button class="btn btn-danger btn-submit2" data-toggle="modal" data-target="#myModal2" value="{{ $item->id_order }}/{{ $item->id_user }}">Cancel</button></td>
                                                            {{-- <input type="hidden" value="{{ $item->id_order }}" name="id_order" id="id_order">  --}}
                                                            {{-- <input type="hidden" value="{{ $item->id_user }}" name="id_user" id="id_user">  --}}
                                                        </tr>
                                                    </div>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                    </div>
                </div>
                <!-- /.orders -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <form class="modal-content teknisi-form" action="/admin/dasboard/addteknisi" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Servis <span class="nama_user">ds</span></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <label for="kurir">Pilih Teknisi</label>
                                <select class="custom-select" name="teknisi" id="teknisi" >
                                    {{-- <option selected>Pilih Kurir</option> --}}
                                    @foreach ($data_teknisi as $item)
                                        <option value="{{ $item->id_teknisi }}">{{ $item->nama_teknisi }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <div class="col-6">
                                <button type="submit" name="submit" class="btn btn-primary" >Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                        <input type="hidden" name="id_tx" id="id_tx" value="" ><br>                                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                    @csrf
                </form>
            </div>
        </div>
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <form class="modal-content kelengkapan-form" action="/admin/dasboard/addkelengkapan" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cancel Servis</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-6">
                                <label for="textarea-input">Keterangan Cancel</label>
                                <textarea name="keterangan_calcel" id="textarea-input" rows="9" placeholder="Keterangan" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 161px;"></textarea>
                                <input type="hidden" name="id_tx2" id="id_tx2" value="" ><br>
                            </div>
                            <div class="col-6">
                                <button type="submit" name="submit" class="btn btn-primary" >Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                    @csrf
                </form>
            </div>
        </div>
        @endsection
@section('jquery')
    <script>
    $('.btn-submit').click(function(){
        var id = $(this).val();
        $.get('dasboard/'+id, function(data){
            var res = data.split("|");
            $('#id_tx').val(res[3]);

            console.log(res);
        });
    });
    $('.btn-submit2').click(function(){
        var id = $(this).val();
        $.get('dasboard/'+id, function(data){
            var res = data.split("|");
            $('#id_tx2').val(res[3]);
            console.log(data);
        });
    });
    
    </script>
<script>
    document.querySelector('.teknisi-form').addEventListener('submit', function(e) {
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
            // form.submit();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/admin/dasboard/addteknisi',
                method: 'post',
                data: $('.teknisi-form').serialize(), // prefer use serialize method
                success:function(data){
                    console.log(data);  
                    // location.href = "/admin/servis-masuk";
                    // var id = $('#id_tx').val();
                    // console.log(data->id_tx);
                    // $('.id-'.id).remove();
                }
            });
            swal({
                title: 'Kurir Ditambahkan',
                text: 'Sukses Disimpan kakak >_<',
                icon: 'success'
            }).then(function() {
                $('#myModal').modal('hide');
          });
        } 
      });
    });
</script>
<script>
    document.querySelector('.kelengkapan-form').addEventListener('submit', function(e) {
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
            // form.submit();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/admin/dasboard/cancel-servis',
                method: 'post',
                data: $('.kelengkapan-form').serialize(), // prefer use serialize method
                success:function(data){
                    console.log(data);  
                    // location.href = "/admin/dasboard";
                }
            });
            swal({
                title: 'Servis Dicancel',
                text: 'Yhaa :((',
                icon: 'success'
            }).then(function() {
                $('#myModal2').modal('hide');
          });
        } 
      });
    });
</script>
@endsection
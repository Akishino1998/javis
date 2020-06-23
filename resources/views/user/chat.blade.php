@extends('user.layouts.master') @section('konten')
<style>
    #map {
        height: 300px;
        width: auto;
    }
    .chat{
      height: 250px;
      overflow: scroll;
    }
</style>
<!-- Page Header -->
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <h3 class="page-title">Percakapan</h3>
    </div>
</div>
<!-- End Page Header -->
<!-- Default Light Table -->
<div class="row">
    <div class="col-lg-4">
        <div class="card card-small mb-4 pt-3">
            <div class="card-header border-bottom text-center">
                <div class="mb-3 mx-auto">
                    @foreach($data as $value)
                        <a class="dropdown-item serviceklik" data="{{$value->username_teknisi}}" href="#">
                        {{$value->nama_merk."-".$value->type}}</a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card card-small mb-4">
            <ul class="list-group list-group-flush">
                <li class="list-group-item p-3">
                    <div class="row chat pr-2 pl-3">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control pesan" rows="3" name="percakapan" id="percakapan" placeholder="Pesan" required></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="teknisi" id="teknisi" value="">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <button type="buttom" class="btn kirim btn-accent">Kirim</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
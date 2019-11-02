@extends('layouts.master')

@section('content')
    <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="row">
						<div class="col-4 text-banner">
							<div class="banner_content text-center">
								<h2>404 NOT FOUND</h2>
								<div class="page_link">
									<p>Halaman Yang Anda Kunjungi Tidak Ada :(</p>
								</div>
							</div>
						</div>
						<div class="col-2"></div>
                        <div class="col-6 btn-next">
                            <ul class="nav navbar-nav navbar-right">
								<li class="nav-item"><a href="/home" class="tickets_btn btn-sudah">Kembali Ke HOME</a></li>
							</ul>
                        </div>
					</div>
				</div>
			</div>
			
        </section>
@endsection
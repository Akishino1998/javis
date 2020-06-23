<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
@if(empty(Session::get('username-admin'))) 
	<script>window.location = "/admin/login";</script>
@endif
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Service Javis</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('style_admin/styles/shards-dashboards.1.1.0.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style_admin/styles/extras.1.1.0.min.css') }}">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>
  <body class="h-100">
    <div class="container-fluid"> 
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
<<<<<<< HEAD
                  {{-- <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/shards-dashboards-logo.svg" alt="Shards Dashboard"> --}}
                  <span class="d-none d-md-inline ml-1">Dashboard</span>
=======
                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 100px;" src="{{ asset('javis-logo.png') }}" alt="Shards Dashboard">
>>>>>>> a2231d4f3114d5f163c1be1cf16a51da2f598d22
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-search"></i>
                </div>
              </div>
              <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
          </form>
          <div class="nav-wrapper" style="overflow-y: auto;">
            <h6 class="main-sidebar__nav-title">Data Servis</h6>
            <ul class="nav nav--no-borders flex-column">
              <li class="nav-item">
                <a class="nav-link" href="/admin/daftar-harga">
                  {{-- <i class="fa fa-sign-in" aria-hidden="true"></i> --}}
                  <span>Daftar Harga Servis</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/admin/servis-masuk">
                  {{-- <i class="material-icons">edit</i> --}}
                  <span>Data Servis Masuk</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/admin/servis-progress">
                  {{-- <i class="material-icons">edit</i> --}}
                  <span>Data Servis Progress</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/admin/servis-progress">
                  {{-- <i class="material-icons">edit</i> --}}
                  <span>Data Servis Selesai</span>
                </a>
              </li>
            </ul>
            
            <h6 class="main-sidebar__nav-title">Data Customer</h6>
            <ul class="nav nav--no-borders flex-column">
              <li class="nav-item">
                <a class="nav-link " href="components-overview.html">
                  <i class="material-icons">view_module</i>
                  <span>Data Customer</span>
                </a>
              </li>
              
            </ul>
            <h6 class="main-sidebar__nav-title">Daftar Inventaris</h6>
            <ul class="nav nav--no-borders flex-column">
              <li class="nav-item">
                <a class="nav-link " href="header-navigation.html">
                  <i class="material-icons">view_day</i>
                  <span>Sparepart</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="icon-sidebar-nav.html">
                  <i class="material-icons"></i>
                  <span>Alat Servis</span>
                </a>
              </li>
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">
                  <!-- Main Navbar -->
                  <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                    <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                      <div class="input-group input-group-seamless ml-3">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="fas fa-search"></i>
                          </div>
                        </div>
                        <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
                    </form>
                    <ul class="navbar-nav border-left flex-row ">
                      
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                          <img class="user-avatar rounded-circle mr-2" src="{{ asset('images/avatar/1.jpg') }}" alt="User Avatar">
                          <span class="d-none d-md-inline-block">{{  Session::get('nama') }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-small">
                          <a class="dropdown-item" href="user-profile-lite.html">
                            <i class="material-icons">&#xE7FD;</i> Profile</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item text-danger" href="/admin/logout">
                            <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                        </div>
                      </li>
                    </ul>
                    <nav class="nav">
                      <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                        <i class="material-icons">&#xE5D2;</i>
                      </a>
                    </nav>
                  </nav>
                </div>
                <!-- / .main-navbar -->
                <div class="main-content-container container-fluid px-4">
                  
        @yield('konten')
        
        <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
                <span class="copyright ml-auto my-auto mr-2">Copyright © 2019
                  <a href="https://designrevision.com" rel="nofollow">JasaServisBismillah</a>
                </span>
              </footer>
            </main>
          </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
        {{-- <script src="{{ asset('scripts/extras.1.1.0.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('scripts/shards-dashboards.1.1.0.min.js') }}"></script> --}}
        <script src="{{ asset('scripts/app/app-blog-overview.1.1.0.js') }}"></script>
      </body>
    </html>
@yield('jquery')
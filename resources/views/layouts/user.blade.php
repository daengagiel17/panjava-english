<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('img/favicon.jpg') }}" type="image/png" />

    @section('title')
      <title>PJE | Panjava English Garden</title>
    @show

    @section('description')
      <!-- Required Meta Tags Always Come First -->
      <meta name="keywords" content="Kursus Bahasa, Bahasa Inggris, Kampung Pare, Kursus Bahasa Inggris Malang, TOEFL, IELTS, TOEFL Malang, IELTS Malang">
      <meta name="title" content="PJE | Panjava English Garden">
      <meta name="description" content="Penggagas Kampung Inggris Pertama di Malang - Jawa Timur.">

      <!-- Open Graph / Facebook -->
      <meta property="og:type" content="profile">
      <meta property="og:url" content="https://panjavaenglish.com/">
      <meta property="og:title" content="PJE | Panjava English Garden">
      <meta property="og:description" content="Penggagas Kampung Inggris Pertama di Malang - Jawa Timur.">
      <meta property="og:image" content="https://panjavaenglish.com/img/favicon.jpg">
      
      <!-- Twitter -->
      <meta property="twitter:card" content="summary_large_image">
      <meta property="twitter:url" content="http://panjavaenglish.com/">
      <meta property="twitter:title" content="PJE | Panjava English Garden">
      <meta property="twitter:description" content="Penggagas Kampung Inggris Pertama di Malang - Jawa Timur.">
      <meta property="twitter:image" content="https://panjavaenglish.com/img/favicon.jpg">
    @show     

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <header class="header_area">
      <div class="main_menu">
        <div class="search_input" id="search_input_box">
          <div class="container">
            <form class="d-flex justify-content-between" method="" action="">
              <input
                type="text"
                class="form-control"
                id="search_input"
                placeholder="Ketik pencarian"
              />
              <button type="submit" class="btn"></button>
              <span
                class="ti-close"
                id="close_search"
                title="Close Search"
              ></span>
            </form>
          </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="{{ route('index') }}">
              <img src="{{ asset('img/logo.png') }}" alt="" style="height: 50px"/>
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon-bar"></span> <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div
              class="collapse navbar-collapse offset"
              id="navbarSupportedContent"
            >
              <ul class="nav navbar-nav menu_nav ml-auto">
                <li class="nav-item {{ Route::currentRouteName() == 'index'?'active':''}}">
                  <a class="nav-link" href="{{ route('index') }}">Beranda</a>
                </li>
                <li class="nav-item {{ request()->routeIs('about*')?'active':'' }}">
                  <a class="nav-link" href="{{ route('about') }}">Tentang</a>
                </li>
                <li class="nav-item {{ request()->routeIs('course*')?'active':'' }}">
                  <a class="nav-link" href="{{ route('courses') }}">Program</a>
                </li>
                <li class="nav-item {{ request()->routeIs('contact*')?'active':'' }}">
                  <a class="nav-link" href="{{ route('contact') }}">Kontak</a>
                </li>
                <li class="nav-item {{ request()->routeIs('registrasi*')?'active':'' }}">
                  <a class="nav-link" href="{{ route('registrasi') }}">Daftar</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link search" id="search">
                    <i class="ti-search"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!--================ End Header Menu Area =================-->

    @yield('content')

    <!--================ Start footer Area  =================-->
    <footer class="footer-area section_gap_footer">
      <div class="container">
        <div class="row footer-bottom d-flex justify-content-between">
          <p class="col-lg-8 col-sm-12 footer-text m-0">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> and <a href="https://irit-io.id" target="_blank">Irit.io</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
          <div class="col-lg-4 col-sm-12 footer-social">
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-twitter"></i></a>
            <a href="https://www.instagram.com/panjavaenglish" target="_blank"><i class="ti-instagram"></i></a>
          </div>
        </div>
      </div>
    </footer>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/owl-carousel-thumb.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/mail-script.js') }}"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="{{ asset('js/gmaps.min.js') }}"></script>
    <script src="{{ asset('js/theme.js') }}"></script>

    @yield('script')

  </body>
</html>

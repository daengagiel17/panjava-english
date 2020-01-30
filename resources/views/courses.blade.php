@extends('layouts.user')

@section('title')
  <title>PJE | Program Kursus</title>
@endsection

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Program</h2>
                <div class="page_link">
                  <a href="{{ route('index') }}">Beranda</a>
                  <a href="{{ route('courses') }}">Program</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Popular Courses Area =================-->
    <div class="popular_courses section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Program Populer</h2>
              <p>
                    Kami selalu menghadirkan program yang sesuai kebutuhanmu
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- single course -->
          <div class="col-lg-12">
            <div class="owl-carousel active_course">
              @foreach ($programs as $program)
                <div class="single_course">
                  <div class="course_head">
                    <img class="img-fluid" src="{{ asset($program->photo) }}" alt="" />
                  </div>
                  <div class="course_content">
                    @if($program->status)
                      <span class="price">{{$program->price_k}}</span>
                      <span class="tag mb-4 d-inline-block">{{$program->category}}</span>                        
                    @else
                      <span class="price">-</span>
                      <span class="tag mb-4 d-inline-block">Coming soon</span>                                              
                    @endif
                    <h4 class="mb-3">
                      <a href="{{ route('course', [ 'id' => $program->id]) }}">{{$program->name}}</a>
                    </h4>
                    <p>{{$program->description}}</p>
                  </div>
                </div>                  
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================ End Popular Courses Area =================-->

    <!--================ Start Registration Area =================-->
    <div class="section_gap registration_area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7">
            <div class="row clock_sec clockdiv" id="clockdiv">
              <div class="col-lg-12 title-registration">
                <h1 class="mb-3">Daftar Sekarang</h1>
                <p>
                    Kami akan membantumu memilih program yang cocok sesuai kebutuhanmu. Kami juga memiliki penawaran menarik bagi kamu yang daftar sekarang.
                </p>
              </div>

              <div class="col clockinner1 clockinner">
                <h1 class="days" id="timer-days"></h1>
                <span class="smalltext">Days</span>
              </div>
              <div class="col clockinner clockinner1">
                <h1 class="hours" id="timer-hours"></h1>
                <span class="smalltext">Hours</span>
              </div>
              <div class="col clockinner clockinner1">
                <h1 class="minutes" id="timer-mins"></h1>
                <span class="smalltext">Mins</span>
              </div>
              <div class="col clockinner clockinner1">
                <h1 class="seconds" id="timer-secs"></h1>
                <span class="smalltext">Secs</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 offset-lg-1">
            <div class="register_form">
              <h3>Masih bingung?</h3>
              <p>Hubungi kami</p>
              <div class="row">
                <div class="col-lg-12">
                  <p>Segala kebingunganmu tentang program kami akan terjawab. Kami siap membantumu mengembangkan diri sesuai kemampuan dan kebutuhanmu</p>
                </div>
                <div class="col-lg-12 text-center">
                  <a href="{{ route('registrasi') }}" class="primary-btn3" style="width: 100%">Daftar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================ End Registration Area =================-->


    <!--================ Start Feature Area =================-->
    <section class="feature_area section_gap">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Keunggulan Kami</h2>
              <p>
                    Kami memahami untuk belajar perlu ditunjang berbagai aspek
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="single_feature1">
              <div class="icon"><span class="flaticon-student"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Tutor Terbaik</h4>
                <p>
                    Peserta akan diajar oleh tutor terbaik dan berpengalaman di bidang pengajaran Bahasa Inggris
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single_feature1">
              <div class="icon"><span class="flaticon-book"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Kurikulum Khusus</h4>
                <p>
                  Pembelajaran berlangsung dengan kurikulum yang disesuaikan dengan kemampuan dan kebutuhan peserta
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single_feature1">
              <div class="icon"><span class="flaticon-earth"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Fasilitas Lengkap</h4>
                <p>
                  Kami menyediakan fasilitas yang lengkap dan memadai seperti ruang kelas, asrama, musala, gazebo, dsb
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!--================ End Feature Area =================-->

@endsection

@section('script')
<script type="text/javascript">
  var endDate = new Date("{{$setting->due}}").getTime();

  var timer = setInterval(function() {
  
      let now = new Date().getTime();
      let t = endDate - now;
      
      if (t >= 0) {
      
          let days = Math.floor(t / (1000 * 60 * 60 * 24));
          let hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          let mins = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
          let secs = Math.floor((t % (1000 * 60)) / 1000);
      
          document.getElementById("timer-days").innerHTML = ("0"+days).slice(-2);
      
          document.getElementById("timer-hours").innerHTML = ("0"+hours).slice(-2);
      
          document.getElementById("timer-mins").innerHTML = ("0"+mins).slice(-2);
      
          document.getElementById("timer-secs").innerHTML = ("0"+secs).slice(-2);
      
      } else {
          document.getElementById("timer-days").innerHTML = "00";
      
          document.getElementById("timer-hours").innerHTML = "00";
      
          document.getElementById("timer-mins").innerHTML = "00";
      
          document.getElementById("timer-secs").innerHTML = "00";
      }
      
  }, 1000);
</script>

@endsection
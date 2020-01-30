@extends('layouts.user')

@section('content')
    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="banner_content text-center">
                <h2>Tentang Kami</h2>
                <div class="page_link">
                  <a href="{{ route('index') }}">Beranda</a>
                  <a href="{{ route('about') }}">Tentang</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start About Area =================-->
    <section class="about_area section_gap">
      <div class="container">
        <div class="row h_blog_item">
          <div class="col-lg-6">
            <div class="h_blog_img">
              <img class="img-fluid" src="{{ asset('img/about.jpg') }}" alt="" />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="h_blog_text">
              <div class="h_blog_text_inner left right">
                <h4>Selamat Datang di PJE</h4>

                <p>
                  Pan Java English Garden (PJE) adalah lembaga kursus yang berdiri sejak tahun 2019.
                  PJE betempat di Desa Mulyo Agung, Kec, Dau Kabupaten. Malang. 
                  Lebih spesifik,lokasi PJE biasanya dikenal dengan Kawasan Pan Java, Mulyo Agung.
                  Kawasan ini sarat akan budaya lokal dan memiliki potensi internasional.
                </p>
                <p>
                  Suasana belajar di PJE sangat nyaman, dengan konsep taman dan gedung bernuansa budaya jawa,
                  tempat kursus ini menyimbolkan warisan budaya (heritage) nusantara yang kaya.
                  Juga, lokasinya strategis dan mudah dijangkau.
                </p>
                <p>
                  Di samping itu, PJE memiliki mentor yang berpengalaman dan berkualitas,
                  banyak dari mereka telah menjadi dosen di Universitas ternama di Malang.
                  Kurikulum yang ditawarkan Pan Java English Garden adalah customize curriculum yaitu 
                  kurikulum yang didesain sesuai dengan kebutuhan personal setiap mentee.
                </p>
                <p>
                  Ada tiga program utama yang ditawarkan PJE, yaitu English for Young Learner (EYL),
                  Intensive English dan TOEFL/IELTS Preparation.
                </p>
                <p>
                  Oleh karena itu, PJE adalah lembaga kursus bahasa inggris paling tepat buat anda, 
                  siapapun yang ingin belajar bahasa inggris untuk berbagai keperluan.
                  Misalnya untuk sukses Ujian Nasional, mendapatkan nilai maksimal IELTS/TOEFL,
                  interview kerja, presentasi dengan bahasa inggris, atau sekedar ingin bisa ngomong inggris.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ End About Area =================-->

    <!--================ Start Feature Area =================-->
    <section class="feature_area section_gap_top title-bg">
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
            <div class="single_feature">
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
            <div class="single_feature">
              <div class="icon"><span class="flaticon-book"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Fasilitas Lengkap</h4>
                <p>
                  Kami menyediakan fasilitas yang lengkap dan memadai seperti ruang kelas, asrama, musala, gazebo, dsb
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="single_feature">
              <div class="icon"><span class="flaticon-earth"></span></div>
              <div class="desc">
                <h4 class="mt-3 mb-2">Kurikulum Khusus</h4>
                <p>
                  Pembelajaran berlangsung dengan kurikulum yang disesuaikan dengan kemampuan dan kebutuhan peserta
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!--================ End Feature Area =================-->

    <!--================ Start Trainers Area =================-->
    <section class="trainer_area section_gap_top">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Tutor Terbaik</h2>
              <p>
                Kami siap mewujudkan mimpimu menguasai Bahasa Inggris
              </p>
            </div>
          </div>
        </div>
        @if($tutors->isNotEmpty())
        <div class="row justify-content-center d-flex align-items-center">
          @foreach($tutors as $tutor)
          <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
            <div class="thumb d-flex justify-content-sm-center">
              <img class="img-fluid" src="{{ asset($tutor->photo) }}" alt="" />
            </div>
            <div class="meta-text text-sm-center">
              <h4>{{$tutor->name}}</h4>
              <p class="designation">{{$tutor->job}}</p>
              <div class="mb-4">
                <p>{{$tutor->description}}</p>
              </div>
              <div class="align-items-center justify-content-center d-flex">
                <a href="{{$tutor->facebook}}"><i class="ti-facebook"></i></a>
                <a href="{{$tutor->twitter}}"><i class="ti-twitter"></i></a>
                <a href="{{$tutor->linkedin}}"><i class="ti-linkedin"></i></a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @endif
      </div>
    </section>
    <!--================ End Trainers Area =================-->
@endsection
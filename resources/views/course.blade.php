@extends('layouts.user')

@section('title')
  <title>PJE | {{$program->name}}</title>
@endsection

@section('description')
<!-- Required Meta Tags Always Come First -->
<meta name="keywords" content="Kursus Bahasa, Bahasa Inggris, Kampung Pare, Kursus Bahasa Inggris Malang, TOEFL, IELTS, TOEFL Malang, IELTS Malang">
<meta name="title" content="PJE | {{$program->name}}">
<meta name="description" content="{{$program->description}}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="profile">
<meta property="og:url" content="https://panjavaenglish.com/">
<meta property="og:title" content="PJE | {{$program->name}}">
<meta property="og:description" content="{{$program->description}}">
<meta property="og:image" content="https://panjavaenglish.com/img/favicon.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="http://panjavaenglish.com/">
<meta property="twitter:title" content="PJE | {{$program->name}}">
<meta property="twitter:description" content="{{$program->description}}">
<meta property="twitter:image" content="https://panjavaenglish.com/img/favicon.jpg">
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
                <h2>{{ $program->name }}</h2>
                <div class="page_link">
                  <a href="{{ route('index') }}">Beranda</a>
                  <a href="{{ route('courses') }}">Program</a>
                  <a href="{{ route('course', ['id' => $program->id]) }}">Detail Program</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 course_details_left">
                    <div class="main_image">
                        <img class="img-fluid" src="{{ asset($program->photo) }}" alt="Program" width="730" height="480">
                    </div>
                    @if ($program->status)                        
                      <div class="content_wrapper">
                          <h4 class="title">Deskripsi</h4>
                          <div class="content">
                              {{$program->objective}}
                          </div>

                          <h4 class="title">Jadwal Kelas</h4>
                          <div class="content">
                            <div class="content">
                              <table class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <td>Kelas</td>
                                    <td>Hari</td>
                                    <td>Waktu</td>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($program->jadwal as $jadwal)
                                    <tr>
                                      <td>{{$jadwal->kelas}}</td>
                                      <td>{{$jadwal->hari}}</td>
                                      <td>{{$jadwal->waktu}}</td>
                                    </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>                            
                            <p>* Untuk jadwal di luar ketentuan di atas, silahkan menghubungi admin melalui WA 085 333 888 592</p>
                          </div>

                          @if ($program->diskon->isNotEmpty())
                            <h4 class="title">Promo</h4>
                            <p>Kami memiliki penawaran khusus dengan ketentuan pemesanan sebagai berikut:</p>
                            <div class="content">
                              <table class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                    <td>Jumlah Pendaftar</td>
                                    <td>Harga</td>
                                    <td>Tanggal Berlaku</td>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($program->diskon as $diskon)
                                    <tr>
                                      <td>
                                        @if (is_null($diskon->batas))
                                          {{$diskon->banyak}} pendaftar
                                        @else   
                                          {{$diskon->banyak}} - {{$diskon->batas}} Orang
                                        @endif
                                      </td>
                                      <td>{{$diskon->price_k}}/Orang</td>
                                      <td>{{date_format(date_create($diskon->tanggal_awal),"d-m-Y")}} sampai {{date_format(date_create($diskon->tanggal_akhir),"d-m-Y")}}</td>
                                    </tr>                                    
                                  @endforeach
                                </tbody>
                              </table>
                            </div>                            
                          @endif

                          <h4 class="title">Materi Utama</h4>
                          <div class="content">
                              <ul class="unordered-list">
                                  @foreach ($program->detailProgram as $detailProgram)
                                    <li class="justify-content-between d-flex">
                                        <p>{{$detailProgram->name}}</p>
                                    </li>                                    
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                    @endif
                </div>

                <div class="col-lg-4 right-contents">
                    <ul>
                        <li>
                            <a class="justify-content-between d-flex" href="#">
                                <p>Level</p>
                                <span class="or">{{ Str::upper($program->category) }}</span>
                            </a>
                        </li>
                        @if ($program->status)
                          <li>
                              <a class="justify-content-between d-flex" href="#">
                                  <p>Harga</p>
                                  <span class="or">{{ Str::upper($program->price_k) }}</span>
                              </a>
                          </li>
                          <li>
                              <a class="justify-content-between d-flex" href="#">
                                  <p>Durasi</p>
                                  <span class="or">{{ Str::upper($program->durasi) }}</span>
                              </a>
                          </li>                            
                        @else
                          <li>
                              <a class="justify-content-between d-flex" href="#">
                                  <p>Harga</p>
                                  <span class="or">-</span>
                              </a>
                          </li>
                          <li>
                              <a class="justify-content-between d-flex" href="#">
                                  <p>Durasi</p>
                                  <span class="or">-</span>
                              </a>
                          </li>                            
                        @endif
                    </ul>
                    @if ($program->status)
                      <a href="{{ route('registrasi') }}" class="primary-btn2 text-uppercase enroll rounded-0">Daftar</a>                      
                    @else
                      <label class="primary-btn2 text-uppercase enroll rounded-0">Coming Soon</label>
                    @endif

                    <h4 class="title">Program Lainnya</h4>
                    <div class="content">
                        <div class="comments-area mb-30">
                          @foreach ($programs as $program)
                            <div class="comment-list">
                                <div class="single-comment single-reviews justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ asset($program->photo) }}" alt="" width="80">
                                        </div>
                                        <div class="desc">
                                            <h3><a href="{{ route('course', ['id' => $program->id]) }}">{{ $program->name}}</a></h3>
                                            <p>{{$program->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>                              
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

@endsection
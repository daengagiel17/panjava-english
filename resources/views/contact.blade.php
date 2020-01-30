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
                <h2>Kontak Kami</h2>
                <div class="page_link">
                  <a href="{{ route('index') }}}">Beranda</a>
                  <a href="{{ route('contact') }}">Kontak</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap">
      <div class="container">
        <div class="mapBox">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2897.4262103579063!2d112.58220673163086!3d-7.921639609772797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78819f5652eecd%3A0xb5cfbeb8331d385e!2sCAFE+KOPITANI!5e0!3m2!1sid!2sid!4v1565833022275!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="contact_info">
              <div class="info_item">
                <i class="ti-home"></i>
                <h6>Malang, Jawa Timur</h6>
                <p>Panjava Mulyoagung</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="contact_info">
              <div class="info_item">
                <i class="ti-headphone"></i>
                <h6><a href="https://wa.me/6282333888592" target="_blank">082 333 888 592</a></h6>
                <p>Tersedia di Whatsapp, hati aktif 08.00 - 16.00</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="contact_info">
              <div class="info_item">
                <i class="ti-email"></i>
                <h6><a href="mailto:panjavaenglish@gmail.com">panjavaenglish@gmail.com</a></h6>
                <p>Kirimi kami setiap saat !</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================Contact Area =================-->

@endsection
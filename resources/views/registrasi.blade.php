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
                <h2>Registrasi</h2>
                <div class="page_link">
                  <a href="{{ route('index') }}">Home</a>
                  <a href="{{ route('registrasi') }}">Registrasi</a>
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
                    <h3 class="title_color">Tata Cara Registrasi</h3>
                    <div class="">
                        <p class="mt-20">Untuk bisa mengikuti program kami ikuti tahapan registrasi berikut ini :</p>
                        <ol class="ordered-list">
                            <li><span>Mengisi form registrasi dibawah ini</span></li>
                            <li><span>Melakukan pembayaran melalui rekening bank kami</span></li>
                            <li><span>Konfirmasi pembayaran melalui Whatsapp</span></li>
                            <li><span>Selesai.</span></li>
                        </ol>
                    </div>
                    <h4 class="title">Form Pendaftaran</h4>
                    <div class="content">
                        <form action="{{ route('registrasi') }}" method="POST"> 
                            @csrf
							<div class="input-group-icon mt-10">
								<div class="icon"><i class="ti-pencil-alt" aria-hidden="true"></i></div>
								<div class="form-select" id="default-select">
									<select name="program_id" required="">
                                        <option value="">Pilih Program</option>
                                        @foreach ($programs as $program)
                                            @if($program->status)
    										    <option value="{{$program->id}}">{{$program->name}}</option>                                            
                                            @endif
                                        @endforeach
									</select>
								</div>
                            </div>
                            <hr>
                            <div class="row" class="peserta" id="peserta-1">
                                <div class="col-md-12">
                                    <div class="input-group-icon mt-10">
                                        <div class="icon"><i class="ti-user" aria-hidden="true"></i></div>
                                        <input type="text" name="name[]" placeholder="Nama Lengkap" required class="single-input">
                                    </div>
                                    <div class="input-group-icon mt-10">
                                        <div class="icon"><i class="ti-headphone-alt" aria-hidden="true"></i></div>
                                        <input type="tel" name="no_hp[]" placeholder="Nomor Whatsapp" required class="single-input">
                                    </div>
                                    <div class="input-group-icon mt-10">
                                        <div class="icon"><i class="ti-email" aria-hidden="true"></i></div>
                                        <input type="email" name="email[]" placeholder="Alamat Email" required class="single-input">
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="row btn-registrasi">
                                <div class="col-md-3 offset-md-6">
                                    <label class="mt-10 btn-block genric-btn danger radius tambah-peserta">Tambah Peserta</label>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="mt-10 btn-block genric-btn danger radius">Daftar</button>
                                </div>
                            </div>                            
						</form>
                    </div>         
                </div>
                <div class="col-lg-4 right-contents">
                    <h4 class="title_registration">Program Kami</h4>
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

@section('script')
<script type="text/javascript" language="javascript">
  $(function (){
    var id = 1 ;
    $('body').on('click', '.delete-peserta', function() {
      var id = $(this).data("id");
      $confirm = confirm('Yakin menghapus peserta?');
      // dd($confirm);
      if($confirm){
          $('#peserta-'+id).remove();
      }
    });

    $('body').on('click', '.tambah-peserta', function() {
        id++;
        $('.btn-registrasi').before(
            '<div class="row" class="peserta" id="peserta-'+id+'">'+
                '<div class="col-md-12">'+
                    '<div class="input-group-icon mt-10">'+
                        '<div class="icon"><i class="ti-user" aria-hidden="true"></i></div>'+
                        '<input type="text" name="name[]" placeholder="Nama Lengkap" required class="single-input">'+
                    '</div>'+
                    '<div class="input-group-icon mt-10">'+
                        '<div class="icon"><i class="ti-headphone-alt" aria-hidden="true"></i></div>'+
                        '<input type="tel" name="no_hp[]" placeholder="Nomor Whatsapp" required class="single-input">'+
                    '</div>'+
                    '<div class="input-group-icon mt-10">'+
                        '<div class="icon"><i class="ti-email" aria-hidden="true"></i></div>'+
                        '<input type="email" name="email[]" placeholder="Alamat Email" required class="single-input">'+
                    '</div>'+
                    '<label class="mt-10 genric-btn danger radius small delete-peserta" data-id="'+id+'">Hapus</label>'+
                    '<hr>'+
                '</div>'+
            '</div>'
        );
    });

  });
</script>    
@endsection
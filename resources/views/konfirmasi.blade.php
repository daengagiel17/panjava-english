@extends('layouts.user')

@section('content')
    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-md-3">
                    <div class="main_title">
                        <h2 class="mt-20 mb-3">Selamat kamu berhasil mendaftar</h2>
                        <p>Silahkan menyelesaikan pembayaran.</p>
                    </div>
                    <h3 class="title">Data Pendaftaranmu</h3>
                    <div>
                        <p class="mt-20">Kamu mendaftar program {{$registrasi->program->name}} dengan detail sebagai berikut :</p>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Nama</td>
                                    <td>Nomor Handphone</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if (is_null($registrasi->registration_diskon_id))
                                    <tr>
                                        <td>{{$registrasi->name}}</td>                                        
                                        <td>{{$registrasi->no_hp}}</td>                                        
                                    </tr>
                                @else
                                    @foreach ($registrasis as $registrasi)
                                        <tr>
                                            <td>{{$registrasi->name}}</td>                                        
                                            <td>{{$registrasi->no_hp}}</td>                                        
                                        </tr>                                        
                                    @endforeach                          
                                @endif
                            </tbody>
                        </table>
                        <p>Dengan total pembayaran senilai :</p>
                        @if(is_null($registrasi->registration_diskon_id))
                            <p>1 orang x Rp.{{$registrasi->program->price}} = Rp.{{$registrasi->program->price}}</p>                            
                        @else
                            <p>{{$registrasis->count()}} orang x Rp.{{$registration_diskon->diskon->price}} = Rp.{{$registration_diskon->diskon->price * $registrasis->count()}}</p>
                        @endif
                        <p>Selanjutnya kamu bisa mengikuti ketentuan pembayaran yang ada untuk menyelesaikan proses pendaftaran.</p>
                    </div>
                    <h3 class="title">Ketentuan Pembayaran</h3>
                    <div>
                        <ol class="ordered-list">
                            <li><span>Pembayaran dapat dilakukan melalui Bank Central Asia (BCA) :</span></li>                            
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td>Nomor Rekening</td>
                                    <td>Atas Nama</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>01119-19860</td>                                        
                                    <td>A.n Farhan Araya S</td>                                        
                                </tr>
                            </tbody>
                        </table>
                            <li>
                                <span>
                                    Nomimal biaya yang ditransfer senilai
                                    @if(is_null($registrasi->registration_diskon_id))
                                        <b>Rp.{{$registrasi->program->price}}</b>                   
                                    @else
                                        <b>Rp.{{$registration_diskon->diskon->price * $registrasis->count()}}</b>
                                    @endif
                                </span>
                            </li>
                            <li><span>Silahkan melakukan konfirmasi pembayaran ke nomor Whatsapp <b>082333888592</b> dengan mengirimkan foto bukti pembayaran</span></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->
@endsection
@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Registrasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Registrasi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 offset-md-4">

            <!-- Profile Image -->
            <div class="card card-danger card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('img/profile/default.png') }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $registration->name }}</h3>

                <p class="text-muted text-center">{{ $registration->program->name }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nomor HP</b> <a class="float-right">{{ $registration->no_hp }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $registration->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Status</b> <a class="float-right text-capitalize">{{ $registration->status }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Diskon</b> <a class="float-right">{{ isset($registration->registration_diskon_id) ? 'Ya' : 'Tidak' }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Pembayaran</b> 
                    <a class="float-right">
                      @if (isset($registration->registration_diskon_id))
                        {{$registration->registrationDiskon->diskon->price_k}}
                      @else
                        {{ $registration->program->price_k }}                          
                      @endif
                    </a>
                  </li>
                </ul>

                <a href="{{ route('registration.index') }}" class="btn btn-danger btn-block"><b>Kembali</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
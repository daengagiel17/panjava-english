@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
              <li class="breadcrumb-item"><a href="{{ route('tutor.index') }}">Tutor</a></li>
              <li class="breadcrumb-item active">Detail</li>
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
                       src="{{ asset($tutor->photo) }}"
                       alt="Foto Tutor">
                </div>

                <h3 class="profile-username text-center">{{ $tutor->name }}</h3>

                <p class="text-muted text-center">{{ $tutor->job }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Facebook</b>
                    @if (isset($tutor->facebook))
                      <a href="{{$tutor->facebook}}" target="_blank" class="float-right">Kunjungi</a>
                    @else   
                      <a class="float-right">Tidak ada</a>
                    @endif
                  </li>
                  <li class="list-group-item">
                    <b>Twitter</b>
                    @if (isset($tutor->twitter))
                      <a href="{{$tutor->twitter}}" target="_blank" class="float-right">Kunjungi</a>
                    @else   
                      <a class="float-right">Tidak ada</a>
                    @endif
                  </li>
                  <li class="list-group-item">
                    <b>Instagram</b>
                    @if (isset($tutor->instagram))
                      <a href="{{$tutor->instagram}}" target="_blank" class="float-right">Kunjungi</a>
                    @else   
                      <a class="float-right">Tidak ada</a>
                    @endif
                  </li>
                  <li class="list-group-item">
                    <b>Deskripsi</b> <a class="float-right text-capitalize">{{ $tutor->description }}</a>
                  </li>
                </ul>

                <a href="{{ route('tutor.index') }}" class="btn btn-danger btn-block"><b>Kembali</b></a>
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
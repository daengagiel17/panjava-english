@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
              <li class="breadcrumb-item"><a href="{{ route('tutor.index') }}">Tutor</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Tutor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('tutor.update', ['id' => $tutor->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama" value="{{$tutor->name}}" required>
                  </div>
                  <div class="form-group">
                    <label for="job">Posisi</label>
                    <input type="text" class="form-control" id="job" name="job" placeholder="Masukkan posisi" value="{{$tutor->job}}" required>
                  </div>
                  <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="url" class="form-control" id="facebook" name="facebook" placeholder="Masukkan link facebook" value="{{$tutor->facebook}}">
                  </div>
                  <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="url" class="form-control" id="twitter" name="twitter" placeholder="Masukkan link twitter" value="{{$tutor->twitter}}">
                  </div>
                  <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Masukkan link instagram" value="{{$tutor->instagram}}">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description" required>{{$tutor->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="photo">Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo">
                        <label class="custom-file-label" for="photo">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ubah</button>
                  <a href="{{ route('tutor.index') }}" class="btn btn-danger">Batal</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
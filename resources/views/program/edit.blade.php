@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Program</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Program</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Program</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('program.update', ['id' => $program->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-5">
                      <img class="img-fluid pad" width="100%" src="{{ asset($program->photo) }}" alt="Photo">
                      <div class="form-group">
                        <label for="name">Name Program</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$program->name}}">
                      </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{$program->price}}">
                      </div>
                      <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{$program->category}}">
                      </div>
                      <div class="form-group">
                        <label for="seat">Seat</label>
                        <input type="number" class="form-control" id="seat" name="seat" min="10" max="50" value="{{$program->seat}}">
                      </div>
                      <div class="form-group">
                        <label for="durasi">Duration</label>
                        <input type="text" class="form-control" id="durasi" name="durasi" value="{{$program->durasi}}">
                      </div>
                      <div class="form-group center">
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
                    <div class="col-md-7">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{$program->description}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="objective">Objective</label>
                        <textarea name="objective" id="objective" cols="30" rows="22" class="form-control">{{$program->objective}}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('program.index') }}" class="btn btn-danger">Kembali</a>
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
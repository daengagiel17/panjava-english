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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Show Program</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-5">
                      <img class="img-fluid pad" width="100%" src="{{ asset($program->photo) }}" alt="Photo">
                      <div class="form-group">
                        <label for="name">Name Program</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$program->name}}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{$program->price}}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{$program->category}}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="seat">Seat</label>
                        <input type="number" class="form-control" id="seat" name="seat" min="10" max="50" value="{{$program->seat}}" readonly>
                      </div>
                      <div class="form-group">
                        <label for="durasi">Duration</label>
                        <input type="text" class="form-control" id="durasi" name="durasi" value="{{$program->durasi}}" readonly>
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control" readonly>{{$program->description}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="objective">Objective</label>
                        <textarea name="objective" id="objective" cols="30" rows="20" class="form-control" readonly>{{$program->objective}}</textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
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
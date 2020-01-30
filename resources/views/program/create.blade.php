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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Create Program</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('program.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="name">Name Program</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                      </div>
                      <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" required>
                      </div>
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control" required>
                          <option value="">Select Category</option>
                          <option value="basic">Basic</option>
                          <option value="beginner">Beginner</option>
                          <option value="coming soon">Coming Soon</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="seat">Seat</label>
                        <input type="number" class="form-control" id="seat" name="seat" min="10" max="50" placeholder="Enter Seat" required>
                      </div>
                      <div class="form-group">
                        <label for="durasi">Duration</label>
                        <input type="test" class="form-control" id="durasi" name="durasi" placeholder="Enter Duration" required>
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
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Enter Description" required></textarea>
                      </div>
                      <div class="form-group">
                        <label for="objective">Objective</label>
                        <textarea name="objective" id="objective" cols="30" rows="15" class="form-control" placeholder="Enter Objective" required></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <a href="{{ route('program.index') }}" class="btn btn-danger">Batal</a>
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
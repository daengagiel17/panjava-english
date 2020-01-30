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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Program</h3>
                <div class="card-tools">
                  <a href="{{ route('program.create') }}" class="btn btn-sm btn-success">Tambah</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table class="table table-hover table-bordered">
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Seat</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  @foreach ($programs as $program)
                    <tr>
                      <td>{{$program->id}}</td>
                      <td>{{$program->name}}</td>
                      <td>{{$program->price}}</td>
                      <td>{{$program->seat}}</td>
                      <td>
                        @if ($program->status)
                            <button class="btn btn-sm btn-success">Active</button>
                            <a class="btn btn-sm btn-danger" href="{{ route('program.status', ['id' => $program->id]) }}"
                                onclick="event.preventDefault();
                                              document.getElementById('status-form-{{$program->id}}').submit();">                            
                                <i class="fa fa-times"></i>
                            </a>                            
                        @else
                            <button class="btn btn-sm btn-danger">Inactive</button>
                            <a class="btn btn-sm btn-success" href="{{ route('program.status', ['id' => $program->id]) }}"
                                onclick="event.preventDefault();
                                              document.getElementById('status-form-{{$program->id}}').submit();">                            
                                <i class="fa fa-check"></i>
                            </a>                            
                            
                        @endif
                        <form id="status-form-{{$program->id}}" action="{{ route('program.status', ['id' => $program->id]) }}" method="POST" style="display: none;">
                            @csrf @method('PUT')
                        </form>
                      </td>
                      <td style="width:180px">
                        <a href="{{ route('program.show', ['id' => $program->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('program.edit', ['id' => $program->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger" href="{{ route('program.destroy', ['id' => $program->id]) }}"
                            onclick="event.preventDefault();
                                          document.getElementById('destroy-form-{{$program->id}}').submit();">
                            <i class="fas fa-trash"></i>
                        </a>
                        <form id="destroy-form-{{$program->id}}" action="{{ route('program.destroy', ['id' => $program->id]) }}" method="POST" style="display: none;">
                            @csrf @method('DELETE')
                        </form>
                      </td>
                    </tr>                      
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
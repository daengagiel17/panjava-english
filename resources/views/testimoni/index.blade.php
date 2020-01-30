@extends('layouts.admin')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">    
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Testimoni</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Testimoni</li>
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
                <h3 class="card-title">List of Testimoni</h3>
                <div class="card-tools">
                  <a href="{{ route('testimoni.create') }}" class="btn btn-sm btn-success">Tambah</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="data-testimoni" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Photo</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Testimoni</th>
                      <th>Action</th>
                    </tr>                      
                  </thead>
                  <tbody>
                  @foreach ($testimonis as $key => $testimoni)
                    <tr>
                      <td style="width:30px">{{++$key}}</td>
                      <td style="width:90px">
                        <img src="{{ asset($testimoni->photo) }}" alt="Foto Testimonis" width="80px" height="80px">
                      </td>
                      <td style="width:150px">{{$testimoni->name}}</td>
                      <td style="width:150px">{{$testimoni->jabatan}}</td>
                      <td>{{$testimoni->description}}</td>
                      <td style="width:80px">
                        <a href="{{ route('testimoni.edit', ['id' => $testimoni->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger" href="{{ route('testimoni.destroy', ['id' => $testimoni->id]) }}"
                            onclick="event.preventDefault();
                                          document.getElementById('destroy-form-{{$testimoni->id}}').submit();">
                            <i class="fas fa-trash"></i>
                        </a>
                        <form id="destroy-form-{{$testimoni->id}}" action="{{ route('testimoni.destroy', ['id' => $testimoni->id]) }}" method="POST" style="display: none;">
                            @csrf @method('DELETE')
                        </form>
                      </td>
                    </tr>                      
                  @endforeach
                  </tbody>
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

@section('script')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#data-testimoni").DataTable();
  });
</script>
@endsection
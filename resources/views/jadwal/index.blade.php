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
            <h1>Jadwal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Jadwal</li>
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
                <h3 class="card-title">List of Jadwal</h3>
                <div class="card-tools">
                  <a href="{{ route('jadwal.create') }}" class="btn btn-sm btn-success">Tambah</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="data-jadwal" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Program</th>
                      <th>Hari</th>
                      <th>Kelas</th>
                      <th>Waktu</th>
                      <th>Action</th>
                    </tr>                      
                  </thead>
                  <tbody>
                  @foreach ($jadwals as $key => $jadwal)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$jadwal->program->name}}</td>
                      <td>{{$jadwal->hari}}</td>
                      <td>{{$jadwal->kelas}}</td>
                      <td>{{$jadwal->waktu}}</td>
                      <td style="width:80px">
                        <a href="{{ route('jadwal.edit', ['id' => $jadwal->id]) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a class="btn btn-sm btn-danger" href="{{ route('jadwal.destroy', ['id' => $jadwal->id]) }}"
                            onclick="event.preventDefault();
                                          document.getElementById('destroy-form-{{$jadwal->id}}').submit();">
                            <i class="fas fa-trash"></i>
                        </a>
                        <form id="destroy-form-{{$jadwal->id}}" action="{{ route('jadwal.destroy', ['id' => $jadwal->id]) }}" method="POST" style="display: none;">
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
    $("#data-jadwal").DataTable();
  });
</script>
@endsection
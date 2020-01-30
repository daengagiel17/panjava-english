@extends('layouts.admin')

@section('css')
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">    
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="banner-1">{{ $banner[0] }}</h3>

                <p>Registration Today</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="banner-2">{{ $banner[1] }}</h3>

                <p>Total Registration</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 id="banner-3">{{ $banner[2] }}<sup style="font-size: 20px">%</sup></h3>

                <p>Paid Off</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="banner-4">{{ $banner[3] }}</h3>

                <p>Average Registration</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Filter Data</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <select name="program" id="program" class="form-control">
                                <option value="">Select Program</option>
                                @foreach ($programs as $program)
                                    <option value="{{$program->id}}">{{$program->name}}</option>                    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <select name="status" id="status" class="form-control text-capitalize">
                                <option value="">Select Status</option>
                                <option value="registrasi">Registrasi</option>
                                <option value="bayar">Bayar</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <button type="button" id="filter" name="filter" class="btn btn-sm btn-success btn-block">Filter</button>
                        </div>
                        <div class="col-1">
                            <button type="button" id="reset-filter" name="reset-filter" class="btn btn-sm btn-danger btn-block">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-12">
            @component('components.datatable', ['id' => 'data-registration'])
              @slot('title')
                List of Registration
              @endslot
              <th>#</th>
              <th>Name</th>
              <th>Number Phone</th>
              <th>Program</th>
              <th>Status</th>
              <th>Datetime</th>
              <th>Action</th>
            @endcomponent
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('script')
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- page script -->
<script type="text/javascript" language="javascript">
  $(function (){
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    load_data();

    function load_data(program = '', status = '')
    {
      $("#data-registration").DataTable({
        // "processing": true,
        "serverSide": true,
        "ajax": {
          url : "{{ route('registration.index') }}",
          data : {
            status: status,
            program: program
          }
        },
        "columns": [
          {
            data: 'DT_RowIndex',
            name: 'id'
          },
          {
            data: "name" ,
            name: "name"
          },
          {
            data: "no_hp" ,
            name: "no_hp"
          },
          {
            data: "program.name",
            name: "program.name"
          },
          {
            data: "status",
            name: "status"
          },
          {
            data: "created_at",
            name: "created_at"
          },
          {
            data: "action",
            name: "action"
          }
        ],
      });
    }

    // Action Filter
    $('#filter').click(function() {
      var program = $('#program').val();
      var status = $('#status').val();

      $('#data-registration').DataTable().destroy();
      load_data(program, status);
    });
    
    // Reset Filter
    $('#reset-filter').click(function() {
      $('#program').empty();       
      $('#status').empty();       

      var programs = {!! json_encode($programs) !!};

      $('#program').append("<option value=''>Select Program</option>");
      for (i = 0; i < programs.length; i++)
      {
          $('#program').append("<option value='" + programs[i].id + "'>" + programs[i].name + "</option>");
      }

      $('#status').append("<option value=''>Select Status</option>");
      $('#status').append("<option value='registrasi'>Registrasi</option>");
      $('#status').append("<option value='bayar'>Bayar</option>");

      $('#data-registration').DataTable().destroy();
      load_data();
    });

    $('body').on('click', '.btn-update', function() {
      var id = $(this).data("id");
      $confirm = confirm('Are you sure to update ?');

      if($confirm){
        $.ajax({
          type: "PUT",
          url: '{{route("registration.store")}}/'+id,
          dataType: 'JSON',
          success: function (data) {
            toastr.success('Berhasil update');
            $('#banner-1').html(data[0]);
            $('#banner-2').html(data[1]);
            $('#banner-3').html(data[2]+'<sup style="font-size: 20px">%</sup>');
            $('#banner-4').html(data[3]);
            $('#data-registration').DataTable().destroy();
            load_data();
          },
          error: function (data) {
            toastr.error("Tidak berhasil update")
          }
        });              
      }
    });
    
    $('body').on('click', '.btn-delete', function() {
      var id = $(this).data("id");
      $confirm = confirm('Are you sure to delete ?');

      if($confirm){
        $.ajax({
          type: "DELETE",
          url: '{{route("registration.store")}}/'+id,
          dataType: 'JSON',
          success: function (data) {
            toastr.success('Berhasil menghapus');
            $('#banner-1').html(data[0]);
            $('#banner-2').html(data[1]);
            $('#banner-3').html(data[2]+'<sup style="font-size: 20px">%</sup>');
            $('#banner-4').html(data[3]);
            $('#data-registration').DataTable().destroy();
            load_data();
          },
          error: function (data) {
            toastr.error("Tidak berhasil menghapus")
          }
        });              
      }
    });
    
  });
</script>
@endsection
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
            <h1>Tutor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
              <li class="breadcrumb-item active">Tutor</li>
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
            @component('components.datatable', ['id' => 'data-tutor', 'route' => 'tutor.create'])
              @slot('title')
                List of Tutor
              @endslot
              <th style="width:30px">#</th>
              <th style="width:100px">Foto</th>
              <th>Nama</th>
              <th style="width:250px">Jabatan</th>
              <th style="width:100px">Action</th>
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

    function load_data()
    {
      $("#data-tutor").DataTable({
        // "processing": true,
        "serverSide": true,
        "ajax": {
          url : "{{ route('tutor.index') }}",
        },
        "columns": [
          {
            data: 'DT_RowIndex',
            name: 'id'
          },
          {
            data: "photo" ,
            name: "photo"
          },
          {
            data: "name" ,
            name: "name"
          },
          {
            data: "job" ,
            name: "job"
          },
          {
            data: "action",
            name: "action"
          }
        ],
      });
    }
    
    $('body').on('click', '.btn-delete', function() {
      var id = $(this).data("id");
      $confirm = confirm('Are you sure to delete ?');

      if($confirm){
        $.ajax({
          type: "DELETE",
          url: '{{route("tutor.store")}}/'+id,
          dataType: 'JSON',
          success: function (data) {
            toastr.success('Berhasil menghapus');
            $('#data-tutor').DataTable().destroy();
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
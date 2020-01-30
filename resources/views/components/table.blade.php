<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>
        @if(isset($route))
            @component('components.button-create', ['route' => $route])
            @endcomponent
        @endif
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                {{$head}}
            </tr>
            </thead>
            <tbody>
                {{$body}}
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
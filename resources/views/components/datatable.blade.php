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
        <table id="{{$id}}" class="table table-bordered table-hover">
            <thead>
            <tr>
                {{$slot}}
            </tr>
            </thead>
        </table>
    </div>
    <!-- /.card-body -->
</div>
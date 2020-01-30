<div class="card">
    <div class="card-header">
        <h3 class="card-title">Filter Data</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <select name="fakultas" id="fakultas" class="form-control text-capitalize" required>
                    @foreach ($fakultas as $fakulty)
                        <option value="{{$fakulty->id}}">{{$fakulty->slug}}</option>                    
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <select name="jurusan" id="jurusan" class="form-control text-capitalize" required>
                    @foreach ($jurusans->first() as $jurusan)
                        <option value="{{$jurusan->id}}">{{$jurusan->name}}</option>                    
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <select name="angkatan" id="angkatan" class="form-control" required>
                    @foreach ($angkatans as $angkatan)
                        <option value="{{$angkatan}}">{{$angkatan}}</option>                    
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <button type="button" id="filter" name="filter" class="btn btn-sm btn-success">Filter</button>
                <button type="button" id="reset-filter" name="reset-filter" class="btn btn-sm btn-danger">Reset Filter</button>
            </div>
            {{$slot}}
        </div>
    </div>
</div>

@extends('superadmin.index')

@section('layouts')

<div class="container m-3">
    <div class="d-grip gap-4 d-md-block">
        <a href="/breeding/input" type="button" class="btn btn-outline-primary">Data Breeding</a>
        <a href="/perkawinan/input" type="button" class="btn btn-outline-primary">Data Perkawinan</a>
        <a href="/kelahiran/input" type="button" class="btn btn-outline-primary active">Data Kelahiran</a>
        <a href="/kesehatan/input" type="button" class="btn btn-outline-primary">Data Kesehatan</a>
    </div>

    <div class="alert alert-info mt-3 pb-1" role="alert">
        <strong>Penting !!!</strong>
        <ul>
            <li>Masukkan data anak <strong>setidaknya 1 data</strong> berdasarkan data kelahiran indukan tersebut.</li>
        </ul>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block mt-3">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="card mt-3">
        <div class="card-header" style="background: #435d7d">
            <h2 style="color: white">Input <b>Data Kelahiran</b></h2>
        </div>
        <div class="card-body">
            <form class="m-4" action="/kelahiran/input" method="POST">
                @csrf
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" style="width: 150px" id="">Id Perkawinan</span>
                    <input type="text" class="form-control" name="id_kawin" id="id_kawin" aria-label="id_kawin" aria-describedby="id_kawin">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" style="width: 150px" id="">Tanggal Lahir</span>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" aria-label="tgl_lahir" aria-describedby="tgl_lahir">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart"  style="width: 150px" id="">Jumlah Anak</span>
                    <input type="text" class="form-control" name="jml_anak" id="jml_anak" aria-label="jml_anak" aria-describedby="jml_anak">
                </div>
                @for ($i=0; $i < 4; $i++)
                <div class="row g-3">
                    <div class="col">
                        <div class="input-group mb-3">
                            <span class="input-group-text size-chart" for="id_anak" style="width: 150px">ID Anak {{ $i+1 }}</span>
                          <input type="text" class="form-control" name="id_anak[{{ $i }}]" id="id_anak" placeholder="" {{ ($i == 0) ? 'required' : '' }}>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <span class="input-group-text size-chart" style="width: 150px" for="gender_anak">Gender Anak {{ $i+1 }}</span>
                                <select class="form-select" name="gender_anak[{{ $i }}]" id="gender_anak" {{ ($i == 0) ? 'required' : '' }}>
                                  <option selected>Pilih salah satu</option>
                                  @foreach ($genders as $gender)
                                      <option value="{{ $gender->value }}">{{ $gender->value }}</option>
                                  @endforeach
                                </select>   
                        </div>
                    </div>
                </div>
                @endfor
                <input type="submit" class="btn btn-primary float-end" value="Save" onclick="return confirm('Yakin data sudah benar?')">
            </form>
        </div>
    </div>
</div>
@endsection
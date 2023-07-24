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
                    <input type="text" class="form-control @error('id_kawin') is-invalid @enderror" name="id_kawin" id="id_kawin" aria-label="id_kawin" aria-describedby="id_kawin">
                    @error('id_kawin')
                    <div class="invalid-feedback">
                        ID perkawinan tidak terdaftar
                    </div>
                    @enderror
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" style="width: 150px" id="">Tanggal Lahir</span>
                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" id="tgl_lahir" aria-label="tgl_lahir" aria-describedby="tgl_lahir">
                    @error('tgl_lahir')
                    <div class="invalid-feedback">
                        Tanggal invalid
                    </div>
                    @enderror
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart"  style="width: 150px" id="">Jumlah Anak</span>
                    <input type="text" class="form-control @error('jml_anak') is-invalid @enderror" name="jml_anak" id="jml_anak" aria-label="jml_anak" aria-describedby="jml_anak">
                    @error('jml_anak')
                    <div class="invalid-feedback">
                        Mohon masukkan angka
                    </div>
                    @enderror
                </div>
                <div class="row g-3">
                    <div class="col">
                        <div class="input-group mb-3">
                            <span class="input-group-text size-chart" for="id_anak" style="width: 150px">ID Anakan</span>
                            <textarea type="text" class="form-control @error('id_anak') is-invalid @enderror" name="id_anak" id="id_anak"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <span class="input-group-text size-chart" for="gender_anak" style="width: 150px">Gender Anakan</span>
                            <textarea type="text" class="form-control @error('gender_anak') is-invalid @enderror" name="gender_anak" id="gender_anak"></textarea>
                        </div>
                    </div>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart"  style="width: 150px" id="">Jumlah Anak Mati</span>
                    <input type="text" class="form-control @error('jml_anak_mati') is-invalid @enderror" name="jml_anak_mati" id="jml_anak_mati" aria-label="jml_anak_mati" aria-describedby="jml_anak_mati">
                    @error('jml_anak_mati')
                    <div class="invalid-feedback">
                        Mohon masukkan angka
                    </div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary float-end" value="Save" onclick="return confirm('Yakin data sudah benar?')">
            </form>
        </div>
    </div>
</div>
@endsection
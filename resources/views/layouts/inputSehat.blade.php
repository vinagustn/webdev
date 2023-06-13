@extends('superadmin.index')

@section('layouts')
<div class="container m-3">
    <div class="d-grip gap-4 d-md-block">
        <a href="/breeding/input" type="button" class="btn btn-outline-primary">Data Breeding</a>
        <a href="/perkawinan/input" type="button" class="btn btn-outline-primary">Data Perkawinan</a>
        <a href="/kelahiran/input" type="button" class="btn btn-outline-primary">Data Kelahiran</a>
        <a href="/kesehatan/input" type="button" class="btn btn-outline-primary active">Data Kesehatan</a>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block mt-3">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="card mt-2">
        <div class="card-header" style="background: #435d7d">
            <h2 style="color: white">Input <b>Data Kesehatan</b></h2>
        </div>
        <div class="card-body">
            <form action="/kesehatan/input" method="POST" class="m-4">
                @csrf
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" id="" style="width: 180px">ID Ternak</span>
                    <input type="text" class="form-control  @error('id_ternak') is-invalid @enderror" name="id_ternak" aria-label="id_ternak" aria-describedby="id_ternak" placeholder="ID Ternak Breeding" value="{{ old('id_ternak') }}">
                    @error('id_ternak')
                        <div class="invalid-feedback">
                            ID ternak tidak terdaftar
                        </div>
                    @enderror
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" id="" style="width: 180px">Riwayat Penyakit</span>
                    <textarea type="text" class="form-control  @error('diseas_hst') is-invalid @enderror" name="diseas_hst" aria-label="diseas_hst" aria-describedby="diseas_hst" placeholder="Masukkan riwayat penyakit" value="{{ old('diseas_hst') }}" style="height: 150px"></textarea>
                    @error('diseas_hst')
                        <div class="invalid-feedback">
                            Riwayat penyakit is required
                        </div>
                    @enderror
                </div>
                <div class="input-group mt-3 mb-4">
                    <span class="input-group-text size-chart" id="" style="width: 180px">Riwayat Pengobatan</span>
                    <textarea type="text" class="form-control  @error('treat_hst') is-invalid @enderror" name="treat_hst" aria-label="treat_hst" aria-describedby="treat_hst" placeholder="Masukkan riwayat pengobatan" value="{{ old('treat_hst') }}" style="height: 150px"></textarea>
                    @error('treat_hst')
                        <div class="invalid-feedback">
                            Riwayat Pengobatan is required
                        </div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary float-end" value="Save" onclick="return confirm('Yakin data sudah benar?')">
            </form>
        </div>
    </div>
</div>
@endsection
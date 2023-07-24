@extends('superadmin.index')

@section('layouts')
<div class="container m-3">
    <div class="d-grip gap-4 d-md-block">
        <a href="/breeding/input" type="button" class="btn btn-outline-primary active">Data Breeding</a>
        <a href="/perkawinan/input" type="button" class="btn btn-outline-primary">Data Perkawinan</a>
        <a href="/kelahiran/input" type="button" class="btn btn-outline-primary">Data Kelahiran</a>
        <a href="/kesehatan/input" type="button" class="btn btn-outline-primary">Data Kesehatan</a>
    </div>

    <div class="alert alert-info mt-3 pb-1" role="alert">
        <strong>Penting !!!</strong>
        <ul>
            <li>Umur dituliskan berdasarkan hitungan <strong>bulan</strong>, bukan tahun.</li>
            <li>Penulisan tinggi badan, panjang badan, lingkar dada, serta panjang telinga
                <strong>menggunakan titik</strong> sebagai pengganti koma dengan <strong>satuan sentimeter (cm).</strong>
            </li>
        </ul>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block mt-3">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="card mt-2">
        <div class="card-header" style="background: #435d7d">
            <h2 style="color: white">Input <b>Breeding</b></h2>
        </div>
        <div class="card-body">
            <form action="/breeding/input" method="POST" class="m-4">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text size-chart "  id="" style="width: 150px">Jenis Kelamin</span>
                    <select class="form-select @error('gender') is-invalid @enderror" aria-label="Jenis Kelamin" name="gender">
                        <option>Choose</option>
                        @foreach ($genders as $gender)
                            <option value="{{ $gender->value }}">{{ $gender->value }}</option>
                        @endforeach
                        
                        @error('gender')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                    </select>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" id="" style="width: 150px">Umur</span>
                    <input type="text" class="form-control  @error('umur') is-invalid @enderror" name="umur" aria-label="umur" aria-describedby="umur" value="{{ old('umur') }}">
                    <span class="input-group-text size-expl" style="width: 100px">bulan</span>
                    @error('umur')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" id="" style="width: 150px">Tinggi Badan</span>
                    <input type="text" class="form-control  @error('tinggi') is-invalid @enderror" name="tinggi" aria-label="tinggi" aria-describedby="tinggi" value="{{ old('tinggi') }}">
                    <span class="input-group-text size-expl" style="width: 100px">cm</span>
                    @error('tinggi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" id="" style="width: 150px">Panjang Badan</span>
                    <input type="text" class="form-control  @error('panjang_bdn') is-invalid @enderror" name="panjang_bdn" aria-label="panjang_bdn" aria-describedby="panjang_bdn" value="{{ old('panjang_bdn') }}">
                    <span class="input-group-text size-expl" style="width: 100px">cm</span>
                    @error('panjang_bdn')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" id="" style="width: 150px">Lingkar Dada</span>
                    <input type="text" class="form-control  @error('lingkar') is-invalid @enderror" name="lingkar" aria-label="lingkar" aria-describedby="lingkar" value="{{ old('lingkar') }}">
                    <span class="input-group-text size-expl" style="width: 100px">cm</span>
                    @error('lingkar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mt-3 mb-4">
                    <span class="input-group-text size-chart" id="" style="width: 150px">Panjang Telinga</span>
                    <input type="text" class="form-control  @error('pj_telinga') is-invalid @enderror" name="pj_telinga" aria-label="pj_telinga" aria-describedby="pj_telinga" value="{{ old('pj_telinga') }}">
                    <span class="input-group-text size-expl" style="width: 100px">cm</span>
                    @error('pj_telinga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary float-end" value="Save" onclick="return confirm('Yakin data sudah benar?')">
            </form>
        </div>
    </div>
</div>
@endsection
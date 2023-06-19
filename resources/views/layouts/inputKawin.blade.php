@extends('superadmin.index')

@section('layouts')

<div class="container m-3">
    <div class="d-grip gap-4 d-md-block">
        <a href="/breeding/input" type="button" class="btn btn-outline-primary">Data Breeding</a>
        <a href="/perkawinan/input" type="button" class="btn btn-outline-primary active">Data Perkawinan</a>
        <a href="/kelahiran/input" type="button" class="btn btn-outline-primary">Data Kelahiran</a>
        <a href="/kesehatan/input" type="button" class="btn btn-outline-primary">Data Kesehatan</a>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block mt-3">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="card mt-3">
        <div class="card-header" style="background: #435d7d">
            <h2 style="color: white">Input <b>Data Kawin</b></h2>
        </div>
        <div class="card-body">
            <form class="m-4" action="/perkawinan/input" method="POST">
                @csrf
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart  @error('tgl_kawin') is-invalid @enderror" style="width: 150px" id="">Tanggal Kawin</span>
                    <input type="date" class="form-control" name="tgl_kawin" id="tgl_kawin" aria-label="tgl_kawin" aria-describedby="tgl_kawin">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart  @error('id_jantan') is-invalid @enderror" style="width: 150px" id="">Id Jantan</span>
                    <input type="text" class="form-control" name="id_jantan" id="id_jantan" aria-label="id_jantan" aria-describedby="id_jantan">
                    @error('id_jantan')
                        <div class="invalid-feedback">
                            ID ternak tidak terdaftar
                        </div>
                    @enderror
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart  @error('id_betina') is-invalid @enderror"  style="width: 150px" id="">Id Betina</span>
                    <input type="text" class="form-control" name="id_betina" id="id_betina" aria-label="id_betina" aria-describedby="id_betina">
                    @error('id_betina')
                    <div class="invalid-feedback">
                        ID ternak tidak terdaftar
                    </div>
                @enderror
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" style="width: 150px" id="">Status</span>
                    <select name="status" class="form-select  @error('status') is-invalid @enderror">
                        <option>Choose</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->value }}">{{ $status->value }}</option>
                    @endforeach
                    </select>
                    @error('status')
                    <div class="invalid-feedback">
                        Mohon pilih status
                    </div>
                @enderror
                </div>
                <input type="submit" class="btn btn-primary float-end" value="Save" onclick="return confirm('Yakin data sudah benar?')">
            </form>
        </div>
    </div>
</div>



    {{-- <div class="d-grip gap-4 d-md-block">
        <a href="#breeding" class="btn btn-outline-primary" role="button">
            Data Breeding
        </a>
        <a href="#kawin" class="btn btn-outline-primary" role="button">
            Data Perkawinan
        </a>
        <a href="#kelahiran" class="btn btn-outline-primary" role="button">Data Kelahiran</a>
        <a href="#kesehatan" class="btn btn-outline-primary" role="button">Kesehatan Ternak</a>
    </div>
    
    <div id="breeding">
        <h4 class="mt-5 mb-4">Input Data Breeding</h4>
        <div class="input-group mb-3">
            <span class="input-group-text size-chart" id="">Jenis Kelamin</span>
            <div class="form-check ms-3">
                <input class="form-check-input" type="radio" name="" id="">
                <label class="form-check-label" for="">
                    Jantan
                </label>
            </div>
            <div class="form-check ms-3">
                <input class="form-check-input" type="radio" name="" id="">
                <label class="form-check-label" for="">
                    Betina
                </label>
            </div>
        </div>
        <div class="input-group mt-3 mb-3">
            <span class="input-group-text size-chart" id="">Umur</span>
            <input type="text" class="form-control" aria-label="" aria-describedby="">
            <span class="input-group-text size-expl">bulan</span>
        </div>
        <div class="input-group mt-3 mb-3">
            <span class="input-group-text size-chart" id="">Tinggi Badan</span>
            <input type="text" class="form-control" aria-label="" aria-describedby="">
            <span class="input-group-text size-expl">cm</span>
        </div>
        <div class="input-group mt-3 mb-3">
            <span class="input-group-text size-chart" id="">Panjang Badan</span>
            <input type="text" class="form-control" aria-label="" aria-describedby="">
            <span class="input-group-text size-expl">cm</span>
        </div>
        <div class="input-group mt-3 mb-3">
            <span class="input-group-text size-chart" id="">Lingkar Dada</span>
            <input type="text" class="form-control" aria-label="" aria-describedby="">
            <span class="input-group-text size-expl">cm</span>
        </div>
        <div class="input-group mt-3 mb-4">
            <span class="input-group-text size-chart" id="">Panjang Telinga</span>
            <input type="text" class="form-control" aria-label="" aria-describedby="">
            <span class="input-group-text size-expl">cm</span>
        </div>
        <input type="submit" class="btn btn-primary saving" value="Save">
    </div>
    <div class="collapse" id="kawin">
        <h4 class="mt-5 mb-4">Input Data Perkawinan</h4>
        <div class="input-group mt-3 mb-3">
            <span class="input-group-text size-chart" id="">Id Jantan</span>
            <input type="text" class="form-control" aria-label="" aria-describedby="">
        </div>
        <div class="input-group mt-3 mb-3">
            <span class="input-group-text size-chart" id="">Id Betina</span>
            <input type="text" class="form-control" aria-label="" aria-describedby="">
        </div>
        <div class="input-group mt-3 mb-4">
            <span class="input-group-text size-chart" id="">Tanggal Kawin</span>
            <input type="date" class="form-control" aria-label="" aria-describedby="">
        </div>
        <div class="input-group mt-3 mb-3">
            <span class="input-group-text size-chart" id="">Status</span>
            <input type="input" class="form-control" aria-label="" aria-describedby="">
        </div>
        <div class="input-group mt-3 mb-4">
            <span class="input-group-text size-chart" id="">Riwayat Vitamin</span>
            <textarea class="form-control" style="height: 100px" ></textarea>
        </div>
        <input type="submit" class="btn btn-primary saving" value="Save">
    </div>

    <div id="kelahiran">
        <h4 class="mt-5 mb-4">Input Data Kelahiran</h4>
        <div class="input-group mt-3 mb-3">
            <span class="input-group-text size-chart" id="">Id Jantan</span>
            <input type="text" class="form-control" aria-label="" aria-describedby="">
        </div>
        <div class="input-group mt-3 mb-3">
            <span class="input-group-text size-chart" id="">Id Betina</span>
            <input type="text" class="form-control" aria-label="" aria-describedby="">
        </div>
        <div class="input-group mt-3 mb-3">
            <span class="input-group-text size-chart" id="">Tanggal Lahir</span>
            <input type="date" class="form-control" aria-label="" aria-describedby="">
        </div>
        <div class="input-group mt-3 mb-3">
            <span class="input-group-text size-chart" id="">Foto Anak</span>
            <input type="file" class="form-control" id="inputGroupFile01">
        </div>
        <input type="submit" class="btn btn-primary saving" value="Save">
    </div>

    <div id="kesehatan">
        <h4 class="mt-5 mb-4">Input Data Kesehatan Ternak</h4>
        <div class="input-group mt-3 mb-3">
            <span class="input-group-text size-chart" id="">Id Ternak</span>
            <input type="text" class="form-control" aria-label="" aria-describedby="">
        </div>
        <div class="input-group mt-3 mb-4">
            <span class="input-group-text size-chart" id="">Riwayat Obat</span>
            <textarea class="form-control" style="height: 100px"></textarea>
        </div>
        <input type="submit" class="btn btn-primary saving" value="Save">
    </div> --}}
@endsection
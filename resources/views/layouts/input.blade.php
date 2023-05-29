@extends('superadmin.index')

@section('pages')

    <div class="d-grip gap-2 d-md-block">
        <a href="#breeding" class="btn btn-outline-primary" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="breeding">
            Data Breeding
        </a>
        <a href="#kawin" class="btn btn-outline-primary" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="kawin">
            Data Perkawinan
        </a>
        <a href="#kelahiran" class="btn btn-outline-primary" role="button">Data Kelahiran</a>
        <a href="#kesehatan" class="btn btn-outline-primary" role="button">Kesehatan Ternak</a>
    </div>
    
    <div class="collapse" id="breeding">
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
    </div>
@endsection

@section('CSS')
    {{-- <link rel="stylesheet" href="css/page.css"> --}}
@endsection
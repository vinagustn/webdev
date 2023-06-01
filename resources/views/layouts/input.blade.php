@extends('superadmin.index')

@section('layouts')

<div class="container m-3">
    <div class="d-grip gap-4 d-md-block">
        <a href="/input" type="button" class="btn btn-outline-primary active">Data Breeding</a>
        <a href="/input#kawin" type="button" class="btn btn-outline-primary">Data Perkawinan</a>
        <a href="/input#kelahiran" type="button" class="btn btn-outline-primary">Data Kelahiran</a>
        <a href="/input#kesehatan" type="button" class="btn btn-outline-primary">Data Kesehatan</a>
    </div>
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="card mt-5">
        <div class="card-header"style="background: #435d7d">
            <h2 style="color: white">Input <b>Breeding</b></h2>
        </div>
        <div class="card-body">
            <form action="" method="POST" class="m-4">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text size-chart"  id="" style="width: 150px">Jenis Kelamin</span>
                    <select class="form-select" aria-label="Jenis Kelamin" name="gender">
                        <option>Choose</option>
                        @foreach ($genders as $key=>$value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                        
                      </select>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" id="" style="width: 150px">Umur</span>
                    <input type="text" class="form-control" name="umur" aria-label="" aria-describedby="">
                    <span class="input-group-text size-expl" style="width: 100px">bulan</span>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" id="" style="width: 150px">Tinggi Badan</span>
                    <input type="text" class="form-control" name="tinggi" aria-label="" aria-describedby="">
                    <span class="input-group-text size-expl" style="width: 100px">cm</span>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" id="" style="width: 150px">Panjang Badan</span>
                    <input type="text" class="form-control" name="panjang_bdn" aria-label="" aria-describedby="">
                    <span class="input-group-text size-expl" style="width: 100px">cm</span>
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" id="" style="width: 150px">Lingkar Dada</span>
                    <input type="text" class="form-control" name="lingkar" aria-label="" aria-describedby="">
                    <span class="input-group-text size-expl" style="width: 100px">cm</span>
                </div>
                <div class="input-group mt-3 mb-4">
                    <span class="input-group-text size-chart" id="" style="width: 150px">Panjang Telinga</span>
                    <input type="text" class="form-control" name="pj_telinga" aria-label="" aria-describedby="">
                    <span class="input-group-text size-expl" style="width: 100px">cm</span>
                </div>
                <input type="submit" class="btn btn-primary float-end" value="Save">
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

@section('CSS')
    {{-- <link rel="stylesheet" href="css/page.css"> --}}
@endsection
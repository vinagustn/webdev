@extends('superadmin.index')

@section('layouts')

<div class="container m-3">
    <div class="d-grip gap-4 d-md-block">
        <a href="/input" type="button" class="btn btn-outline-primary">Data Breeding</a>
        <a href="/inputKawin" type="button" class="btn btn-outline-primary active">Data Perkawinan</a>
        <a href="/inputLahir" type="button" class="btn btn-outline-primary">Data Kelahiran</a>
        <a href="/inputSehat" type="button" class="btn btn-outline-primary">Data Kesehatan</a>
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
            <form class="m-4" action="" method="POST">
                @method('patch')
                @csrf
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" style="width: 150px" id="">Tanggal Kawin</span>
                    <input type="date" class="form-control" name="tgl_kawin" id="tgl_kawin" aria-label="tgl_kawin" aria-describedby="tgl_kawin" value="{{ old('tgl_kawin') ?? $marriage->tgl_kawin }}">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" style="width: 150px" id="">Id Jantan</span>
                    <input type="text" class="form-control" name="id_jantan" id="id_jantan" aria-label="id_jantan" aria-describedby="id_jantan" value="{{ old('id_jantan') ?? $marriage->id_jantan }}">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart"  style="width: 150px" id="">Id Betina</span>
                    <input type="text" class="form-control" name="id_betina" id="id_betina" aria-label="id_betina" aria-describedby="id_betina" value="{{ old('id_betina') ?? $marriage->id_betina }}">
                </div>
                <div class="input-group mt-3 mb-3">
                    <span class="input-group-text size-chart" style="width: 150px" id="">Status</span>
                    <select name="status" class="form-select">
                        <option>Choose</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->value }}" >{{ $status->value }}</option>
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary float-end">Save Change</button>
                <a href="/listKawin" class="btn btn-outline-secondary me-2 float-end">Back</a> 
            </form>
        </div>
    </div>
</div>

@endsection
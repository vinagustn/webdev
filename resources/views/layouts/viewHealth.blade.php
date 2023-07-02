@extends('superadmin.index')

@section('layouts')
<div class="container m-3">
    <div class="d-grip gap-4 d-md-block">
        <a href="/breeding/list" type="button" class="btn btn-outline-primary">Data Breeding</a>
        <a href="/perkawinan/list" type="button" class="btn btn-outline-primary">Data Perkawinan</a>
        <a href="/kelahiran/list" type="button" class="btn btn-outline-primary">Data Kelahiran</a>
        <a href="/kesehatan/list" type="button" class="btn btn-outline-primary active">Data Kesehatan</a>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block mt-3">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="card mt-3">
        <div class="card-header"style="background: #435d7d">
            <h2 style="color: white">Data <b>Kesehatan Ternak</b></h2>
        </div>
        <div class="card-body">
            @if ($healths->count())
            <div style="overflow-x: scroll">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">@sortablelink('id_ternak', 'ID Ternak', ['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">Riwayat Penyakit</th>
                        <th scope="col">Riwayat Pengobatan</th>
                        {{-- <th scope="col">Action</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = ($healths->currentpage()-1)*$healths->perpage()+1;
                        @endphp
                        @foreach ($healths as $health)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $health->id_ternak }}</td>
                            <td>{{ $health->diseas_hst }}</td>
                            <td>{{ $health->treat_hst }}</td>
                          </tr>
                        @php
                            $i++
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $healths ->appends(\Request::except('page'))->render() !!}
                </div> 
            </div>
            @else
            <p class="fw-bold text-center" style="font-family: cursive; font-size: 20px">Data tidak ditemukan.</p>
            @endif
            
        </div>
    </div>
</div>
@endsection

@section('search')
<form action="/kesehatan/list" class="d-flex me-3" role="search">
    <input class="form-control me-1" name="search" type="search" placeholder="Search..." aria-label="Search" value="{{ request('search') }}">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
@endsection
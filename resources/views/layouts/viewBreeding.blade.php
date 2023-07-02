@extends('superadmin.index')

@section('layouts')
<div class="container m-3">
    <div class="d-grip gap-4 d-md-block">
        <a href="/breeding/list" type="button" class="btn btn-outline-primary active">Data Breeding</a>
        <a href="/perkawinan/list" type="button" class="btn btn-outline-primary">Data Perkawinan</a>
        <a href="/kelahiran/list" type="button" class="btn btn-outline-primary">Data Kelahiran</a>
        <a href="/kesehatan/list" type="button" class="btn btn-outline-primary">Data Kesehatan</a>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block mt-3">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="alert alert-info mt-3 pb-1" role="alert">
        <strong>Penting !!!</strong>
        <ul>
            <li>Umur berdasarkan hitungan <strong>bulan</strong>, bukan tahun.</li>
            <li>Satuan tinggi badan, panjang badan, lingkar dada, serta panjang telinga
                menggunakan <strong>satuan sentimeter (cm).</strong>
            </li>
        </ul>
    </div>
    
    <div class="card mt-3">
        <div class="card-header"style="background: #435d7d">
            <h2 style="color: white">Data <b>Breeding</b></h2>
        </div>
        <div class="card-body">
            @if ($breedings->count())
            <div style="overflow-x: scroll">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">@sortablelink('id', 'ID Ternak', ['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">@sortablelink('gender','Jenis Kelamin',['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">@sortablelink('umur','Umur',['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">@sortablelink('tinggi','Tinggi Badan',['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">@sortablelink('panjang_bdn','Panjang Badan',['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">@sortablelink('lingkar','Lingkar Dada',['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">@sortablelink('pj_telinga','Panjang Telinga',['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = ($breedings->currentpage()-1)*$breedings->perpage()+1;
                        @endphp
                        @foreach ($breedings as $breeding)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $breeding->id }}</td>
                            <td>{{ $breeding->gender }}</td>
                            <td>{{ $breeding->umur }}</td>
                            <td>{{ $breeding->tinggi }}</td>
                            <td>{{ $breeding->panjang_bdn }}</td>
                            <td>{{ $breeding->lingkar }}</td>
                            <td>{{ $breeding->pj_telinga }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-1">
                                        <a href="/breeding/{{ $breeding->id }}/edit">
                                            <button class="badge text-primary border-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill"  data-toggle="tooltip" title="Edit" viewBox="0 0 16 16">
                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                    
                                    <div class="col-1">
                                        <form method="POST" action="/breeding/list/{{ $breeding->id }}">
                                            @method('delete')
                                            @csrf
                                            <button class="badge text-primary border-0" onclick="return confirm('Yakin akan hapus data?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" data-toggle="tooltip" title="Hapus" viewBox="0 0 16 16">
                                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                          </tr>
                        @php
                            $i++
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mb-3">
                    {!! $breedings->links() !!}
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
<form action="/breeding/list" class="d-flex me-3" role="search">
    <input class="form-control me-1" name="search" type="search" placeholder="Search..." aria-label="Search" value="{{ request('search') }}">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
@endsection
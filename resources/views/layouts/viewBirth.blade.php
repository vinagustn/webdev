@extends('superadmin.index')

@section('layouts')
<div class="container m-3">
    <div class="d-grip gap-4 d-md-block">
        <a href="/breeding/list" type="button" class="btn btn-outline-primary">Data Breeding</a>
        <a href="/perkawinan/list" type="button" class="btn btn-outline-primary">Data Perkawinan</a>
        <a href="/kelahiran/list" type="button" class="btn btn-outline-primary active">Data Kelahiran</a>
        <a href="/kesehatan/list" type="button" class="btn btn-outline-primary">Data Kesehatan</a>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block mt-3">
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="card mt-3">
        <div class="card-header"style="background: #435d7d">
            <h2 style="color: white">Data <b>Kelahiran Ternak</b></h2>
        </div>
        <div class="card-body">
            @if ($births->count())
            <div style="overflow-x: scroll">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">@sortablelink('id', 'ID Kelahiran', ['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">@sortablelink('tgl_kawin','Tanggal Kawin',['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">@sortablelink('id_jantan','ID Jantan',['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">@sortablelink('id_betina','ID Betina',['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">@sortablelink('tgl_lahir','Tanggal Lahir',['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">@sortablelink('jml_anak','Jumlah Anak',['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">ID Anakan</th>
                        <th scope="col">Gender Anakan</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = ($births->currentpage()-1)*$births->perpage()+1;
                        @endphp
                        @foreach ($births as $birth)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $birth->id }}</td>
                            <td>{{ $birth->perkawinan->tgl_kawin }}</td>
                            <td>{{ $birth->perkawinan->id_jantan }}</td>
                            <td>{{ $birth->perkawinan->id_betina }}</td>
                            <td>{{ $birth->tgl_lahir }}</td>
                            <td>{{ $birth->jml_anak }}</td>
                            <td>{{ $birth->id_anak }}</td>
                            <td>{{ $birth->gender_anak }}</td>
                          </tr>
                        @php
                            $i++
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mb-3">
                    {!! $births->links() !!}
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
<form action="/kelahiran/list" class="d-flex me-3" role="search">
    <input class="form-control me-1" name="search" type="search" placeholder="Search..." aria-label="Search" value="{{ request('search') }}">
    <button class="btn btn-outline-success" type="submit">Search</button>
</form>
@endsection
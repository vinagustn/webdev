@extends('superadmin.index')

@section('layouts')

@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ $message }}</strong>
</div>
@endif

<div class="container d-flex justify-content-center">
    <div class="card" style="width: 100%">
        <div class="card-header" style="background: #435d7d">
            <div class="row">
                <div class="col-sm-6">
                    <h2 style="color: white">Manage <b>Employees</b></h2>
                </div>
                <div class="col-sm-6 text-end">
                    <!-- Button trigger modal -->
                    <a type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#register">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" fill="currentColor" class="bi bi-person-fill-add me-2" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                        </svg>
                        <span>Add New Employees</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($users->count())
            <div style="overflow-x: scroll">
            <table class="table">
                <thead>
                    <tr class="">
                        <th scope="col" width="70px">No</th>
                        <th scope="col">@sortablelink('name', 'Nama',['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">@sortablelink('username', 'Username',['filter' => 'active, visible'], ['class' => 'text-decoration-none text-dark', 'rel' => 'nofollow'])</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    
                    @php $i = ($users->currentpage()-1)*$users->perpage()+1; @endphp
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">
                               {{ $i }}
                            </th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-1">
                                        <a href="/users/{{ $user->id }}/edit">
                                            <button data-bs-target="{{ route('editEmployee', $user->id) }}" class="badge text-primary border-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-1">
                                        <form method="POST" action="/users/{{ $user->id }}/delete">
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
                    @php $i++ @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $users ->appends(\Request::except('page'))->render() !!}
            </div> 
            </div> 
            @else
            <p class="fw-bold text-center" style="font-family: cursive; font-size: 20px">Data tidak ditemukan.</p>
            @endif
                      
        </div>
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="tambah" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="tambah">Tambah Admin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                    <label for="name">Nama</label>

                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                    <label for="username">Username</label>

                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror " id="password" placeholder="Password" required>
                    <label for="password">Password</label>

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary mt-4 float-end">Register</button>
            </form>
        </div>
        <div class="modal-footer"></div>
    </div>
    </div>
</div>

@endsection

@section('search')
    <form action="/users" class="d-flex me-3" role="search">
        <input class="form-control me-1" name="search" type="search" placeholder="Search..." aria-label="Search" value="{{ request('search') }}">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
@endsection


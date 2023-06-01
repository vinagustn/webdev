@extends('superadmin.index')

@section('layouts')
<div class="container d-flex justify-content-center">
    <div class="card" style="width: 100%">
        <div class="card-header" style="background: #435d7d">
            <div class="row">
                <div class="col-sm-6">
                    <h2 style="color: white">Edit Data <b>Employees</b></h2>
                </div>
            </div>
        </div>
        <div class="card-body m-5 mt-3 mb-3 float-md-end">
            <form action="" method="POST">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama" value="{{ old('name') ?? $users->name }}">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ old('username') ?? $users->username }}">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                 
                <button type="submit" class="btn btn-primary float-end">Save</button>
                <a href="/users" class="btn btn-outline-secondary me-2 float-end">Back</a> 
            </form>
        </div>
    </div>
</div>
@endsection
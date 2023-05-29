@extends('superadmin.index')

@section('layouts')
<div class="container d-flex justify-content-center">
    <div class="card" style="width: 100%">
        <div class="card-header" style="background: #435d7d">
            <div class="row">
                <div class="col-sm-6">
                    <h2 style="color: white">Edit <b>Employees</b></h2>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @method('patch')
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection


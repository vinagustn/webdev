@extends('superadmin.index')

@section('layouts')
    <ul>
        @forelse ($data as $item)
            <div class="alert alert-info" role="alert">
                {{ $item->message }} <a href="{{ route('edit_kawin', $item->id_kawin) }}" class="alert-link">Klik untuk ubah Status pada ID Kawin {{ $item->id_kawin }}</a>
                <a href="{{ route('baca_notif', $item->id) }}" class="text-danger float-end">Tandai Sebagai Baca</a>
            </div>
        @empty
            <h4>Tidak ada notifikasi.</h4>
        @endforelse
    </ul>
@endsection

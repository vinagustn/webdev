@extends('superadmin.index')

@section('layouts')
    <ul>
        @forelse ($data as $item)
            <li>{{ $item->message }} pada ID Kawin <a href="{{ route('edit_kawin', $item->id_kawin) }}">Klik disini</a> | <a
                    class="text-danger fw-bold" href="{{ route('baca_notif', $item->id) }}">Read Message</a></li>
        @empty
            <h1>Kosong Lur</h1>
        @endforelse
    </ul>
@endsection

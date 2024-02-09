@extends('layouts.master')

@section('title', 'Percakapan Pengguna')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Percakapan Pengguna</h5>
            @foreach ($chats as $chat)
                <div class="chat-item">
                    <p><strong>Waktu:</strong> {{ $chat->created_at }}</p>
                    <p><strong>Pesan:</strong> {{ $chat->message }}</p>
                    <p><strong>Status:</strong>
                        @if ($chat->status == 'accept')
                            <span class="badge badge-pill rounded-pill bg-success font-size-14">Diterima</span>
                        @elseif ($chat->status == 'read')
                            <span class="badge badge-pill rounded-pill bg-warning font-size-14">Dibaca</span>
                        @else
                            <span class="badge bg-secondary">{{ $chat->status }}</span>
                        @endif
                    </p>
                </div>
            @endforeach
            <a href="{{ route('admin.chat.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
@endsection

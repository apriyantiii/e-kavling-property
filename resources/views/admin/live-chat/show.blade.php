@php
    $user = auth()->guard('is_admin')->user();
    $level = $user->level == 'admin' ? 'Admin' : 'Direktur';
@endphp
@extends('layouts.master')
@section('title')
    {{ $level }} - Room Chat
@endsection
@section('css')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            {{ $level }}
        @endslot
        @slot('title')
            Room Chat
        @endslot
    @endcomponent
    <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-1">
        <div class="card">
            <div class="p-3 px-lg-4 border-bottom">
                @if ($allChats->isNotEmpty())
                    @php
                        // Pilih chat pertama dari variabel $allChats
                        $chat = $allChats->first();
                    @endphp
                    <div class="row">
                        <div class="col-xl-4 col-7 justify-content-center">
                            <div class="d-flex align-items-center">
                                <div class="d-flex me-3">
                                    @if ($userId)
                                        <?php $user = \App\Models\User::find($userId); ?>
                                        @if ($user)
                                            <img src="{{ URL::asset('storage/' . $user->avatar) }}" alt=""
                                                class="img-fluid d-block rounded-circle avatar-md">
                                        @endif
                                    @endif
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="font-size-14 mb-1 text-truncate"><a href="#" class="text-dark">
                                            @if ($userId)
                                                <?php $user = \App\Models\User::find($userId); ?>
                                                @if ($user)
                                                    {{ $user->name }}
                                                @endif
                                            @endif
                                        </a></h5>
                                    <p class="text-muted text-truncate mb-0">Online</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-5">
                            <ul class="list-inline user-chat-nav text-end mb-0">
                                <li class="list-inline-item">
                                    <div class="dropdown">
                                        <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-search"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-2">
                                            <form class="px-2">
                                                <div>
                                                    <input type="text" class="form-control border bg-soft-light"
                                                        placeholder="Search...">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-inline-item">
                                    <div class="dropdown">
                                        <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Profile</a>
                                            <a class="dropdown-item" href="#">Archive</a>
                                            <a class="dropdown-item" href="#">Muted</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endif
            </div>

            <div class="chat-conversation p-3" data-simplebar style="max-height: 550px;">
                <ul class="list-unstyled mb-0">
                    @php
                        $lastDate = null;
                    @endphp
                    @foreach ($allChats as $chat)
                        @if ($chat->created_at->format('Y-m-d') != $lastDate)
                            <li class="chat-day-title">
                                <span
                                    class="title">{{ $chat->created_at ? $chat->created_at->format('l, j F Y') : 'Unknown' }}</span>
                            </li>
                            @php
                                $lastDate = $chat->created_at->format('Y-m-d');
                            @endphp
                        @endif
                        @if ($chat->user_id && !$chat->admin_id)
                            <li>
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <div class="flex-1">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <div class="conversation-name">
                                                    </div>
                                                    <p class="mb-0">{{ $chat->message }}</p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        {{-- <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a> --}}
                                                        <form action="{{ route('admin.chat.destroy', $chat->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus chat ini?')">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <span class="font-size-10 float-end mt-1"
                                                    style="margin: auto; padding-left: 0px">{{ $chat->created_at ? $chat->created_at->format('h:i A') : 'Unknown' }}</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        @endif

                        {{-- Bubble Admin --}}
                        @if ($chat->admin_id)
                            <li class="right">
                                <div class="conversation-list">
                                    <div class="d-flex">
                                        <div class="flex-1">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <div class="conversation-name">
                                                    </div>
                                                    <p class="mb-0">{{ $chat->message }}</p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        {{-- <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a> --}}
                                                        <form action="{{ route('admin.chat.destroy', $chat->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="dropdown-item"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus chat ini?')">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <span class="font-size-10 float-end mt-1"
                                                    style="margin: auto; padding-left: 0px">{{ $chat->created_at ? $chat->created_at->format('h:i A') : 'Unknown' }}</span>

                                            </div>
                                        </div>
                                        <img src="{{ URL::asset('assets/images/users/admin.jpg') }}"
                                            class="rounded-circle avatar-sm" alt="">
                                    </div>

                                </div>

                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="p-3 border-top">

                <form method="POST" action="{{ route('admin.chat.store', $userId) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="userId" value="{{ $userId }}">
                    {{-- <input type="hidden" name="product_id"
                                value="{{ $product ? $product->id : old('product_id') }}"> --}}
                    <div class="row">
                        <div class="col">
                            <div class="position-relative">
                                <input type="text"
                                    class="form-control border bg-soft-light @error('message') is-invalid @enderror"
                                    name="message" id="message" placeholder="Kirim Pesan..."
                                    value="{{ old('message') }}" required autocomplete="message">
                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light"><span
                                    class="d-none d-sm-inline-block me-2">Kirim </span> <i
                                    class="mdi mdi-send float-end"></i></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

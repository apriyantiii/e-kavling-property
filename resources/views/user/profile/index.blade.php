@extends('user.layouts.master')
@section('title')
    Akun Saya
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/admin-resources/admin-resources.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container" style="padding-left: 0px; padding-right: 0px; padding-top: 50px;">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <h5 class="card-header bg-soft-primary border-bottom">Foto Profil</h5>
                    <div class="card-body">
                        <h4 class="card-title">Special title treatment</h4>
                        <p class="card-text">With supporting text below as a natural lead-in to
                            additional content.</p>
                        <a href="javascript: void(0);" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-transparent border-bottom">
                        <h5>Ubah Profil Saya</h5>
                        <p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
                    </div>
                    <div class="card-body">
                        {{-- {{ route('user.update', $user) }} --}}
                        <form action="" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">
                                            Nama Pengguna <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                            class="form-control form-rounded @error('name') is-invalid @enderror"
                                            name="name" id="name" placeholder="cth. Lingerie, Shirt S, dll"
                                            value="{{ $user->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">
                                            Email <span class="text-danger">*</span>
                                        </label>
                                        <input type="email"
                                            class="form-control form-rounded @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="cth. PM00"
                                            value="{{ $user->email }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="input-password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" id="input-password" placeholder="Masukkan Kata Sandi"
                                            value="{{ $user->password }}">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-floating-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="location" class="form-label">
                                            Lokasi <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                            class="form-control form-rounded @error('location') is-invalid @enderror"
                                            name="location" id="location" placeholder="cth. Japanan Lor, Jombang"
                                            value="{{ $productCategory->location }}">
                                        @error('location')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <a href="javascript: void(0);"
                                        class="btn btn-primary btn-rounded waves-effect waves-light" data-bs-toggle="modal"
                                        data-bs-target=".confirmModal">Simpan Perubahan
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade confirmModal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header border-bottom-0">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text-center">
                                                        <div class="mb-3">
                                                            <i class="bx bx-check-circle display-4 text-success"></i>
                                                        </div>
                                                        <h5>Konfirmasi perubahan Kategori Produk
                                                        </h5>
                                                    </div>
                                                    <div class="modal-footer justify-content-center">
                                                        <button type="button" class="btn btn-secondary btn-rounded w-md"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary btn-rounded w-md"
                                                            data-bs-dismiss="modal">Konfirmasi</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modal -->
                                    </div>
                                </div> --}}
                            </div>

                        </form>
                        <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light">Go somewhere</a>
                    </div>
                    <div class="card-footer bg-transparent border-top text-muted">
                        2 days ago
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div>
@endsection

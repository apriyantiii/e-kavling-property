@extends('user.profile.layouts.master')

@section('title')
    Akun Saya
@endsection
{{-- @section('css')
@endsection --}}
@include('layouts.head-css')
@section('content')
    <div class="row" id="home-section">
        <div class="col-xl-12">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" height="100px" style="height: 300px; width: 1750px;"
                            src="{{ URL::asset('front-end/images/profile-1.jpg') }}" alt="First slide">
                    </div>
                    {{-- <div class="carousel-item">
                        <img class="d-block img-fluid mx-auto" src="{{ URL::asset('assets/images/carousol-2.png') }}"
                            alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid mx-auto" src="{{ URL::asset('assets/images/carousol-3.png') }}"
                            alt="Third slide">
                    </div> --}}
                </div>
            </div>
        </div><!-- end col -->
    </div> <!-- end row -->

    <div class="row" style="padding-left: 7%; padding-right: 7%">
        <div class="col-lg-4 mt-5">
            <div class="card">
                <h5 class="card-header bg-transparent border-bottom"><strong>Profil Saya</strong></h5>
                <div class="card-body">
                    <h4 class="card-title">Special title treatment</h4>
                    <p class="card-text">With supporting text below as a natural lead-in to
                        additional content.</p>
                    {{-- <div class="row justify-content-center" style="margin-left: 25px">
                        <div class="col-md-6">
                            <div class="mt-4 mt-md-0 mb-3">
                                <img class="img-thumbnail rounded-circle avatar-xxl" alt="200x200"
                                    src="{{ asset('storage/' . Auth::user()->avatar) }}" data-holder-rendered="true">
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row --> --}}

                    <div class="d-flex justify-content-center mb-3">
                        <a href="javascript: void(0);" class="btn btn-primary float-end">Go somewhere</a>
                    </div>

                    <div class="table-responsive-vertical">
                        <table id="datatable" class="table align-middle datatable dt-responsive table-check nowrap"
                            style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">

                            <tr>
                                <td data-label="Nama Pengguna"><strong>Nama Pengguna</strong></td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td data-label="Email"><strong>Email</strong></td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td data-label="Jenis Kelamin"><strong>Jenis Kelamin</strong></td>
                                <td>{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <td data-label="Kontak"><strong>Kontak</strong></td>
                                <td>{{ $user->contact }}</td>
                            </tr>
                            <tr>
                                <td data-label="Alamat"><strong>Alamat</strong></td>
                                <td>{{ $user->address }}</td>
                            </tr>


                        </table>
                    </div>
                </div>

            </div>
        </div><!-- end col -->

        <div class="col-lg-8 mt-5">
            <div class="card">
                <div class="card-header bg-transparent border-bottom">
                    <h5><strong>Edit Profil</strong></h5>
                </div>
                <div class="card-body">
                    {{-- {{ route('user.update', $user) }} --}}
                    <form action="{{ route('profile.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <input type="file" class="form-control" id="avatar" name="avatar"
                                        accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label-sm">
                                        Nama Pengguna
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('name') is-invalid @enderror" name="name"
                                        id="name" placeholder="cth. Fulan" value="{{ $user->name }}">
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
                                        Email
                                    </label>
                                    <input type="email"
                                        class="form-control form-rounded @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="cth. fulan@gmail.com"
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
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">
                                        Jenis Kelamin
                                    </label>
                                    <select class="form-control @error('gender') is-invalid @enderror" data-trigger
                                        name="gender" id="gender">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" @if (old('gender', $user->gender) == 'Laki-laki') selected @endif>
                                            Laki-laki
                                        </option>
                                        <option value="Perempuan" @if (old('gender', $user->gender) == 'Perempuan') selected @endif>
                                            Perempuan
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contact" class="form-label-sm">
                                        Kontak
                                    </label>
                                    <input type="number"
                                        class="form-control form-rounded @error('contact') is-invalid @enderror"
                                        name="contact" id="contact" placeholder="cth. 628.........."
                                        value="{{ $user->contact }}">
                                    @error('contact')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address" class="form-label">
                                        Alamat
                                    </label>
                                    <textarea type="text" class="form-control form-rounded @error('address') is-invalid @enderror" name="address"
                                        id="address" placeholder="cth. Japanan Lor, Jombang" value="">{{ $user->address }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="mt-2">
                            <a href="javascript: void(0);"
                                class="btn btn-primary btn-rounded waves-effect waves-light float-end"
                                data-bs-toggle="modal" data-bs-target=".confirmModal">Simpan Perubahan
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
                        </div>
                    </form>
                    {{-- <a href="javascript: void(0);" class="btn btn-primary waves-effect waves-light">Go
                        somewhere</a> --}}
                </div>

            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection

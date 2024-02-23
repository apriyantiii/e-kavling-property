@extends('layouts.master')
@section('title')
    Edit Pengguna Baru
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.css') }}" rel="stylesheet">

    {{-- select css --}}
    <link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Pengaturan
        @endslot
        @slot('title')
            Edit Pengguna Baru
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 card-title">Edit Pengguna Baru</h4>
                    <p class="card-title-desc mt-2">
                        Edit Pengguna Baru sesuai dengan form di bawah!
                    </p>
                </div>
                <div class="card-body">
                    <form class="needs-validation mt-0 pt-2" novalidate method="POST"
                        action="{{ route('admin.setting-user.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Nama Pengguna
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('name') is-invalid @enderror" name="name"
                                        id="name" placeholder="cth. Perum Merkuri Tengah" value="{{ $user->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="input-password" class="form-label">Password </label>
                                    <input type="password"
                                        class="form-control form-rounded @error('password') is-invalid @enderror"
                                        name="password" id="input-password" placeholder="Masukkan Kata Sandi" required
                                        autocomplete="new-password" value="{{ $user->password }}">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select @error('gender') is-invalid @enderror" name="gender"
                                        id="gender">
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="male"
                                            {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>Laki-laki
                                        </option>
                                        <option value="female"
                                            {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contact" class="form-label">
                                        Kontak
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('contact') is-invalid @enderror"
                                        name="contact" id="contact" placeholder="Nama Lengkap"
                                        value="{{ $user->contact }}">
                                    @error('contact')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">
                                        Email
                                    </label>
                                    <input type="email"
                                        class="form-control form-rounded @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="cth. ptmpg@gmail.com"
                                        value="{{ $user->email }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="avatar" class="form-label">
                                        Upload Profile Pengguna
                                    </label>
                                    <input type="file"
                                        class="form-control form-rounded @error('avatar') is-invalid @enderror"
                                        name="avatar" id="avatar" placeholder=""
                                        value="{{ old('avatar') ? old('avatar') : ($user->avatar ? asset('storage/' . $user->avatar) : '') }}">
                                    @error('avatar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select @error('role') is-invalid @enderror" name="role"
                                        id="role">
                                        <option value="" disabled>Pilih..</option>
                                        <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Pengguna
                                        </option>
                                        {{-- <option value="director" {{ $user->role === 'director' ? 'selected' : '' }}>Director</option> --}}
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat </label>
                                    <textarea class="form-control form-rounded @error('address') is-invalid @enderror" name="address" id="address"
                                        rows="2" placeholder="cth. Japanan Lor, Jombang">{{ $user->address }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <a href="{{ route('admin.setting-user.index') }}"
                                class="btn btn-danger btn-rounded waves-effect waves-light">Batal
                            </a>
                            <button type="submit" class="btn-rounded btn btn-primary waves-effect waves-light">Edit
                                Pengguna Baru</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js') }}"></script>

    {{-- form select --}}
    <script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#trackInventorySwitch").click(function() {
                if ($("#trackInventoryLabel").text() == "Off")
                    $("#trackInventoryLabel").text("On")
                else
                    $("#trackInventoryLabel").text("Off");
            });

            // image preview
            $('#image').change(function() {
                // if any image added before
                if ($('.img-preview').length) {
                    $('.img-preview').attr('src', URL.createObjectURL(this.files[0]));
                } else {
                    var elements = `                          
                        <img class="img-thumbnail img-preview mx-auto d-block my-2">
                    `;

                    $('#img').append(elements);
                    $('.img-preview').attr('src', URL.createObjectURL(this.files[0]));
                }
            });
        });
    </script>
@endsection

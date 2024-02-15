@extends('user.profile.layouts.master')
@section('title')
    Checkout - Validasi Berkas
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@include('layouts.head-css')
@section('content')
    <br>
    <!-- end page title -->
    <div class="container">
        <div class="checkout-tabs">
            <div class="row">
                <div class="col-xl-12">
                    <div class="nav nav-pills flex-column flex-sm-row nav-justified" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link" id="v-pills-shipping-tab" data-bs-toggle="pill" href="#v-pills-shipping"
                            role="tab" aria-controls="v-pills-shipping" aria-selected="false">
                            <i class= "bx bx-book-content d-block check-nav-icon mt-4 mb-2"></i>
                            <p class="fw-bold mb-4">Validasi Data</p>
                        </a>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-shipping" role="tabpanel"
                                    aria-labelledby="v-pills-shipping-tab">
                                    <div>

                                        <h4 class="card-title">Validasi Data Pembeli</h4>
                                        <p class="card-title-desc mb-4">Isi sesuai dengan data diri pembeli karena
                                            dipergunakan untuk keperluan akad jual beli sebagai pihak kedua</p>

                                        <form method="POST" action="{{ route('purchase.updatePurchaseValidation') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="name" class="form-label">
                                                            Nama Lengkap
                                                        </label>
                                                        <input type="text"
                                                            class="form-control form-rounded @error('name') is-invalid @enderror"
                                                            name="name" id="name"
                                                            placeholder="Masukkan Nama Lengkap Pihak Kedua"
                                                            value="{{ $purchaseValidation->name }}">
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="job" class="form-label">
                                                            Pekerjaan
                                                        </label>
                                                        <input type="text"
                                                            class="form-control form-rounded @error('job') is-invalid @enderror"
                                                            name="job" id="job"
                                                            placeholder="Masukkan Pekerjaan Pihak Kedua"
                                                            value="{{ $purchaseValidation->job }}">
                                                        @error('job')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="ktp_file" class="form-label">
                                                            Upload KTP
                                                        </label>
                                                        <input type="file"
                                                            class="form-control form-rounded @error('ktp_file') is-invalid @enderror"
                                                            name="ktp_file" id="ktp_file" placeholder=""
                                                            value="{{ $purchaseValidation->ktp_file }}">
                                                        @error('ktp_file')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="telpon" class="form-label">
                                                            Telepon
                                                        </label>
                                                        <input type="text"
                                                            class="form-control form-rounded @error('telpon') is-invalid @enderror"
                                                            name="telpon" id="telpon"
                                                            placeholder="Masukkan Telepon Pihak Kedua"
                                                            value="{{ $purchaseValidation->telpon }}">
                                                        @error('telpon')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="nik" class="form-label">
                                                            No. KTP/NIK
                                                        </label>
                                                        <input type="number"
                                                            class="form-control form-rounded @error('nik') is-invalid @enderror"
                                                            name="nik" id="nik" placeholder="Masukkan No. KTP/NIK"
                                                            value="{{ $purchaseValidation->nik }}">
                                                        @error('nik')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="age" class="form-label">
                                                            Umur
                                                        </label>
                                                        <input type="number"
                                                            class="form-control form-rounded @error('age') is-invalid @enderror"
                                                            name="age" id="age" placeholder="Masukkan Umur"
                                                            value="{{ $purchaseValidation->age }}" required
                                                            autocomplete="age">
                                                        @error('age')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="kk_file" class="form-label">
                                                            Upload KK
                                                        </label>
                                                        <input type="file"
                                                            class="form-control form-rounded @error('kk_file') is-invalid @enderror"
                                                            name="kk_file" id="kk_file" placeholder=""
                                                            value="{{ $purchaseValidation->kk_file }}">
                                                        @error('kk_file')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="address" class="form-label">
                                                            Alamat Lengkap
                                                        </label>
                                                        <textarea class="form-control form-rounded @error('address') is-invalid @enderror" name="address" id="address"
                                                            placeholder="Alamat lengkap dimulai dari dusun, desa, kecamatan, kabupaten" value="{{ old('address') }}" required
                                                            autocomplete="address" rows="3">{{ $purchaseValidation->address }}</textarea>
                                                        @error('address')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="row my-4">
                                                <div class="col-sm-6">
                                                    <a href="{{ route('waiting-validate', $purchaseValidation->id) }}"
                                                        class="btn text-muted d-none d-sm-inline-block btn-link">
                                                        <i class="mdi mdi-arrow-left me-1"></i> Kembali Tunggu Validasi
                                                    </a>
                                                </div> <!-- end col -->
                                                <div class="col-sm-6">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-success"><i
                                                                class= "bx bx-book-content me-1"></i> Simpan
                                                            Perubahan</button>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end row -->
    @endsection
    @section('script')
        <script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/pages/ecommerce-select2.init.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    @endsection

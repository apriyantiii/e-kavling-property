@extends('layouts.master')
@section('title')
    Edit Berkas {{ $validateId->name }}
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
            Validasi Berkas
        @endslot
        @slot('title')
            Berkas {{ $validateId->name }}
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 card-title">Edit Berkas</h4>
                    <p class="card-title-desc mt-2">
                        Edit Berkas sesuai kebutuhan
                    </p>
                </div>
                <div class="card-body">
                    <form class="needs-validation mt-0 pt-2" novalidate method="POST"
                        action="{{ route('checkout.validate.update', $validateId->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">
                                        Nama Lengkap
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('name') is-invalid @enderror" name="name"
                                        id="name" placeholder="Masukkan Nama Lengkap Pihak Kedua"
                                        value="{{ $validateId->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="nice-select default-select wide form-control solid" name="status">
                                        //onchange="this.form.submit()
                                        <option value="pending"
                                        {{ $validateId->status === 'pending' ? 'selected' : '' }}>
                                        Pending
                                        </option>
                                        <option value="approved"
                                            {{ $validateId->status === 'approved' ? 'selected' : '' }}>
                                            Disetujui
                                        </option>
                                        <option value="rejected"
                                            {{ $validateId->status === 'rejected' ? 'selected' : '' }}>
                                            Ditolak</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="job" class="form-label">
                                        Pekerjaan
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('job') is-invalid @enderror" name="job"
                                        id="job" placeholder="Masukkan Pekerjaan Pihak Kedua"
                                        value="{{ $validateId->job }}">
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
                                        name="ktp_file" id="ktp_file" placeholder="" value="{{ $validateId->ktp_file }}">
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
                                        name="telpon" id="telpon" placeholder="Masukkan Telepon Pihak Kedua"
                                        value="{{ $validateId->telpon }}">
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
                                        class="form-control form-rounded @error('nik') is-invalid @enderror" name="nik"
                                        id="nik" placeholder="Masukkan No. KTP/NIK" value="{{ $validateId->nik }}">
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
                                        class="form-control form-rounded @error('age') is-invalid @enderror" name="age"
                                        id="age" placeholder="Masukkan Umur" value="{{ $validateId->age }}" required
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
                                        name="kk_file" id="kk_file" placeholder="" value="{{ $validateId->kk_file }}">
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
                                        autocomplete="address" rows="3">{{ $validateId->address }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="mt-2 text-end">
                            <a href="javascript: void(0);" class="btn btn-primary btn-rounded waves-effect waves-light"
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
                                                <h5>Konfirmasi perubahan Produk
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

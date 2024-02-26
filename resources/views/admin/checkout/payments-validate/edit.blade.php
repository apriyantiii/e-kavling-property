@extends('layouts.master')
@section('title')
    Edit Pembayaran {{ $paymentId->name }}
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
            Validasi Pembayaran
        @endslot
        @slot('title')
            Pembayaran {{ $paymentId->name }}
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 card-title">Edit Pembayaran</h4>
                    <p class="card-title-desc mt-2">
                        Edit Pembayaran sesuai kebutuhan
                    </p>
                </div>
                <div class="card-body">
                    <form class="needs-validation mt-0 pt-2" novalidate method="POST"
                        action="{{ route('checkout.payment.update', $paymentId->id) }}" enctype="multipart/form-data">
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
                                        value="{{ $paymentId->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="type" class="form-label">
                                        Tipe Pembayaran
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('type') is-invalid @enderror" name="type"
                                        id="type" placeholder="Masukkan Tipe Pembayaran"
                                        value="{{ $paymentId->type }}">
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="home_bank" class="form-label">
                                        Bank Asal
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('home_bank') is-invalid @enderror"
                                        name="home_bank" id="home_bank" placeholder="cth. BRI/BNI/BCA"
                                        value="{{ $paymentId->home_bank }}">
                                    @error('home_bank')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="rekening_name" class="form-label">
                                        Nama Rekening Pengirim
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('rekening_name') is-invalid @enderror"
                                        name="rekening_name" id="rekening_name" placeholder="cth. a.n Umi Laila"
                                        value="{{ $paymentId->rekening_name }}">
                                    @error('rekening_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="transfer" class="form-label">
                                        Bukti Transfer
                                    </label>
                                    <input type="file"
                                        class="form-control form-rounded @error('transfer') is-invalid @enderror"
                                        name="transfer" id="transfer" placeholder="" value="{{ $paymentId->transfer }}">
                                    @error('transfer')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="payment_date" class="form-label">Tanggal
                                        Pembayaran</label>
                                    <input class="form-control form-rounded @error('payment_date') is-invalid @enderror"
                                        type="date" value="2024-02-01" name="payment_date" id="payment_date"
                                        value="{{ $paymentId->payment_date }}">
                                    @error('payment_date')
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
                                        {{ $paymentId->status === 'pending' ? 'selected' : '' }}>
                                        Pending
                                        </option>
                                        <option value="approved" {{ $paymentId->status === 'approved' ? 'selected' : '' }}>
                                            Disetujui
                                        </option>
                                        <option value="rejected" {{ $paymentId->status === 'rejected' ? 'selected' : '' }}>
                                            Ditolak</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="destination_bank" class="form-label">
                                        Bank Tujuan
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('destination_bank') is-invalid @enderror"
                                        name="destination_bank" id="destination_bank" placeholder="cth. BRI/BNI/BCA"
                                        value="{{ $paymentId->destination_bank }}">
                                    @error('destination_bank')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="nominal" class="form-label">
                                        Jumlah Pembayaran
                                    </label>
                                    <input type="number"
                                        class="form-control form-rounded @error('nominal') is-invalid @enderror"
                                        name="nominal" id="nominal" placeholder="cth. Rp. 45.000.000"
                                        value="{{ $paymentId->nominal }}">
                                    @error('nominal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="payment_description" class="form-label mb-1">
                                        Keterangan Pembayaran
                                    </label>
                                    <textarea class="form-control form-rounded @error('payment_description') is-invalid @enderror"
                                        name="payment_description" id="payment_description" placeholder="cth. Pembayaran inhouse tanah 50%"
                                        rows="3">
@if ($paymentId->payment_description)
{{ $paymentId->payment_description }}
@else
Keterangan pembayaran tidak tersedia
@endif
</textarea>
                                    @error('payment_description')
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

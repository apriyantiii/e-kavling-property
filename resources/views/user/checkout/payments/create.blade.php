@extends('user.profile.layouts.master')
@section('title')
    Checkout
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
                        <a class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" href="#v-pills-payment"
                            role="tab" aria-controls="v-pills-payment" aria-selected="false">
                            <i class= "bx bx-money d-block check-nav-icon mt-4 mb-2"></i>
                            <p class="fw-bold mb-4">Validasi Pembayaran</p>
                        </a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-payment" role="tabpanel"
                                    aria-labelledby="v-pills-payment-tab">
                                    <div>
                                        <h4 class="card-title">Informasi Pembayaran</h4>
                                        <p class="card-title-desc mb-0">Masukkan Bukti pembayaran yang valid!</p>
                                        <p class="card-title-desc text-danger mb-2">Pembayaran Selain ke No. Rekening di
                                            Bawah Merupakan PENIPUAN dan diluar Tanggung Jawab Kami!</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5 class="mt-5 mb-3 font-size-15"></h5>
                                            <div class="p-4 border"
                                                style="background-color: rgb(210, 210, 210); border-radius: 20px">
                                                <h5 class="mt-0 mb-3 font-size-15"><strong>Satu Langkah Lagi</strong>
                                                </h5>
                                                <p>Mohon lanjutkan pembayaran melalui nomor rekening berikut</p>

                                                @if ($bank)
                                                    <h5 class="mt-0 mb-3 font-size-15 text-center">
                                                        <strong>{{ $bank->rekening }}</strong>
                                                    </h5>

                                                    <h5 class="mt-0 mb-3 font-size-15 text-center">
                                                        <strong>{{ $bank->bank }} a.n {{ $bank->name }}</strong>
                                                    </h5>
                                                @else
                                                    <p class="text-center">Bank belum tersedia.</p>
                                                @endif

                                                <hr style="border-top: 4px solid #000000; width: 50%;margin: auto;">

                                                <div class="row">
                                                    <div class="col">
                                                        <h5 class="mt-3 mb-3 font-size-15">
                                                            <strong>Bayar :</strong>
                                                        </h5>
                                                    </div>
                                                    <div class="col">
                                                        <h5 class="mt-3 mb-3 font-size-15 text-right">
                                                            <strong>{{ $product->formatted_price }}</strong>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h5 class="mt-5 mb-3 font-size-15">Kirim Bukti Pembayaran</h5>
                                            <div class="p-4 border">
                                                <form method="POST" action="{{ route('checkout.payments.store') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="purchase_validation_id"
                                                        value="{{ $purchaseValidation ? $purchaseValidation->id : old('purchase_validation_id') }}">

                                                    <input type="hidden" name="product_id"
                                                        value="{{ $product ? $product->id : old('product_id') }}">

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="name" class="form-label">
                                                                    Nama Lengkap <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-rounded @error('name') is-invalid @enderror"
                                                                    name="name" id="name"
                                                                    placeholder="Masukkan Nama Lengkap Pihak Kedua"
                                                                    value="{{ old('name') }}" required
                                                                    autocomplete="name">
                                                                @error('name')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="type" class="form-label">Tipe
                                                                    Pembelian<span class="text-danger">*</span>
                                                                    <p class="text-danger">Untuk KPR menunggu bukti
                                                                        pencairan bank</p>
                                                                </label>
                                                                <select
                                                                    class="form-select @error('type') is-invalid @enderror"
                                                                    name="type" id="type" required>
                                                                    <option value="" selected disabled>Pilih Tipe
                                                                    </option>
                                                                    <option value="cash">Cash/Penuh</option>
                                                                    <option value="kpr">KPR</option>
                                                                </select>

                                                                @error('type')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="home_bank" class="form-label">
                                                                    Bank Asal <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-rounded @error('home_bank') is-invalid @enderror"
                                                                    name="home_bank" id="home_bank"
                                                                    placeholder="cth. BRI/BNI/BCA"
                                                                    value="{{ old('home_bank') }}" required
                                                                    autocomplete="home_bank">
                                                                @error('home_bank')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="rekening_name" class="form-label">
                                                                    Nama Rekening Pengirim <span
                                                                        class="text-danger">*</span>
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-rounded @error('rekening_name') is-invalid @enderror"
                                                                    name="rekening_name" id="rekening_name"
                                                                    placeholder="cth. a.n Umi Laila"
                                                                    value="{{ old('rekening_name') }}" required
                                                                    autocomplete="rekening_name">
                                                                @error('rekening_name')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="transfer" class="form-label">
                                                                    Bukti Transfer <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="file"
                                                                    class="form-control form-rounded @error('transfer') is-invalid @enderror"
                                                                    name="transfer" id="transfer" placeholder=""
                                                                    value="{{ old('transfer') }}">
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
                                                                    Pembayaran<span class="text-danger">*</span></label>
                                                                <input
                                                                    class="form-control form-rounded @error('payment_date') is-invalid @enderror"
                                                                    type="date" name="payment_date" id="payment_date"
                                                                    value="{{ date('Y-m-d') }}" required
                                                                    autocomplete="payment_date">
                                                                @error('payment_date')
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
                                                                    value="{{ old('payment_description') }}" rows="3"></textarea>
                                                                @error('payment_description')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="destination_bank" class="form-label">
                                                                    Bank Tujuan <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-rounded @error('destination_bank') is-invalid @enderror"
                                                                    name="destination_bank" id="destination_bank"
                                                                    placeholder="cth. BRI/BNI/BCA"
                                                                    value="{{ old('destination_bank') }}" required
                                                                    autocomplete="destination_bank">
                                                                @error('destination_bank')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group mb-3">
                                                                <label for="nominal" class="form-label">
                                                                    Jumlah Pembayaran <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="number"
                                                                    class="form-control form-rounded @error('nominal') is-invalid @enderror"
                                                                    name="nominal" id="nominal"
                                                                    placeholder="cth. Rp. 45.000.000"
                                                                    value="{{ old('nominal') }}" required
                                                                    autocomplete="nominal">
                                                                @error('nominal')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row my-4">
                                                        <div class="col-sm-6">
                                                            <a href="{{ route('checkout.confirmation', ['productId' => $product->id]) }}"
                                                                class="btn text-muted d-none d-sm-inline-block btn-link">
                                                                <i class="mdi mdi-arrow-left me-1"></i> Kembali</a>
                                                        </div> <!-- end col -->
                                                        <div class="col-sm-6">
                                                            <div class="text-end">
                                                                <button type="submit" class="btn btn-success"><i
                                                                        class= "bx bx-money me-1"></i> Simpan
                                                                    Bukti Pembayaran</button>
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

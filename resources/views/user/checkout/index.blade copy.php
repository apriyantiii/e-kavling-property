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
                        <a class="nav-link active" id="v-pills-shipping-tab" data-bs-toggle="pill" href="#v-pills-shipping"
                            role="tab" aria-controls="v-pills-shipping" aria-selected="true">
                            <i class= "bx bx-book-content d-block check-nav-icon mt-4 mb-2"></i>
                            <p class="fw-bold mb-4">Validasi Data</p>
                        </a>
                        <a class="nav-link" id="v-pills-confir-tab" data-bs-toggle="pill" href="#v-pills-confir"
                            role="tab" aria-controls="v-pills-confir" aria-selected="false">
                            <i class= "bx bx-badge-check d-block check-nav-icon mt-4 mb-2"></i>
                            <p class="fw-bold mb-4">Konfirmasi Pembelian</p>
                        </a>
                        <a class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" href="#v-pills-payment"
                            role="tab" aria-controls="v-pills-payment" aria-selected="false">
                            <i class= "bx bx-money d-block check-nav-icon mt-4 mb-2"></i>
                            <p class="fw-bold mb-4">Validasi Pembayaran</p>
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

                                        <form method="POST" action="#" enctype="multipart/form-data">
                                            @csrf

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
                                                            value="{{ old('name') }}" required autocomplete="name">
                                                        @error('name')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="job" class="form-label">
                                                            Pekerjaan <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text"
                                                            class="form-control form-rounded @error('job') is-invalid @enderror"
                                                            name="job" id="job"
                                                            placeholder="Masukkan Pekerjaan Pihak Kedua"
                                                            value="{{ old('job') }}" required autocomplete="job">
                                                        @error('job')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="phone" class="form-label">
                                                            Telepon <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text"
                                                            class="form-control form-rounded @error('phone') is-invalid @enderror"
                                                            name="phone" id="phone"
                                                            placeholder="Masukkan Telepon Pihak Kedua"
                                                            value="{{ old('phone') }}" required autocomplete="phone">
                                                        @error('phone')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="nik" class="form-label">
                                                            No. KTP/NIK <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="number"
                                                            class="form-control form-rounded @error('nik') is-invalid @enderror"
                                                            name="nik" id="nik" placeholder="Masukkan No. KTP/NIK"
                                                            value="{{ old('nik') }}" required autocomplete="nik">
                                                        @error('nik')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group mb-3">
                                                        <label for="old" class="form-label">
                                                            Umur <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="number"
                                                            class="form-control form-rounded @error('old') is-invalid @enderror"
                                                            name="old" id="old" placeholder="Masukkan No. KTP"
                                                            value="{{ old('old') }}" required autocomplete="old">
                                                        @error('old')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    {{-- <div class="row">
                                                        <div class="col">
                                                            <div class="form-group mb-3">
                                                                <label for="place_of_birth" class="form-label">
                                                                    Tempat Lahir <span class="text-danger">*</span>
                                                                </label>
                                                                <input type="text"
                                                                    class="form-control form-rounded @error('place_of_birth') is-invalid @enderror"
                                                                    name="place_of_birth" id="place_of_birth"
                                                                    placeholder="Masukkan Tempat Lahir"
                                                                    value="{{ old('place_of_birth') }}" required
                                                                    autocomplete="place_of_birth">
                                                                @error('place_of_birth')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group mb-3">
                                                                <label for="date_of_birth" class="form-label">Tanggal
                                                                    Lahir<span class="text-danger">*</span></label>
                                                                <input
                                                                    class="form-control form-rounded @error('date_of_birth') is-invalid @enderror"
                                                                    type="date" value="2019-08-19"
                                                                    name="date_of_birth" id="date_of_birth"
                                                                    value="{{ old('date_of_birth') }}" required
                                                                    autocomplete="date_of_birth">
                                                                @error('date_of_birth')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div> --}}

                                                    {{-- <label for="billing-address"
                                                            class="col-form-label">Address</label>
                                                        <textarea class="form-control" id="billing-address" rows="3" placeholder="Enter full address"></textarea> --}}

                                                    <div class="form-group mb-3">
                                                        <label for="address" class="form-label">
                                                            Alamat Lengkap <span class="text-danger">*</span>
                                                        </label>
                                                        <textarea class="form-control form-rounded @error('address') is-invalid @enderror" name="address" id="address"
                                                            placeholder="Alamat lengkap dimulai dari dusun, desa, kecamatan, kabupaten" value="{{ old('address') }}" required
                                                            autocomplete="address" rows="3"></textarea>
                                                        @error('address')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-payment" role="tabpanel"
                                    aria-labelledby="v-pills-payment-tab">
                                    <div>
                                        <h4 class="card-title">Payment Information</h4>
                                        <p class="card-title-desc mb-4">Fill all information below</p>

                                        <div>
                                            <div class="form-check form-check-inline font-size-16">
                                                <input class="form-check-input" type="radio" name="paymentoptionsRadio"
                                                    id="paymentoptionsRadio1" checked>
                                                <label class="form-check-label font-size-13" for="paymentoptionsRadio1"><i
                                                        class="fab fa-cc-mastercard me-1 font-size-20 align-top"></i>
                                                    Credit / Debit Card</label>
                                            </div>
                                            <div class="form-check form-check-inline font-size-16">
                                                <input class="form-check-input" type="radio" name="paymentoptionsRadio"
                                                    id="paymentoptionsRadio2">
                                                <label class="form-check-label font-size-13" for="paymentoptionsRadio2"><i
                                                        class="fab fa-cc-paypal me-1 font-size-20 align-top"></i>
                                                    Paypal</label>
                                            </div>
                                            <div class="form-check form-check-inline font-size-16">
                                                <input class="form-check-input" type="radio" name="paymentoptionsRadio"
                                                    id="paymentoptionsRadio3">
                                                <label class="form-check-label font-size-13" for="paymentoptionsRadio3"><i
                                                        class="far fa-money-bill-alt me-1 font-size-20 align-top"></i> Cash
                                                    on Delivery</label>
                                            </div>
                                        </div>

                                        <h5 class="mt-5 mb-3 font-size-15">For card Payment</h5>
                                        <div class="p-4 border">
                                            <form>
                                                <div class="form-group mb-0">
                                                    <label for="cardnumberInput">Card Number</label>
                                                    <input type="text" class="form-control" id="cardnumberInput"
                                                        placeholder="0000 0000 0000 0000">
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group mt-4 mb-0">
                                                            <label for="cardnameInput">Name on card</label>
                                                            <input type="text" class="form-control" id="cardnameInput"
                                                                placeholder="Name on Card">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group mt-4 mb-0">
                                                            <label for="expirydateInput">Expiry date</label>
                                                            <input type="text" class="form-control"
                                                                id="expirydateInput" placeholder="MM/YY">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="form-group mt-4 mb-0">
                                                            <label for="cvvcodeInput">CVV Code</label>
                                                            <input type="text" class="form-control" id="cvvcodeInput"
                                                                placeholder="Enter CVV Code">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-confir" role="tabpanel"
                                    aria-labelledby="v-pills-confir-tab">
                                    <div class="card shadow-none border mb-0">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Order Summary</h4>

                                            <div class="table-responsive">
                                                <table class="table align-middle mb-0 table-nowrap">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">Product</th>
                                                            <th scope="col">Product Desc</th>
                                                            <th scope="col">Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row"><img
                                                                    src="{{ URL::asset('assets/images/product/img-1.png') }}"
                                                                    alt="product-img" title="product-img"
                                                                    class="avatar-md"></th>
                                                            <td>
                                                                <h5 class="font-size-14 text-truncate"><a
                                                                        href="{{ url('ecommerce-product-detail') }} "
                                                                        class="text-dark">Half sleeve T-shirt (64GB) </a>
                                                                </h5>
                                                                <p class="text-muted mb-0">$ 450 x 1</p>
                                                            </td>
                                                            <td>$ 450</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"><img
                                                                    src="{{ URL::asset('assets/images/product/img-7.png') }}"
                                                                    alt="product-img" title="product-img"
                                                                    class="avatar-md"></th>
                                                            <td>
                                                                <h5 class="font-size-14 text-truncate"><a
                                                                        href="{{ url('ecommerce-product-detail') }}"
                                                                        class="text-dark">Wireless Headphone </a></h5>
                                                                <p class="text-muted mb-0">$ 225 x 1</p>
                                                            </td>
                                                            <td>$ 225</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <h6 class="m-0 text-end">Sub Total:</h6>
                                                            </td>
                                                            <td>
                                                                $ 675
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <div class="bg-soft-primary p-3 rounded">
                                                                    <h5 class="font-size-14 text-primary mb-0"><i
                                                                            class="fas fa-shipping-fast me-2"></i> Shipping
                                                                        <span class="float-end">Free</span>
                                                                    </h5>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <h6 class="m-0 text-end">Total:</h6>
                                                            </td>
                                                            <td>
                                                                $ 675
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-sm-6">
                            <a href="{{ url('ecommerce-cart') }}"
                                class="btn text-muted d-none d-sm-inline-block btn-link">
                                <i class="mdi mdi-arrow-left me-1"></i> Back to Shopping Cart </a>
                        </div> <!-- end col -->
                        <div class="col-sm-6">
                            <div class="text-end">
                                <a href="{{ url('ecommerce-checkout') }}" class="btn btn-success">
                                    <i class="mdi mdi-truck-fast me-1"></i> Proceed to Shipping </a>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
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

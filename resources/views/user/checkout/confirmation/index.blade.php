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

                        <a class="nav-link" id="v-pills-confir-tab" data-bs-toggle="pill" href="#v-pills-confir"
                            role="tab" aria-controls="v-pills-confir" aria-selected="false">
                            <i class= "bx bx-badge-check d-block check-nav-icon mt-4 mb-2"></i>
                            <p class="fw-bold mb-4">Konfirmasi Pembelian</p>
                        </a>

                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-confir" role="tabpanel"
                                    aria-labelledby="v-pills-confir-tab">
                                    <div class="card shadow-none border mb-0">
                                        <div class="card-body">
                                            <h4 class="card-title mb-4">Rincian Pesanan</h4>

                                            <div class="table-responsive">
                                                <table class="table align-middle mb-0 table-nowrap">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col">Properti</th>
                                                            <th scope="col">Atas Nama</th>
                                                            <th scope="col">Detail</th>
                                                            <th scope="col">Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row"><img
                                                                    src="{{ URL::asset('storage/' . $product->photo) }}"
                                                                    alt="product-img" title="product-img" class="avatar-md">
                                                            </th>
                                                            <td>
                                                                <h5 class="font-size-14 text-truncate text-dark">
                                                                    {{ $user->name }}
                                                                </h5>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-size-14 text-truncate"><a
                                                                        href="{{ route('product.show', $product->id) }}"
                                                                        class="text-dark">{{ $product->name }} </a>
                                                                </h5>
                                                                <p class="text-muted mb-0">{{ $product->location }} </p>
                                                            </td>
                                                            <td>{{ $product->formatted_price }}</td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="3">
                                                                <h6 class="m-0 text-end">Sub Total:</h6>
                                                            </td>
                                                            <td>
                                                                {{ $product->formatted_price }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">
                                                                <div class="bg-soft-primary p-3 rounded">
                                                                    <h5 class="font-size-14 text-primary mb-0"><i
                                                                            class="fas fa-shipping-fast me-2"></i> Shipping
                                                                        <span class="float-end">Free</span>
                                                                    </h5>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <h6 class="m-0 text-end">Total:</h6>
                                                            </td>
                                                            <td>
                                                                {{ $product->formatted_price }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <p class="mt-3">Pilih tipe pembayaran di bawah untuk <b
                                                    class="text-success">KPR atau Cash tekan
                                                    tombol hijau</b> dan untuk <b class="text-primary">Inhouse tekan tombol
                                                    kuning</b></p>
                                            <div class="row my-4">

                                                <div class="col-sm-12">
                                                    <div class="row justify-content-end">
                                                        <div class="col-auto">
                                                            <div class="text-end mb-0"> <!-- Menambahkan margin bawah -->
                                                                <a href="{{ route('checkout.payments', ['productId' => $product->id]) }}"
                                                                    class="btn btn-success">
                                                                    <i class="mdi mdi-cash me-1"></i> Pembayaran KPR/Cash
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="text-center">
                                                                <a href="{{ route('checkout.inhouse-payments', ['productId' => $product->id]) }}"
                                                                    class="btn btn-primary">
                                                                    <i class="mdi mdi-cash me-1"></i> Pembayaran Inhouse
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div> <!-- end row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-sm-6">
                            <a href="{{ route('checkout.data-validate') }}"
                                class="btn text-muted d-none d-sm-inline-block btn-link">
                                <i class="mdi mdi-arrow-left me-1"></i> Kembali</a>
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

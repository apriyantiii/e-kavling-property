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
                                        @if (session()->has('success'))
                                            @include('components.alert.success', [
                                                'type' => session('type', 'success'),
                                                'delay' => session('delay', 2500),
                                                'message' => session('success'),
                                            ])
                                        @endif

                                        @if (session()->has('failure'))
                                            @include('components.alert.failure', [
                                                'type' => session('type', 'failure'),
                                                'delay' => session('delay', 2500),
                                                'message' => session('failure'),
                                            ])
                                        @endif
                                        <h3 class="card-title text-center mt-5"><strong>Validasi Data Pembelian
                                                <b class="text-danger">Ditolak!</b></strong></h3><br>
                                        <h4 class="card-title-desc text-center mb-2">Kembali ke halaman properti untuk
                                            memilih properti yang lain.</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-sm-6">
                                    <a href="{{ route('home.properti') }}"
                                        class="btn text-muted d-none d-sm-inline-block btn-link">
                                        <i class="mdi mdi-arrow-left me-1"></i> Kembali
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col -->
                    {{-- <div class="col-sm-6">
                                    <div class="text-end">
                                        <a href="{{ url('ecommerce-checkout') }}" class="btn btn-success">
                                            <i class="mdi mdi-truck-fast me-1"></i> Proceed to Shipping </a>
                                    </div>
                                </div> <!-- end col --> --}}
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

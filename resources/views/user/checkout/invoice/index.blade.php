@extends('user.profile.layouts.master')
@section('title')
    Rincian Pembelian
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@include('layouts.head-css')
@section('content')
    <br><br>

    <div class="row mb-5">
        <div class="container">
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

            <div class="flex-shrink-0 mb-5">
                <ul class="rounded nav nav-tabs-custom card-header-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#products" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-boxes"></i></span>
                            <span class="d-none d-sm-block fw-bold">Validasi Berkas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#product-categories" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-indent"></i></span>
                            <span class="d-none d-sm-block fw-bold">Pembayaran</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Tab panes -->
            <div class="tab-content text-muted">
                <div class="tab-pane active" id="products" role="tabpanel">
                    @foreach ($purchaseValidation as $validation)
                        <div class="card" style="border-radius: 20px">
                            <div class="card-body">
                                <h3 class="card-title mt-0 text-end" style="margin-bottom: 10px">
                                    <strong>Status Berkas:
                                        @if ($validation->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif ($validation->status == 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $validation->status }}</span>
                                        @endif
                                    </strong>
                                </h3>
                                <hr style="border-top: 2px solid #000000; margin-top: 0px;">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="{{ URL::asset('storage/' . $validation->product->photo) }}"
                                            alt="product-img" title="product-img" class="avatar-xxl" />
                                    </div>

                                    <div class="col-md-6 text-start">
                                        <h5>{{ $validation->product->name }}</h5>
                                        <p>{{ $validation->product->location }}</p>
                                        <br>
                                        <h6><strong>Atas Nama: {{ $validation->name }}</strong></h6>
                                    </div>

                                    <div class="col-md-4 text-end">
                                        @if ($validation->product)
                                            <h4>{{ $validation->product->formatted_price }}</h4>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12 text-end">
                                        <h5><a href="{{ route('checkout.invoice.validate', $validation->id) }}">
                                                Selengkapnya <i class="mdi mdi-arrow-right me-1"></i></a></h5>
                                    </div> <!-- end col -->
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end card -->
                    @endforeach
                </div>


                {{-- payments --}}
                <div class="tab-pane" id="product-categories" role="tabpanel">
                    @foreach ($payments as $payment)
                        <div class="card" style="border-radius: 20px">
                            <div class="card-body">
                                <h3 class="card-title mt-0 text-end" style="margin-bottom: 10px">
                                    <strong>Status Berkas:
                                        @if ($payment->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif ($payment->status == 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $payment->status }}</span>
                                        @endif
                                    </strong>
                                </h3>
                                <hr style="border-top: 2px solid #000000; margin-top: 0px;">
                                <div class="row">
                                    <div class="col-md-2">
                                        <img src="{{ URL::asset('storage/' . $payment->product->photo) }}"
                                            alt="product-img" title="product-img" class="avatar-xxl" />
                                    </div>

                                    <div class="col-md-6 text-start">
                                        <h5>{{ $payment->product->name }}</h5>
                                        <p>{{ $payment->product->location }}</p>
                                        <br>
                                        <h6><strong>Atas Nama: {{ $payment->name }}</strong></h6>
                                    </div>

                                    <div class="col-md-4 text-end">
                                        @if ($payment->product)
                                            <h4>{{ $payment->product->formatted_price }}</h4>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12 text-end">
                                        <h5><a href="{{ route('checkout.invoice.payment', $payment->id) }}">
                                                Selengkapnya <i class="mdi mdi-arrow-right me-1"></i></a></h5>
                                    </div> <!-- end col -->
                                </div> <!-- end row-->
                            </div>
                        </div> <!-- end card -->
                    @endforeach
                </div>
            </div>


            {{-- <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mt-0 text-end" style="margin-bottom: 10px"><strong>Status Pembelian:
                            </strong>
                        </h3>
                        <hr style="border-top: 2px solid #000000; margin-top: 0px;">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="" alt="product-img" title="product-img" class="avatar-xl" />
                            </div>
                            <div class="col-md-5">
                                <h4>
                                    @if (isset($product))
                                        <p>Nama Produk: {{ $product->name }}</p>
                                    @endif
                                </h4>
                            </div>
                            <div class="col-md-4 text-end">
                                <img src="" alt="product-img" title="product-img" class="avatar-xl" />
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 text-end">
                                <a href="{{ route('home.properti') }}">
                                    Selengkapnya <i class="mdi mdi-arrow-right me-1"></i></a>
                            </div> <!-- end col -->

                        </div> <!-- end row-->
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ URL::asset('assets/js/pages/ecommerce-cart.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

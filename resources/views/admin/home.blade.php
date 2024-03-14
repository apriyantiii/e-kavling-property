@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/admin-resources/admin-resources.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title')
            Hi, {{ Auth::guard('is_admin')->user()->name }} !
        @endslot
    @endcomponent

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="row">
        {{-- Total Kategori Start --}}
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-50">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate text-center">Total Kategori
                                Properti</span>
                            <h4 class="mb-2 text-center">
                                <span>{{ $categoryCount }}</span>
                            </h4>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        {{-- Total Properti Start --}}
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-50">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate text-center">Total Properti</span>
                            <h4 class="mb-2 text-center">
                                <span>{{ $propertiCount }}</span>
                            </h4>

                        </div>

                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col-->

        {{-- Total Penjualan Start --}}
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-50">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-2 lh-1 d-block text-truncate text-center">Total Penjualan</span>
                            <div class="mb-0 text-center">
                                <div class="row">
                                    <div class="col">
                                        <span class="text-muted mb-1 lh-1 d-block text-truncate text-center">Cash/KPR</span>
                                        <span><strong>{{ $paymentsCount }}</strong></span>
                                    </div>
                                    <div class="col">
                                        <span
                                            style="display: inline-block; border-left: 1px solid #8c8c8c; height: 25px; margin: 0 10px;"></span>
                                    </div>
                                    <div class="col">
                                        <span class="text-muted mb-1 lh-1 d-block text-truncate text-center">inhouse</span>
                                        <span><strong>{{ $inhouseCount }}</strong></span>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col-->

        {{-- Total Pengguna Start --}}
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-50">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate text-center">Total Pengguna</span>
                            <h4 class="mb-2 text-center">
                                <span>{{ $usersCount }}</span>
                            </h4>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->

    {{-- Chart Penjualan Start --}}
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    {!! $monthlyPurchaseChartData->container() !!}

                </div>
            </div>
        </div> <!-- end col -->

        {{-- Chart Lokasi Properti --}}
        <div class="col-xl-6">
            <div class="card">

                <div class="card-body">

                    {!! $locationChartData->container() !!}

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    {{-- Daftar Pembeli Start --}}
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Daftar Pembeli Tanah</h4>
                </div><!-- end card header -->

                <div class="px-3 mt-2" data-simplebar style="max-height: 386px;">
                    @foreach ($usersWithApprovedPayments as $user)
                        <div class="d-flex align-items-center pb-4">
                            <div class="avatar-md me-4">
                                {{-- <img src="{{ URL::asset('./assets/images/users/avatar-2.jpg') }}"
                                class="img-fluid rounded-circle" alt=""> --}}
                                @if (!empty($user->avatar))
                                    <img src="{{ URL::asset('storage/' . $user->avatar) }}" class="rounded-circle avatar-md"
                                        alt="">
                                @else
                                    <img src="{{ URL::asset('assets/images/users/user.png') }}"
                                        class="rounded-circle avatar-md" alt="">
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="font-size-15 mb-1"><a href="{{ route('admin.setting-user.index') }}"
                                        class="text-dark">{{ $user->name }}</a>
                                </h5>
                                <span class="text-muted">{{ $user->email }}</span>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        {{-- Produk Terjual Start --}}
        <div class="col-xl-5">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Produk Terjual</h4>
                </div><!-- end card header -->

                <div class="card-body px-0 pt-2 ">
                    <div class="table-responsive border-0 px-3" data-simplebar style="max-height: 395px;">
                        <table class="table align-middle table-nowrap ">
                            <tbody>
                                @foreach ($productsWithApprovedPayments as $product)
                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="avatar-md me-4">
                                                <img src="{{ URL::asset('storage/' . $product->photo) }}" class="img-fluid"
                                                    alt="">
                                            </div>
                                        </td>

                                        <td>
                                            <div>
                                                <h5 class="font-size-15"><a
                                                        href="{{ route('detail.product.admin', $product->id) }}"
                                                        class="text-dark">{{ $product->name }}</a></h5>
                                                <span class="text-muted">{{ $product->price }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        {{-- Chat Masuk Start --}}
        <div class="col-xl-3">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Chat Masuk</h4>
                </div><!-- end card header -->

                <div class="card-body px-0 pt-2 ">
                    <div class="table-responsive border-0 px-3" data-simplebar style="max-height: 395px;">
                        <table class="table align-middle table-nowrap ">
                            <tbody>
                                @foreach ($latestChats as $chat)
                                    <tr>
                                        <td>
                                            <div>
                                                <h5 class="font-size-15"><a
                                                        href="{{ route('admin.chat.show', $chat->id) }}"
                                                        class="text-dark">{{ $chat->user->name }}</a></h5>
                                                <span class="text-muted">{{ $chat->message }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div><!-- end row -->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/admin-resources/admin-resources.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script src="{{ $monthlyPurchaseChartData->cdn() }}"></script>
    {{ $monthlyPurchaseChartData->script() }}

    <script src="{{ $locationChartData->cdn() }}"></script>
    {{ $locationChartData->script() }}
@endsection

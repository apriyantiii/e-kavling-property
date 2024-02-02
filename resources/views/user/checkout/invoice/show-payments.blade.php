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

            <div class="card" style="border-radius: 20px">
                <div class="card-body">
                    <h3 class="card-title mt-0 text-end" style="margin-bottom: 10px">
                        <strong>Status Berkas:
                            @if ($payments->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif ($payments->status == 'approved')
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-secondary">{{ $payments->status }}</span>
                            @endif
                        </strong>
                    </h3>
                    <hr style="border-top: 2px solid #000000; margin-top: 0px;">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ URL::asset('storage/' . $payments->product->photo) }}" alt="product-img"
                                title="product-img" class="avatar-xxl" />
                        </div>

                        <div class="col-md-6 text-start">
                            <h4>{{ $payments->product->name }}</h4>
                            <p>{{ $payments->product->location }}</p>
                            <br>
                            <h5><strong>Atas Nama: {{ $payments->name }}</strong></h5>
                        </div>

                        <div class="col-md-4 text-end">
                            @if ($payments->product)
                                <h4>{{ $payments->product->price }}</h4>
                            @endif
                        </div>
                    </div>

                    <div class="table-responsive-vertical text-end" style="float: right;">
                        <table id="datatable" class="table align-middle datatable dt-responsive table-check nowrap"
                            style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">

                            <tr colspan="3">
                                <td data-label="Total Pembayaran"><strong>Total Pembayaran</strong></td>
                                <td>{{ $payments->product->price }}</td>
                            </tr>
                            <tr>
                                <td data-label="Tanggal Pembayaran"><strong>Tanggal Pembayaran</strong></td>
                                <td>{{ $payments->payment_date }}</td>
                            </tr>
                            <tr>
                                <td data-label="Tipe Pembelian"><strong>Tipe Pembelian</strong></td>
                                <td>
                                    {{ $payments->type }}
                                </td>
                            </tr>
                            <tr>
                                <td data-label="Tenor"><strong>Tenor</strong></td>
                                <td>
                                    @if ($payments->tenor !== null)
                                        {{ $payments->tenor }}
                                    @else
                                        <span class="text-danger">Tidak menggunakan tenor</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td data-label="Pembayaran Dari"><strong>Pembayaran Dari</strong></td>
                                <td>{{ $payments->home_bank }}</td>
                            </tr>
                            <tr>
                                <td data-label="Pembayaran Ke"><strong>Pembayaran Ke</strong></td>
                                <td>{{ $payments->destination_bank }}</td>
                            </tr>
                            <tr>
                                <td data-label="Nominal Pembayaran"><strong>Nominal Pembayaran</strong></td>
                                <td>{{ $payments->nominal }}</td>
                            </tr>
                            <tr>
                                <td data-label="Dibuat Pada"><strong>Dibuat Pada</strong></td>
                                <td>{{ $payments->created_at }}</td>
                            </tr>
                        </table>
                    </div>

                    {{-- <div class="row mt-4">
                        <div class="col-md-12 text-end">
                            <h5><a href="{{ route('checkout.invoice.validate', $purchaseValidation->id) }}">
                                    Selengkapnya <i class="mdi mdi-arrow-right me-1"></i></a></h5>
                        </div> <!-- end col -->
                    </div> <!-- end row--> --}}
                </div>
            </div> <!-- end card -->

        </div>

    </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ URL::asset('assets/js/pages/ecommerce-cart.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

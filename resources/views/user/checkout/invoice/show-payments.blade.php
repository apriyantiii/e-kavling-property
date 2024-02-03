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

    <div class="row">
        <div class="col-lg-12" style="width: 80%; margin: auto;">
            <div class="card">
                <div class="card-body mx-4">
                    <form class="outer-repeater mt-2" method="post">
                        <div data-repeater-list="outer-group" class="outer">
                            <div class="row my-4">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <div class="img mx-5">
                                        <img src="{{ URL::asset('storage/' . $payments->product->photo) }}" alt=""
                                            class="img-fluid" width="500" height="250">
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-5">
                                <!-- Start left col -->
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5>Informasi Pembeli</h5>
                                        <hr class="mt-1 mb-1">
                                        <a class="text-primary font-size-16">{{ $payments->name }}</a>
                                        <br>
                                        <span> Telp: {{ $payments->purchaseValidation->telpon }}</span>
                                        <br>
                                        <span> Alamat: {{ $payments->purchaseValidation->address }}
                                    </div>
                                </div>
                                <!-- Stop left col -->
                                <!-- Start Rifht col -->
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5>Order Kepada</h5>
                                        <hr class="mt-1 mb-1">
                                        <a class="text-primary font-size-16">PT. Mutiara Putri Gemilang</a>
                                        <br>
                                        <span> Telp: +62-812-4998-5217</span>
                                        <br>
                                        <span> Email: pt.mutiaraputrigemilang@gmail.com
                                    </div>
                                </div>
                                <!-- Stop right col -->
                            </div>
                            <!-- Start Row -->
                            <div class="row align-items-center">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check" id="tableOrder">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="fw-bold">Produk</th>
                                                <th class="fw-bold">Harga</th>
                                                <th class="fw-bold">Tanggal Bayar</th>
                                                <th class="fw-bold">Tipe Pembelian</th>
                                                <th class="fw-bold">Tenor</th>
                                                <th class="fw-bold">Ditransfer Dari</th>
                                                <th class="fw-bold">Bank Tujuan</th>
                                                <th class="fw-bold">Nama Rekening</th>
                                                <th class="fw-bold">Nominal</th>
                                                <th class="fw-bold">Bukti Transfer</th>
                                                <th class="fw-bold">Deskripsi</th>
                                                <th class="fw-bold">Status</th>
                                                <th class="fw-bold">Dibuat Pada</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{ $payments->product->name }}
                                                </td>
                                                <td>
                                                    {{ number_format($payments->product->price, 2, ',', '.') }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($payments->payment_date)->format('d M Y') }}
                                                </td>
                                                <td>
                                                    {{ $payments->type }}
                                                </td>
                                                <td>
                                                    @if ($payments->tenor !== null)
                                                        {{ $payments->tenor }}
                                                    @else
                                                        <span class="text-danger">Null</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $payments->home_bank }}
                                                </td>
                                                <td>
                                                    {{ $payments->destination_bank }}
                                                </td>
                                                <td>
                                                    {{ $payments->rekening_name }}
                                                </td>
                                                <td>
                                                    {{ $payments->nominal }}
                                                </td>
                                                <td><a href="{{ asset('storage/uploads/' . $payments->transfer) }}"
                                                        target="_blank">Bukti Transfer</a>
                                                </td>
                                                <td>
                                                    @if ($payments->payment_description !== null)
                                                        {{ $payments->payment_description }}
                                                    @else
                                                        <span class="text-danger">Tidak ada deskripsi</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $payments->status }}
                                                </td>
                                                <td>
                                                    {{ $payments->created_at }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-lg-4">
                                    <div class="table-responsive ">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Subtotal :</td>
                                                    <td class="text-end">
                                                        Rp {{ number_format($payments->product->price, 2, ',', '.') }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Total Diskon : </td>
                                                    <td class="text-end">Rp (0.00)</td>
                                                </tr>

                                                <tr>
                                                    <td>Pajak : </td>
                                                    <td class="text-end">Rp 0.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Total :</td>
                                                    <td class="text-end">Rp
                                                        {{ number_format($payments->product->price, 2, ',', '.') }}</td>

                                                </tr>
                                                <tr>
                                                    <th>Pajak Included :</th>
                                                    <th class="text-end">Rp 0.00</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ URL::asset('assets/js/pages/ecommerce-cart.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

@extends('layouts.master')
@section('title')
    Detail Pembayaran Inhouse
@endsection
@section('css')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Penjualan
        @endslot
        @slot('title')
            Detail Pembayaran Inhouse
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body mx-4">
                    <form class="outer-repeater mt-2" method="post">
                        <div data-repeater-list="outer-group" class="outer">
                            <div class="row my-4">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <div class="img mx-5">
                                        <img src="{{ URL::asset('storage/' . $inhousePayments->product->photo) }}"
                                            alt="" class="img-fluid" width="500" height="250">
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-5">
                                <!-- Start left col -->
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5>Informasi Pembeli</h5>
                                        <hr class="mt-1 mb-1">
                                        <a class="text-primary font-size-16">{{ $inhousePayments->name }}</a>
                                        <br>
                                        <span> Telp: {{ $inhousePayments->purchaseValidation->telpon }}</span>
                                        <br>
                                        <span> Alamat: {{ $inhousePayments->purchaseValidation->address }}
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
                                                    {{ $inhousePayments->product->name }}
                                                </td>
                                                <td>
                                                    {{ $inhousePayments->product->price }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($inhousePayments->payment_date)->format('d M Y') }}
                                                </td>
                                                <td>
                                                    {{ $inhousePayments->type }}
                                                </td>
                                                <td>
                                                    @if ($inhousePayments->tenor !== null)
                                                        {{ $inhousePayments->tenor }}
                                                    @else
                                                        <span class="text-danger">Null</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $inhousePayments->home_bank }}
                                                </td>
                                                <td>
                                                    {{ $inhousePayments->destination_bank }}
                                                </td>
                                                <td>
                                                    {{ $inhousePayments->rekening_name }}
                                                </td>
                                                <td>
                                                    {{ $inhousePayments->nominal }}
                                                </td>
                                                <td><a href="{{ asset('storage/uploads/' . $inhousePayments->transfer) }}"
                                                        target="_blank">Bukti Transfer</a>
                                                </td>
                                                <td>
                                                    @if ($inhousePayments->payment_description !== null)
                                                        {{ $inhousePayments->payment_description }}
                                                    @else
                                                        <span class="text-danger">Tidak ada deskripsi</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $inhousePayments->status }}
                                                </td>
                                                <td>
                                                    {{ $inhousePayments->created_at }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

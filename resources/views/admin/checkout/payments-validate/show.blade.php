@extends('layouts.master')
@section('title')
    Detail Pembayaran
@endsection
@section('css')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Penjualan
        @endslot
        @slot('title')
            Validasi Pembayaran
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
                                        <img src="{{ URL::asset('storage/' . $showPayment->product->photo) }}"
                                            alt="" class="img-fluid" width="500" height="250">
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-5">
                                <!-- Start left col -->
                                <div class="col-lg-5">
                                    <div class="mb-4">
                                        <h5>Informasi Pembeli</h5>
                                        <hr class="mt-1 mb-1">
                                        <a class="text-primary font-size-16">{{ $showPayment->name }}</a>
                                        <br>
                                        <span> Telp: {{ $showPayment->purchaseValidation->telpon }}</span>
                                        <br>
                                        <span> Alamat: {{ $showPayment->purchaseValidation->address }}
                                    </div>
                                </div>
                                <!-- Stop left col -->
                                <!-- Start Rifht col -->
                                <div class="col-lg-5">
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

                                <div class="col-lg-2 text-end">
                                    <a href="{{ route('checkout.payment.edit', $showPayment->id) }}"
                                        class="btn btn-warning btn-rounded waves-effect waves-light text-dark">Edit
                                        Pembayaran</a>
                                </div>
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
                                                <th class="fw-bold">Status</th>
                                                <th class="fw-bold">Ditransfer Dari</th>
                                                <th class="fw-bold">Bank Tujuan</th>
                                                <th class="fw-bold">Nama Rekening</th>
                                                <th class="fw-bold">Nominal</th>
                                                <th class="fw-bold">Bukti Transfer</th>
                                                <th class="fw-bold">Deskripsi</th>
                                                <th class="fw-bold">Dibuat Pada</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    {{ $showPayment->product->name }}
                                                </td>
                                                <td>
                                                    {{ $showPayment->product->price }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($showPayment->payment_date)->format('d M Y') }}
                                                </td>
                                                <td>
                                                    {{ $showPayment->type }}
                                                </td>
                                                <td>
                                                    @if ($showPayment->status == 'pending')
                                                        <span
                                                            class="badge badge-pill rounded-pill bg-warning font-size-14">Pending</span>
                                                    @elseif ($showPayment->status == 'approved')
                                                        <span
                                                            class="badge badge-pill rounded-pill bg-success font-size-14">Disetujui</span>
                                                    @elseif ($showPayment->status == 'rejected')
                                                        <span
                                                            class="badge badge-pill rounded-pill bg-danger font-size-14">Ditolak</span>
                                                    @else
                                                        <span class="badge bg-secondary">{{ $showPayment->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $showPayment->home_bank }}
                                                </td>
                                                <td>
                                                    {{ $showPayment->destination_bank }}
                                                </td>
                                                <td>
                                                    {{ $showPayment->rekening_name }}
                                                </td>
                                                <td>
                                                    {{ $showPayment->nominal }}
                                                </td>
                                                <td><a href="{{ asset('storage/uploads/' . $showPayment->transfer) }}"
                                                        target="_blank">Bukti Transfer</a>
                                                </td>
                                                <td>
                                                    @if ($showPayment->payment_description !== null)
                                                        {{ $showPayment->payment_description }}
                                                    @else
                                                        <span class="text-danger">Tidak ada deskripsi</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    {{ $showPayment->created_at }}
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

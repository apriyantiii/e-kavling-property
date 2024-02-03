{{-- @extends('layouts.master')
@section('title')
    @if (Route::is('purchase-order.show'))
    PO/2022/0001
    @elseif(Route::is('purchase-invoice.show') )
    EXP/2022/0004
    @endif
@endsection --}}
@extends('layouts.master')
@section('title')
    Data Validasi Berkas Pembelian
@endsection
@section('css')
@endsection

@section('content')
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
                                <div class="col-lg-6">
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
                                                    @if ($showPayment->tenor !== null)
                                                        {{ $showPayment->tenor }}
                                                    @else
                                                        <span class="text-danger">Null</span>
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
                                                    {{ $showPayment->status }}
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
                        <div class="col-lg-12 my-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <h5>Keterangan</h5>
                                        <hr class="mt-1 mb-1">
                                        <div class="mx-3">
                                            <li> Barang hanya dapat dikembalikan dalam waktu 7 hari</li>
                                            <li> Barang tidak boleh rusak saat dikembalikan</li>
                                        </div>
                                    </div>
                                </div>
                                <!-- Stop left col -->
                                <div class="col-md-6">
                                    <div class="col-xs-2 text-end mx-5">
                                        <div class="mb-3">
                                            <h5>28 November, 2022</h5>
                                        </div>
                                        <div class="img my-2">
                                            <img src="{{ URL::asset('assets/images/companies/img-1.png') }}" alt=""
                                                class="img-fluid" width="150" height="150">
                                        </div>
                                        <h5 class="text-success text-size-12">Finance - AISYAH</h5>
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
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

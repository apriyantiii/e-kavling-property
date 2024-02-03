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
        <div class="col-lg-12" style="width: 80%; margin: auto">
            <div class="card">
                <div class="card-body mx-4">
                    <form class="outer-repeater mt-2" method="post">
                        <div data-repeater-list="outer-group" class="outer">
                            <div class="row my-4">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <div class="img mx-5">
                                        <img src="{{ URL::asset('storage/' . $purchaseValidation->product->photo) }}"
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
                                        <a class="text-primary font-size-16">{{ $purchaseValidation->name }}</a>
                                        <br>
                                        <span> Telp: {{ $purchaseValidation->telpon }}</span>
                                        <br>
                                        <span> Alamat: {{ $purchaseValidation->address }}
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
                                                <th class="fw-bold">Nama Produk</th>
                                                <th class="fw-bold">Nama Pembeli</th>
                                                <th class="fw-bold">NIK</th>
                                                <th class="fw-bold">Umur</th>
                                                <th class="fw-bold">Pekerjaan</th>
                                                <th class="fw-bold">No. Telp</th>
                                                <th class="fw-bold">Alamat</th>
                                                <th class="fw-bold">Status</th>
                                                <th class="fw-bold">File KK</th>
                                                <th class="fw-bold">File KTP</th>
                                                <th class="fw-bold">Dibuat Pada</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $purchaseValidation->product->name }}</td>
                                                <td>{{ $purchaseValidation->name }}</td>
                                                <td>{{ $purchaseValidation->nik }}</td>
                                                <td>{{ $purchaseValidation->age }}</td>
                                                <td>{{ $purchaseValidation->job }}</td>
                                                <td>{{ $purchaseValidation->telpon }}</td>
                                                <td>{{ $purchaseValidation->address }}</td>
                                                <td>
                                                    @if ($purchaseValidation->status == 'pending')
                                                        <span
                                                            class="badge badge-pill rounded-pill bg-warning font-size-14">Pending</span>
                                                    @elseif ($purchaseValidation->status == 'approved')
                                                        <span
                                                            class="badge badge-pill rounded-pill bg-success font-size-14">Disetujui</span>
                                                    @elseif ($purchaseValidation->status == 'rejected')
                                                        <span
                                                            class="badge badge-pill rounded-pill bg-danger font-size-14">Ditolak</span>
                                                    @else
                                                        <span
                                                            class="badge bg-secondary">{{ $purchaseValidation->status }}</span>
                                                    @endif
                                                </td>

                                                <td><a href="{{ asset('storage/uploads/' . $purchaseValidation->kk_file) }}"
                                                        target="_blank">Lihat KK</a>
                                                </td>
                                                <td>
                                                    <a href="{{ asset('storage/uploads/' . $purchaseValidation->ktp_file) }}"
                                                        target="_blank">Lihat KTP</a>
                                                </td>
                                                <td>{{ $purchaseValidation->created_at }}</td>
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
    <script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ URL::asset('assets/js/pages/ecommerce-cart.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

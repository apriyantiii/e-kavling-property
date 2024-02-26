@extends('layouts.master')
@section('title')
    Detail Validasi Berkas
@endsection
@section('css')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Penjualan
        @endslot
        @slot('title')
            Validasi Berkas
        @endslot
    @endcomponent
    <div class="row">
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body mx-4">
                    <form class="outer-repeater mt-2" method="post">
                        <div data-repeater-list="outer-group" class="outer">
                            <div class="row my-4">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <div class="img mx-5">
                                        <img src="{{ URL::asset('storage/' . $showValidate->product->photo) }}"
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
                                        <a class="text-primary font-size-16">{{ $showValidate->name }}</a>
                                        <br>
                                        <span> Telp: {{ $showValidate->telpon }}</span>
                                        <br>
                                        <span> Alamat: {{ $showValidate->address }}
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
                                    <a href="{{ route('checkout.validate.edit', $showValidate->id) }}"
                                        class="btn btn-warning btn-rounded waves-effect waves-light text-dark"><i
                                            class="mdi mdi-pencil font-size-16 text-dark me-1"></i>Edit Data</a>
                                </div>
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
                                                <td>{{ $showValidate->product->name }}</td>
                                                <td>{{ $showValidate->name }}</td>
                                                <td>{{ $showValidate->nik }}</td>
                                                <td>{{ $showValidate->age }}</td>
                                                <td>{{ $showValidate->job }}</td>
                                                <td>{{ $showValidate->telpon }}</td>
                                                <td>{{ $showValidate->address }}</td>
                                                <td>
                                                    @if ($showValidate->status == 'pending')
                                                        <span
                                                            class="badge badge-pill rounded-pill bg-warning font-size-14">Pending</span>
                                                    @elseif ($showValidate->status == 'approved')
                                                        <span
                                                            class="badge badge-pill rounded-pill bg-success font-size-14">Disetujui</span>
                                                    @elseif ($showValidate->status == 'rejected')
                                                        <span
                                                            class="badge badge-pill rounded-pill bg-danger font-size-14">Ditolak</span>
                                                    @else
                                                        <span class="badge bg-secondary">{{ $showValidate->status }}</span>
                                                    @endif
                                                </td>

                                                <td><a href="{{ asset('storage/uploads/' . $showValidate->kk_file) }}"
                                                        target="_blank">Lihat KK</a>
                                                </td>
                                                <td>
                                                    <a href="{{ asset('storage/uploads/' . $showValidate->ktp_file) }}"
                                                        target="_blank">Lihat KTP</a>
                                                </td>
                                                <td>{{ $showValidate->created_at }}</td>
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

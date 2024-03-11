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
                        <a class="nav-link active" data-bs-toggle="tab" href="#validation" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-boxes"></i></span>
                            <span class="d-none d-sm-block fw-bold">Validasi Berkas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#payments" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-indent"></i></span>
                            <span class="d-none d-sm-block fw-bold">Pembayaran Cash/KPR</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#inhouse" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-indent"></i></span>
                            <span class="d-none d-sm-block fw-bold">Pembayaran Inhouse</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Tab panes -->
            <div class="tab-content text-muted">
                {{-- Tab Validation --}}
                <div class="tab-pane active" id="validation" role="tabpanel">
                    @if ($purchaseValidation->isEmpty())
                        <div class="card" style="border-radius: 10px">
                            <div class="card-body">
                                <h3 class="card-title mt-0 text-center" style="margin-bottom: 10px">
                                    Data validasi berkas masih kosong.
                                </h3>
                            </div>
                        </div>
                    @else
                        @foreach ($purchaseValidation as $validation)
                            @php
                                // pengecekn di model payment
                                $isPaid = \App\Models\Payments::where('product_id', $validation->product_id)->exists();
                                // pengecekan juga di model InhousePayment
                                $isPaidInhouse = \App\Models\InhousePayment::where(
                                    'product_id',
                                    $validation->product_id,
                                )->exists();
                            @endphp
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title mt-0 text-end" style="margin-bottom: 10px">
                                        <strong>Status Berkas:
                                            @if ($validation->status == 'pending')
                                                <span
                                                    class="badge badge-pill rounded-pill bg-warning font-size-14">Pending</span>
                                            @elseif ($validation->status == 'approved')
                                                <span
                                                    class="badge badge-pill rounded-pill bg-success font-size-14">Approved</span>
                                            @elseif ($validation->status == 'rejected')
                                                <span
                                                    class="badge badge-pill rounded-pill bg-danger font-size-14">Rejected</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $validation->status }}</span>
                                            @endif
                                        </strong>
                                    </h3>
                                    <hr style="border-top: 2px solid #000000; margin-top: 0px;">
                                    <div class="row">
                                        {{-- <div class="col-md-2">
                                            <img src="{{ URL::asset('storage/' . $validation->product->photo) }}"
                                                alt="product-img" title="product-img" class="avatar-xxl" />
                                        </div> --}}

                                        <div class="col-md-8 text-start">
                                            <h4>{{ $validation->product->name }}</h4>
                                            <p>{{ $validation->product->location }}</p>
                                            <br>
                                            <h6><strong>Atas nama: {{ $validation->name }}</strong></h6>
                                            <p>{{ $validation->job }}</p>
                                        </div>

                                        <div class="col-md-4 text-end">
                                            @if ($validation->product)
                                                <h4>{{ $validation->product->formatted_price }}</h4>
                                            @endif

                                            @if (!($isPaid || $isPaidInhouse) && !in_array($validation->status, ['pending', 'rejected']))
                                                <h5>
                                                    <a href="{{ route('checkout.confirmation', ['productId' => $validation->product->id]) }}"
                                                        class="btn btn-warning mt-5 text-black">
                                                        <i class="mdi mdi-cash font-size-16 me-1"></i>Bayar Disini
                                                    </a>
                                                </h5>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12 text-end">

                                            @if ($validation->status === 'pending')
                                                <h5><a href="{{ route('waiting-validate', $validation->id) }}">
                                                        Bayar Disini <i class="mdi mdi-arrow-right me-1"></i></a></h5>
                                            @else
                                                <h5><a href="{{ route('checkout.invoice.validate', $validation->id) }}">
                                                        Selengkapnya <i class="mdi mdi-arrow-right me-1"></i></a></h5>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end card -->
                        @endforeach
                    @endif

                </div>

                {{-- Tab payments --}}
                <div class="tab-pane" id="payments" role="tabpanel">
                    @if ($payments->isEmpty())
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title mt-0 text-center" style="margin-bottom: 10px">
                                    Data pembayaran masih kosong.</h3>
                            </div>
                        </div>
                    @else
                        @foreach ($payments as $payment)
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title mt-0 text-end" style="margin-bottom: 10px">
                                        <strong>Status Berkas:
                                            @if ($payment->status == 'pending')
                                                <span
                                                    class="badge badge-pill rounded-pill bg-warning font-size-14">Pending</span>
                                            @elseif ($payment->status == 'approved')
                                                <span
                                                    class="badge badge-pill rounded-pill bg-success font-size-14">Approved</span>
                                            @elseif ($payment->status == 'rejected')
                                                <span
                                                    class="badge badge-pill rounded-pill bg-danger font-size-14">Approved</span>
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
                                            @if ($payment->tenor !== null)
                                                <h5>
                                                    <a href="{{ route('checkout.payments', ['product_id' => $payment->product_id]) }}"
                                                        class="btn btn-warning mt-5">
                                                        <i class="mdi mdi-cash me-1"></i>Bayar Sekarang
                                                    </a>
                                                </h5>
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
                    @endif
                </div>

                {{-- Tab Inhouse --}}
                <div class="tab-pane" id="inhouse" role="tabpanel">
                    @if ($allInhousePayments->isEmpty())
                        <div class="card" style="border-radius: 10px">
                            <div class="card-body">
                                <h3 class="card-title mt-0 text-center" style="margin-bottom: 10px">
                                    Tidak ada pembayaran inhouse</h3>
                            </div>
                        </div>
                    @else
                        @foreach ($allInhousePayments as $allInhousePayment)
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div>
                                                <h5 class="card-title">Semua Pembayaran Inhouse
                                                    <span class="text-muted fw-normal"></span>
                                                </h5>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="flex-wrap gap-2 d-flex align-items-center justify-content-end">
                                                <div>
                                                    @if ($allInhousePayment->status == 'approved')
                                                        @if ($allInhousePayment->remaining_amount > 0)
                                                            <a href="{{ route('checkout.inhouse-payments', ['productId' => $allInhousePayment->product->id]) }}"
                                                                class="btn btn-success btn-rounded waves-effect waves-light"><i
                                                                    class="mdi mdi-cash me-1"></i> Bayar Tenor</a>
                                                        @else
                                                            <button
                                                                class="btn btn-success btn-rounded waves-effect waves-light"
                                                                disabled><i class="mdi mdi-cash me-1"></i> Lunas</button>
                                                        @endif
                                                    @else
                                                        <button
                                                            class="btn btn-success btn-rounded waves-effect waves-light"
                                                            disabled><i class="mdi mdi-cash me-1"></i> Belum
                                                            Disetujui</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="datatable"
                                            class="table align-middle datatable dt-responsive table-check nowrap"
                                            style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">No.</td>
                                                    <th>Kode Produk</th>
                                                    <th>Harga</th>
                                                    <th>Kredit</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                {{-- @foreach ($inhousePayments as $inhousePayment) --}}
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td><a
                                                            href="{{ route('product.show', $allInhousePayment->product->id) }}">{{ $allInhousePayment->product->code }}</a>
                                                    </td>
                                                    <td>{{ $allInhousePayment->product->formatted_price }}</td>
                                                    <td>{{ $allInhousePayment->formatted_remaining_amount }}</td>
                                                    <td class="align-middle">
                                                        <h5><a
                                                                href="{{ route('checkout.invoice.inhouse-payment', ['userId' => $allInhousePayment->user->id, 'productId' => $allInhousePayment->product->id]) }}">
                                                                Selengkapnya <i class="mdi mdi-arrow-right me-1"></i>
                                                            </a></h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end card -->
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ URL::asset('assets/js/pages/ecommerce-cart.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net/datatables.net.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons/datatables.net-buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js') }}">
    </script>
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>
@endsection

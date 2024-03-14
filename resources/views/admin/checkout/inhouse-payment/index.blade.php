@extends('layouts.master')
@section('title')
    Validasi Berkas Pembelian
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet"
        type="text/css" />
    {{-- select css --}}
    <link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Penjualan
        @endslot
        @slot('title')
            Daftar Pembayaran Inhouse
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">

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

        </div><!-- end row -->
        <div class="card">
            <div class="card-body">
                <div class="tab-content text-muted">
                    <div class="tab-pane active" id="products" role="tabpanel">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div>
                                        <h5 class="card-title">Semua Berkas
                                            <span class="text-muted fw-normal"></span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- form for checkbox --}}
                        <form action="" method="POST" class="form-product">
                            @csrf
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable-buttons"
                                        class="table align-middle datatable dt-responsive table-check nowrap"
                                        style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                        <thead>
                                            <tr>
                                                <td class="text-center">ID</td>
                                                <th>Kode Produk</th>
                                                <th>Nama Pembeli</th>
                                                <th>Harga</th>
                                                <th>Kredit</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($allInhousePayments as $allInhousePayment)
                                                <tr>
                                                    <td class="text-center">{{ $allInhousePayment->id }}</td>
                                                    <td><a
                                                            href="{{ route('product.index') }}">{{ $allInhousePayment->product->code }}</a>
                                                    </td>
                                                    <td>{{ $allInhousePayment->user->name }}</td>
                                                    <td>{{ $allInhousePayment->product->formatted_price }}</td>
                                                    <td>{{ $allInhousePayment->formatted_remaining_amount }}</td>
                                                    <td class="align-middle">
                                                        <a
                                                            href="{{ route('admin.checkout.inhouse-payment.show', ['userId' => $allInhousePayment->user->id, 'productId' => $allInhousePayment->product->id]) }}">
                                                            <i class="mdi mdi-eye font-size-16 text-success me-1"></i>
                                                        </a>
                                                    </td>
                                                    {{-- <td class="align-middle">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a href="{{ route('admin.checkout.inhouse-payment.show', $allInhousePayment->user->id) }}"
                                                                        class="dropdown-item">
                                                                        <i
                                                                            class="mdi mdi-eye font-size-16 text-success me-1"></i>
                                                                        Detail
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a type="button" class="btn" data-bs-toggle="modal"
                                                                        data-bs-target="#myModal"><i
                                                                            class="mdi mdi-pencil font-size-16 text-success me-2"></i>Edit</a>
                                                                </li>

                                                                <li>
                                                                    <a href="#" class="dropdown-item delete-user"
                                                                        data-id="{{ $allInhousePayment->id }}"
                                                                        onclick="deleteUser(event)">
                                                                        <i
                                                                            class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                                        Hapus
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td> --}}
                                                    {{-- </td>
                                                    <td class="text-center"><a
                                                            href="{{ route('admin.setting-user.index') }}">{{ $inhousePayment->user_id }}</a>
                                                    </td>
                                                    <td class="text-center"><a
                                                            href="{{ route('product.index') }}">{{ $inhousePayment->product_id }}</a>
                                                    </td>
                                                    <td class="text-center"><a
                                                            href="{{ route('checkout.data-validate') }}">{{ $inhousePayment->purchase_validation_id }}</a>
                                                    </td>
                                                    <td class="text-center"><a
                                                            href="{{ route('checkout.payments-validate') }}">{{ $inhousePayment->id }}</a>
                                                    </td>
                                                </tr> --}}
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->

    </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
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

    {{-- form select --}}
    <script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // error message validation modal
            @if ($errors->has('category_name') || $errors->has('category_parent') || $errors->has('category_description'))
                $('#addCategory').modal('show');
            @endif
        });

        // check box selected all
        $('#select_all').click(function() {
            $('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
        });
    </script>
    <script src="{{ URL::asset('assets/js/pages/modal.init.js') }}"></script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>
@endsection

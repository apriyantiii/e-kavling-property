@extends('layouts.master')
@section('title')
    Transaksi
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
            Semua Transaksi
        @endslot
        @slot('title')
            Transaksi Penjualan
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
                                        <h5 class="card-title">Semua Transaksi
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
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Pembeli</th>
                                                <th class="text-center">Code Produk</th>
                                                <th class="text-center">Tipe Pembayaran</th>
                                                <th class="text-center">ID Validasi Pembelian</th>
                                                <th class="text-center">ID Pembayaran</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($transactions as $transaction)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $transaction->user->name }}</td>
                                                    <td class="text-center">{{ $transaction->product->code }}</td>
                                                    <td class="text-center">Cash / KPR</td>
                                                    <td class="text-center"><a
                                                            href="{{ route('checkout.data-validate') }}">{{ $transaction->purchase_validation_id }}</a>
                                                    </td>
                                                    <td class="text-center"><a
                                                            href="{{ route('checkout.payments-validate') }}">{{ $transaction->id }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            @foreach ($inhouseTransactions as $transaction)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $transaction->user->name }}</td>
                                                    <td class="text-center">{{ $transaction->product->code }}</td>
                                                    <td class="text-center">Inhouse</td>
                                                    <td class="text-center"><a
                                                            href="{{ route('checkout.data-validate') }}">{{ $transaction->purchase_validation_id }}</a>
                                                    </td>
                                                    <td class="text-center"><a
                                                            href="{{ route('admin.checkout.inhouse-payments') }}">{{ $transaction->id }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- @foreach ($transactions as $transaction)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}
                                                    </td>
                                                    <td class="text-center"><a
                                                            href="{{ route('admin.setting-user.index') }}">{{ $transaction->user_id }}</a>
                                                    </td>
                                                    <td class="text-center"><a
                                                            href="{{ route('product.index') }}">{{ $transaction->product->code }}</a>
                                                    </td>
                                                    <td class="text-center"><a
                                                            href="{{ route('checkout.data-validate') }}">{{ $transaction->purchase_validation_id }}</a>
                                                    </td>
                                                    <td class="text-center"><a
                                                            href="{{ route('checkout.payments-validate') }}">{{ $transaction->id }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
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

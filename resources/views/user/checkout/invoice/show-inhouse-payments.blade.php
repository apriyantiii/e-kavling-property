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
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div>
                                <h4>Pembayaran Inhouse</h4>
                                <p>Atas Nama:
                                    {{ $inhousePayments->first()->user->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table align-middle datatable dt-responsive table-check nowrap"
                            style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                            <thead>
                                <tr>
                                    <td class="text-center">No.</td>
                                    <th>Bayar ke</th>
                                    <th>Nominal</th>
                                    <th>Kredit</th>
                                    <th>Tanggal</th>
                                    <th>Tenor</th>
                                    <th>Status</th>
                                    <th>Bukti Tf</th>
                                    <th>Dikirim Pada</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($inhousePayments as $inhousePayment)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $inhousePayment->payment_type }}</td>
                                        <td>{{ $inhousePayment->formatted_nominal }}</td>
                                        <td>{{ $inhousePayment->formatted_remaining_amount }}</td>
                                        <td>{{ \Carbon\Carbon::parse($inhousePayment->payment_date)->format('d-m-Y') }}</td>
                                        <td>{{ $inhousePayment->tenor }}</td>

                                        <td>
                                            @if ($inhousePayment->status == 'pending')
                                                <span
                                                    class="badge badge-pill rounded-pill bg-warning font-size-14">Pending</span>
                                            @elseif ($inhousePayment->status == 'approved')
                                                <span
                                                    class="badge badge-pill rounded-pill bg-success font-size-14">Disetujui</span>
                                            @elseif ($inhousePayment->status == 'rejected')
                                                <span
                                                    class="badge badge-pill rounded-pill bg-danger font-size-14">Ditolak</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $inhousePayment->status }}</span>
                                            @endif
                                        </td>
                                        <td><a href="{{ asset('storage/uploads/' . $inhousePayment->transfer) }}"
                                                target="_blank">lihat</a>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($inhousePayment->created_at)->format('d-m-Y h:i A') }}
                                        </td>


                                        {{-- <td class="align-middle">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle card-drop"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="" class="dropdown-item">
                                                            <i class="mdi mdi-eye font-size-16 text-success me-1"></i>
                                                            Detail
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="dropdown-item edit-inhouse-payment"
                                                            data-id="{{ $inhousePayment->id }}">
                                                            <i class="mdi mdi-pencil font-size-16 text-success me-2"></i>
                                                            Edit
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#" class="dropdown-item delete-user"
                                                            data-id="{{ $inhousePayment->id }}"
                                                            onclick="deleteInhousePayment(event)">
                                                            <i class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                            Hapus
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end card -->


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

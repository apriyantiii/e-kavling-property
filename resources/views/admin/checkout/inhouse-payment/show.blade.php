@extends('layouts.master')
@section('title')
    Data Pembayaran Inhouse {{ $user->name }}
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
            Data Pembayaran Inhouse
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
                                        <p class="card-title">Atas Nama <b>{{ $user->name }}</b>
                                            <span class="text-muted fw-normal"></span>
                                        </p>
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
                                                <th>Pembayaran ke</th>
                                                <th>Kode Produk</th>
                                                <th>Nama Pembeli</th>
                                                <th>Tanggal Pembayaran</th>
                                                <th>Tenor</th>

                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($inhousePayments as $inhousePayment)
                                                <tr>
                                                    <td>{{ $inhousePayment->payment_type }}</td>
                                                    <td>{{ $inhousePayment->product->code }}</td>
                                                    <td>{{ $inhousePayment->user->name }}</td>
                                                    <td>{{ $inhousePayment->payment_date }}</td>
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
                                                            <span
                                                                class="badge bg-secondary">{{ $inhousePayment->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a href="{{ route('admin.checkout.inhouse-payments.detail', $inhousePayment->id) }}"
                                                                        class="dropdown-item">
                                                                        <i
                                                                            class="mdi mdi-eye font-size-16 text-success me-1"></i>
                                                                        Detail
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"
                                                                        class="dropdown-item edit-inhouse-payment"
                                                                        data-id="{{ $inhousePayment->id }}">
                                                                        <i
                                                                            class="mdi mdi-pencil font-size-16 text-success me-2"></i>
                                                                        Edit
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#" class="dropdown-item delete-user"
                                                                        data-id="{{ $inhousePayment->id }}"
                                                                        onclick="deleteInhousePayment(event)">
                                                                        <i
                                                                            class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                                        Hapus
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
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
    </div> <!-- end row -->

    <!-- sample modal content -->
    <div id="myModal{{ $inhousePayment->id }}" class="modal fade" tabindex="-1"
        aria-labelledby="myModalLabel{{ $inhousePayment->id }}" aria-hidden="true" data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Konten modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel{{ $inhousePayment->id }}">Edit Status Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm{{ $inhousePayment->id }}"
                        action="{{ route('admin.checkout.inhouse-payment.update-status', $inhousePayment->id) }}"
                        method="post">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="nice-select default-select wide form-control solid" name="status">
                                <option value="pending" {{ $inhousePayment->status === 'pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="approved" {{ $inhousePayment->status === 'approved' ? 'selected' : '' }}>
                                    Disetujui</option>
                                <option value="rejected" {{ $inhousePayment->status === 'rejected' ? 'selected' : '' }}>
                                    Ditolak</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitEditForm({{ $inhousePayment->id }})">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
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

    {{-- modal --}}
    <script>
        // Fungsi untuk menampilkan modal dengan status yang sesuai ketika tombol "Edit" diklik
        function submitEditForm(paymentId) {
            var form = document.getElementById('editForm' + paymentId);
            var status = form.querySelector('select[name="status"]').value;
            // Disini Anda bisa menambahkan logika untuk melakukan pengiriman form
            console.log('ID Pembayaran:', paymentId, 'Status:', status);
            // Untuk contoh, saya hanya mencetak ID pembayaran dan status ke konsol
        }

        // Tambahkan event listener untuk tombol "Edit"
        var editButtons = document.querySelectorAll('.edit-inhouse-payment');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var paymentId = this.getAttribute('data-id');
                var myModal = new bootstrap.Modal(document.getElementById('myModal' + paymentId));
                myModal.show();
            });
        });
    </script>

    {{-- delete --}}
    <script>
        function deleteInhousePayment(event) {
            event.preventDefault();
            const userId = event.currentTarget.getAttribute('data-id');
            if (confirm('Apakah Anda yakin ingin menghapus Admin ini?')) {
                fetch(`{{ route('admin.checkout.inhouse-payment.destroy', ':id') }}`.replace(':id', userId), {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE'
                        })
                    })
                    .then(response => {
                        if (response.redirected) {
                            // Jika ada redirection, maka penghapusan berhasil
                            const alertMessage = document.createElement('div');
                            alertMessage.classList.add('alert', 'alert-success');
                            alertMessage.innerHTML = 'Admin berhasil dihapus.';
                            document.body.appendChild(alertMessage);

                            // Hilangkan pesan setelah beberapa detik
                            setTimeout(() => {
                                alertMessage.remove();
                            }, 3000);

                            // Redirect ke halaman yang ditentukan
                            window.location.href = response.url;
                        } else {
                            // Jika tidak ada redirection, berarti ada kesalahan
                            console.error('Gagal menghapus admin');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }
    </script>

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

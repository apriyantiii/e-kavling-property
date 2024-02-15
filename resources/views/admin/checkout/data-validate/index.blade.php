@extends('layouts.master')
@section('title')
    Data Validasi Berkas Pembelian
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet"
        type="text/css" />
    {{-- select css --}}
    <link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
@endsection
@section('content')
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
                                                    <th>ID</th>
                                                    <th>Nama Produk</th>
                                                    <th>Nama Pembeli</th>
                                                    <th>No. Telp</th>
                                                    <th>Alamat</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($validate as $purchaseValidate)
                                                    <tr>
                                                        <td>{{ $purchaseValidate->id }}</td>
                                                        <td>{{ $purchaseValidate->product->name }}</td>
                                                        <td>{{ $purchaseValidate->name }}</td>
                                                        <td>{{ $purchaseValidate->telpon }}</td>
                                                        <td>{{ $purchaseValidate->address }}</td>
                                                        <td>
                                                            @if ($purchaseValidate->status == 'pending')
                                                                <span
                                                                    class="badge badge-pill rounded-pill bg-warning font-size-14">Pending</span>
                                                            @elseif ($purchaseValidate->status == 'approved')
                                                                <span
                                                                    class="badge badge-pill rounded-pill bg-success font-size-14">Disetujui</span>
                                                            @elseif ($purchaseValidate->status == 'rejected')
                                                                <span
                                                                    class="badge badge-pill rounded-pill bg-danger font-size-14">Ditolak</span>
                                                            @else
                                                                <span
                                                                    class="badge bg-secondary">{{ $purchaseValidate->status }}</span>
                                                            @endif
                                                        </td>
                                                        <td class="align-middle">
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle card-drop"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a href="{{ route('checkout.validate.show', $purchaseValidate->id) }}"
                                                                            class="dropdown-item">
                                                                            <i
                                                                                class="mdi mdi-eye font-size-16 text-success me-1"></i>
                                                                            Detail
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a type="button" class="btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#myModal"><i
                                                                                class="mdi mdi-pencil font-size-16 text-success me-2"></i>Edit</a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="#" class="dropdown-item delete-user"
                                                                            data-id="{{ $purchaseValidate->id }}"
                                                                            onclick="deleteUser(event)">
                                                                            <i
                                                                                class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                                            Hapus
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
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

    <!-- sample modal content -->
    @isset($purchaseValidate)
        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            data-bs-scroll="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Default Modal Heading</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('data-validate.update', $purchaseValidate->id) }}" method="post">
                            @csrf
                            @method('patch')

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="nice-select default-select wide form-control solid" name="status"
                                    onchange="this.form.submit()">
                                    <option value="pending" {{ $purchaseValidate->status === 'pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>
                                    <option value="approved" {{ $purchaseValidate->status === 'approved' ? 'selected' : '' }}>
                                        Disetujui
                                    </option>
                                    <option value="rejected" {{ $purchaseValidate->status === 'rejected' ? 'selected' : '' }}>
                                        Ditolak</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect waves-light">Save
                            changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    @endisset
    <!-- /.modal -->
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

    {{-- delete --}}
    <script>
        function deleteUser(event) {
            event.preventDefault();
            const userId = event.currentTarget.getAttribute('data-id');
            if (confirm('Apakah Anda yakin ingin menghapus validasi pembelian ini?')) {
                fetch(`{{ route('checkout.validate.delete', ':id') }}`.replace(':id', userId), {
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
                            alertMessage.innerHTML = 'Validasi Berkas berhasil dihapus.';
                            document.body.appendChild(alertMessage);

                            // Hilangkan pesan setelah beberapa detik
                            setTimeout(() => {
                                alertMessage.remove();
                            }, 3000);

                            // Redirect ke halaman yang ditentukan
                            window.location.href = response.url;
                        } else {
                            // Jika tidak ada redirection, berarti ada kesalahan
                            console.error('Gagal menghapus Validasi Berkas');
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
@endsection

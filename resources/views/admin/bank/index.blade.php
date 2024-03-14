@extends('layouts.master')
@section('title')
    Rekening Bank
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
            Bank
        @endslot
        @slot('title')
            Kelola Bank
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

            <div class="card">
                <div class="card-body">
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="products" role="tabpanel">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div>
                                            <h5 class="card-title">Semua Rekening
                                                <span class="text-muted fw-normal">({{ $banks->count() }})</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @unless ($isAdmin)
                                            <div class="flex-wrap gap-2 d-flex align-items-center justify-content-end">
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-success btn-rounded waves-effect waves-light"
                                                        data-bs-toggle="modal" data-bs-target="#addAdmin"><i
                                                            class="bx bx-plus me-1"></i>
                                                        Tambah Rekening Baru</button>
                                                </div>

                                                <div class="dropdown">
                                                    <a class="py-1 shadow-none btn btn-link text-muted font-size-16 dropdown-toggle"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </a>

                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="bx bx-trash me-1 text-danger"></i>
                                                                Hapus Semua
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endunless
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
                                                    <th>Rekening Atas Nama</th>
                                                    <th>Bank</th>
                                                    <th>No. Rek</th>
                                                    @unless ($isAdmin)
                                                        <th>Tindakan</th>
                                                    @endunless
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($banks as $bank)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->iteration }}</td>
                                                        <td>{{ $bank->name }}</td>
                                                        <td>{{ $bank->bank }}</td>
                                                        <td>{{ $bank->rekening }}</td>
                                                        @unless ($isAdmin)
                                                            <td class="align-middle">
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle card-drop"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        {{-- <li><a href="#" class="dropdown-item">
                                                                            <i
                                                                                class="mdi mdi-eye font-size-16 text-success me-1"></i>
                                                                            Detail
                                                                        </a>
                                                                    </li> --}}
                                                                        {{-- <li><a href="#" class="dropdown-item">
                                                                            <i
                                                                                class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                                                            Edit
                                                                        </a>
                                                                    </li> --}}

                                                                        <li><a href="#" class="dropdown-item"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#editAdmin">
                                                                                <i
                                                                                    class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                                                                Edit
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="#" class="dropdown-item delete-user"
                                                                                data-id="{{ $bank->id }}"
                                                                                onclick="deleteBank(event)">
                                                                                <i
                                                                                    class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                                                Hapus
                                                                            </a>

                                                                        </li>
                                                                </div>
                                                            </td>
                                                        @endunless
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

    {{-- START:: Modal Tambah Admin Baru --}}
    <div id="addAdmin" class="modal fade" tabindex="-1" aria-labelledby="addAdminLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminLabel">
                        Tambahkan Rekening Baru
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.bank.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="bank" class="form-label">Bank<span class="text-danger">*</span></label>
                                <select class="form-select @error('bank') is-invalid @enderror" name="bank"
                                    id="bank" required>
                                    <option value="" selected disabled>Pilih Bank
                                    </option>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="BNI">BNI - Bank Negara Indonesia</option>
                                    <option value="BRI">BRI - Bank Rakyat Indonesia</option>
                                    <option value="BCA">BCA - Bank Central Asia</option>
                                    <option value="BTN">BTN - Bank Tabungan Negara</option>
                                    <option value="BSI">BSI - Bank Syariah Indonesia</option>
                                </select>

                                @error('bank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="name" class="form-label">
                                    Nama Lengkap <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                    class="form-control form-rounded @error('name') is-invalid @enderror" name="name"
                                    id="name" placeholder="Masukkan Rekening Atas Nama Siapa"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="rekening" class="form-label">
                                    No. Rekening
                                </label>
                                <input type="text"
                                    class="form-control form-rounded @error('rekening') is-invalid @enderror"
                                    name="rekening" id="rekening" placeholder="Masukkan No. Rekening"
                                    value="{{ old('rekening') }}">
                                @error('rekening')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-rounded btn btn-secondary waves-effect"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit"
                            class="btn-rounded btn btn-primary waves-effect waves-light">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END:: Modal Tambah Admin Baru --}}

    {{-- START:: Modal Edit Admin --}}
    @if ($banks->isNotEmpty())
        @foreach ($banks as $bank)
            <div id="editAdmin" class="modal fade" tabindex="-1" aria-labelledby="editAdminLabel" aria-hidden="true"
                data-bs-scroll="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAdminLabel">
                                Edit Rekening
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        {{-- {{ route('admin.bank.update', ':id') }} --}}
                        <form id="editBankForm" action="{{ route('admin.bank.update', $bank->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="bank" class="form-label">Bank<span
                                                class="text-danger">*</span></label>
                                        <select class="form-select @error('bank') is-invalid @enderror" name="bank"
                                            id="bank" required>
                                            <option value="" disabled>Pilih Bank</option>
                                            <option value="Mandiri"
                                                {{ old('bank', $bank->bank) == 'Mandiri' ? 'selected' : '' }}>
                                                Mandiri
                                            </option>
                                            <option value="BNI"
                                                {{ old('bank', $bank->bank) == 'BNI' ? 'selected' : '' }}>BNI -
                                                Bank
                                                Negara Indonesia</option>
                                            <option value="BRI"
                                                {{ old('bank', $bank->bank) == 'BRI' ? 'selected' : '' }}>BRI -
                                                Bank
                                                Rakyat Indonesia</option>
                                            <option value="BCA"
                                                {{ old('bank', $bank->bank) == 'BCA' ? 'selected' : '' }}>BCA -
                                                Bank
                                                Central Asia</option>
                                            <option value="BTN"
                                                {{ old('bank', $bank->bank) == 'BTN' ? 'selected' : '' }}>BTN -
                                                Bank
                                                Tabungan Negara</option>
                                            <option value="BSI"
                                                {{ old('bank', $bank->bank) == 'BSI' ? 'selected' : '' }}>BSI -
                                                Bank
                                                Syariah Indonesia</option>
                                        </select>

                                        @error('bank')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="col-6 mb-3">
                                        <label for="name" class="form-label">
                                            Nama Lengkap <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                            class="form-control form-rounded @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ $bank->name }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="rekening" class="form-label">
                                            No. Rekening
                                        </label>
                                        <input type="text"
                                            class="form-control form-rounded @error('rekening') is-invalid @enderror"
                                            name="rekening" id="rekening"value="{{ $bank->rekening }}">
                                        @error('rekening')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-rounded btn btn-secondary waves-effect"
                                    data-bs-dismiss="modal">Batal</button>
                                <button type="submit"
                                    class="btn-rounded btn btn-primary waves-effect waves-light">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    {{-- END:: Modal Edit Admin --}}
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

    {{-- form lainnya --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('tenor').addEventListener('change', function() {
                var lainnyaInputTenor = document.getElementById('lainnyaInputTenor'); // Identifier unik
                if (this.value === 'lainnya') {
                    lainnyaInputTenor.style.display = 'block';
                } else {
                    lainnyaInputTenor.style.display = 'none';
                }
            });
        });
    </script> --}}

    {{-- delete --}}
    <script>
        function deleteBank(event) {
            event.preventDefault();
            const userId = event.currentTarget.getAttribute('data-id');
            if (confirm('Apakah Anda yakin ingin menghapus Rekening ini?')) {
                fetch(`{{ route('admin.bank.destroy', ':id') }}`.replace(':id', userId), {
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
                            alertMessage.innerHTML = 'Rekening berhasil dihapus.';
                            document.body.appendChild(alertMessage);

                            // Hilangkan pesan setelah beberapa detik
                            setTimeout(() => {
                                alertMessage.remove();
                            }, 3000);

                            // Redirect ke halaman yang ditentukan
                            window.location.href = response.url;
                        } else {
                            // Jika tidak ada redirection, berarti ada kesalahan
                            console.error('Gagal menghapus Rekening');
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
                $('#addAdmin').modal('show');
            @endif
        });

        // check box selected all
        $('#select_all').click(function() {
            $('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
        });
    </script>
@endsection

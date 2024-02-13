@extends('layouts.master')
@section('title')
    Pengaturan Admin
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
            Pengaturan
        @endslot
        @slot('title')
            Admin
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
                                            <h5 class="card-title">Semua Admin
                                                {{-- ({{ $productCategories->count() }}) --}}
                                                <span class="text-muted fw-normal"></span>
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="flex-wrap gap-2 d-flex align-items-center justify-content-end">
                                            <div>
                                                <button type="button"
                                                    class="btn btn-success btn-rounded waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target="#addAdmin"><i
                                                        class="bx bx-plus me-1"></i>
                                                    Tambah Admin Baru</button>
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
                                                    <th>
                                                        <input type="checkbox" id="select_all">
                                                    </th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Gender</th>
                                                    <th>Level</th>
                                                    <th>Kontak</th>
                                                    <th>Alamat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($admin as $admin)
                                                    <tr>
                                                        <th>
                                                            <input type="checkbox" name="products[]"
                                                                value="{{ $admin->id }}" class="checkbox">
                                                        </th>
                                                        <td>{{ $admin->name }}</td>
                                                        <td>{{ $admin->email }}</td>
                                                        <td>
                                                            @if ($admin->gender !== null)
                                                                {{ $admin->gender }}
                                                            @else
                                                                <p class="text-danger">null</p>
                                                            @endif
                                                        </td>
                                                        <td>{{ $admin->level }}</td>
                                                        <td>
                                                            @if ($admin->contact !== null)
                                                                {{ $admin->contact }}
                                                            @else
                                                                <p class="text-danger">null</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($admin->address !== null)
                                                                {{ $admin->address }}
                                                            @else
                                                                <p class="text-danger">null</p>
                                                            @endif
                                                        </td>
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
                                                                    <li><a href="{{ route('admin.setting-admin.edit', $admin->id) }}"
                                                                            class="dropdown-item">
                                                                            <i
                                                                                class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                                                            Edit
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="#" class="dropdown-item"
                                                                            onclick="event.preventDefault(); document.getElementById('deleteProductForm').submit();">
                                                                            <i
                                                                                class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                                            Hapus
                                                                        </a>

                                                                        <form id="deleteProductForm"
                                                                            action="{{ route('admin.setting-admin.destroy', $admin->id) }}"
                                                                            method="POST" style="display: none;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                        </form>
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

    {{-- START:: Modal Tambah Admin Baru --}}
    <div id="addAdmin" class="modal fade" tabindex="-1" aria-labelledby="addAdminLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminLabel">
                        Tambahkan Admin Baru
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.setting-admin.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="name" class="form-label">
                                    Nama Lengkap <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-rounded @error('name') is-invalid @enderror"
                                    name="name" id="name" placeholder="Nama Lengkap" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="email" class="form-label">
                                    Email <span class="text-danger">*</span>
                                </label>
                                <input type="email"
                                    class="form-control form-rounded @error('email') is-invalid @enderror" name="email"
                                    id="email" placeholder="cth. ptmpg@gmail.com" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="input-password" class="form-label">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password"
                                    class="form-control form-rounded @error('password') is-invalid @enderror"
                                    name="password" id="input-password" placeholder="Masukkan Kata Sandi" required
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select class="form-select @error('gender') is-invalid @enderror" name="gender"
                                    id="gender" required>
                                    <option value="" selected disabled>Pilih..</option>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="contact" class="form-label">
                                    Kontak
                                </label>
                                <input type="text"
                                    class="form-control form-rounded @error('contact') is-invalid @enderror"
                                    name="contact" id="contact" placeholder="cth. 085......."
                                    value="{{ old('contact') }}">
                                @error('contact')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-6 mb-3">
                                <label for="level" class="form-label">Level <span class="text-danger">*</span></label>
                                <select class="form-select @error('level') is-invalid @enderror" name="level"
                                    id="level" required>
                                    <option value="" selected disabled>Pilih..</option>
                                    <option value="admin">Admin</option>
                                    <option value="director">Director</option>
                                </select>
                                @error('level')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea class="form-control form-rounded @error('address') is-invalid @enderror" name="address" id="address"
                                    rows="2" placeholder="cth. Japanan Lor, Jombang">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
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
                $('#addAdmin').modal('show');
            @endif
        });

        // check box selected all
        $('#select_all').click(function() {
            $('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
        });
    </script>
@endsection

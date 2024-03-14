@extends('layouts.master')
@section('title')
    Kategori
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Semua Kategori
        @endslot
        @slot('title')
            Kategori Properti
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
                    {{-- product category --}}
                    <div class="tab-pane" id="product-categories" role="tabpanel">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div>
                                        <h5 class="card-title">Kategori Properti
                                            <span class="text-muted fw-normal">({{ $productCategories->count() }})</span>
                                        </h5>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    @unless ($isDirector)
                                        <div class="flex-wrap gap-2 d-flex align-items-center justify-content-end">
                                            <div>

                                                <button type="button"
                                                    class="btn btn-success btn-rounded waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target="#addCategory"><i
                                                        class="bx bx-plus me-1"></i>
                                                    Buat Kategori Baru</button>
                                            </div>

                                            <div class="dropdown">
                                                <a class="py-1 shadow-none btn btn-link text-muted font-size-16 dropdown-toggle"
                                                    href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('category.destroy-all') }}">
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

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table align-middle datatable dt-responsive table-check nowrap"
                                    style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>Foto</th>
                                            <th>Nama Kategori</th>
                                            <th>Lokasi</th>
                                            @unless ($isDirector)
                                                <th>Tindakan</th>
                                            @endunless
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($productCategories as $productCategory)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center align-middle">
                                                    <img src="{{ URL::asset('storage/' . $productCategory->photo) }}"
                                                        width="70" alt="">
                                                </td>
                                                <td>{{ $productCategory->name }}</td>
                                                <td>{{ $productCategory->location }}</td>
                                                @unless ($isDirector)
                                                    <td class="align-middle">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle card-drop"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a href="{{ route('category.edit', $productCategory->id) }}"
                                                                        class="dropdown-item">
                                                                        <i
                                                                            class="mdi mdi-pencil font-size-16 text-success me-1"></i>
                                                                        Edit
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#" class="dropdown-item delete-user"
                                                                        data-id="{{ $productCategory->id }}"
                                                                        onclick="deleteCategory(event)">
                                                                        <i
                                                                            class="mdi mdi-trash-can font-size-16 text-danger me-1"></i>
                                                                        Hapus
                                                                    </a>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                @endunless
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
        <!-- end col -->
    </div> <!-- end row -->

    {{-- START:: Modal Tambah Kategori Baru --}}
    <div id="addCategory" class="modal fade" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryLabel">
                        Buat Kategori Baru
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation mt-0 pt-2" novalidate method="POST" action="{{ route('category.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Nama Kategori <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('name') is-invalid @enderror" name="name"
                                        id="name" placeholder="cth. Perum Merkuri" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="code" class="form-label">
                                    Kode Kategori <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-rounded @error('code') is-invalid @enderror"
                                    name="code" id="code" placeholder="cth. PM00" value="{{ old('code') }}">
                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">
                                    Lokasi <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                    class="form-control form-rounded @error('location') is-invalid @enderror"
                                    name="location" id="location" placeholder="cth. Japanan Lor, Jombang"
                                    value="{{ old('location') }}">
                                @error('location')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">
                                    Upload Foto
                                </label>
                                <input type="file"
                                    class="form-control form-rounded @error('photo') is-invalid @enderror" name="photo"
                                    id="photo" placeholder="" value="{{ old('photo') }}">
                                @error('photo')
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
    {{-- END:: Modal Tambah Kategori Baru --}}
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

    <script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>

    {{-- delete --}}
    <script>
        function deleteCategory(event) {
            event.preventDefault();
            const userId = event.currentTarget.getAttribute('data-id');
            if (confirm('Apakah Anda yakin ingin menghapus Kategori ini?')) {
                fetch(`{{ route('category.destroy', ':id') }}`.replace(':id', userId), {
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
                            alertMessage.innerHTML = 'Kategori berhasil dihapus.';
                            document.body.appendChild(alertMessage);

                            // Hilangkan pesan setelah beberapa detik
                            setTimeout(() => {
                                alertMessage.remove();
                            }, 3000);

                            // Redirect ke halaman yang ditentukan
                            window.location.href = response.url;
                        } else {
                            // Jika tidak ada redirection, berarti ada kesalahan
                            console.error('Gagal menghapus Kategori');
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

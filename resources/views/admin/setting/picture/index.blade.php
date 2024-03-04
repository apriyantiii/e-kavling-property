@extends('layouts.master')
@section('title')
    Semua Gambar Landing Page
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
            Gambar Landing Page
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
                                            <h5 class="card-title">Semua Gambar
                                                <span class="text-muted fw-normal">({{ $picture->count() }})</span>
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        @unless ($isDirector)
                                            <div class="flex-wrap gap-2 d-flex align-items-center justify-content-end">
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-success btn-rounded waves-effect waves-light"
                                                        data-bs-toggle="modal" data-bs-target="#addPicture"><i
                                                            class="bx bx-plus me-1"></i>
                                                        Tambah Gambar</button>
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
                                                    <th>ID</th>
                                                    <th>Foto</th>
                                                    @unless ($isDirector)
                                                        <th>Tindakan</th>
                                                    @endunless
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($picture as $picture)
                                                    <tr>
                                                        <td>{{ $picture->id }}</td>
                                                        <td class="text-center align-middle">
                                                            @if ($picture->picture !== null)
                                                                <img src="{{ URL::asset('storage/' . $picture->picture) }}"
                                                                    width="500" alt="">
                                                            @else
                                                                <!-- Tampilkan placeholder gambar atau teks alternatif -->
                                                                <span class="text-danger">null</span>
                                                            @endif
                                                        </td>
                                                        @unless ($isDirector)
                                                            <td class="align-middle">
                                                                <div class="dropdown">
                                                                    <a href="#" class="dropdown-toggle card-drop"
                                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                                        <li>
                                                                            <a href="#" class="dropdown-item delete-user"
                                                                                data-id="{{ $picture->id }}"
                                                                                onclick="deletePicture(event)">
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
                            </form>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->

        </div> <!-- end col -->
    </div> <!-- end row -->

    {{-- START:: Modal Tambah Gambar --}}
    <div id="addPicture" class="modal fade" tabindex="-1" aria-labelledby="addPictureLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPictureLabel">
                        Tambahkan Gambar
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.setting-picture.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="picture" class="form-label">
                                Upload Gambar <span class="text-danger">*</span>
                            </label>
                            <input type="file" class="form-control form-rounded @error('picture') is-invalid @enderror"
                                name="picture" id="picture" placeholder="" value="{{ old('picture') }}" required
                                autocomplete="picture">
                            @error('picture')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-rounded btn btn-secondary waves-effect"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn-rounded btn btn-primary waves-effect waves-light">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- END:: Modal Tambah Gambar --}}
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/datatables.net/datatables.net.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons/datatables.net-buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/datatables.net-buttons-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    {{-- form select --}}
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.js') }}">
    </script>
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>

    <script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>

    {{-- delete --}}
    <script>
        function deletePicture(event) {
            event.preventDefault();
            const userId = event.currentTarget.getAttribute('data-id');
            if (confirm('Apakah Anda yakin ingin menghapus Gambar ini?')) {
                fetch(`{{ route('admin.setting-picture.destroy', ':id') }}`.replace(':id', userId), {
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
                            alertMessage.innerHTML = 'Gambar berhasil dihapus.';
                            document.body.appendChild(alertMessage);

                            // Hilangkan pesan setelah beberapa detik
                            setTimeout(() => {
                                alertMessage.remove();
                            }, 3000);

                            // Redirect ke halaman yang ditentukan
                            window.location.href = response.url;
                        } else {
                            // Jika tidak ada redirection, berarti ada kesalahan
                            console.error('Gagal menghapus Gambar');
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

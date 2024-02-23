@extends('layouts.master')
@section('title')
    Semua Produk
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
                                            <h5 class="card-title">Semua Produk
                                                <span class="text-muted fw-normal">({{ $products->count() }})</span>
                                            </h5>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="flex-wrap gap-2 d-flex align-items-center justify-content-end">
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-outline-secondary btn-rounded dropdown-toggle waves-effect waves-light"
                                                    data-bs-toggle="dropdown" aria-expanded="false">Import & Download
                                                    <i class="fas fa-angle-down "></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-plus me-1 text-success"></i>
                                                        Import Data Produk
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-file-excel me-1 text-success"></i>
                                                        Unduh Data Produk
                                                    </a>

                                                </div>
                                            </div>
                                            <div>
                                                <a href="{{ route('product.create') }}"
                                                    class="btn btn-success btn-rounded waves-effect waves-light"><i
                                                        class="bx bx-plus me-1"></i> Buat
                                                    Produk Baru</a>
                                            </div>

                                            <div class="dropdown">
                                                <a class="py-1 shadow-none btn btn-link text-muted font-size-16 dropdown-toggle"
                                                    href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        {{-- <form action="{{ route('category.delete-all') }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="dropdown-item">
                                                                <i class="bx bx-trash me-1 text-danger"></i>
                                                                Hapus Semua
                                                            </button>
                                                        </form> --}}
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
                                                    <th>Foto</th>
                                                    <th class="text-center">ID</th>
                                                    <th>Nama Produk</th>
                                                    <th>Kode Produk</th>
                                                    {{-- <th>Nama Kategori</th> --}}
                                                    <th>Lokasi</th>
                                                    <th>Ukuran</th>
                                                    {{-- <th>Harga</th> --}}
                                                    <th>Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td class="text-center align-middle">
                                                            <img src="{{ URL::asset('storage/' . $product->photo) }}"
                                                                width="70" alt="">
                                                        </td>
                                                        <td class="text-center">{{ $product->id }}</td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->code }}</td>
                                                        {{-- <td>
                                                            @if ($product->productCategory && $product->productCategory->name)
                                                                {{ $product->productCategory->name }}
                                                            @else
                                                                <span class="text-danger">Tidak Masuk Kategori</span>
                                                            @endif
                                                        </td> --}}
                                                        <td>{{ $product->location }}</td>
                                                        <td>{{ $product->size }}</td>
                                                        {{-- <td>{{ $product->price }}</td> --}}
                                                        <td class="align-middle">
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle card-drop"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="mdi mdi-dots-horizontal font-size-18"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a href="{{ route('detail.product.admin', $product->id) }}"
                                                                            class="dropdown-item"><i
                                                                                class="mdi mdi-eye font-size-16 text-success me-1"></i>
                                                                            Detail</a>
                                                                    </li>
                                                                    <li><a href="{{ route('product.edit', $product->id) }}"
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
                                                                            action="{{ route('product.destroy', $product->id) }}"
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
@endsection

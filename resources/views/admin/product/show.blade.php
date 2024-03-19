@extends('layouts.master')
@section('title')
    Detail Produk - {{ $products->name }}
@section('css')
    <link href="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Produk
        @endslot
        @slot('title')
            Detail Produk
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
                                        <h5 class="card-title">Detail Produk
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive-vertical">
                                <table id="datatable" class="table align-middle datatable dt-responsive table-check nowrap"
                                    style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">

                                    <tr>
                                        <td data-label="Foto Produk"><strong>Foto Produk</strong></td>
                                        <td><img src="{{ URL::asset('storage/' . $products->photo) }}" width="70"
                                                alt=""></td>
                                    </tr>
                                    <tr>
                                        <td data-label="Foto Produk"><strong>Foto Pendukung</strong></td>
                                        <td><img src="{{ URL::asset('storage/' . $products->photo_2) }}" width="70"
                                                alt=""></td>
                                    </tr>
                                    <tr>
                                        <td data-label="Nama Produk"><strong>Nama Produk</strong></td>
                                        <td>{{ $products->name }}</td>
                                    </tr>
                                    <tr>
                                        <td data-label="Kode"><strong>Kode</strong></td>
                                        <td>{{ $products->code }}</td>
                                    </tr>
                                    <tr>
                                        <td data-label="Harga"><strong>Harga</strong></td>
                                        <td>
                                            {!! $products->formatted_price !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td data-label="Kategori"><strong>Kategori</strong></td>
                                        <td>{{ $products->productCategory->name }}</td>
                                    </tr>
                                    <tr>
                                        <td data-label="Alamat"><strong>Alamat</strong></td>
                                        <td>{{ $products->location }}</td>
                                    </tr>
                                    <tr>
                                        <td data-label="Latitude"><strong>Latitude</strong></td>
                                        <td>{{ $products->latitude }}</td>
                                    </tr>
                                    <tr>
                                        <td data-label="Longitude"><strong>Longitude</strong></td>
                                        <td>{{ $products->longitude }}</td>
                                    </tr>
                                    <tr>
                                        <td data-label="Deskripsi"><strong>Deskripsi</strong></td>
                                        <td>{!! $products->description_sentences !!}</td>
                                    </tr>
                                    <tr>
                                        <td data-label="Fasilitas"><strong>Fasilitas</strong></td>
                                        <td>{!! $products->feature_sentences !!}</td>
                                    </tr>
                                    <tr>
                                        <td data-label="Status"><strong>Status</strong></td>
                                        <td>{{ $products->status }}</td>
                                    </tr>
                                    <tr>
                                        <td data-label="Ukuran"><strong>Ukuran</strong></td>
                                        <td>{{ $products->size }}</td>
                                    </tr>
                                    <tr>
                                        <td data-label="Vidio"><strong>Vidio</strong></td>
                                        <td>
                                            <div class="block-16">
                                                <figure>
                                                    <!-- Ganti URL video sesuai dengan URL video yang disimpan di database -->
                                                    <video width="340" height="240" controls>
                                                        <source src="{{ asset('storage/' . $products->video_url) }}"
                                                            type="video/mp4"><span class="icon-play"></span>
                                                    </video>
                                                </figure>
                                            </div>
                                        </td>
                                    </tr><!-- END TR-->
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
                <form action="{{ route('category.store') }}" method="POST">
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

    {{-- form select --}}
    <script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
@endsection

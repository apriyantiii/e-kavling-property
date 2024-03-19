@extends('layouts.master')
@section('title')
    Edit - {{ $productCategory->name }}
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Edit
        @endslot
        @slot('title')
            {{ $productCategory->name }}
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Edit Kategori Produk
                    </h4>
                    <p class="card-title-desc">
                        Edit Kategori Produk Anda dengan mudah sesuai kebutuhan
                    </p>
                </div>
                <form action="{{ route('category.update', $productCategory->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="p-4 card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Nama Kategori
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('name') is-invalid @enderror" name="name"
                                        id="name" placeholder="cth. Griya Pakuwon, dll"
                                        value="{{ $productCategory->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="code" class="form-label">
                                        Kode Kategori
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('code') is-invalid @enderror" name="code"
                                        id="code" placeholder="cth. PM00" value="{{ $productCategory->code }}">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label">
                                        Lokasi
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('location') is-invalid @enderror"
                                        name="location" id="location" placeholder="cth. Japanan Lor, Jombang"
                                        value="{{ $productCategory->location }}">
                                    @error('location')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="photo" class="form-label">
                                        Foto Kategori
                                    </label>
                                    <input type="file"
                                        class="form-control form-rounded @error('photo') is-invalid @enderror"
                                        name="photo" id="photo" placeholder="" value="{{ $productCategory->photo }}">
                                    @error('photo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <a href="javascript: void(0);" class="btn btn-primary btn-rounded waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target=".confirmModal">Simpan Perubahan
                                </a>

                                <!-- Modal -->
                                <div class="modal fade confirmModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <div class="mb-3">
                                                        <i class="bx bx-check-circle display-4 text-success"></i>
                                                    </div>
                                                    <h5>Konfirmasi perubahan Kategori Produk
                                                    </h5>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary btn-rounded w-md"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary btn-rounded w-md"
                                                        data-bs-dismiss="modal">Konfirmasi</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end modal -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
@section('script')
    {{-- form select --}}
    <script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

@extends('layouts.master')
@section('title')
    Edit - {{ $product->name }}
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.css') }}" rel="stylesheet">

    {{-- select css --}}
    <link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Produk
        @endslot
        @slot('title')
            {{ $product->name }}
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 card-title">Edit Produk</h4>
                    <p class="card-title-desc mt-2">
                        Edit Produk Anda dengan mudah sesuai kebutuhan
                    </p>
                </div>
                <div class="card-body">
                    <form class="needs-validation mt-0 pt-2" novalidate method="POST"
                        action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Nama Produk
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('name') is-invalid @enderror" name="name"
                                        id="name" placeholder="cth. Perum Merkuri Tengah" value="{{ $product->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="product_category_id" class="form-label">
                                        Pilih
                                        Kategori<span class="text-danger"> *</span>
                                    </label>
                                    <select class="form-control @error('product_category_id') is-invalid @enderror"
                                        data-trigger name="product_category_id" id="category"
                                        value="{{ old('product_category_id') }}" required
                                        autocomplete="product_category_id">
                                        <option value="">Pilih Kategori</option>
                                        <option value="{{ $productCategory->id }}" selected>{{ $productCategory->name }}
                                        </option>
                                    </select>
                                    @error('product_category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="location" class="form-label">
                                        Lokasi
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('location') is-invalid @enderror"
                                        name="location" id="location"
                                        placeholder="cth. Jln. Basuki Rahmat No.12, Kec. Jombang, Kab. Jombang"
                                        value="{{ $product->location }}">
                                    @error('location')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="price" class="form-label">
                                        Harga
                                    </label>
                                    <input type="number"
                                        class="form-control form-rounded @error('price') is-invalid @enderror"
                                        name="price" id="price"
                                        placeholder="Tercatat dalam satuan Meter Persegi cth. 100 m2"
                                        value="{{ $product->price }}">
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description">Deskrips</label>
                                    <textarea class="form-control" name="description" id="description" rows="5"
                                        placeholder="cth. kavling ini berada di area perumahan..." value="">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="code" class="form-label">
                                        Kode Produk
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('code') is-invalid @enderror" name="code"
                                        id="code" placeholder="cth. PM001" value="{{ $product->code }}">
                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">
                                        Status Sertifikat
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('status') is-invalid @enderror"
                                        name="status" id="status_sertifikat" placeholder="cth. SHM/SHG"
                                        value="{{ $product->status }}">
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="size" class="form-label">
                                        Luas Tanah
                                    </label>
                                    <input type="text"
                                        class="form-control form-rounded @error('size') is-invalid @enderror"
                                        name="size" id="size"
                                        placeholder="Tercatat dalam satuan Meter Persegi cth. 100 m2"
                                        value="{{ $product->size }}">
                                    @error('size')
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
                                        class="form-control form-rounded @error('photo') is-invalid @enderror"
                                        name="photo" id="photo" placeholder="" value="{{ $product->photo }}">
                                    @error('photo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="feature">Fasilita</label>
                                    <textarea class="form-control" name="feature" id="feature" rows="5"
                                        placeholder="cth. dekat dengan pasar, ATM, pedagang kaki lima" value="{{ $product->feature }}">{{ old('feature', $product->feature) }}</textarea>
                                    @error('feature')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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
                                                <h5>Konfirmasi perubahan Produk
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
                    </form>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js') }}"></script>

    {{-- form select --}}
    <script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#trackInventorySwitch").click(function() {
                if ($("#trackInventoryLabel").text() == "Off")
                    $("#trackInventoryLabel").text("On")
                else
                    $("#trackInventoryLabel").text("Off");
            });

            // image preview
            $('#image').change(function() {
                // if any image added before
                if ($('.img-preview').length) {
                    $('.img-preview').attr('src', URL.createObjectURL(this.files[0]));
                } else {
                    var elements = `                          
                        <img class="img-thumbnail img-preview mx-auto d-block my-2">
                    `;

                    $('#img').append(elements);
                    $('.img-preview').attr('src', URL.createObjectURL(this.files[0]));
                }
            });
        });
    </script>
@endsection

@extends('user.profile.layouts.master')
@section('title')
    Wishlist Saya
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet">
@endsection
@include('layouts.head-css')
@section('content')
    <br><br>

    <div class="row mb-5">
        <div class="container">
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
                    <div>
                        <h4 class="card-title">Halaman Wishlist</h4>
                        <p class="card-title-desc mb-4">Berisi properti yang telah diinginkan dan akan dibeli di kemudian
                            hari. <br><strong>Untuk checkout silahkan tekan produk yang diinginkan dan checkout di halaman
                                detail properti</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card justify-content-center">
                    <div class="card-body justify-content-center">
                        @if ($wishlist->isEmpty())
                            <p class="text-center">Wishlist belum ditambahkan.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Properti</th>
                                            <th>Detail</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th colspan="2">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wishlist as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ URL::asset('storage/' . $item->product->photo) }}"
                                                        alt="product-img" title="product-img" class="avatar-xl" />
                                                </td>
                                                <td>
                                                    <h5 class="font-size-14 text-truncate"><a
                                                            href="{{ route('product.show', $item->product->id) }}"
                                                            class="text-dark">{{ $item->product->name }}</a></h5>
                                                    <p class="mb-0">Lokasi : <span
                                                            class="fw-medium">{{ $item->product->location }}</span></p>
                                                </td>
                                                <td>
                                                    {{ $item->product->formatted_price }}
                                                </td>
                                                <td>
                                                    <div class="me-3" style="width: 120px;">
                                                        <input type="text" value="01" name="demo_vertical"
                                                            oninput="validity.valid||(value='1');" disabled>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $item->product->location }}
                                                </td>
                                                <td>
                                                    <a href="#" class="action-icon text-danger delete-wishlist"
                                                        onclick="event.preventDefault(); document.getElementById('deleteProductForm').submit();">
                                                        <i class="mdi mdi-trash-can font-size-18"></i>
                                                    </a>

                                                    <form id="deleteProductForm"
                                                        action="{{ route('wishlist.destroy', $item->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <a href="{{ route('home.properti') }}" class="btn btn-secondary">
                                    <i class="mdi mdi-arrow-left me-1"></i> Properti Lainnya </a>
                            </div> <!-- end col -->
                            {{-- <div class="col-sm-6">
                                <div class="text-sm-end mt-2 mt-sm-0">
                                    <a href="{{ url('checkout') }}" class="btn btn-success">
                                        <i class="mdi mdi-cart-arrow-right me-1"></i> Beli Sekarang </a>
                                </div>
                            </div> <!-- end col --> --}}
                        </div> <!-- end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/ecommerce-cart.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

@extends('user.profile.layouts.master')
@section('title')
    Checkout
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
@endsection
@include('layouts.head-css')
@section('content')
    <br>
    <!-- end page title -->
    @if (session('purchase_status') === 'waiting_confirmation')
        <div class="container">
            <div class="checkout-tabs">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="nav nav-pills flex-column flex-sm-row nav-justified" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link" id="v-pills-shipping-tab" data-bs-toggle="pill" href="#v-pills-shipping"
                                role="tab" aria-controls="v-pills-shipping" aria-selected="false">
                                <i class= "bx bx-receipt d-block check-nav-icon mt-4 mb-2"></i>
                                <p class="fw-bold mb-4">Validasi Data</p>
                            </a>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-shipping" role="tabpanel"
                                        aria-labelledby="v-pills-shipping-tab">
                                        <div>
                                            <h3 class="card-title text-center mt-5"><strong>Validasi Data Pembelian
                                                    Diterima!</strong></h3><br>
                                            <h4 class="card-title-desc text-center mb-2">Pembelianmu sedang di konfirmasi
                                                oleh
                                                admin.</h4>
                                            <h4 class="card-title-desc text-center mb-4">Tunggu dan refresh website secara
                                                berkala untuk lanjut ke tahap
                                                pembayaran!</h4>
                                            <i class='bx bxs-time text-center'
                                                style='font-size: 4rem; display: block; margin: 0 auto;'></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-sm-6">
                                        @foreach ($purchaseValidation as $singlePurchaseValidation)
                                            @if ($singlePurchaseValidation->user_id === Auth::id())
                                                <a href="{{ route('purchase.editPurchaseValidation', $singlePurchaseValidation->id) }}"
                                                    class="btn text-muted d-none d-sm-inline-block btn-link">
                                                    <i class="mdi mdi-arrow-left me-1"></i> Kembali </a>
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div> <!-- end col -->
                        {{-- <div class="col-sm-6">
                                    <div class="text-end">
                                        <a href="{{ url('ecommerce-checkout') }}" class="btn btn-success">
                                            <i class="mdi mdi-truck-fast me-1"></i> Proceed to Shipping </a>
                                    </div>
                                </div> <!-- end col --> --}}
                    </div> <!-- end row -->
                </div>
            </div>

        </div>
    @else
        <!-- Redirect ke halaman lain -->
        <script>
            window.location = "{{ route('checkout.index') }}";
        </script>
@endif
</div>
</div>
<!-- end row -->
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/ecommerce-select2.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

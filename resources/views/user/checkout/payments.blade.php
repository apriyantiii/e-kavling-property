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
        <div class="container">
            <div class="checkout-tabs">
                <div class="row">
                    <div class="col-xl-12">

                        <div class="nav nav-pills flex-column flex-sm-row nav-justified" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" href="#v-pills-payment"
                                role="tab" aria-controls="v-pills-payment" aria-selected="false">
                                <i class= "bx bx-money d-block check-nav-icon mt-4 mb-2"></i>
                                <p class="fw-bold mb-4">Validasi Pembayaran</p>
                            </a>

                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content" id="v-pills-tabContent">

                                    <div class="tab-pane fade show active" id="v-pills-payment" role="tabpanel"
                                        aria-labelledby="v-pills-payment-tab">
                                        <div>
                                            <h4 class="card-title">Payment Information</h4>
                                            <p class="card-title-desc mb-4">Fill all information below</p>

                                            <div>
                                                <div class="form-check form-check-inline font-size-16">
                                                    <input class="form-check-input" type="radio" name="paymentoptionsRadio"
                                                        id="paymentoptionsRadio1" checked>
                                                    <label class="form-check-label font-size-13" for="paymentoptionsRadio1"><i
                                                            class="fab fa-cc-mastercard me-1 font-size-20 align-top"></i>
                                                        Credit / Debit Card</label>
                                                </div>
                                                <div class="form-check form-check-inline font-size-16">
                                                    <input class="form-check-input" type="radio" name="paymentoptionsRadio"
                                                        id="paymentoptionsRadio2">
                                                    <label class="form-check-label font-size-13" for="paymentoptionsRadio2"><i
                                                            class="fab fa-cc-paypal me-1 font-size-20 align-top"></i>
                                                        Paypal</label>
                                                </div>
                                                <div class="form-check form-check-inline font-size-16">
                                                    <input class="form-check-input" type="radio" name="paymentoptionsRadio"
                                                        id="paymentoptionsRadio3">
                                                    <label class="form-check-label font-size-13" for="paymentoptionsRadio3"><i
                                                            class="far fa-money-bill-alt me-1 font-size-20 align-top"></i> Cash
                                                        on Delivery</label>
                                                </div>
                                            </div>

                                            <h5 class="mt-5 mb-3 font-size-15">For card Payment</h5>
                                            <div class="p-4 border">
                                                <form>
                                                    <div class="form-group mb-0">
                                                        <label for="cardnumberInput">Card Number</label>
                                                        <input type="text" class="form-control" id="cardnumberInput"
                                                            placeholder="0000 0000 0000 0000">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group mt-4 mb-0">
                                                                <label for="cardnameInput">Name on card</label>
                                                                <input type="text" class="form-control" id="cardnameInput"
                                                                    placeholder="Name on Card">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group mt-4 mb-0">
                                                                <label for="expirydateInput">Expiry date</label>
                                                                <input type="text" class="form-control" id="expirydateInput"
                                                                    placeholder="MM/YY">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="form-group mt-4 mb-0">
                                                                <label for="cvvcodeInput">CVV Code</label>
                                                                <input type="text" class="form-control" id="cvvcodeInput"
                                                                    placeholder="Enter CVV Code">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-sm-6">
                                <a href="{{ url('ecommerce-cart') }}" class="btn text-muted d-none d-sm-inline-block btn-link">
                                    <i class="mdi mdi-arrow-left me-1"></i> Back to Shopping Cart </a>
                            </div> <!-- end col -->
                            <div class="col-sm-6">
                                <div class="text-end">
                                    <a href="{{ url('ecommerce-checkout') }}" class="btn btn-success">
                                        <i class="mdi mdi-truck-fast me-1"></i> Proceed to Shipping </a>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>
                </div>
            </div>
            <!-- end row -->
        @endsection
        @section('script')
            <script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
            <script src="{{ URL::asset('assets/js/pages/ecommerce-select2.init.js') }}"></script>
            <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
        @endsection

@extends('user.layouts.master')
@section('title')
    Beranda E-Kavling
@endsection
@section('css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('front-end/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('front-end/css/animate.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('front-end/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('front-end/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('front-end/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('front-end/css/aos.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('front-end/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('front-end/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('front-end/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('front-end/css/style.css') }}">
@endsection
@section('content')

    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <section class="ftco-intro img" id="about-section" style="background-image: url(front-end/images/bg_1.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 text-center">
                        <h2>Pilih Properti Impianmu</h2>
                        <p>Seperti sungai yang mengalir ke arah yang benar, investasi yang
                            cerdas dapat membawa manfaat jangka panjang dan keberlanjutan untuk masa depan.
                        </p>
                        <a href="{{ route('home.properti') }}" class="btn btn-light mx-auto"
                            style="border-radius: 20px">Kembali</a>

                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section ftco-properties" id="properties-section">
            <div class="container-fluid px-md-5">
                <div class="row">
                    <h1 class="text-center">Hasil Pencarian dari {{ $keyword }}</h1>
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach ($allProducts as $allProduct)
                                <div class="col-md-6 col-lg-4">
                                    <div class="properties ftco-animate">
                                        <div class="img">
                                            <img src="{{ URL::asset('storage/' . $allProduct->photo) }}"
                                                style="height: 250px; width: 450px" class="img-fluid rounded"
                                                alt="Colorlib Template">
                                        </div>
                                        <div class="desc">
                                            <div class="d-flex pt-5">
                                                <div>
                                                    <h3><a
                                                            href="{{ route('product.show', $allProduct->id) }}">{{ $allProduct->name }}</a>
                                                    </h3>
                                                </div>
                                                <div class="pl-md-4">
                                                    <h4 class="price">{{ $allProduct->price }}</h4>
                                                </div>
                                            </div>
                                            <p class="h-info"><span class="location">{{ $allProduct->code }}</span> <span
                                                    class="details">&mdash; {{ $allProduct->location }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row mt-5">
                            <div class="col text-center">
                                <div class="block-27">
                                    <ul>
                                        <li><a href="#">&lt;</a></li>
                                        <li class="active"><span>1</span></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">&gt;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
@endsection
@section('script')
    <script src="{{ URL::asset('fron-end/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('fron-end/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ URL::asset('fron-end/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('fron-end/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('fron-end/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ URL::asset('fron-end/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('fron-end/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ URL::asset('fron-end/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('fron-end/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('fron-end/js/aos.js') }}"></script>
    <script src="{{ URL::asset('fron-end/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ URL::asset('fron-end/js/scrollax.min.js') }}"></script>
    <script src="{{ URL::asset('fron-end/js/google-map.js') }}"></script>

    <script src="{{ URL::asset('fron-end/js/main.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
@endsection

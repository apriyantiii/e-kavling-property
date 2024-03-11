@extends('guest.layouts.master')
@section('title')
    Detail Kategori Properti
@endsection
@section('css')
@endsection

@section('content')

    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <section class="ftco-intro img" id="about-section"
            style="background-image: url('{{ asset('storage/' . $picture->picture) }}');">
            <div class="overlay"></div>
            <div class="container p-3">
                <div class="row justify-content-center">
                    <div class="col-md-9 text-center">
                        <h2>Rincian Properti Kategori
                            {{ $productCategory->name }}
                        </h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section ftco-properties" id="properties-section">
            <div class="container-fluid px-md-5 p-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="d-flex flex-wrap justify-content-start" style="margin-left: 170px">
                            @php $count = 0 @endphp
                            @foreach ($products as $product)
                                <a href="{{ route('landing-page.detail-properti', $product->id) }}"
                                    class="btn {{ $statuses[$product->id] == 'sold' ? 'btn-danger' : 'btn-success' }}"
                                    style="width: 150px; height: 100px; margin-right: 15px; margin-bottom: 15px; padding-top: 27px">
                                    <div>{{ $product->productCategory->code }}/{{ $product->code }}</div>
                                    <div>{{ $statuses[$product->id] == 'sold' ? 'Terjual' : 'Tersedia' }}</div>
                                </a>
                                @php $count++ @endphp
                                @if ($count % 6 == 0)
                        </div>
                        <div class="d-flex flex-wrap justify-content-start mt-3" style="margin-left: 170px">
                            @endif
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
    <script src="{{ URL::asset('front-end/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('front-end/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ URL::asset('front-end/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('front-end/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('front-end/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ URL::asset('front-end/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('front-end/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ URL::asset('front-end/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('front-end/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('front-end/js/aos.js') }}"></script>
    <script src="{{ URL::asset('front-end/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ URL::asset('front-end/js/scrollax.min.js') }}"></script>
    <script src="{{ URL::asset('front-end/js/google-map.js') }}"></script>

    <script src="{{ URL::asset('front-end/js/main.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
@endsection

@extends('user.layouts.master')
@section('title')
    Detail Product
@endsection
@section('css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front-end/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/ionicons.min.css') }}">
    {{-- maps --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <link rel="stylesheet" href="{{ asset('front-end/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .tour-wrap table {
            margin-bottom: 0;
            /* Menghilangkan margin bawah pada tabel */
        }

        .tour-wrap th,
        .tour-wrap td {
            padding: 5px;
            /* Atur padding sesuai kebutuhan */
            border-top: none;
            /* Menghilangkan border atas pada sel */
        }

        .tour-wrap p {
            margin-bottom: 0px;
            /* Atur margin bawah pada elemen paragraf */
        }

        .tour-wrap .d-flex ul li,
        .tour-wrap .block-16 figure {
            margin-bottom: 0px;
            /* Atur margin bawah pada elemen-elemen ini */
        }
    </style>
@endsection

@section('content')

    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <section class="hero-wrap hero-wrap-2"
            style="background-image: url('{{ asset('storage/' . $picture->picture) }}');"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container p-3">
                <div class="row no-gutters slider-text align-items-end justify-content-start">
                    <div class="col-md-9 ftco-animate pb-4">
                        <h1 class="mb-3 bread text-white">Detail Properti</h1>
                        <p class="breadcrumbs text-white"><span class="mr-2"><a href="{{ route('home.properti') }}"
                                    class="text-white">Beranda Properti <i
                                        class="ion-ios-arrow-forward text-white"></i></a></span>
                            <span class="text-white">{{ $products->name }} <i class="ion-ios-arrow-forward"></i></span>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <br><br>
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
        </div>

        <section class="ftco-section ftco-services-2">
            <div class="container p-3">
                <div class="row">
                    <div class="col-md-12 property-wrap mb-5">
                        <div class="row">
                            <div class="col-md-6 d-flex ftco-animate">
                                <div class="img align-self-stretch"
                                    style="background-image:url('{{ URL::asset('storage/' . $products->photo) }}');">
                                </div>
                            </div>
                            <div class="col-md-6 ftco-animate py-5">
                                <div class="text py-5 pl-md-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div>
                                            <h3><a href="properties-single.html">{{ $products->name }}<span
                                                        class="details">&mdash; {{ $products->code }}</a></h3>
                                        </div>
                                        <div>
                                            <h4 class="price">{!! $products->formatted_price !!}</h4>
                                        </div>
                                    </div>
                                    <p class="mb-5">{!! $products->description_sentences !!}</p>
                                    <div class="d-flex">
                                        <form method="POST" action="{{ route('wishlist.store') }}" class="me-2">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $products->id }}">
                                            <button type="submit"
                                                class="btn btn-outline-secondary py-3 px-4 {{ $isProductPurchased ? 'disabled' : '' }}"
                                                style="margin-right: 3px" {{ $isProductPurchased ? 'disabled' : '' }}>
                                                <span class="far fa-heart pr-2"></span>Wishlist
                                            </button>
                                        </form>
                                        <a href="{{ route('user.live-chat') }}"
                                            class="btn btn-outline-danger py-3 px-4 me-2" style="margin-right: 3px"><span
                                                class="fab fa-rocketchat pr-2"></span>Live
                                            Chat</a>
                                        <a href="{{ !$isProductPurchased ? route('checkout.purchase', $products->id) : '#' }}"
                                            class="btn btn-secondary py-3 px-4 {{ $isProductPurchased ? 'disabled' : '' }}"
                                            {{ $isProductPurchased ? 'disabled' : '' }}>
                                            Beli Properti
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 tour-wrap">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row"><strong>Fasilitas</strong></th>
                                    <td>
                                        <p>{!! $products->feature_sentences !!}</p>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->

                                <tr>
                                    <th scope="row"><strong>Lokasi</strong></th>
                                    <td>
                                        <p>{{ $products->location }}</p>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->

                                <tr>
                                    <th scope="row"><strong>Luas Wilayah</strong></th>
                                    <td>
                                        <p>{{ $products->size }}</p>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->

                                <tr>
                                    <th scope="row"><strong>Status Sertifikat</strong></th>
                                    <td>
                                        <p>{{ $products->status }}</p>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->
                                <tr>
                                    <th scope="row"><strong>Latitude</strong></th>
                                    <td>
                                        <p>{{ $products->latitude }}</p>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->
                                <tr>
                                    <th scope="row"><strong>Longitude</strong></th>
                                    <td>
                                        <p>{{ $products->longitude }}</p>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->

                                <tr>
                                    <th scope="row"><strong>Status Sertifikat</strong></th>
                                    <td>
                                        <p>{{ $products->status }}</p>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->
                                <tr>
                                    <th scope="row"><strong>Vidio Lokasi</strong></th>
                                    <td>
                                        <div class="block-16">
                                            <figure>
                                                <!-- Ganti URL video sesuai dengan URL video yang disimpan di database -->
                                                <video width="1000" height="440" controls>
                                                    <source src="{{ asset('storage/' . $products->video_url) }}"
                                                        type="video/mp4"><span class="icon-play"></span>
                                                    <a href="https://vimeo.com/45830194"
                                                        class="play-button popup-vimeo"></a>
                                                </video>
                                            </figure>
                                        </div>
                                    </td>
                                </tr><!-- END TR-->

                                <tr>
                                    <th scope="row"><strong>Lokasi Melalui Maps</strong></th>
                                    <td>
                                        <div id="map" style="width: 1000px; height: 400px;"></div>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section> <!-- .section -->
    </body>
@endsection

@section('script')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>

    <script>
        const latitude = {{ $products->latitude }};
        const longitude = {{ $products->longitude }};

        const map = L.map('map').setView([latitude, longitude], 13);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const marker = L.marker([latitude, longitude]).addTo(map)
            .bindPopup('<b>{{ $products->name }}</b><br>{{ $products->location }}').openPopup();

        const popup = L.popup()
            .setLatLng([latitude, longitude])
            .setContent('<b>{{ $products->name }}</b><br>{{ $products->location }}')
            .openOn(map);
    </script>

    {{-- <script>
        const map = L.map('map').setView([-7.555932570835964, 112.23399313901098], 13);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const marker = L.marker([-7.555932570835964, 112.23399313901098]).addTo(map)
            .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

        const popup = L.popup()
            .setLatLng([-7.555932570835964, 112.23399313901098])
            .setContent('I am a standalone popup.')
            .openOn(map);

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent(`You clicked the map at ${e.latlng.toString()}`)
                .openOn(map);
        }

        map.on('click', onMapClick);
    </script> --}}


    <script src="{{ asset('js/main.js') }}"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> --}}
@endsection

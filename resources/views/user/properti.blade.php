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

        {{-- <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target"
            id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="index.html">Stayhome</a>
                <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                    data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav nav ml-auto">
                        <li class="nav-item"><a href="index.html#home-section" class="nav-link"><span>Home</span></a></li>
                        <li class="nav-item"><a href="index.html#services-section"
                                class="nav-link"><span>Services</span></a></li>
                        <li class="nav-item"><a href="index.html#properties-section"
                                class="nav-link"><span>Listing</span></a></li>
                        <li class="nav-item"><a href="index.html#about-section" class="nav-link"><span>About</span></a>
                        </li>
                        <li class="nav-item"><a href="index.html#workflow-section" class="nav-link"><span>How it
                                    works</span></a></li>
                        <li class="nav-item"><a href="index.html#agent-section" class="nav-link"><span>Agent</span></a>
                        </li>
                        <li class="nav-item"><a href="index.html#blog-section" class="nav-link"><span>Blog</span></a>
                        </li>
                        <li class="nav-item"><a href="index.html#contact-section" class="nav-link"><span>Contact</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> --}}
        <section class="ftco-intro img" id="about-section" style="background-image: url(front-end/images/bg_1.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 text-center">
                        <h2>Pilih Properti Impianmu</h2>
                        <p>Seperti sungai yang mengalir ke arah yang benar, investasi yang
                            cerdas dapat membawa manfaat jangka panjang dan keberlanjutan untuk masa depan.
                        </p>

                    </div>
                    <form action="{{ route('product.search') }}" method="get" class="search-location">
                        <div class="row">
                            <div class="col-lg align-items-end">
                                <div class="form-group">
                                    <div class="form-field">
                                        <input type="search" class="form-control" name="search" placeholder="Cari"
                                            required>
                                        <button type="submit"><span class="ion-ios-search"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Hasil Pencarian -->
        {{-- <div class="container">
            <h2>Search Results for "{{ $searchTerm }}"</h2>

            @if ($results->isEmpty())
                <p>No results found.</p>
            @else
                <ul>
                    @foreach ($results as $result)
                        <li>
                            <a href="{{ route('product.show', $result->id) }}">{{ $result->name }}</a>
                            {{-- Tambahkan informasi lain yang ingin ditampilkan --}}
        {{-- </li>
        @endforeach
        </ul>
        @endif
        </div> --}}
        {{-- <section class="hero-wrap hero-wrap-2" style="background-image: url('front-end/images/bg_3.jpg');"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-end justify-content-start">
                    <div class="col-md-9 ftco-animate pb-4">
                        <h1 class="mb-3 bread">Properties</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                        class="ion-ios-arrow-forward"></i></a></span> <span>Properties <i
                                    class="ion-ios-arrow-forward"></i></span></p>
                    </div>
                </div>
            </div>
        </section> --}}


        <section class="ftco-section ftco-properties" id="properties-section">
            <div class="container-fluid px-md-5">
                <div class="row">
                    {{-- <div class="col-lg-3 pr-lg-4">
                        <div class="search-wrap">
                            <h3 class="mb-5">Advance Search</h3>
                            <form action="#" class="search-property">
                                <div class="row">
                                    <div class="col-md-12 align-items-end ftco-animate">
                                        <div class="form-group">
                                            <label for="#">Keyword</label>
                                            <div class="form-field">
                                                <div class="icon"><span class="icon-pencil"></span></div>
                                                <input type="text" class="form-control" placeholder="Keyword">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 align-items-end ftco-animate">
                                        <div class="form-group">
                                            <label for="#">Location</label>
                                            <div class="form-field">
                                                <div class="icon"><span class="icon-pencil"></span></div>
                                                <input type="text" class="form-control" placeholder="City/Locality Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 align-items-end ftco-animate">
                                        <div class="form-group">
                                            <label for="#">Property Type</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Type</option>
                                                        <option value="">Commercial</option>
                                                        <option value="">- Office</option>
                                                        <option value="">Residential</option>
                                                        <option value="">Villa</option>
                                                        <option value="">Condominium</option>
                                                        <option value="">Apartment</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 align-items-end ftco-animate">
                                        <div class="form-group">
                                            <label for="#">Property Status</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Type</option>
                                                        <option value="">Rent</option>
                                                        <option value="">Sale</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 align-items-end ftco-animate">
                                        <div class="form-group">
                                            <label for="#">Agents</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Any</option>
                                                        <option value="">Jonh Doe</option>
                                                        <option value="">Doe Mags</option>
                                                        <option value="">Kenny Scott</option>
                                                        <option value="">Emily Storm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 align-items-end ftco-animate">
                                        <div class="form-group">
                                            <label for="#">Min Beds</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">1</option>
                                                        <option value="">2</option>
                                                        <option value="">3</option>
                                                        <option value="">4</option>
                                                        <option value="">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 align-items-end ftco-animate">
                                        <div class="form-group">
                                            <label for="#">Min Bathroom</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">1</option>
                                                        <option value="">2</option>
                                                        <option value="">3</option>
                                                        <option value="">4</option>
                                                        <option value="">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 align-items-end ftco-animate">
                                        <div class="form-group">
                                            <label for="#">Min Price</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Min Price</option>
                                                        <option value="">$1,000</option>
                                                        <option value="">$5,000</option>
                                                        <option value="">$10,000</option>
                                                        <option value="">$50,000</option>
                                                        <option value="">$100,000</option>
                                                        <option value="">$200,000</option>
                                                        <option value="">$300,000</option>
                                                        <option value="">$400,000</option>
                                                        <option value="">$500,000</option>
                                                        <option value="">$600,000</option>
                                                        <option value="">$700,000</option>
                                                        <option value="">$800,000</option>
                                                        <option value="">$900,000</option>
                                                        <option value="">$1,000,000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 align-items-end ftco-animate">
                                        <div class="form-group">
                                            <label for="#">Max Price</label>
                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                    <select name="" id="" class="form-control">
                                                        <option value="">Max Price</option>
                                                        <option value="">$5,000</option>
                                                        <option value="">$10,000</option>
                                                        <option value="">$50,000</option>
                                                        <option value="">$100,000</option>
                                                        <option value="">$200,000</option>
                                                        <option value="">$300,000</option>
                                                        <option value="">$400,000</option>
                                                        <option value="">$500,000</option>
                                                        <option value="">$600,000</option>
                                                        <option value="">$700,000</option>
                                                        <option value="">$800,000</option>
                                                        <option value="">$900,000</option>
                                                        <option value="">$1,000,000</option>
                                                        <option value="">$2,000,000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 align-items-end ftco-animate">
                                        <div class="form-group">
                                            <label for="#">Min Area <span>(sq ft)</span></label>
                                            <div class="form-field">
                                                <div class="icon"><span class="icon-pencil"></span></div>
                                                <input type="text" class="form-control" placeholder="Min Area">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 align-items-end ftco-animate">
                                        <div class="form-group">
                                            <label for="#">Max Area <span>(sq ft)</span></label>
                                            <div class="form-field">
                                                <div class="icon"><span class="icon-pencil"></span></div>
                                                <input type="text" class="form-control" placeholder="Max Area">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 align-self-end ftco-animate">
                                        <div class="form-group">
                                            <div class="form-field">
                                                <input type="submit" value="Search"
                                                    class="form-control btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- end --> --}}

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
                                            {{-- <div
                                            class="text bg-primary d-flex text-center align-items-center justify-content-center">
                                            <span>Sale</span>
                                        </div> --}}
                                            <div class="d-flex pt-5">
                                                <div>
                                                    <h3><a
                                                            href="{{ route('product.show', $allProduct->id) }}">{{ $allProduct->name }}</a>
                                                    </h3>
                                                </div>
                                                <div class="pl-md-4">
                                                    <h4 class="price">{{ $allProduct->formatted_price }}</h4>
                                                </div>
                                            </div>
                                            <p class="h-info"><span class="location">{{ $allProduct->code }}</span> <span
                                                    class="details">&mdash; {{ $allProduct->location }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="col-md-6 col-lg-4">
                                <div class="properties ftco-animate">
                                    <div class="img">
                                        <img src="{{ asset('front-end/images/work-2.jpg') }}" class="img-fluid"
                                            alt="Colorlib Template">
                                    </div>
                                    <div class="desc">
                                        <div
                                            class="text bg-secondary d-flex text-center align-items-center justify-content-center">
                                            <span>Rent</span>
                                        </div>
                                        <div class="d-flex pt-5">
                                            <div>
                                                <h3><a href="properties-single.html">Fatima Subdivision</a></h3>
                                            </div>
                                            <div class="pl-md-4">
                                                <h4 class="price">$120<span>/mo</span></h4>
                                            </div>
                                        </div>
                                        <p class="h-info"><span class="location">New York</span> <span
                                                class="details">&mdash; 3bds, 2bath</span></p>
                                    </div>
                                </div>
                            </div> --}}

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

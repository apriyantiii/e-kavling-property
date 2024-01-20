@extends('user.layouts.master')
@section('title')
    Beranda E-Kavling
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

    <link rel="stylesheet" href="{{ asset('front-end/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/style.css') }}">
@endsection

@section('content')

    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
        <section class="hero-wrap hero-wrap-2"
            style="background-image:url('{{ URL::asset('front-end/images/bg_3.jpg') }}');"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-end justify-content-start">
                    <div class="col-md-9 ftco-animate pb-4">
                        <h1 class="mb-3 bread">Property Details</h1>
                        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                        class="ion-ios-arrow-forward"></i></a></span> <span>Properties Single <i
                                    class="ion-ios-arrow-forward"></i></span></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section ftco-services-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 property-wrap mb-5">
                        <div class="row">
                            <div class="col-md-6 d-flex ftco-animate">
                                <div class="img align-self-stretch"
                                    style="background-image:url('{{ URL::asset('front-end/images/work-2.jpg') }}');">
                                </div>
                            </div>
                            <div class="col-md-6 ftco-animate py-5">
                                <div class="text py-5 pl-md-5">
                                    <div class="d-flex">
                                        <div>
                                            <h3><a href="properties-single.html">Fatima Subdivision</a></h3>
                                        </div>
                                        <div class="pl-md-4">
                                            <h4 class="price">$120,000</h4>
                                        </div>
                                    </div>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                        Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                                        at the coast of the Semantics, a large language ocean. A small river named Duden
                                        flows by their place and supplies it with the necessary regelialia. It is a
                                        paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 tour-wrap">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Lot area</th>
                                    <td>
                                        <p>1,250 SQ FT</p>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->

                                <tr>
                                    <th scope="row">Floor Area</th>
                                    <td>
                                        <p>1,300 SQ FT</p>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->

                                <tr>
                                    <th scope="row">Bedroom</th>
                                    <td>
                                        <p>4 Bedrooms</p>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->

                                <tr>
                                    <th scope="row">Bathroom</th>
                                    <td>
                                        <p>4 Bathrooms</p>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->

                                <tr>
                                    <th scope="row">Garage</th>
                                    <td>
                                        <p>2 Garage</p>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->


                                <tr>
                                    <th scope="row">Included</th>
                                    <td class="d-flex">
                                        <ul>
                                            <li>Year Built: 2019</li>
                                            <li>Roofing New</li>
                                        </ul>
                                        <ul>
                                            <li>Free Taxes</li>
                                            <li>Agent</li>
                                        </ul>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->

                                <tr>
                                    <th scope="row">Not Included</th>
                                    <td class="d-flex">
                                        <ul>
                                            <li>Taxes</li>
                                        </ul>
                                        <ul>
                                            <li>Entry Fees</li>
                                        </ul>
                                    </td>
                                    <td></td>
                                </tr><!-- END TR-->
                                <tr>
                                    <th scope="row">Maps</th>
                                    <td>
                                        <div id="map"></div>
                                    </td>
                                </tr><!-- END TR-->

                                <tr>
                                    <th scope="row">Take A Tour</th>
                                    <td>
                                        <!-- <div id="map"></div> -->
                                        <div class="block-16">
                                            <figure>
                                                <div class="img" style="background-image: url(images/work-2.jpg);">
                                                </div>
                                                <a href="https://vimeo.com/45830194" class="play-button popup-vimeo"><span
                                                        class="icon-play"></span></a>
                                            </figure>
                                        </div>
                                    </td>
                                </tr><!-- END TR-->
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="col-md-12 tour-wrap">
                        <div class="pt-5 mt-5">
                            <h3 class="mb-5">6 Reviews</h3>
                            <ul class="comment-list">
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="images/person_1.jpg" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>John Doe</h3>
                                        <div class="meta">October 03, 2018 at 2:21pm</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                            necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim
                                            sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                        <p><a href="#" class="reply">Reply</a></p>
                                    </div>
                                </li>

                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="images/person_1.jpg" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>John Doe</h3>
                                        <div class="meta">October 03, 2018 at 2:21pm</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                            necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim
                                            sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                        <p><a href="#" class="reply">Reply</a></p>
                                    </div>

                                    <ul class="children">
                                        <li class="comment">
                                            <div class="vcard bio">
                                                <img src="images/person_1.jpg" alt="Image placeholder">
                                            </div>
                                            <div class="comment-body">
                                                <h3>John Doe</h3>
                                                <div class="meta">October 03, 2018 at 2:21pm</div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem
                                                    laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat
                                                    saepe enim sapiente iste iure! Quam voluptas earum impedit
                                                    necessitatibus, nihil?</p>
                                                <p><a href="#" class="reply">Reply</a></p>
                                            </div>


                                            <ul class="children">
                                                <li class="comment">
                                                    <div class="vcard bio">
                                                        <img src="images/person_1.jpg" alt="Image placeholder">
                                                    </div>
                                                    <div class="comment-body">
                                                        <h3>John Doe</h3>
                                                        <div class="meta">October 03, 2018 at 2:21pm</div>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Pariatur quidem laborum necessitatibus, ipsam impedit vitae
                                                            autem, eum officia, fugiat saepe enim sapiente iste iure! Quam
                                                            voluptas earum impedit necessitatibus, nihil?</p>
                                                        <p><a href="#" class="reply">Reply</a></p>
                                                    </div>

                                                    <ul class="children">
                                                        <li class="comment">
                                                            <div class="vcard bio">
                                                                <img src="images/person_1.jpg" alt="Image placeholder">
                                                            </div>
                                                            <div class="comment-body">
                                                                <h3>John Doe</h3>
                                                                <div class="meta">October 03, 2018 at 2:21pm</div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                    Pariatur quidem laborum necessitatibus, ipsam impedit
                                                                    vitae autem, eum officia, fugiat saepe enim sapiente
                                                                    iste iure! Quam voluptas earum impedit necessitatibus,
                                                                    nihil?</p>
                                                                <p><a href="#" class="reply">Reply</a></p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="images/person_1.jpg" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>John Doe</h3>
                                        <div class="meta">October 03, 2018 at 2:21pm</div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum
                                            necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim
                                            sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                        <p><a href="#" class="reply">Reply</a></p>
                                    </div>
                                </li>
                            </ul>
                            <!-- END comment-list -->

                            <div class="comment-form-wrap pt-5">
                                <h3 class="mb-5">Leave a comment</h3>
                                <form action="#" class="p-5 bg-light">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="url" class="form-control" id="website">
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div> --}}
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

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
@endsection

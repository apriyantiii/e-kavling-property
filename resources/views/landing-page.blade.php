    @extends('user.layouts.master')
    @section('landing-page')
        {{-- Carousol Start --}}
        <section class="hero-wrap js-fullheight" style="background-image: url('front-end/images/bg_2.jpg');"
            data-section="home" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                    data-scrollax-parent="true">
                    <div class="col-md-5 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Properti Impian,
                            Investasi Masadepan</h1>
                        <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Bangun kekayaan
                            dan keamanan finansial jangka panjangmu melalui PT. Mutiara Putri Gemilang </p>
                        <form action="#" class="search-location">
                            <div class="row">
                                <div class="col-lg align-items-end">
                                    <div class="form-group">
                                        <div class="form-field">
                                            <input type="text" class="form-control" placeholder="Search location">
                                            <button><span class="ion-ios-search"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        {{-- Carousol End --}}

        {{-- Property Start --}}
        <section class="ftco-section ftco-properties" id="properties-section">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Properti Unggulan</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="carousel-properties owl-carousel">
                            <div class="item">
                                <div class="properties ftco-animate">
                                    <div class="img">
                                        <img src="front-end/images/work-1.jpg" class="img-fluid" alt="Colorlib Template">
                                    </div>
                                    <div class="desc">
                                        <div
                                            class="text bg-primary d-flex text-center align-items-center justify-content-center">
                                            <span>Dijual</span>
                                        </div>
                                        <div class="d-flex pt-5">
                                            <div>
                                                <h3><a href="properties.html">Fatima Subdivision</a></h3>
                                            </div>
                                            <div class="pl-md-4">
                                                <h4 class="price">$120,000</h4>
                                            </div>
                                        </div>
                                        <p class="h-info"><span class="location">New York</span> <span
                                                class="details">&mdash; 3bds, 2bath</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="properties ftco-animate">
                                    <div class="img">
                                        <img src="front-end/images/work-2.jpg" class="img-fluid" alt="Colorlib Template">
                                    </div>
                                    <div class="desc">
                                        <div
                                            class="text bg-secondary d-flex text-center align-items-center justify-content-center">
                                            <span>Dijual</span>
                                        </div>
                                        <div class="d-flex pt-5">
                                            <div>
                                                <h3><a href="properties.html">Fatima Subdivision</a></h3>
                                            </div>
                                            <div class="pl-md-4">
                                                <h4 class="price">$120<span>/mo</span></h4>
                                            </div>
                                        </div>
                                        <p class="h-info"><span class="location">New York</span> <span
                                                class="details">&mdash; 3bds, 2bath</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="properties ftco-animate">
                                    <div class="img">
                                        <img src="front-end/images/work-3.jpg" class="img-fluid" alt="Colorlib Template">
                                    </div>
                                    <div class="desc">
                                        <div
                                            class="text bg-primary d-flex text-center align-items-center justify-content-center">
                                            <span>Dijual</span>
                                        </div>
                                        <div class="d-flex pt-5">
                                            <div>
                                                <h3><a href="properties.html">Fatima Subdivision</a></h3>
                                            </div>
                                            <div class="pl-md-4">
                                                <h4 class="price">$230,000</h4>
                                            </div>
                                        </div>
                                        <p class="h-info"><span class="location">New York</span> <span
                                                class="details">&mdash; 3bds, 2bath</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="properties ftco-animate">
                                    <div class="img">
                                        <img src="front-end/images/work-4.jpg" class="img-fluid" alt="Colorlib Template">
                                    </div>
                                    <div class="desc">
                                        <div
                                            class="text bg-primary d-flex text-center align-items-center justify-content-center">
                                            <span>Dijual</span>
                                        </div>
                                        <div class="d-flex pt-5">
                                            <div>
                                                <h3><a href="properties.html">Fatima Subdivision</a></h3>
                                            </div>
                                            <div class="pl-md-4">
                                                <h4 class="price">$120,000</h4>
                                            </div>
                                        </div>
                                        <p class="h-info"><span class="location">New York</span> <span
                                                class="details">&mdash; 3bds, 2bath</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="properties ftco-animate">
                                    <div class="img">
                                        <img src="front-end/images/work-5.jpg" class="img-fluid" alt="Colorlib Template">
                                    </div>
                                    <div class="desc">
                                        <div
                                            class="text bg-secondary d-flex text-center align-items-center justify-content-center">
                                            <span>Dijual</span>
                                        </div>
                                        <div class="d-flex pt-5">
                                            <div>
                                                <h3><a href="properties.html">Fatima Subdivision</a></h3>
                                            </div>
                                            <div class="pl-md-4">
                                                <h4 class="price">$50<span>/mo</span></h4>
                                            </div>
                                        </div>
                                        <p class="h-info"><span class="location">New York</span> <span
                                                class="details">&mdash; 3bds, 2bath</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Property End --}}

        {{-- Agent Start --}}
        <section class="ftco-section ftco-agent bg-light" id="komisaris">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Dewan Komisaris</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h3 class="card-text text-right"><strong>HALO</strong></h3>
                        <p class="card-text text-right">Some quick example text to build on the card title and make up the
                            bulk of the card's content.</p>

                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="front-end/images/team-1.jpg" class="card-img-top" alt="...">
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <img src="front-end/images/team-2.jpg" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="card-text text-left"><strong>HALO</strong></h3>
                        <p class="card-text text-left">Some quick example text to build on the card title and make up the
                            bulk of the card's content.</p>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="carousel-agent owl-carousel">
                            <div class="item">
                                <div class="agent">
                                    <div class="img">
                                        <img src="front-end/images/team-1.jpg" class="img-fluid" alt="Colorlib Template">
                                        <div>
                                            <h3>Komisaris</h3>
                                        </div>
                                    </div>
                                    <div class="desc pt-3">
                                        <div>
                                            <h3><a href="properties.html">James Stallon</a></h3>
                                            <p class="h-info"><span class="location">Listing</span> <span
                                                    class="details">&mdash; 10 Properties</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="agent">
                                    <div class="img">
                                        <img src="front-end/images/team-2.jpg" class="img-fluid" alt="Colorlib Template">
                                        <div>
                                            <h3>I'm an agent</h3>
                                        </div>
                                    </div>
                                    <div class="desc pt-3">
                                        <div>
                                            <h3><a href="properties.html">James Stallon</a></h3>
                                            <p class="h-info"><span class="location">Listing</span> <span
                                                    class="details">&mdash; 10 Properties</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        {{-- Agent End --}}

        {{-- Visi Misi Start --}}
        <section class="ftco-section ftco-services-2" id="visi-misi">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Visi Misi</h2>
                        <p class="lh-1-6">Menjadi mitra terpercaya dalam pemenuhan impian memiliki hunian ideal melalui
                            penjualan tanah
                            kavling berkualitas tinggi, dengan fokus utama pada legalitas yang terpercaya dan lengkap</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services text-center d-block">
                            <div class="icon justify-content-center align-items-center d-flex"><span
                                    class="flaticon-pin"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Menyediakan Tanah Kavling Berkualitas Tinggi</h3>
                                {{-- <p>Menyediakan tanah kavling yang berkualitas tinggi dengan akses mudah dan fasilitas yang
                                    mendukung, menciptakan lingkungan yang ideal untuk pembangunan hunian yang berkualitas.
                                </p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services text-center d-block">
                            <div class="icon justify-content-center align-items-center d-flex"><span
                                    class="flaticon-detective"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Integritas dan Kepatuhan Hukum</h3>
                                {{-- <p>Mengutamakan integritas dalam setiap transaksi dan memastikan bahwa seluruh aspek
                                    legalitas properti terpenuhi dengan lengkap dan sesuai peraturan, sehingga memberikan
                                    kepastian hukum kepada pelanggan.
                                </p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services text-center d-block">
                            <div class="icon justify-content-center align-items-center d-flex"><span
                                    class="flaticon-house"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Pelayanan Pelanggan yang Unggul</h3>
                                {{-- <p>Memberikan pelayanan pelanggan yang unggul dengan mendengarkan kebutuhan dan keinginan
                                    pelanggan, memberikan informasi yang jelas dan transparan, serta memberikan solusi yang
                                    tepat guna.
                                </p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services text-center d-block">
                            <div class="icon justify-content-center align-items-center d-flex"><span
                                    class="flaticon-purse"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Inovasi dalam Pengembangan Properti</h3>
                                {{-- <p>Terus mengembangkan inovasi dalam desain dan pengembangan properti guna menciptakan nilai
                                    tambah bagi para pelanggan, dengan memperhatikan aspek keberlanjutan dan lingkungan.</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services text-center d-block mt-lg-5 pt-lg-4">
                            <div class="icon justify-content-center align-items-center d-flex"><span
                                    class="flaticon-house"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Kemitraan yang Berkelanjutan </h3>
                                {{-- <p> Membangun hubungan kemitraan yang berkelanjutan dengan pihak terkait, seperti
                                    pemerintah, lembaga keuangan, dan kontraktor, untuk memastikan kelancaran proses
                                    pengembangan properti dan mendukung pertumbuhan bisnis.</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services text-center d-block mt-lg-5 pt-lg-4">
                            <div class="icon justify-content-center align-items-center d-flex"><span
                                    class="flaticon-purse"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Tanggung Jawab Sosial dan Lingkungan</h3>
                                {{-- <p>Melibatkan diri dalam kegiatan tanggung jawab sosial dan lingkungan, seperti reboisasi,
                                    pengelolaan limbah, dan proyek-proyek sosial, untuk memberikan dampak positif bagi
                                    masyarakat sekitar dan lingkungan.</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services text-center d-block mt-lg-5 pt-lg-4">
                            <div class="icon justify-content-center align-items-center d-flex"><span
                                    class="flaticon-house"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Peningkatan Terus-Menerus</h3>
                                {{-- <p>Melakukan evaluasi dan perbaikan terus-menerus dalam setiap aspek bisnis, mulai dari
                                    proses internal hingga pelayanan pelanggan, guna memastikan peningkatan kualitas dan
                                    efisiensi secara berkelanjutan.</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Visi Misi End --}}

        {{-- About Start --}}
        <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb bg-light" id="about-section">
            <div class="container">
                <div class="col-md-12 col-lg-12 px-lg-5 py-md-5">
                    <div class="py-md-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-6 col-lg-5 py-md-5">
                                <div class="img d-flex align-self-stretch align-items-center"
                                    style="background-image:url(front-end/images/about.jpg);height: 500px;">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-7 heading-section ftco-animate px-lg-5">
                                <h2 class="mb-4">Tentang PT. Mutiara Putri Gemilang</h2>
                                <p>PT Mutiara Putri Gemilang adalah perusahaan terpercaya di bidang penjualan properti dan
                                    kavling, yang telah mendedikasikan diri untuk memberikan layanan terbaik kepada
                                    pelanggan. Dengan dedikasi dan integritas yang tinggi, kami berkomitmen untuk memenuhi
                                    kebutuhan dan harapan pelanggan kami dalam menjalani proses pembelian properti dengan
                                    lancar dan memuaskan.</p>
                                <p>Dengan PT Mutiara Putri Gemilang, Anda dapat yakin mendapatkan properti berkualitas
                                    tinggi dan layanan terbaik. Kami senantiasa berusaha untuk menjadi mitra terpercaya
                                    dalam memenuhi impian Anda memiliki properti atau kavling yang sesuai dengan keinginan
                                    dan kebutuhan Anda dengan jaminan Sertifikat Resmi.</p>
                                <p><a href="#" class="btn btn-primary py-3 px-4">Beli Properti</a> <a
                                        href="https://wa.me/6281249985217" class="btn btn-secondary py-3 px-4">Hubungi
                                        Kami</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- About End --}}

        {{-- Prosedur Pembelian Start --}}
        <section class="ftco-section ftco-services-2" id="prosedur-pembelian">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 heading-section ftco-animate">
                        <h2 class="mb-4">Prosedur Pembelian</h2>
                        <p>Pembeli dapat melakukan pembelian melalui website resmi PT. Mutiara Putri Gemilang dengan
                            beberapa tahapan </p>
                        <div class="media block-6 services text-center d-block pt-md-5 mt-md-5">
                            <div class="icon justify-content-center align-items-center d-flex"><span>1</span></div>
                            <div class="media-body p-md-3">
                                <h3 class="heading mb-5">Mengakses website e-kavling secara resmi milik PT. Mutiara Putri
                                    Gemilang untuk bertransaksi</h3>
                                {{-- <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                                    at the coast of the Semantics, a large language ocean.</p> --}}
                                <hr class="bg-primary">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-self-stretch ftco-animate mt-lg-5">
                        <div class="media block-6 services text-center d-block mt-lg-5 pt-md-5 pt-lg-4">
                            <div class="icon justify-content-center align-items-center d-flex"><span>2</span></div>
                            <div class="media-body p-md-3">
                                <h3 class="heading mb-5">Registrasi dan Login di website E-kavling untuk melakukan live
                                    chat dan survey kavling</h3>
                                {{-- <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                                    at the coast of the Semantics, a large language ocean.</p> --}}
                                <hr class="bg-primary">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services text-center d-block">
                            <div class="icon justify-content-center align-items-center d-flex"><span>3</span></div>
                            <div class="media-body p-md-3">
                                <h3 class="heading mb-5">Deal transaksi melalui website E-kavling -> melakukan Akad
                                    Pembelian -> Pembayaran dan Penerbitan SHM</h3>
                                {{-- <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                                    at the coast of the Semantics, a large language ocean.</p> --}}
                                <hr class="bg-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Prosedur Pembelian End --}}
        {{-- Blog Start --}}
        {{-- <section class="ftco-section bg-light" id="blog-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-5">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Our Blog</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="single.html" class="block-20"
                                style="background-image: url('front-end/images/image_1.jpg');">
                            </a>
                            <div class="text float-right d-block">
                                <div class="d-flex align-items-center pt-2 mb-4 topp">
                                    <div class="one mr-2">
                                        <span class="day">12</span>
                                    </div>
                                    <div class="two">
                                        <span class="yr">2019</span>
                                        <span class="mos">april</span>
                                    </div>
                                </div>
                                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                        Growth</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <div class="d-flex align-items-center mt-4 meta">
                                    <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                                class="ion-ios-arrow-round-forward"></span></a></p>
                                    <p class="ml-auto mb-0">
                                        <a href="#" class="mr-2">Admin</a>
                                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="single.html" class="block-20"
                                style="background-image: url('front-end/images/image_2.jpg');">
                            </a>
                            <div class="text float-right d-block">
                                <div class="d-flex align-items-center pt-2 mb-4 topp">
                                    <div class="one mr-2">
                                        <span class="day">12</span>
                                    </div>
                                    <div class="two">
                                        <span class="yr">2019</span>
                                        <span class="mos">april</span>
                                    </div>
                                </div>
                                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                        Growth</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <div class="d-flex align-items-center mt-4 meta">
                                    <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                                class="ion-ios-arrow-round-forward"></span></a></p>
                                    <p class="ml-auto mb-0">
                                        <a href="#" class="mr-2">Admin</a>
                                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                        <div class="blog-entry">
                            <a href="single.html" class="block-20"
                                style="background-image: url('front-end/images/image_3.jpg');">
                            </a>
                            <div class="text float-right d-block">
                                <div class="d-flex align-items-center pt-2 mb-4 topp">
                                    <div class="one mr-2">
                                        <span class="day">12</span>
                                    </div>
                                    <div class="two">
                                        <span class="yr">2019</span>
                                        <span class="mos">april</span>
                                    </div>
                                </div>
                                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                        Growth</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <div class="d-flex align-items-center mt-4 meta">
                                    <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                                class="ion-ios-arrow-round-forward"></span></a></p>
                                    <p class="ml-auto mb-0">
                                        <a href="#" class="mr-2">Admin</a>
                                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="single.html" class="block-20"
                                style="background-image: url('front-end/images/image_4.jpg');">
                            </a>
                            <div class="text float-right d-block">
                                <div class="d-flex align-items-center pt-2 mb-4 topp">
                                    <div class="one mr-2">
                                        <span class="day">12</span>
                                    </div>
                                    <div class="two">
                                        <span class="yr">2019</span>
                                        <span class="mos">april</span>
                                    </div>
                                </div>
                                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                        Growth</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <div class="d-flex align-items-center mt-4 meta">
                                    <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                                class="ion-ios-arrow-round-forward"></span></a></p>
                                    <p class="ml-auto mb-0">
                                        <a href="#" class="mr-2">Admin</a>
                                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="single.html" class="block-20"
                                style="background-image: url('front-end/images/image_5.jpg');">
                            </a>
                            <div class="text float-right d-block">
                                <div class="d-flex align-items-center pt-2 mb-4 topp">
                                    <div class="one mr-2">
                                        <span class="day">12</span>
                                    </div>
                                    <div class="two">
                                        <span class="yr">2019</span>
                                        <span class="mos">april</span>
                                    </div>
                                </div>
                                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                        Growth</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <div class="d-flex align-items-center mt-4 meta">
                                    <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                                class="ion-ios-arrow-round-forward"></span></a></p>
                                    <p class="ml-auto mb-0">
                                        <a href="#" class="mr-2">Admin</a>
                                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                        <div class="blog-entry">
                            <a href="single.html" class="block-20"
                                style="background-image: url('front-end/images/image_6.jpg');">
                            </a>
                            <div class="text float-right d-block">
                                <div class="d-flex align-items-center pt-2 mb-4 topp">
                                    <div class="one mr-2">
                                        <span class="day">12</span>
                                    </div>
                                    <div class="two">
                                        <span class="yr">2019</span>
                                        <span class="mos">april</span>
                                    </div>
                                </div>
                                <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                        Growth</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <div class="d-flex align-items-center mt-4 meta">
                                    <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span
                                                class="ion-ios-arrow-round-forward"></span></a></p>
                                    <p class="ml-auto mb-0">
                                        <a href="#" class="mr-2">Admin</a>
                                        <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        {{-- Blog End --}}

        {{-- Testimoni Start --}}
        <section class="ftco-section testimony-section" id="testimoni">
            <div class="container">
                <div class="row justify-content-center pb-3">
                    <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                        <span class="subheading">Testimoni</span>
                        <h2 class="mb-4">Apa Kata Klien?</h2>
                    </div>
                </div>
                <div class="row ftco-animate justify-content-center">
                    <div class="col-md-12">
                        <div class="carousel-testimony owl-carousel ftco-owl">
                            <div class="item">
                                <div class="testimony-wrap text-center py-4 pb-5">
                                    <div class="user-img" style="background-image: url(front-end/images/person_1.jpg)">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text px-4 pb-5">
                                        <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</p>
                                        <p class="name">Jeff Freshman</p>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap text-center py-4 pb-5">
                                    <div class="user-img" style="background-image: url(front-end/images/person_2.jpg)">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text px-4 pb-5">
                                        <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</p>
                                        <p class="name">Jeff Freshman</p>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap text-center py-4 pb-5">
                                    <div class="user-img" style="background-image: url(front-end/images/person_3.jpg)">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text px-4 pb-5">
                                        <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</p>
                                        <p class="name">Jeff Freshman</p>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap text-center py-4 pb-5">
                                    <div class="user-img" style="background-image: url(front-end/images/person_1.jpg)">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text px-4 pb-5">
                                        <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</p>
                                        <p class="name">Jeff Freshman</p>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap text-center py-4 pb-5">
                                    <div class="user-img" style="background-image: url(front-end/images/person_3.jpg)">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text px-4 pb-5">
                                        <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</p>
                                        <p class="name">Jeff Freshman</p>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Testimoni End --}}

        {{-- Contact Start --}}
        {{-- <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <span class="subheading">Contact</span>
                        <h2 class="mb-4">Contact Me</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                    </div>
                </div>

                <div class="row block-9">
                    <div class="col-md-7 order-md-last d-flex ftco-animate">
                        <form action="#" class="bg-light p-4 p-md-5 contact-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                            </div>
                        </form>

                    </div>

                    <div class="col-md-5 d-flex">
                        <div class="row d-flex contact-info mb-5">
                            <div class="col-md-12 ftco-animate">
                                <div class="box p-2 px-3 bg-light d-flex">
                                    <div class="icon mr-3">
                                        <span class="icon-map-signs"></span>
                                    </div>
                                    <div>
                                        <h3 class="mb-3">Address</h3>
                                        <p>198 West 21th Street, Suite 721 New York NY 10016</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 ftco-animate">
                                <div class="box p-2 px-3 bg-light d-flex">
                                    <div class="icon mr-3">
                                        <span class="icon-phone2"></span>
                                    </div>
                                    <div>
                                        <h3 class="mb-3">Contact Number</h3>
                                        <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 ftco-animate">
                                <div class="box p-2 px-3 bg-light d-flex">
                                    <div class="icon mr-3">
                                        <span class="icon-paper-plane"></span>
                                    </div>
                                    <div>
                                        <h3 class="mb-3">Email Address</h3>
                                        <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 ftco-animate">
                                <div class="box p-2 px-3 bg-light d-flex">
                                    <div class="icon mr-3">
                                        <span class="icon-globe"></span>
                                    </div>
                                    <div>
                                        <h3 class="mb-3">Website</h3>
                                        <p><a href="#">yoursite.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        {{-- Contact End --}}
    @endsection

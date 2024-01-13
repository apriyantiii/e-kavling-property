@extends('layouts.landing-page.master')
@section('landing-page')
    <div class="row" id="home-section">
        <div class="col-xl-12">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid mx-auto" src="{{ URL::asset('assets/images/carousol-1.png') }}"
                            alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid mx-auto" src="{{ URL::asset('assets/images/carousol-2.png') }}"
                            alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid mx-auto" src="{{ URL::asset('assets/images/carousol-3.png') }}"
                            alt="Third slide">
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div> <!-- end row -->

    {{-- Properti Unggulan Start --}}
    <div class="card bg-white rounded-0 mb-0 shadow-none" id="properti-unggulan">
        <div class="row justify-content-center pb-3 mt-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h1 class="mb-5 mt-5"><strong>Properti Unggulan</strong></h1>
            </div>
        </div>

        <div class="container">
            <div class="row mb-5">
                <div class="col me-3">
                    <div class="card rounded">
                        <img src="{{ URL::asset('assets/images/work-3.jpg') }}" class="card-img-top" alt="...">
                    </div>

                    <div class="d-flex justify-content-between align-items-end mt-4">
                        <div>
                            <h4 class="mb-3 text-truncate"><a href="#" class="text-dark"><strong>Rumah
                                        Minimalis</strong></a></h4>
                            <h5 class="my-0"><span class="text-muted me-2">Mojowarno, Jombang &mdash; 1 H</span>
                            </h5>
                        </div>
                        <div class="d-flex justify-content-end">
                            <h5 class="my-0"><span class="text-muted me-2"></span> <b>170 Juta</b></h5>
                        </div>
                    </div>
                </div>

                <div class="col me-3">
                    <div class="card rounded">
                        <img src="{{ URL::asset('assets/images/work-2.jpg') }}" class="card-img-top" alt="...">
                    </div>

                    <div class="d-flex justify-content-between align-items-end mt-4">
                        <div>
                            <h4 class="mb-3 text-truncate"><a href="#" class="text-dark"><strong>Rumah
                                        Minimalis</strong></a></h4>
                            <h5 class="my-0"><span class="text-muted me-2">Mojowarno, Jombang &mdash; 1 H</span>
                            </h5>
                        </div>
                        <div class="d-flex justify-content-end">
                            <h5 class="my-0"><span class="text-muted me-2"></span> <b>170 Juta</b></h5>
                        </div>
                    </div>
                </div>

                <div class="col me-3">
                    <div class="card rounded">
                        <img src="{{ URL::asset('assets/images/work-1.jpg') }}" class="card-img-top" alt="...">
                    </div>

                    <div class="d-flex justify-content-between align-items-end mt-4">
                        <div>
                            <h4 class="mb-3 text-truncate"><a href="#" class="text-dark"><strong>Rumah
                                        Minimalis</strong></a></h4>
                            <h5 class="my-0"><span class="text-muted me-2">Mojowarno, Jombang &mdash; 1 H</span>
                            </h5>
                        </div>
                        <div class="d-flex justify-content-end" id="visi-misi">
                            <h5 class="my-0"><span class="text-muted me-2"></span> <b>170 Juta</b></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Properti Unggulan End --}}

    {{-- Visi Misi Start --}}
    <div class="card bg-light rounded-0 mt-5 mb-0 shadow-none">
        <div class="row justify-content-center pb-5 mt-5 px-3">
            <div class="col-md-12 heading-section text-center">
                <h1 class="mb-5 mt-3"><strong>Visi Misi</strong></h1>
                <div class="container">
                    <div class="col-md-12 heading-section text-center text-secondary" style="letter-spacing: 2px;">
                        <h6 class="text lh-1-6"><b>Menjadi mitra terpercaya dalam pemenuhan impian memiliki hunian ideal
                                melalui
                                penjualan tanah
                                kavling berkualitas tinggi, dengan fokus utama pada legalitas yang terpercaya dan
                                lengkap</b>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mb-5">
                <div class="col d-flex">
                    <div class="media block-6 services text-center d-block">
                        <div class="media-body">
                            <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                src="assets/images/visi-misi/visi-misi-1.png" data-holder-rendered="true">
                            <h5 class="heading mb-3"><strong>Menyediakan Tanah Kavling Berkualitas Tinggi</strong></h5>
                            {{-- <p>Menyediakan tanah kavling yang berkualitas tinggi dengan akses mudah dan fasilitas yang
                                    mendukung, menciptakan lingkungan yang ideal untuk pembangunan hunian yang berkualitas.
                                </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="media block-6 services text-center d-block">
                        <div class="media-body">
                            <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                src="assets/images/visi-misi/visi-misi-2.png" data-holder-rendered="true">
                            <h5 class="heading mb-3"><strong>Integritas dan Kepatuhan Hukum</strong></h5>
                            {{-- <p>Mengutamakan integritas dalam setiap transaksi dan memastikan bahwa seluruh aspek
                                    legalitas properti terpenuhi dengan lengkap dan sesuai peraturan, sehingga memberikan
                                    kepastian hukum kepada pelanggan.
                                </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="media block-6 services text-center d-block">
                        <div class="media-body">
                            <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                src="assets/images/visi-misi/visi-misi-3.png" data-holder-rendered="true">
                            <h5 class="heading mb-3"><strong>Pelayanan Pelanggan yang Unggul</strong></h5>
                            {{-- <p>Memberikan pelayanan pelanggan yang unggul dengan mendengarkan kebutuhan dan keinginan
                                    pelanggan, memberikan informasi yang jelas dan transparan, serta memberikan solusi yang
                                    tepat guna.
                                </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="media block-6 services text-center d-block">
                        <div class="media-body">
                            <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                src="assets/images/visi-misi/visi-misi-4.png" data-holder-rendered="true">
                            <h5 class="heading mb-3"><strong>Inovasi dalam Pengembangan Properti</strong></h5>
                            {{-- <p>Terus mengembangkan inovasi dalam desain dan pengembangan properti guna menciptakan nilai
                                    tambah bagi para pelanggan, dengan memperhatikan aspek keberlanjutan dan lingkungan.</p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5 px-5">
                <div class="col d-flex px-5">
                    <div class="media block-6 services text-center d-block">

                        <div class="media-body">
                            <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                src="assets/images/visi-misi/visi-misi-5.png" data-holder-rendered="true">
                            <h5 class="heading mb-3"><strong>Kemitraan yang Berkelanjutan</strong></h5>
                            {{-- <p> Membangun hubungan kemitraan yang berkelanjutan dengan pihak terkait, seperti
                                    pemerintah, lembaga keuangan, dan kontraktor, untuk memastikan kelancaran proses
                                    pengembangan properti dan mendukung pertumbuhan bisnis.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="media block-6 services text-center d-block">
                        <div class="media-body">
                            <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                src="assets/images/visi-misi/visi-misi-6.png" data-holder-rendered="true">
                            <h5 class="heading mb-3"><strong>Tanggung Jawab Sosial <br>dan Lingkungan</strong></h5>
                            {{-- <p>Melibatkan diri dalam kegiatan tanggung jawab sosial dan lingkungan, seperti reboisasi,
                                    pengelolaan limbah, dan proyek-proyek sosial, untuk memberikan dampak positif bagi
                                    masyarakat sekitar dan lingkungan.</p> --}}
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="media block-6 services text-center d-block">
                        <div class="media-body">
                            <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                src="assets/images/visi-misi/visi-misi-7.png" data-holder-rendered="true">
                            <h5 class="heading mb-3" id="about-section"><strong>Peningkatan Terus-Menerus</strong></h5>
                            {{-- <p>Melakukan evaluasi dan perbaikan terus-menerus dalam setiap aspek bisnis, mulai dari
                                    proses internal hingga pelayanan pelanggan, guna memastikan peningkatan kualitas dan
                                    efisiensi secara berkelanjutan.</p> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- Visi Misi End --}}

    {{-- Tentang Perusahaan Start --}}
    <div class="card bg-white rounded-0 mt-3 mb-0 shadow-none">
        <div class="container">
            <div class="col-md-12 col-lg-12 px-lg-5 py-md-5">
                <div class="py-md-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-6 col-lg-5 py-md-0">
                            <div class="img d-flex align-self-stretch align-items-center"
                                style="background-image:url('{{ URL::asset('assets/images/auth-bg.jpg') }}');height: 500px;">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-7 heading-section ftco-animate px-lg-5">
                            <h1 class="mb-4"><strong>Tentang PT. Mutiara Putri Gemilang</strong></h1>
                            <h6 class="text-secondary" style="line-height: 2; text-align:justify;"><b>PT Mutiara Putri
                                    Gemilang adalah
                                    perusahaan terpercaya di bidang
                                    penjualan properti dan
                                    kavling, yang telah mendedikasikan diri untuk memberikan layanan terbaik kepada
                                    pelanggan. Dengan dedikasi dan integritas yang tinggi, kami berkomitmen untuk memenuhi
                                    kebutuhan dan harapan pelanggan kami dalam menjalani proses pembelian properti dengan
                                    lancar dan memuaskan.</b></h6>
                            <h6 class="text-secondary mb-3" style="line-height: 2; text-align:justify;"><b>Dengan PT
                                    Mutiara
                                    Putri Gemilang, Anda dapat yakin mendapatkan
                                    properti berkualitas
                                    tinggi dan layanan terbaik. Kami senantiasa berusaha untuk menjadi mitra terpercaya
                                    dalam memenuhi impian Anda memiliki properti atau kavling yang sesuai dengan keinginan
                                    dan kebutuhan Anda dengan jaminan Sertifikat Resmi.</b></h6>
                            <h6><b><a href="#" class="btn py-3 px-4 text-light" style="background: #4b69bd">Beli
                                        Properti</a>
                                    <a href="https://wa.me/6281249985217" class="btn btn-secondary py-3 px-4"
                                        id="komisaris">Hubungi
                                        Kami</a></b></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Tentang Perusahaan End --}}

    {{-- Dewan Komisaris Start --}}
    <div class="card bg-light rounded-0 mt-0 mb-0 shadow-none">
        <div class="row justify-content-center pb-3 mt-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h1 class="mb-5 mt-5"><strong>Dewan Komisaris</strong></h1>
            </div>
        </div>

        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <h3 class="card-text text-right"><strong>HALO</strong></h3>
                    <p class="card-text text-right">Some quick example text to build on the card title and make up the
                        bulk of the card's content.</p>

                </div>
                <div class="col">
                    <div class="card">
                        <img src="{{ URL::asset('assets/images/team-1.jpg') }}" class="card-img-top" alt="...">
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="{{ URL::asset('assets/images/team-2.jpg') }}" class="card-img-top" alt="...">
                    </div>
                </div>
                <div class="col">
                    <h3 class="card-text text-left"><strong>HALO</strong></h3>
                    <p class="card-text text-left">Some quick example text to build on the card title and make up the
                        bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Dewan Komisaris End --}}

    {{-- Testimoni Start --}}
    <div class="card rounded-0 mb-0 shadow-none" style="background: #4b69bd" id="testimoni">
        <div class="row justify-content-center pb-5 mt-5 px-3">
            <div class="col-md-12 heading-section text-center">
                <h5 class="mb-2 mt-3 text-light"><strong>Testimoni</strong></h5>
                <h1 class="mb-5 text-light"><strong>Apa Kata Mereka</strong></h1>
            </div>
        </div>
        <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleCaption" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleCaption" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleCaption" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="testimony-wrap text-center text-white py-4 pb-5">
                                    <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                        src="assets/images/person_1.jpg" data-holder-rendered="true">
                                    <div class="text px-4 pb-5">
                                        <h6 class="mb-4 text-light" style="letter-spacing: 1.5px;">Far far away, behind
                                            the
                                            word
                                            mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</h6>
                                        <h6 class="name text-white">Jeff Freshman</h6>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="testimony-wrap text-center text-white  py-4 pb-5">
                                    <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                        src="assets/images/person_2.jpg" data-holder-rendered="true">
                                    <div class="text px-4 pb-5">
                                        <h6 class="mb-4 text-light" style="letter-spacing: 1.5px;">Far far away, behind
                                            the
                                            word
                                            mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</h6>
                                        <h6 class="name text-white">Jeff Freshman</h6>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="testimony-wrap text-center text-white  py-4 pb-5">
                                    <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                        src="assets/images/person_3.jpg" data-holder-rendered="true">
                                    <div class="text px-4 pb-5">
                                        <h6 class="mb-4 text-light" style="letter-spacing: 1.5px;">Far far away, behind
                                            the
                                            word
                                            mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</h6>
                                        <h6 class="name text-white">Jeff Freshman</h6>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="testimony-wrap text-center text-white py-4 pb-5">
                                    <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                        src="assets/images/person_4.jpg" data-holder-rendered="true">
                                    <div class="text px-4 pb-5">
                                        <h6 class="mb-4 text-light" style="letter-spacing: 1.5px;">Far far away, behind
                                            the
                                            word
                                            mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</h6>
                                        <h6 class="name text-white">Jeff Freshman</h6>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="testimony-wrap text-center text-white  py-4 pb-5">
                                    <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                        src="assets/images/person_3.jpg" data-holder-rendered="true">
                                    <div class="text px-4 pb-5">
                                        <h6 class="mb-4 text-light" style="letter-spacing: 1.5px;">Far far away, behind
                                            the
                                            word
                                            mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</h6>
                                        <h6 class="name text-white">Jeff Freshman</h6>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="testimony-wrap text-center text-white  py-4 pb-5">
                                    <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                        src="assets/images/person_2.jpg" data-holder-rendered="true">
                                    <div class="text px-4 pb-5">
                                        <h6 class="mb-4 text-light" style="letter-spacing: 1.5px;">Far far away, behind
                                            the
                                            word
                                            mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</h6>
                                        <h6 class="name text-white">Jeff Freshman</h6>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="testimony-wrap text-center text-white py-4 pb-5">
                                    <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                        src="assets/images/person_1.jpg" data-holder-rendered="true">
                                    <div class="text px-4 pb-5">
                                        <h6 class="mb-4 text-light" style="letter-spacing: 1.5px;">Far far away, behind
                                            the
                                            word
                                            mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</h6>
                                        <h6 class="name text-white">Jeff Freshman</h6>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="testimony-wrap text-center text-white  py-4 pb-5">
                                    <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                        src="assets/images/person_3.jpg" data-holder-rendered="true">
                                    <div class="text px-4 pb-5">
                                        <h6 class="mb-4 text-light" style="letter-spacing: 1.5px;">Far far away, behind
                                            the
                                            word
                                            mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</h6>
                                        <h6 class="name text-white">Jeff Freshman</h6>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="testimony-wrap text-center text-white  py-4 pb-5">
                                    <img class="rounded-circle avatar-xxl mb-4" alt="200x200"
                                        src="assets/images/person_2.jpg" data-holder-rendered="true">
                                    <div class="text px-4 pb-5">
                                        <h6 class="mb-4 text-light" style="letter-spacing: 1.5px;">Far far away, behind
                                            the
                                            word
                                            mountains, far from the countries
                                            Vokalia and Consonantia, there live the blind texts.</h6>
                                        <h6 class="name text-white">Jeff Freshman</h6>
                                        <span class="position">Artist</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- end carousel -->

    </div>
    {{-- Testimoni End --}}
@endsection

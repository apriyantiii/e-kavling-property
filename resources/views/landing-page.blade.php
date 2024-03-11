    @extends('user.layouts.master')
    @section('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.min.css">
    @endsection
    @section('landing-page')
        {{-- Carousol Start --}}
        <section class="hero-wrap js-fullheight" style="background-image: url('front-end/images/bg_2.jpg');"
            data-section="home" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container p-5">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                    data-scrollax-parent="true">
                    <div class="col-md-5 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
                        <h1 class="mb-0" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Properti Impian,
                            Investasi Masadepan</h1>
                        <h6 class="mb-5 text-dark">Area Jombang, Jatim</h6>
                        <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Bangun kekayaan
                            dan keamanan finansial jangka panjangmu melalui PT. Mutiara Putri Gemilang </p>
                        {{-- <form action="#" class="search-location">
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
                        </form> --}}
                    </div>
                </div>
            </div>
        </section>
        {{-- Carousol End --}}

        {{-- Sistem Pembayaran --}}
        <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb bg-light" id="about-section">
            <br>
            <div class="col-md-12 col-lg-12 px-lg-5 py-md-5">
                <div class="py-md-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-6 col-lg-5 py-md-5">
                            <div class="img d-flex align-self-stretch align-items-center"
                                style="background-image:url(front-end/images/payments.jpg);height: 500px;">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-7 heading-section ftco-animate px-lg-5">
                            <h2 class="mb-4">Sistem Pembayaran di <br>PT. Mutiara Putri Gemilang?</h2>
                            <div class="row">
                                <div class="col-lg-2">
                                    <img src="front-end/images/visi-misi/9.png" class="rounded-circle avatar-sm mb-4"
                                        width="100" height="100" alt="">

                                </div>
                                <div class="col-lg-10">
                                    <h4 class="text-start text-secondary"><strong>Cash/ Tunai</strong></h4>
                                    <p>Pembayaran lunas secara tunai atau transfer tanpa melibatkan kredit atau angsuran
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <img src="front-end/images/visi-misi/8.png" class="rounded-circle avatar-sm mb-4"
                                        width="100" height="100" alt="">

                                </div>
                                <div class="col-lg-10">
                                    <h4 class="text-start text-secondary"><strong>In-house</strong></h4>
                                    <p>Pembayaran dengan sistem angsuran antara pembeli dan pengembang tanpa melibatkan
                                        pihak ketiga </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <img src="front-end/images/visi-misi/10.png" class="rounded-circle avatar-sm mb-4"
                                        width="100" height="100" alt="">

                                </div>
                                <div class="col-lg-10">
                                    <h4 class="text-start text-secondary"><strong>KPR (Kredit Pemilikan Rumah)</strong></h4>
                                    <p>Pembayaran dengan melibatkan pihak Bank untuk membeli sebuah properti</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Sistem Pembayaran --}}

        {{-- Property Start --}}
        <section class="ftco-section ftco-properties p-md-3 p-mt-5" id="properties-section">
            <div class="container p-3">
                <div class="row justify-content-center py-md-5">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Properti Unggulan</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-6 col-lg-4">
                                    <div class="properties ftco-animate">
                                        <a href="{{ route('landing-page.detail-properti', $product->id) }}">
                                            <div class="img">
                                                <img src="{{ URL::asset('storage/' . $product->photo) }}"
                                                    style="height: 250px; width: 450px" class="img-fluid rounded"
                                                    alt="Colorlib Template">
                                            </div>
                                        </a>
                                        <div class="desc">
                                            <div class="d-flex pt-5">
                                                <div>
                                                    <h3><a
                                                            href="{{ route('landing-page.detail-properti', $product->id) }}">{{ $product->name }}</a>
                                                    </h3>
                                                </div>
                                                <div class="pl-md-4">
                                                    <h4 class="price">{{ $product->formatted_price }}</h4>
                                                </div>
                                            </div>
                                            <p class="h-info"><span class="location">{{ $product->code }}</span> <span
                                                    class="details">&mdash; {{ $product->location }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Property End --}}

        {{-- Agent Start --}}
        <section class="ftco-section ftco-agent bg-light" id="komisaris" style="padding-top: 60px; padding-bottom: 30px">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-2">Dewan Komisaris</h2>
                    </div>
                </div>
                <div class="testimony-wrap text-center">

                    <div class="user-img"
                        style="background-image: url('front-end/images/komisaris.jpeg'); background-size: cover; background-position: center; width: 200px; height: 200px;">

                    </div>
                    <div class="text text-dark px-4 pb-5">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2 text-center">
                                <h4><strong>Dhian Widhiastuti</strong></h4>
                                <p class="mb-2">Saya mendirikan PT. Mutiara Putri Gemilang pada tahun 2022 yang merupakan
                                    sebuah
                                    perusahaan properti khusus daerah Jombang, Jawa Timur. Promosi melalui media cetak dan
                                    sosial media telah dilakukan agar masyarakat luas mengetahui bisnis properti yang kami
                                    kembangkan.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        {{-- Agent End --}}

        {{-- Visi Misi Start --}}
        <section class="ftco-section ftco-services-2" id="visi-misi">
            <div class="container p-3">
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
                            <img src="front-end/images/visi-misi/1.png" class="rounded-circle avatar-sm mb-4"
                                width="100" height="100" alt="">
                            <div class="media-body">
                                <h3 class="heading mb-3">Menyediakan Tanah Kavling Berkualitas Tinggi</h3>
                                {{-- <p>Menyediakan tanah kavling yang berkualitas tinggi dengan akses mudah dan fasilitas yang
                                    mendukung, menciptakan lingkungan yang ideal untuk pembangunan hunian yang berkualitas.
                                </p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services text-center d-block mt-lg-5 pt-lg-4">
                            <img src="front-end/images/visi-misi/2.png" class="rounded-circle avatar-sm mb-4"
                                width="100" height="100" alt="">
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
                            <img src="front-end/images/visi-misi/3.png" class="rounded-circle avatar-sm mb-4"
                                width="100" height="100" alt="">
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
                        <div class="media block-6 services text-center d-block mt-lg-5 pt-lg-4">
                            <img src="front-end/images/visi-misi/4.png" class="rounded-circle avatar-sm mb-4"
                                width="100" height="100" alt="">
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
                        <div class="media block-6 services text-center d-block">
                            <img src="front-end/images/visi-misi/5.png" class="rounded-circle avatar-sm mb-4"
                                width="100" height="100" alt="">
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
                            <img src="front-end/images/visi-misi/6.png" class="rounded-circle avatar-sm mb-4"
                                width="100" height="100" alt="">
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
                            <img src="front-end/images/visi-misi/7.png" class="rounded-circle avatar-sm mb-4"
                                width="100" height="100" alt="">
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
                                    style="background-image:url(front-end/images/tentang-4.jpg);height: 500px;">
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
                                <p><a href="{{ route('landing-page.property') }}" class="btn btn-primary py-3 px-4">Beli
                                        Properti</a> <a href="https://wa.me/6281249985217"
                                        class="btn btn-secondary py-3 px-4">Hubungi
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
            <div class="container p-3">
                <div class="row">
                    <div class="col-md-4 heading-section ftco-animate">
                        <h2 class="mb-4">Prosedur Pembelian</h2>
                        <p>Pembeli dapat melakukan pembelian melalui website resmi PT. Mutiara Putri Gemilang dengan
                            beberapa tahapan </p>
                        <div class="media block-6 services d-block pt-md-5 mt-md-5">
                            <div class="icon justify-content-center align-items-center d-flex" style="margin-left: 30%">
                                <span>1</span>
                            </div>
                            <div class="media-body p-md-3">
                                <h3 class="heading mb-2">Akses Website E-Kavling Milik PT. Mutiara Putri Gemilang
                                </h3>
                                <p class="text-start">
                                    &mdash; Lihat Profile PT. MPG Agar Anda Yakin Terhadap Perusahaan Kami <br>
                                    &mdash; Lihat Kategori dan Properti yang Tersedia pada Navigation
                                    Barr
                                </p>

                                {{-- <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia
                                    and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                                    at the coast of the Semantics, a large language ocean.</p> --}}
                                <hr class="bg-primary">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-self-stretch ftco-animate mt-lg-5">
                        <div class="media block-6 services d-block mt-lg-5 pt-md-5 pt-lg-4">
                            <div class="icon justify-content-center align-items-center d-flex" style="margin-left: 30%">
                                <span>2</span>
                            </div>
                            <div class="media-body p-md-3">
                                <h3 class="heading mb-2">Registrasi dan Login di website E-Kavling Milik PT. Mutiara Putri
                                    Gemilang</h3>
                                <p class="text-start">
                                    Registrasi dan Login akan mendapat previlage berupa: <br>
                                    &mdash; Live Chat <br>
                                    &mdash; Wishlist <br>
                                    &mdash; Pembelian Properti <br>
                                </p>
                                <hr class="bg-primary">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services d-block">
                            <div class="icon justify-content-center align-items-center d-flex" style="margin-left: 30%">
                                <span>3</span>
                            </div>
                            <div class="media-body p-md-3">
                                <h3 class="heading mb-2">Beli Properti dengan Step Berikut.</h3>
                                <p class="text-start">
                                    &mdash; Pembelian Properti dilakukan dengan validasi berkas pembeli terlebih dahulu,
                                    tunggu hingga berkas tersebut disetujui oleh pihak PT. MPG <br>
                                    &mdash; Anda dapat melihat riwayat validasi berkas pada menu pembelian <br>
                                    &mdash; Setelah berkas disetujui, anda dapat mengonfirmasi pembelian dan melanjutkan
                                    pembayaran <br>
                                    &mdash; Pembayaran dapat dilakukan melalui 3 metode, yakni Cash, KPR, atau Inhouse <br>
                                    &mdash; Pilih metode bayar, dan lakukan pembayaran melalui No. Rekening yang telah
                                    disediakan <br>
                                    &mdash; Kirim bukti pembayaran dan lihat riwayat di bagian menu pembelian <br>
                                </p>
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
                                @foreach ($testimonis as $testimoni)
                                    <div class="testimony-wrap text-center py-4 pb-5">
                                        @if (!empty($testimoni->photo))
                                            <div class="user-img"
                                                style="background-image: url('{{ asset('storage/' . $testimoni->photo) }}')">
                                                <span class="quote d-flex align-items-center justify-content-center">
                                                    <i class="icon-quote-left"></i>
                                                </span>
                                            </div>
                                        @else
                                            <div class="user-img"
                                                style="background-image: url('assets/images/users/user.png')">
                                                <span class="quote d-flex align-items-center justify-content-center">
                                                    <i class="icon-quote-left"></i>
                                                </span>
                                            </div>
                                        @endif
                                        <div class="text px-4 pb-5">
                                            <p class="mb-4">{{ $testimoni->message }}</p>
                                            @if (!empty($testimoni->name))
                                                <p class="name">{{ $testimoni->name }}</p>
                                            @else
                                                <p class="name">Anonymous</p>
                                            @endif

                                            <span class="position">{{ $testimoni->profesi }}</span>
                                        </div>
                                    </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Testimoni End --}}
    @endsection

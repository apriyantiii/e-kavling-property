{{-- Navbar Start --}}
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target"
    id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.properti') }}">E-Kavling</a>
        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
            data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav nav ml-auto justify-content-end">
                <li class="nav-item"><a href="#home-section" class="nav-link"><span>Beranda</span></a></li>
                {{-- <li class="nav-item"><a href="#services-section" class="nav-link"><span>Visi Misi</span></a></li> --}}
                <li class="nav-item"><a href="#properties-section" class="nav-link"><span>Properti</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Tentang</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#visi-misi">Visi Misi</a>
                        <a class="dropdown-item" href="#about-section">Tentang Perusahaan</a>
                        <a class="dropdown-item" href="#komisaris">Dewan Komisaris</a>
                        <a class="dropdown-item" href="#prosedur-pembelian">Prosedur Pembelian</a>
                    </div>
                </li>
                {{-- <li class="nav-item"><a href="#prosedur-pembelian" class="nav-link"><span>Prosedur Pembelian</span></a></li> --}}
                {{-- <li class="nav-item"><a href="#agent-section" class="nav-link"><span>Dewan Komisaris</span></a></li> --}}
                {{-- <li class="nav-item"><a href="#blog-section" class="nav-link"><span>Blog</span></a></li> --}}
                <li class="nav-item"><a href="#testimoni" class="nav-link"><span>Testimoni</span></a></li>
                {{-- <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Kontak</span></a></li> --}}

                @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link"><span>Home</span></a></li>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link"><span>Log
                                    in</span></a></li>

                        @if (Route::has('register'))
                            <li class="nav-item"><a href="{{ route('register') }}"
                                    class="nav-link"><span>Register</span></a></li>
                        @endif
                    @endauth

                @endif




            </ul>
        </div>
    </div>
</nav>
{{-- Navbar End --}}

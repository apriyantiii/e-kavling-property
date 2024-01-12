<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white static-top shadow">
    <div class="container">
        <a class="navbar-brand" href="#">
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-e-kavling.png') }}" alt="" height="35"> <span
                    class="logo-txt">PT. MGP</span>
            </span> </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                <li class="nav-item fs-5"><a href="#home-section" class="nav-link"><span>Beranda</span></a></li>
                {{-- <li class="nav-item"><a href="#services-section" class="nav-link"><span>Visi Misi</span></a></li> --}}
                <li class="nav-item"><a href="#properties-section" class="nav-link fs-5"><span>Properti</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link fs-5 dropdown-toggle" data-toggle="dropdown" href="#" role="button"
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
                <li class="nav-item"><a href="#testimoni" class="nav-link fs-5"><span>Testimoni</span></a></li>
                {{-- <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Kontak</span></a></li> --}}

                @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link fs-5"><span>Home</span></a></li>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link fs-5"><span>Log
                                    in</span></a></li>

                        @if (Route::has('register'))
                            <li class="nav-item"><a href="{{ route('register') }}"
                                    class="nav-link fs-5"><span>Register</span></a></li>
                        @endif
                    @endauth

                @endif
                </li>
            </ul>
        </div>
    </div>
</nav>

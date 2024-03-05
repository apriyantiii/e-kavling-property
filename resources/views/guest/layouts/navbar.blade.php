{{-- Navbar Start --}}
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target"
    id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.properti') }}">E-Kavling</a>
        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
            data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu" style="margin-right: 30px"></span>
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav nav ml-auto justify-content-end">
                <li class="nav-item"><a href="{{ route('landing-page') }}" class="nav-link"><span>Beranda</span></a>
                </li>
                {{-- <li class="nav-item"><a href="#services-section" class="nav-link"><span>Visi Misi</span></a></li> --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">Properti</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('landing-page.kategori') }}">Kategori Properti</a>
                        <a class="dropdown-item" href="{{ route('landing-page.property') }}">Properti</a>
                    </div>
                </li>
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

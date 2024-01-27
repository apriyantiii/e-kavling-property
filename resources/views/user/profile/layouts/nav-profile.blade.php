<nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top mb-5" style="height: 75px;">
    <div class="container">
        {{-- <a class="navbar-brand" href="{{ url('/') }}">
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-e-kavling.png') }}" alt="" height="30">
                <span class="logo-txt">PT. MGP</span>
        </a> --}}
        <a class="navbar-brand text-black" href="{{ route('home.properti') }}">
            <h4><strong>E-Kavling</strong></h4>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav nav ml-auto justify-content-end">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">
                        <h5><span>Beranda</span></h5>
                    </a></li>
                <li class="nav-item"><a href="{{ route('home.properti') }}" class="nav-link">
                        <h5><span>Properti</span></h5>
                    </a>
                </li>

                <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link">
                        <h5><span>Kategori</span></h5>
                    </a>
                </li>

                <li class="nav-item"><a href="{{ route('wishlist.index') }}" class="nav-link">
                        <h5><span>Wishlist</span></h5>
                    </a>
                </li>

                {{-- <li class="nav-item"><a href="{{ route('categories.index') }}"
                        class="nav-link"><span>Kategori</span></a>
                </li>

                <li class="nav-item"><a href="{{ route('categories.index') }}"
                        class="nav-link"><span>Wishlist</span></a>
                </li> --}}

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="#">
                            <i class="align-middle mdi mdi-cog font-size-16 me-1"></i> Pengaturan
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}">
                            <i class="align-middle bx bx-power-off font-size-16 me-1"></i> Keluar
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            <h5>{{ Auth::user()->name }}<span class="fas fa-caret-down" style="margin-left: 5px;"></span>
                            </h5>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.index') }}"><span class="fas fa-user-circle"
                                    style="margin-right: 5px;"></span>Profil
                                Saya
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span
                                    class="fas fa-sign-out-alt" style="margin-right: 5px;"></span>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

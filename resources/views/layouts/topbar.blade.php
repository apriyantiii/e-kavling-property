<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('favicon-modis.png') }}" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('favicon-modis.png') }}" alt="" height="24"> <span
                            class="logo-txt" style="font-size: 16px !important">PT. MPG</span>
                    </span>
                </a>

                <a href="index" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('favicon-modis.png') }}" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('favicon-modis.png') }}" alt="" height="24"> <span
                            class="logo-txt" style="font-size: 16px !important">PT. MPG</span>
                    </span>
                </a>
            </div>

            <button type="button" class="px-4 btn btn-sm font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            {{-- <div class="dropdown d-none d-sm-inline-block"> --}}
            <div class="dropdown">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            {{-- <div class="dropdown d-none d-lg-inline-block ms-1"> --}}
            <div class="dropdown d-lg-inline-block ms-1">
                <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i data-feather="grid" class="icon-lg"></i>
                </button>

            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    {{-- @if (Auth::user()->avatar)
                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                            class="rounded-circle header-profile-user" alt="Avatar - {{ Auth::user()->name }}">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}"
                            class="rounded-circle header-profile-user" alt="Avatar - {{ Auth::user()->name }}">
                    @endif --}}


                    <span
                        class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::guard('is_admin')->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#">
                        <i class="align-middle mdi mdi-cog font-size-16 me-1"></i> Pengaturan
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}">
                        <i class="align-middle bx bx-power-off font-size-16 me-1"></i> Keluar
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>

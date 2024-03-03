<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu Navigasi</li>

                <li class="mb-2">
                    <a href="{{ route('admin.home') }}">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="my-2">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="box"></i>
                        <span>Produk & Kategori</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product.index') }}">Produk</a></li>
                        <li><a href="{{ route('category.index') }}">Kategori</a></li>
                    </ul>
                </li>

                <li class="my-2">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-bag"></i>
                        <span>Penjualan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.transaction') }}">Transaksi</a></li>
                        <li><a href="{{ route('checkout.data-validate') }}">Validasi Berkas</a></li>
                        <li><a href="{{ route('checkout.payments-validate') }}">Validasi Pembayaran</a></li>
                        <li><a href="{{ route('admin.checkout.inhouse-payments') }}">Pembayaran Inhouse</a></li>
                    </ul>
                </li>

                <li class="mb-2">
                    <a href="{{ route('admin.wishlist.index') }}">
                        <i data-feather="heart"></i>
                        <span>Wishlist</span>
                    </a>
                </li>

                <li class="mb-2">
                    <a href="{{ route('admin.chat.index') }}">
                        <i data-feather="message-square"></i>
                        <span>Chat</span>
                    </a>
                </li>

                <li class="mb-2">
                    <a href="{{ route('admin.bank') }}">
                        <i class= "bx bxs-bank"></i>
                        <span>Bank</span>
                    </a>
                </li>

                <li class="mb-2">
                    <a href="{{ route('admin.testimoni') }}">
                        <i class= "bx bx-user-voice"></i>
                        <span>Testimoni</span>
                    </a>
                </li>

                <li class="my-2">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="settings"></i>
                        <span>Pengaturan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.setting-admin.index') }}">Admin</a></li>
                        <li><a href="{{ route('admin.setting-user.index') }}">Pengguna</a></li>
                    </ul>
                </li>



                {{-- @if (Auth::user()->hasPermissionTo('partner')) --}}
                {{-- <li class="my-2">
                    <a href="jawdvascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span>Mitra</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Pemasok</a></li>
                        <li><a href="#">Pelanggan</a></li>
                    </ul>
                </li>

                <li class="my-2">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span>Penjualan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Order Penjualan</a></li>
                        <li><a href="#">Invoice Penjualan</a></li>
                    </ul>
                </li> --}}
                {{-- @endif --}}

                {{-- @if (Auth::user()->hasPermissionTo('purchase')) --}}
                {{-- <li class="my-2">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-bag"></i>
                        <span>Pembelian</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Order Pembelian</a></li>
                        <li><a href="#">Invoice Pembelian</a></li>
                    </ul>
                </li> --}}
                {{-- @endif --}}

                {{-- @if (Auth::user()->hasPermissionTo('product')) --}}
                {{-- <li class="my-2">
                    <a href="{{ route('product.index') }}">
                        <i data-feather="box"></i>
                        <span>Produk & Kategori</span>
                    </a>

                </li> --}}
                {{-- @endif --}}

                {{-- <li class="my-2">
                    <a href="javascript:;">
                        <i data-feather="pie-chart"></i>
                        <span>Biaya</span>
                    </a>
                </li>

                <li class="my-2">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="briefcase"></i>
                        <span>Akunting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Dashboard</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Ayat Jurnal</a></li>
                    </ul>
                </li> --}}

                {{-- @if (Auth::user()->hasPermissionTo('report')) --}}
                {{-- <li class="my-2">
                    <a href="#">
                        <i data-feather="pie-chart"></i>
                        <span>Report</span>
                    </a>
                </li> --}}
                {{-- @endif --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-Kavling PT. Mutiara Putri Gemilang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('user.layouts.head-css')
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    @if (auth()->check())
        @include('user.layouts.nav-home') {{-- Tampilkan navbar home jika sudah login --}}
    @else
        @include('user.layouts.navbar') {{-- Tampilkan navbar default jika belum login --}}
    @endif

    {{-- CONTENT LANDING PAGE START --}}
    @yield('landing-page')
    {{-- CONTENT LANDING PAGE end --}}

    {{-- CONTENT content START --}}
    @yield('content')
    {{-- CONTENT content end --}}

    @include('user.layouts.footer')

    <!-- JAVASCRIPT -->
    @include('user.layouts.landing-scripts')

</body>
</html>

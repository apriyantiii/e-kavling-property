<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Kavling PT. Mutiara Putri Gemilang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('guest.layouts.head-css')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    @include('guest.layouts.navbar')

    {{-- CONTENT LANDING PAGE START --}}
    @yield('landing-page')
    {{-- CONTENT LANDING PAGE end --}}

    {{-- CONTENT content START --}}
    @yield('content')
    {{-- CONTENT content end --}}

    @include('guest.layouts.footer')

    <!-- JAVASCRIPT -->
    @include('guest.layouts.landing-scripts')

</body>

</html>

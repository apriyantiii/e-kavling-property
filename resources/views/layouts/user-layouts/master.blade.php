<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>E-Kavling PT.MGP</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">

    <!-- Your Internal CSS -->
    <style>
        .navbar-nav .nav-item:hover .nav-link,
        .navbar-nav .nav-item.active .nav-link {
            border-bottom: 2px solid #4b69bd;
        }
    </style>
    @include('layouts.head-css')
</head>

<body>
    @include('layouts.user-layouts.navbar')


    <div class="page-content">
        @yield('content')
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    @include('layouts.user-layouts.footer')


    {{-- <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div id="map" class="bg-white"></div>
    </section> --}}


    <!-- JAVASCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('hashchange', function() {
                updateActiveTab();
            });

            updateActiveTab();
        });

        function updateActiveTab() {
            var hash = window.location.hash;

            var navbarItems = document.querySelectorAll('.navbar-nav .nav-item');

            navbarItems.forEach(function(item) {
                item.classList.remove('active');
            });

            var activeLink = document.querySelector('.navbar-nav .nav-item a[href="' + hash + '"]');
            if (activeLink) {
                activeLink.parentElement.classList.add('active');
            }
        }
    </script>



    @include('layouts.vendor-scripts')


</body>

</html>

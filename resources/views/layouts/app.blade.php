<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta -->
    <meta name="description" content="Helpdesklər üçün ticket sistemi"/>
    <meta name="author" content="Rahim Süleymanov"/>
    <link rel="canonical" href="https://rs-code.az/">
    <meta property="og:url" content="https://rs-code.az">
    <meta property="og:title" content="RS-helpdesk">
    <meta property="og:description" content="Helpdesklər üçün ticket sistemi">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="RS-HELPDESK">
    <link rel="shortcut icon" href="{{ asset('back/assets/images/favicon.svg') }}"/>

    <!-- Title -->
    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('back/assets/css/bootstrap.min.css') }}"/>

    <!-- Bootstrap font icons css -->
    <link rel="stylesheet" href="{{ asset('back/assets/fonts/bootstrap/bootstrap-icons.css') }}"/>

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('back/assets/css/main.min.css') }}"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="{{ asset('back/css/main.css?v=1') }}">
    @yield('css')
</head>
<body class="
@if(Route::currentRouteName() == 'login' || Route::currentRouteName() == 'register' || Route::currentRouteName() == 'reset')
d-flex justify-content-center align-items-center
@endif
">

<input type="hidden" value="{{ config('app.url') }}" id="rootUrl">
@yield('content')

@if(Route::currentRouteName() == 'login' || Route::currentRouteName() == 'register' || Route::currentRouteName() == 'reset')

@else
    <script src="{{ asset('back/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/modernizr.js') }}"></script>
    <script src="{{ asset('back/assets/js/moment.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
            integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        toastr.options = {
            "debug": false,
            "positionClass": "toast-bottom-right",
            "onclick": null,
            "fadeIn": 300,
            "fadeOut": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showTitle": false
        }
    </script>

    <!-- Overlay Scroll JS -->
    <script src="{{ asset('back/assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('back/assets/vendor/overlay-scroll/custom-scrollbar.js') }}"></script>

    <!-- News ticker -->
    <script src="{{ asset('back/assets/vendor/newsticker/newsTicker.min.js') }}"></script>
    <script src="{{ asset('back/assets/vendor/newsticker/custom-newsTicker.js') }}"></script>

    @if(request()->segment(1) == 'home')
        <!-- Apex Charts -->
        <script src="{{ asset('back/assets/vendor/apex/apexcharts.min.js') }}"></script>
        <script src="{{ asset('back/assets/vendor/apex/custom/dash1/sparkline.js') }}"></script>
        <script src="{{ asset('back/assets/vendor/apex/custom/dash1/projects.js') }}"></script>
        <script src="{{ asset('back/assets/vendor/apex/custom/dash1/visits.js') }}"></script>
        <script src="{{ asset('back/assets/vendor/apex/custom/dash1/analytics.js') }}"></script>
        <script src="{{ asset('back/assets/vendor/apex/custom/dash1/revenue.js') }}"></script>
        <script src="{{ asset('back/assets/vendor/apex/custom/dash1/leads.js') }}"></script>
        <script src="{{ asset('back/assets/vendor/apex/custom/dash1/sales.js') }}"></script>
        <script src="{{ asset('back/assets/vendor/apex/custom/dash1/transactions.js') }}"></script>
        <script src="{{ asset('back/assets/vendor/apex/custom/dash1/transactions2.js') }}"></script>
        <script src="{{ asset('back/assets/vendor/apex/custom/dash1/analytics-sparkline.js') }}"></script>
    @endif

    <!-- Main Js Required -->
    <script src="{{ asset('back/assets/js/main.js') }}"></script>
@endif
@yield('js')
</body>
</html>

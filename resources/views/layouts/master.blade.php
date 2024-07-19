<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/tilda-blocks-page26105358.min.css') }}"/>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/lightgallery.js/dist/css/lightgallery.min.css"
    />

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script
        src="https://www.jqueryscript.net/demo/jQuery-Before-After-Image-Comparison-Plugin-Image-Reveal/dist/jquery.imageReveal.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>

    <link
        rel="stylesheet"
        href="https://www.jqueryscript.net/demo/jQuery-Before-After-Image-Comparison-Plugin-Image-Reveal/dist/jquery.imageReveal.min.css"
    />

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARxNnI3YpJxRgWHJWgpCrjt2snWvUmKjs"
        async
        defer
    ></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}"/>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('css')
</head>
<body onload="initMap()">
@yield('content')
<script src="https://cdn.jsdelivr.net/npm/lightgallery.js/dist/js/lightgallery.min.js"></script>
<script src="{{ asset('js/index.js') }}"></script>
@yield('js')
</body>
</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-config" content="{{ asset('assets/favicons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">

    <title>@yield('title') | Citas Médicas </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">
    <x-css>
        {{$css}}
    </x-css>

</head>
<body>

    <!----- Header ------>
    <x-header></x-header>

        {{ $slot }}

    <!-- |=====|| ScrollToTop Start ||===============| -->
    <a href="#" class="scrollToTop">
        <i class="fas fa-level-up-alt"></i>
    </a>

    <!----- Footer ------>
    <x-footer></x-footer>
    <x-js>
        {{$js}}
    </x-js>
</body>
</html>

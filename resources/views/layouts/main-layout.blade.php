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

    <x-css>
        {{$css}}
    </x-css>
    <style>
        @media only screen and (max-width: 1199px) {
            .whatsappFloat {
                bottom: 30px !important;
                right: 30px !important;
            }
        }
        @media only screen and (max-width: 767px) {
            .whatsappFloat {
                bottom: 20px !important;
                right: 20px !important;
                height: 50px !important;
                width: 50px !important;
                line-height: 50px !important;
            }
        }
        .whatsappFloat:hover {
            color: #fff !important;
            background: #128c7e !important;
        }
    </style>

</head>
<body>

    <!----- Header ------>
    <x-header></x-header>

        {{ $slot }}

    <!-- |=====|| WhatsApp Float Button Start ||===============| -->
    <a href="https://wa.me/573330333455?text=Hola%20necesito%20ayuda%20en%20citasmedicas.es" target="_blank" class="whatsappFloat" style="position: fixed; display: block; bottom: 50px; right: 35px; z-index: 100000; color: #fff; background: #25d366; height: 55px; width: 55px; text-align: center; line-height: 55px; -webkit-transition: 1s ease; -o-transition: 1s ease; transition: 1s ease; border-radius: 50%; font-size: 18px; -webkit-box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.14), 0 2px 8px 0 rgba(0, 0, 0, 0.1); box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.14), 0 2px 8px 0 rgba(0, 0, 0, 0.1); text-decoration: none;">
        <i class="fab fa-whatsapp"></i>
    </a>
    <!-- |=====|| WhatsApp Float Button End ||=================| -->

    <!-- |=====|| ScrollToTop Start ||===============| -->
    <a href="#" class="scrollToTop" style="display: inline;">
        <i class="fas fa-level-up-alt"></i>
    </a>

    <!----- Footer ------>
    <x-footer></x-footer>
    <x-js>
        {{$js}}
    </x-js>
</body>
</html>

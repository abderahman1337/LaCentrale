<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
        <link rel="icon" href="https://lacentrale.fr/static/fragment-head/media/favicon-32.cc0580c7.png" sizes="32x32">
        <link rel="apple-touch-icon" href="https://lacentrale.fr/static/fragment-head/media/favicon-180.61cbde72.png" sizes="180x180" />
        <link rel="icon" href="https://lacentrale.fr/static/fragment-head/media/favicon-192.86e99c0c.png" sizes="192x192" />
        <link rel="icon" href="https://lacentrale.fr/static/fragment-head/media/favicon-512.9de245d0.png" sizes="512x512" />
        <link rel="icon" href="https://lacentrale.fr/static/fragment-head/media/favicon.e47e4cf5.svg" type="image/svg+xml">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-home.header></x-home.header>
        <div class="container lg:px-0 px-2 mx-auto">
            @yield('content')
            <x-home.footer></x-home.footer>
        </div>
        <script src="{{asset('js/scripts.js')}}"></script>
        @yield('scripts')
    </body>
</html>

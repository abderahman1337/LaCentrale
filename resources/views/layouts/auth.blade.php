<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
        <link rel="icon" href="{{asset('images/website/logo.jpeg')}}" sizes="32x32">
        <link rel="apple-touch-icon" href="{{asset('images/website/logo.jpeg')}}" sizes="180x180" />
        <link rel="icon" href="{{asset('images/website/logo.jpeg')}}" sizes="192x192" />
        <link rel="icon" href="{{asset('images/website/logo.jpeg')}}" sizes="512x512" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{asset('js/app.js')}}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-home.header></x-home.header>
        <div class="container lg:px-0 px-2 mx-auto">
            @yield('content')
        </div>
        @yield('scripts')
    </body>
</html>

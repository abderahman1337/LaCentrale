<!DOCTYPE html>
<html dir="{{app()->getLocale()=='ar'?'rtl':'ltr'}}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$websiteDescription}}">
    <title>{{ $websiteName }} | @yield('title')</title>
    <link rel="icon" href="{{asset('images/website/logo.jpeg')}}" sizes="32x32">
    <link rel="apple-touch-icon" href="{{asset('images/website/logo.jpeg')}}" sizes="180x180" />
    <link rel="icon" href="{{asset('images/website/logo.jpeg')}}" sizes="192x192" />
    <link rel="icon" href="{{asset('images/website/logo.jpeg')}}" sizes="512x512" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <link href="{{ asset('css/variables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Helvet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-Roboto bg-white antialiased">
    @yield('content')
</body>
</html>
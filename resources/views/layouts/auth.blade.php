<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{$websiteDescription}}">
        <title>{{ $websiteName }} | @yield('title')</title>
        <link rel="icon" href="{{asset('images/website/logo.jpeg')}}" sizes="32x32">
        <link rel="apple-touch-icon" href="{{asset('images/website/logo.jpeg')}}" sizes="180x180" />
        <link rel="icon" href="{{asset('images/website/logo.jpeg')}}" sizes="192x192" />
        <link rel="icon" href="{{asset('images/website/logo.jpeg')}}" sizes="512x512" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <!-- Scripts -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{asset('js/app.js')}}" defer></script>
        <link rel="stylesheet" type="text/css" href="{{asset('/libs/toastr/toastr.min.css')}}">
        <script type="text/javascript" src="{{asset('/libs/toastr/toastr.min.js')}}"></script>
        <script>
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        </script>
    </head>
    <body class="font-sans antialiased">
        <x-home.header></x-home.header>
        <div class="container lg:px-0 px-2 mx-auto">
            @if (session()->has('success'))
            <script>toastr.success("{{session()->get('success')}}");</script>
            @elseif(session()->has('error'))
            <script>toastr.error("{{session()->get('error')}}");</script>
            @elseif(session()->has('warning'))
            <script>toastr.warning("{{session()->get('warning')}}");</script>
            @elseif(session()->has('info'))
            <script>toastr.info("{{session()->get('info')}}");</script>
            @endif
            @yield('content')
        </div>
        @yield('scripts')
    </body>
</html>

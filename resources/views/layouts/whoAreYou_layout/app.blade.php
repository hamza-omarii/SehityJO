<!doctype html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Library -->
    <link rel="stylesheet" href="{{ asset('css/plugins/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/fontAwsome.min.css') }}">

    <!--- Style css -->
    @if (App::getLocale() == 'en')
        <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/pages/login_register/ltr.css') }}" rel="stylesheet">
        <link href="{{ asset('css/global/ltr.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/bootstrap/bootstrap.rtl.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/pages/login_register/rtl.css') }}" rel="stylesheet">
        <link href="{{ asset('css/global/rtl.css') }}" rel="stylesheet">
    @endif
</head>

<body class="d-flex justify-content-center align-items-center">
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('js/plugins/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/plugins/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    <script src="{{ asset('js/Bootstrap/bootstrap.bundle.min.js') }}"></script>
    @yield("script")
</body>

</html>

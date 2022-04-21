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
        <link rel="stylesheet" href="{{ asset('css/pages/welcome/ltr.css') }}">
        <link href="{{ asset('css/global/ltr.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/bootstrap/bootstrap.rtl.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/pages/welcome/rtl.css') }}">
        <link href="{{ asset('css/global/rtl.css') }}" rel="stylesheet">
    @endif

    @yield("css")

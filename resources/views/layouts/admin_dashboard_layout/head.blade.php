<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A page's description, usually one or two sentences." />

<title> @yield("title","SehityJo") </title>

<!-- Library -->
<link rel="stylesheet" href="{{ asset('css/plugins/animate.css') }}">
<link rel="stylesheet" href="{{ asset('css/plugins/fontAwsome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/plugins/dataTable.min.css') }}">
@yield("css-library")


<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pages/dashboard/ltr.css') }}">
    <link href="{{ asset('css/global/ltr.css') }}" rel="stylesheet">
    @yield("css-ltr-files")
@else
    <link href="{{ asset('css/bootstrap/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/pages/dashboard/rtl.css') }}">
    <link href="{{ asset('css/global/rtl.css') }}" rel="stylesheet">
    @yield("css-rtl-files")
@endif

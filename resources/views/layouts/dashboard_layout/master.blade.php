<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    @include('layouts.dashboard_layout.head')
</head>

<body>
    <div class="d-flex" id="wrapper">

        @include('layouts.dashboard_layout.sidebar')

        <div id="page-content-wrapper">

            @include('layouts.dashboard_layout.navbar')

            <div class="container-fluid">
                <div class="m-sm-2 m-lg-5">
                    @include('layouts.dashboard_layout.flash_messages')
                    @yield("content")
                </div>
            </div>

        </div>
    </div>
    @include('layouts.dashboard_layout.footer')
    @include('layouts.dashboard_layout.script')
</body>

</html>

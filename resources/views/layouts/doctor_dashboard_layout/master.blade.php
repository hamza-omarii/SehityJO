<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    @include('layouts.doctor_dashboard_layout.head')
</head>

<body>
    <div class="d-flex" id="wrapper">

        @include('layouts.doctor_dashboard_layout.sidebar')

        <div id="page-content-wrapper">

            @include('layouts.doctor_dashboard_layout.navbar')

            <div class="container-fluid">
                <div class="m-sm-2 m-lg-5">
                    @include('layouts.doctor_dashboard_layout.flash_messages')
                    @yield("content")
                </div>
            </div>

        </div>
    </div>
    @include('layouts.doctor_dashboard_layout.footer')
    @include('layouts.doctor_dashboard_layout.script')
</body>

</html>

<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    @include('layouts.user_layout.head')
</head>

<body>
    <div class="back-to-top" id="back-to-top"></div>
    @include('layouts.user_layout.navbar')

    <div>
        <div class="container">
            @include('layouts.user_layout.flash_messages')
        </div>
        @yield("content")
    </div>

    @include('layouts.user_layout.footer')
    @include('layouts.user_layout.script')
</body>

</html>

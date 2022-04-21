@extends("layouts.whoAreYou_layout.app")

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-7">
            <div class="box  wow fadeInDownBig p-4">
                <div class="dropdown d-flex justify-content-center">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 158px; margin: 0 auto;">
                        @if (App::getLocale() == 'ar')
                            <img src="{{ URL::asset('images/flags/JO.png') }}" class="mx-1" alt="Ar">
                            العربية
                        @else
                            <img src="{{ URL::asset('images/flags/US.png') }}" class="mx-1" alt="En">
                            English
                        @endif
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}">
                                    @if ($properties['native'] == 'العربية')
                                        <img src="{{ URL::asset('images/flags/JO.png') }}" alt="Ar">
                                    @endif
                                    @if ($properties['native'] == 'English')
                                        <img src="{{ URL::asset('images/flags/US.png') }}" alt="En">
                                    @endif
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="row justify-content-center align-items-center">
                    <h3 class="col-11 my-4 text-center title" style="border: 3px solid #0286ce; padding: 10px; border-radius: 3px; font-weight: bold; border-style: dashed">
                        {{ __('main.signin_as') }}</h3>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 mb-3">
                        <div class="user am mx-2 d-flex justify-content-center align-items-center">
                            <a href="{{ route('admin.login') }}" class="hvr-icon-bounce fw-bold text-decoration-none fs-4">{{ __('main.admin') }}<i class="fas fa-user-shield hvr-icon px-2"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 mb-3">
                        <div class="user am mx-2 d-flex justify-content-center align-items-center">
                            <a href="{{ route('doctor.login') }}" class="hvr-icon-bounce fw-bold text-decoration-none fs-4">{{ __('main.doctor') }}<i class="fas fa-user-md hvr-icon px-2"></i></a>
                        </div>
                    </div>
                    <div class="col-12  col-sm-12 col-md-4 mb-3">
                        <div class="user am mx-2 d-flex justify-content-center align-items-center">
                            <a href="{{ route('user.login') }}" class="hvr-icon-bounce fw-bold text-decoration-none fs-4">{{ __('main.patient') }}<i class="fas fa-procedures hvr-icon px-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

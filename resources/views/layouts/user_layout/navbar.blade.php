    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">

                <a class="navbar-brand h4" href="@auth {{ url('user/search/doctor') }} @endauth @guest {{ url('/') }} @endguest">
                    <i class=" fa-solid fa-stethoscope fa-3x me-2 text-danger"></i>
                    <span class="text-primary h2 fw-bold">
                        {{ __('global.sehity') }}
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupport">
                    <ul class="navbar-nav ml-auto"></ul>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/">{{ __('main.home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#ourServices">{{ __('main.our_services') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#aboutuse">{{ __('main.about_us') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#contact">{{ __('main.contact') }}</a>
                            </li>
                        @endguest
                        @auth
                            <li class="nav-item {{ Route::currentRouteNamed('user.search.doctor') ? 'active custom-margin' : '' }}">
                                <a href="{{ route('user.search.doctor') }}" data-toggle="tab" class="nav-link " aria-current="page">{{ __('main.Appointment Booking') }}</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed('user.get.appointments') ? 'active custom-margin' : '' }}">
                                <a href="{{ route('user.get.appointments') }}" class="nav-link ">{{ __('main.Medical Record') }}</a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed('user.articles') ? 'active custom-margin' : '' }}">
                                <a href="{{ route('user.articles') }}" data-toggle="tab" class="nav-link ">{{ __('main.articles') }}</a>
                            </li>
                        @endauth
                    </ul>
                    <div class="dropdown d-flex justify-content-center">
                        <button class="btn btn-light dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="width: 158px; margin: 0 auto;">
                            @if (App::getLocale() == 'ar')
                                <img src="{{ URL::asset('images/flags/JO.png') }}" class="mx-1" alt="Ar">
                                العربية
                            @else
                                <img src="{{ URL::asset('images/flags/US.png') }}" class="mx-1" alt="En">
                                English
                            @endif
                        </button>

                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item p-3" rel="alternate" hreflang="{{ $localeCode }}">
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
                            <form action="{{ route('user.logout') }}" method="POST" class="dropdown-item">
                                @csrf
                                <button type="submit" class="btn bg-transparent text-danger fw-bold"><i class="fas fa-power-off text-danger fw-bold"></i>
                                    {{ __('main.logout') }}
                                </button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

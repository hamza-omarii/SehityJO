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
        <link rel="stylesheet" href="{{ asset('css/pages/welcome/ltr.css') }}">
        <link href="{{ asset('css/global/ltr.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/bootstrap/bootstrap.rtl.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/pages/welcome/rtl.css') }}">
        <link href="{{ asset('css/global/rtl.css') }}" rel="stylesheet">
    @endif

</head>

<body>
    <div class="back-to-top" id="back-to-top"></div>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">

                <a class="navbar-brand h4" href="{{ url('/') }}"><i class="fa-solid fa-stethoscope fa-3x me-2 text-danger"></i><span class="text-primary h2 fw-bold">{{ __('global.sehity') }}</span></a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupport">
                    <ul class="navbar-nav ml-auto"></ul>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active"><a class="nav-link" href="#">{{ __('welcome.home') }}</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#ourServices">{{ __('welcome.our_services') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#aboutuse">{{ __('welcome.about_us') }}</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">{{ __('welcome.contact') }}</a></li>
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
                </div>
            </div>
        </nav>
    </header>

    <div class="page-hero bg-image overlay-dark" style=" background-position: center ;background-image: url({{ asset('images/welcome_page/bg_image_1.jpg') }});">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <span class="subhead">{{ __('welcome.Let_make_your_life_happier') }}</span>
                <h1 class="display-4">{{ __('welcome.healthy_living') }}</h1>
                <a class="btn btn-primary ml-lg-3 fw-bold" href="{{ url('/who-are-you') }}">{{ __('welcome.login_register') }}</a>
            </div>
        </div>
    </div>

    <div class="bg-light" id='ourServices'>
        <div class="page-section py-3 mt-md-n5 custom-index">
            <div class="container">
                <div class="row justify-content-between">
                    <div class=" mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center ">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-calendar-check"></span>
                            </div>
                            <p class="text-secondary">{{ __('welcome.appointment_booking') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-file-medical-alt"></span>
                            </div>
                            <p class="text-secondary">{{ __('welcome.medical_reports') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-newspaper"></span>
                            </div>
                            <p class="text-secondary">{{ __('welcome.medical_articles') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-syringe"></span>
                            </div>
                            <p class="text-secondary">{{ __('welcome.vaccinations') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-head-side-cough-slash"></span>
                            </div>
                            <p class="text-secondary">{{ __('welcome.sick_leaves') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-sms"></span>
                            </div>
                            <p class="text-secondary">{{ __('welcome.monitor_health') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-allergies"></span>
                            </div>
                            <p class="text-secondary">{{ __('welcome.blood_donation') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-ambulance"></span>
                            </div>
                            <p class="text-secondary">{{ __('welcome.home_services') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-money-check-alt"></span>
                            </div>
                            <p class="text-secondary">{{ __('welcome.online_payment') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section pb-0" id="aboutuse">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <h1>{{ __('welcome.welcome_to_sehityjo') }}</h1>
                        <p class="text-grey mb-4" style="line-height: 1.8">
                            {{ __('welcome.about_us_text') }}
                        </p>
                        <a class="btn btn-primary ml-lg-3 fw-bold " href="{{ url('/who-are-you') }}">{{ __('welcome.login_register') }}</a>
                    </div>
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                        <div class="img-place custom-img-1">
                            <img src="{{ asset('images/welcome_page/bg-doctor.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section" id="contact">
        <div class="container">
            <h1 class="text-center wow fadeInUp">{{ __('welcome.get_in_touch') }}</h1>

            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    @if (session()->has('successKey'))
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </symbol>
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            <div>
                                {{ session()->get('successKey') }}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-2"></div>
            </div>

            <form action="{{ route('admin.suggestions.store') }}" method="POST" class="contact-form mt-5">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-6 py-2 wow fadeInLeft">
                        <label for="fullName" class="mb-2">{{ __('welcome.name') }}</label>
                        <input name="name" type="text" id="fullName" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('welcome.full_name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-6 py-2 wow fadeInRight">
                        <label for="emailAddress" class="mb-2">{{ __('welcome.email') }}</label>
                        <input name="email" type="text" id="emailAddress" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('welcome.email_address') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 py-2 wow fadeInUp">
                        <label for="subject" class="mb-2">{{ __('welcome.subject') }}</label>
                        <input name="subject" type="text" id="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="{{ __('welcome.enter_subject') }}">
                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div name="message" class="col-12 py-2 wow fadeInUp">
                        <label for="message" class="mb-2">{{ __('welcome.message') }}</label>
                        <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" rows="8" placeholder="{{ __('welcome.enter_message') }}" style="height: 150px"></textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary wow zoomIn">{{ __('welcome.send_message') }}</button>
            </form>
        </div>
    </div>

    <div class="page-section banner-home bg-image" style="background-color: #0f97e0; background-image: url({{ asset('images/welcome_page/banner-pattern.svg') }});">
        <div class="container py-5 py-lg-0">
            <div class="row align-items-center">
                <div class="col-lg-4 wow zoomIn">
                    <div class="img-banner d-none d-lg-block">
                        <img src="{{ asset('images/welcome_page/mobile_app.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInRight">
                    <h1 class="font-weight-normal mb-3 get-easy">{{ __('welcome.get_easy_access') }}</h1>

                    <a href="#"><img class="img-fluid mb-2" src="{{ asset('images/welcome_page/google_play.svg') }}" alt=""></a>
                    <a href="#"><img class="img-fluid mb-2" src="{{ asset('images/welcome_page/app_store.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer">
        <div class="container">
            <div class="row px-md-3">
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>{{ __('welcome.company') }}</h5>
                    <ul class="footer-menu">
                        <li><a href="#">{{ __('welcome.about_us') }}</a></li>
                        <li><a href="#">{{ __('welcome.career') }}</a></li>
                        <li><a href="#">{{ __('welcome.editorial_team') }}</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>{{ __('welcome.more') }}</h5>
                    <ul class="footer-menu">
                        <li><a href="#">{{ __('welcome.terms&condition') }}</a></li>
                        <li><a href="#">{{ __('welcome.privacy') }}</a></li>
                        <li><a href="#">{{ __('welcome.advertise') }}</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>{{ __('welcome.our_partner') }}</h5>
                    <ul class="footer-menu">
                        <li><a href="#">{{ __('welcome.one_fitness') }}</a></li>
                        <li><a href="#">{{ __('welcome.one_drugs') }}</a></li>
                        <li><a href="#">{{ __('welcome.one_live') }}</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3 py-3">
                    <h5>{{ __('welcome.contact') }}</h5>
                    <p class="footer-link mt-2">{{ __('welcome.jordan_amman') }}</p>
                    <a href="#" class="footer-link">+962-9191911</a>
                    <a href="#" class="footer-link">SehityJo@gmail.com</a>

                    <h5 class="mt-3">{{ __('welcome.social_media') }}</h5>
                    <div class="footer-sosmed mt-3">
                        <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <p id="copyright" class="text-center">Copyright &copy; 2022 <a href="#">SehityJO</a>. All right reserved
            </p>
        </div>
    </footer>

    <script src="{{ asset('js/plugins/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/welcome_page/welcome.js') }}"></script>
    <script src="{{ asset('js/plugins/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    <script src="{{ asset('js/Bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

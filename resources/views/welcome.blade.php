@extends('layouts.user_layout.master')

@section('content')
    <div class="page-hero bg-image overlay-dark" style=" background-position: center ;background-image: url({{ asset('images/welcome_page/bg_image_1.jpg') }});">
        <div class="hero-section">
            <div class="container text-center wow zoomIn">
                <span class="subhead">{{ __('main.Let_make_your_life_happier') }}</span>
                <h1 class="display-4">{{ __('main.healthy_living') }}</h1>
                <a class="btn btn-primary fw-bold p-2 px-4 fs-3" href="{{ url('/who-are-you') }}">{{ __('main.login_register') }}</a>
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
                            <p class="text-secondary">{{ __('main.appointment_booking') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-file-medical-alt"></span>
                            </div>
                            <p class="text-secondary">{{ __('main.medical_reports') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-newspaper"></span>
                            </div>
                            <p class="text-secondary">{{ __('main.medical_articles') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-syringe"></span>
                            </div>
                            <p class="text-secondary">{{ __('main.vaccinations') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-head-side-cough-slash"></span>
                            </div>
                            <p class="text-secondary">{{ __('main.sick_leaves') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-sms"></span>
                            </div>
                            <p class="text-secondary">{{ __('main.monitor_health') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-allergies"></span>
                            </div>
                            <p class="text-secondary">{{ __('main.blood_donation') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-ambulance"></span>
                            </div>
                            <p class="text-secondary">{{ __('main.home_services') }}</p>
                        </div>
                    </div>
                    <div class="mb-1 col-md-6 col-lg-4 py-1 py-md-0 d-flex justify-content-center">
                        <div class="card-service wow fadeInUp">
                            <div class="circle-shape bg-accent text-white">
                                <span class="fas fa-money-check-alt"></span>
                            </div>
                            <p class="text-secondary">{{ __('main.online_payment') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-section pb-0" id="aboutuse">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 py-3 wow fadeInUp">
                        <h1>{{ __('main.welcome_to_sehityjo') }}</h1>
                        <p class="text-grey mb-4" style="line-height: 1.8">
                            {{ __('main.about_us_text') }}
                        </p>
                        <a class="btn btn-primary ml-lg-3 fw-bold " href="{{ url('/who-are-you') }}">{{ __('main.login_register') }}</a>
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

    <div class="page-section bg-white" id="contact">
        <div class="container">
            <h1 class="text-center wow fadeInUp">{{ __('main.get_in_touch') }}</h1>

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
                        <label for="fullName" class="mb-2">{{ __('main.name') }}</label>
                        <input name="name" type="text" id="fullName" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('main.full_name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-6 py-2 wow fadeInRight">
                        <label for="emailAddress" class="mb-2">{{ __('main.email') }}</label>
                        <input name="email" type="text" id="emailAddress" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('main.email_address') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 py-2 wow fadeInUp">
                        <label for="subject" class="mb-2">{{ __('main.subject') }}</label>
                        <input name="subject" type="text" id="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="{{ __('main.enter_subject') }}">
                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div name="message" class="col-12 py-2 wow fadeInUp">
                        <label for="message" class="mb-2">{{ __('main.message') }}</label>
                        <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" rows="8" placeholder="{{ __('main.enter_message') }}" style="height: 150px"></textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary wow zoomIn">{{ __('main.send_message') }}</button>
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
                    <h1 class="font-weight-normal mb-3 get-easy">{{ __('main.get_easy_access') }}</h1>

                    <a href="#"><img class="img-fluid mb-2" src="{{ asset('images/welcome_page/google_play.svg') }}" alt=""></a>
                    <a href="#"><img class="img-fluid mb-2" src="{{ asset('images/welcome_page/app_store.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
@endsection

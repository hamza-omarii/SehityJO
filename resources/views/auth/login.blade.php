@extends("layouts.whoAreYou_layout.app")

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 ">
            <div class="box wrap d-md-flex wow fadeInUpBig py-sm-0 py-md-4 px-4">
                {{-- Dynamic BackGround --}}
            <div class="img img-fluid" @if (isset($url)) @if ($url == 'admin')
                        style="background-image: url('{{ asset('images/login_register/admin.png') }}'); margin-bottom:20px;"
                    @elseif($url == 'doctor')
                        style="background-image: url('{{ asset('images/login_register/doctors.png') }}'); margin-bottom:20px;" @endif @else
                    style="background-image: url('{{ asset('images/login_register/patient.png') }}'); margin-bottom:20px;" @endif >
                </div>

                <div class="login-wrap px-sm-5 p-md-4 p-md-5">
                    <div class="row">
                        <div class="col-sm-12 col-lg-8 justify-content-center">
                            <h3 class="mb-4 text-center text-lg-start text-secondary">{{ __('main.sign_in') }}
                                @if (isset($url))
                                    @if ($url == 'admin')
                                        {{ __('main.admin') }}
                                    @else
                                        {{ __('main.doctor') }}
                                    @endif
                                @else
                                    {{ __('main.patient') }}
                                @endif
                            </h3>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <p class="social-media d-flex justify-content-center align-content-md-end ">
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><i class="fab fa-google"></i></a>
                            </p>
                        </div>
                    </div>

                    {{-- Form Tag --}}


                    @if (isset($url))
                        @if ($url == 'admin')
                            <form action="{{ route('admin.check') }}" method="POST" class="signin-form" aria-label="{{ __('Login') }}">
                            @elseif($url == 'doctor')
                                <form action="{{ route('doctor.check') }}" method="POST" class="signin-form" aria-label="{{ __('Login') }}">
                        @endif
                    @else
                        <form action="{{ route('user.check') }}" method="POST" class="signin-form" aria-label="{{ __('Login') }}">
                    @endif

                    @csrf

                    {{-- Flash Messages --}}

                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @if (session()->has('fail'))
                        <div class="alert alert-danger">
                            {{ session()->get('fail') }}
                        </div>
                    @endif

                    @if (session()->has('need_approval'))
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

                        <div class="alert alert-warning  fw-bold d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                <use xlink:href="#info-fill" />
                            </svg>
                            <div>
                                {{ session()->get('need_approval') }}
                            </div>
                        </div>
                    @endif


                    {{-- nationalnumber  OR email Input --}}

                    @if (!isset($url))
                        <div class="form-floating mb-3">
                            <input name="national_id_number" type="number" id="national_id_number" class="form-control my-2 @error('national_id_number') is-invalid @enderror" placeholder="{{ __('main.national_id_number') }}" autofocus>
                            <label for="national_id_number">{{ __('main.national_id_number') }}</label>
                            @error('national_id_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @else
                        <div class="form-floating mb-3">
                            <input name="email" type="email" id="email" class="form-control my-2 @error('email') is-invalid @enderror" placeholder="{{ __('main.email') }}" value="{{ old('email') }}" autofocus>
                            <label for="email">{{ __('main.email') }}</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @endif

                    {{-- Password Input --}}

                    <div class="form-floating mb-3">
                        <input name="password" type="password" id="password" autocomplete="off" class="form-control my-2 @error('password') is-invalid @enderror" placeholder="{{ __('main.password') }}">
                        <label for="password">{{ __('main.password') }}</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    {{-- Submit Form --}}

                    <div class="form-group">
                        <button type="submit" class="my-2 hvr-radial-in rounded btn submit px-3 w-100">{{ __('main.login') }}</button>
                    </div>


                    {{-- Another Tags --}}

                    <div class="row form-group">
                        <div class="col-12 col-lg-6 text-left my-2">
                            <label class="checkbox-wrap checkbox-primary mb-0">{{ __('main.remember_me') }}
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input">
                                <span class="checkmark"></span>
                            </label>
                        </div>

                        @if (!isset($url))
                            <div class="col-12 col-lg-6 text-sm-start text-lg-end my-2">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('main.forgot_password') }}
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>

                    @if (!isset($url))
                        <p class="text-center my-2">{{ __('main.not_a_member') }}
                            <a href="{{ route('user.register') }}">{{ __('main.sign_up') }}</a>
                        </p>
                    @endif

                    @isset($url)
                        @if ($url == 'doctor')
                            <p class="text-center my-2">{{ __('main.not_a_member') }}
                                <a href="{{ route('doctor.register') }}">{{ __('main.sign_up') }}</a>
                            </p>
                        @endif
                    @endisset
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

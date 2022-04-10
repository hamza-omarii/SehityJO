@extends("layouts.whoAreYou_layout.app")

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7 p-3">
            <div class="card wow bounceIn border-0">
                <h2 class="card-header text-center title-register">{{ __('who_are_you.register') }}</h2>
                <div class="card-body">

                    <form method="POST" action="{{ route('user.create') }}" aria-label="{{ __('who_are_you.register') }}">
                        @csrf

                        @if (session()->has('fail'))
                            <div class="alret alert-success">{{ session()->get('fail') }}</div>
                        @endif

                        <div class="row">
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('who_are_you.name') }}" autocomplete="name" autofocus>
                                    <label for="name">{{ __('who_are_you.name') }}</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-2">
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder={{ __('who_are_you.email') }} value="{{ old('email') }}">
                                    <label for="email">{{ __('who_are_you.email') }}</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="number" name="national_id_number" id="national_id_number" value="{{ old('national_id_number') }}" class="form-control @error('national_id_number') is-invalid @enderror" placeholder="{{ __('who_are_you.national_id_number') }}">
                                    <label for="national_id_number">{{ __('who_are_you.national_id_number') }}</label>
                                    @error('national_id_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="number" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" class="form-control @error('phone_number') is-invalid @enderror" placeholder="{{ __('who_are_you.phone_number') }}">
                                    <label for="phone_number">{{ __('who_are_you.phone_number') }}</label>
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" id="password" value="{{ old('password') }}" autocomplete="off" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('who_are_you.password') }}">
                                    <label for="password">{{ __('who_are_you.password') }}</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input type="password" name="password-confirm" id="password-confirm" autocomplete="off" value="{{ old('password-confirm') }}" class="form-control @error('password-confirm') is-invalid @enderror" placeholder="{{ __('who_are_you.password-confirm') }}">
                                    <label for="password-confirm">{{ __('who_are_you.password-confirm') }}</label>
                                    @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-floating">
                                    <select name="blood_type" class="form-select @error('blood_type') is-invalid @enderror" id="blood_type" aria-label="Floating label select example">
                                        <option selected disabled>{{ __('who_are_you.choose_one') }}</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    <label for="blood_type">{{ __('who_are_you.blood_type') }}</label>
                                    @error('blood_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <select name="gender" class="form-select @error('gender') is-invalid @enderror" id="gender" aria-label="Floating label select example">
                                        <option selected disabled>{{ __('who_are_you.choose_one') }}</option>
                                        <option value="male">{{ __('who_are_you.male') }}</option>
                                        <option value="female">{{ __('who_are_you.female') }}</option>
                                    </select>
                                    <label for="gender">{{ __('who_are_you.gender') }}</label>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="form-group row mb-3">
                                    <label for="date_birth" class="label col-12 col-form-label fs-6 text-secondary">
                                        {{ __('who_are_you.date_birth') }} :
                                    </label>
                                    <div class="col-12">
                                        <input type="date" name="date_birth" id="date_birth" class="form-control @error('date_birth') is-invalid @enderror" value={{ old('date_birth') }}>
                                    </div>
                                    @error('date_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="{{ __('who_are_you.your_address') }}" id="address" style="height: 100px">{{ old('address') }}</textarea>
                                    <label for="address">{{ __('who_are_you.your_address') }}</label>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="my-2 hvr-radial-in rounded btn submit px-3 w-100">{{ __('who_are_you.register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

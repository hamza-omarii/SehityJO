@extends("layouts.whoAreYou_layout.app")

@section('content')
    <div class="row justify-content-center" style="width: 100%">
        <div class="col-md-12 p-5">
            <div class="card wow bounceIn border-0">
                <h2 class="card-header text-center title-register">{{ __('main.doctor_registration') }}</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('doctor.create') }}" aria-label="{{ __('main.register') }}" enctype="multipart/form-data">
                        @csrf

                        @if (session()->has('fail'))
                            <div class="alret alert-danger">{{ session()->get('fail') }}</div>
                        @endif

                        <div class="presonal_info mb-3">
                            <h2 class="mb-4 text-secondary">{{ __('main.personal_information') }} :</h2>
                            <div class="row mb-3">
                                <div class="col-12 col-md-3">
                                    <div class="form-floating">
                                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}">
                                        <label for="name">{{ __('main.name') }}</label>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-3">
                                    <div class="form-floating">
                                        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">
                                        <label for="email">{{ __('main.email') }}</label>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-floating ">
                                        <input name="password" type="password" autocomplete="on" class="form-control @error('password') is-invalid @enderror" id="password">
                                        <label for="password">{{ __('main.password') }}</label>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="form-floating">
                                        <input name="password_confirmation" type="password" autocomplete="on" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
                                        <label for="password_confirmation">{{ __('main.password-confirm') }}</label>
                                    </div>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="label col-12 col-form-label fw-bold fs-6 text-secondary">
                                        {{ __('main.hospital') }} :
                                    </label>
                                    <div class="form-group row mx-auto">
                                        <select name="hospital_id" class="form-select form-select-lg @error('hospital_id') is-invalid @enderror" aria-label="Default select example" style="width: 98%">
                                            <option disabled selected>{{ __('main.open_menu') }}</option>
                                            @foreach ($hospitals as $hospital)
                                                <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('hospital_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="label col-12 col-form-label fw-bold text-secondary">
                                        {{ __('main.specialization') }} :
                                    </label>
                                    <div class="form-group row mx-auto">
                                        <select name="specialist_id" class="form-select form-select-lg @error('specialist_id') is-invalid @enderror" aria-label="Default select example" style="width: 98%">
                                            {{-- <option disabled selected>{{ __('main.open_menu') }}</option>
                                            @foreach ($specializations as $spec)
                                                <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('specialist_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="label col-12 col-form-label fw-bold fs-6 text-secondary mb-2">
                                        {{ __('main.gender') }} :
                                    </label>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="gender" class="form-check-input" id="inlineRadio1" value="male" checked>
                                        <label class="form-check-label" for="inlineRadio1">{{ __('main.male') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="gender" class="form-check-input" id="inlineRadio2" value="female">
                                        <label class="form-check-label" for="inlineRadio2">{{ __('main.female') }}</label>
                                    </div>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <div class="form-group row mb-3">
                                        <label for="date_birth" class="label col-12 col-form-label fs-6 text-secondary">
                                            {{ __('main.date_birth') }} :
                                        </label>
                                        <div class="col-12">
                                            <input type="date" name="date_birth" id="date_birth" class="form-control @error('date_birth') is-invalid @enderror" value="{{ old('date_birth') }}">
                                            @error('date_birth')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating mb-3 ">
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{ old('description') }}</textarea>
                                        <label for="Description">{{ __('main.description') }}</label>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div>
                                        <label for="formFileLg" class="label col-form-label fs-6">{{ __('main.profile_pic') }} :</label>
                                        <input name="image" class="form-control form-control-lg" accept="image/png, image/gif, image/jpeg" style="height: auto" id="formFileLg" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clinic_information mb-2">
                            <h2 class="mb-4 text-secondary">{{ __('main.clinic_information') }} :</h2>

                            <div class="row mb-2">
                                <div class="col-md-6 col-lg">
                                    <input type="number" name="clinic_number" value="{{ old('clinic_number') }}" class="form-control mb-lg-auto mb-sm-2 @error('clinic_number') is-invalid @enderror" placeholder="{{ __('main.clinic_number') }}">
                                    @error('clinic_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg mb-md-2 mb-sm-2">
                                    <input type="number" name="floor" value="{{ old('floor') }}" class="form-control mb-lg-auto mb-sm-2 @error('floor') is-invalid @enderror" placeholder="{{ __('main.floor_number') }}">
                                    @error('floor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg mb-md-2 mb-sm-2">
                                    <input type="number" name="phone_number" value="{{ old('phone_number') }}" class="form-control mb-lg-auto mb-sm-2 @error('phone_number') is-invalid @enderror" placeholder="{{ __('main.phone_number') }}">
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg mb-md-2 mb-sm-2 fees">
                                    <input type="text" name="fees" value="{{ old('fees') }}" class="form-control mb-lg-auto mb-sm-2 @error('fees') is-invalid @enderror" placeholder="{{ __('main.fees') }}">
                                    <span class="jd">JD</span>
                                    @error('fees')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-lg mb-md-2 mb-sm-2">
                                    <input type="text" name="waiting_time" value="{{ old('waiting_time') }}" class="form-control mb-lg-auto mb-sm-2 @error('waiting_time') is-invalid @enderror" placeholder="{{ __('main.waiting_time') }}">
                                    @error('waiting_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address">{{ old('address') }}</textarea>
                                        <label for="address">{{ __('main.address_your_clinic') }}</label>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="my-2 rounded btn btn-lg submit px-3 w-100">{{ __('main.register') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if (Config::get('app.locale') == 'en')
        <script>
            $(document).ready(function() {
                $('select[name="hospital_id"]').on('change', function() {

                    var hospital_id = $(this).val();

                    if (hospital_id) {
                        $.ajax({
                            url: "{{ URL::to('doctor/get/specific/specialization/') }}/" + hospital_id, // this in route
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="specialist_id"]').empty();
                                $.each(data, function(key, value) {
                                    console.log(value.name);
                                    $('select[name="specialist_id"]').append('<option value="' + value.id + '">' + value.name.en + '</option>');
                                });
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>
    @else
        <script>
            $(document).ready(function() {
                $('select[name="hospital_id"]').on('change', function() {

                    var hospital_id = $(this).val();

                    if (hospital_id) {
                        $.ajax({
                            url: "{{ URL::to('doctor/get/specific/specialization/') }}/" + hospital_id, // this in route
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="specialist_id"]').empty();
                                $.each(data, function(key, value) {
                                    console.log(value.name);
                                    $('select[name="specialist_id"]').append('<option value="' + value.id + '">' + value.name.ar + '</option>');
                                });
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>
    @endif
@endsection

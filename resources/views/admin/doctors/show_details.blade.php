@extends("layouts.dashboard_layout.master")

@section('title', 'approve doctor')

@section('content')

    <div class="p-3">
        <div class="presonal_info wow fadeInLeft mb-4 bg-white">
            <h2 class="mb-4">{{ __('who_are_you.personal_information') }} :</h2>
            <hr class="mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="text-center">
                        <img src={{ $doctor->image_url }} alt="doctor_pic" class="img-thumbnail mx-auto d-block mb-2" width="150">
                        <span class="{{ $doctor->is_active === 0 ? 'text-danger' : 'text-success' }} fs-4">{{ $doctor->is_active_deafult }}</span>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->name }}" readonly type="text" class="form-control" id="name" placeholder="{{ __('dashboard.name') }}">
                                <label for="name">{{ __('dashboard.name') }}</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->email }}" readonly type="email" class="form-control" id="email" placeholder="{{ __('dashboard.email') }}">
                                <label for="email">{{ __('dashboard.email') }}</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->hospital->name }}" readonly type="text" class="form-control" id="hospital" placeholder="{{ __('who_are_you.hospital') }}">
                                <label for="hospital">{{ __('who_are_you.hospital') }}</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->specialization->name }}" readonly type="text" class="form-control" id="specialization" placeholder="{{ __('who_are_you.specialization') }}">
                                <label for="specialization">{{ __('who_are_you.specialization') }}</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->date_birth }}" readonly type="text" class="form-control" id="date_birth" placeholder="{{ __('who_are_you.date_birth') }}">
                                <label for="date_birth">{{ __('who_are_you.date_birth') }}</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->gender }}" readonly type="text" class="form-control" id="gender" placeholder="{{ __('who_are_you.gender') }}">
                                <label for="gender">{{ __('who_are_you.gender') }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->description }}" readonly type="text" class="form-control" id="description" placeholder="{{ __('who_are_you.description') }}">
                                <label for="description">{{ __('who_are_you.description') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clinic_information wow fadeInRight bg-white">
            <h2 class="mb-4">{{ __('who_are_you.clinic_information') }} :</h2>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-6 col-lg">
                    <div class="form-floating mb-3">
                        <input value="{{ $doctor->clinck->clinic_number }}" readonly type="number" class="form-control" id="clinic_number" placeholder="{{ __('who_are_you.clinic_number') }}">
                        <label for="clinic_number">{{ __('who_are_you.clinic_number') }}</label>
                    </div>
                </div>
                <div class="col-md-6 col-lg">
                    <div class="form-floating mb-3">
                        <input value="{{ $doctor->clinck->floor }}" readonly type="number" class="form-control" id="floor" placeholder="{{ __('who_are_you.floor_number') }}">
                        <label for="floor">{{ __('who_are_you.floor_number') }}</label>
                    </div>
                </div>
                <div class="col-md-6 col-lg">
                    <div class="form-floating mb-3">
                        <input value="{{ $doctor->clinck->phone_number }}" readonly type="number" class="form-control" id="phone_number" placeholder="{{ __('who_are_you.phone_number') }}">
                        <label for="phone_number">{{ __('who_are_you.phone_number') }}</label>
                    </div>
                </div>
                <div class="col-md-6 col-lg">
                    <div class="form-floating mb-3">
                        <input value="{{ $doctor->clinck->fees }}" readonly type="number" class="form-control" id="fees" placeholder="{{ __('who_are_you.fees') }}">
                        <label for="fees">{{ __('who_are_you.fees') }}</label>
                    </div>
                </div>
                <div class="col-md-6 col-lg">
                    <div class="form-floating mb-3">
                        <input value="{{ $doctor->clinck->waiting_time }}" readonly type="number" class="form-control" id="waiting_time" placeholder="{{ __('who_are_you.waiting_time') }}">
                        <label for="waiting_time">{{ __('who_are_you.waiting_time') }}</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <input value="{{ $doctor->clinck->address }}" readonly type="text" class="form-control" id="address" placeholder="{{ __('who_are_you.address_your_clinic') }}">
                        <label for="address">{{ __('who_are_you.address_your_clinic') }}</label>
                    </div>
                </div>
            </div>
        </div>

        @if ($doctor->is_active === 0)
            <div class="btns my-3 ">
                <form action="{{ route('admin.approve.doctor', $doctor->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-lg text-white primary-bg w-100 fw-bold">{{ __('dashboard.Active Account') }}</button>
                </form>
            </div>
        @endif

    </div>

@endsection

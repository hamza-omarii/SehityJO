@extends("layouts.admin_dashboard_layout.master")

@section('title', 'approve doctor')

@section('content')

    <div class="p-3">
        <div class="presonal_info wow fadeInLeft mb-4 bg-white">
            <h2 class="mb-4">{{ __('main.personal_information') }} :</h2>
            <hr class="mb-3">
            <div class="row">
                <div class="col-3">
                    <div class="text-center">
                        <img src={{ $doctor->image_url }} alt="doctor_pic" class="img-thumbnail mx-auto d-block mb-2" width="150">
                        <span class="{{ $doctor->is_active === 0 ? 'text-danger' : 'text-primary' }} fs-4">{{ $doctor->is_active_deafult }}</span>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->name }}" readonly type="text" class="form-control" id="name" placeholder="{{ __('main.name') }}">
                                <label for="name">{{ __('main.name') }}</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->email }}" readonly type="email" class="form-control" id="email" placeholder="{{ __('main.email') }}">
                                <label for="email">{{ __('main.email') }}</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->hospital->name }}" readonly type="text" class="form-control" id="hospital" placeholder="{{ __('main.hospital') }}">
                                <label for="hospital">{{ __('main.hospital') }}</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->specialization->name }}" readonly type="text" class="form-control" id="specialization" placeholder="{{ __('main.specialization') }}">
                                <label for="specialization">{{ __('main.specialization') }}</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->date_birth }}" readonly type="text" class="form-control" id="date_birth" placeholder="{{ __('main.date_birth') }}">
                                <label for="date_birth">{{ __('main.date_birth') }}</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->gender }}" readonly type="text" class="form-control" id="gender" placeholder="{{ __('main.gender') }}">
                                <label for="gender">{{ __('main.gender') }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input value="{{ $doctor->description }}" readonly type="text" class="form-control" id="description" placeholder="{{ __('main.description') }}">
                                <label for="description">{{ __('main.description') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="clinic_information wow fadeInRight bg-white">
            <h2 class="mb-4">{{ __('main.clinic_information') }} :</h2>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-6 col-lg">
                    <div class="form-floating mb-3">
                        <input value="{{ $doctor->clinic->clinic_number }}" readonly type="number" class="form-control" id="clinic_number" placeholder="{{ __('main.clinic_number') }}">
                        <label for="clinic_number">{{ __('main.clinic_number') }}</label>
                    </div>
                </div>
                <div class="col-md-6 col-lg">
                    <div class="form-floating mb-3">
                        <input value="{{ $doctor->clinic->floor }}" readonly type="number" class="form-control" id="floor" placeholder="{{ __('main.floor_number') }}">
                        <label for="floor">{{ __('main.floor_number') }}</label>
                    </div>
                </div>
                <div class="col-md-6 col-lg">
                    <div class="form-floating mb-3">
                        <input value="{{ $doctor->clinic->phone_number }}" readonly type="number" class="form-control" id="phone_number" placeholder="{{ __('main.phone_number') }}">
                        <label for="phone_number">{{ __('main.phone_number') }}</label>
                    </div>
                </div>
                <div class="col-md-6 col-lg">
                    <div class="form-floating mb-3">
                        <input value="{{ $doctor->clinic->fees }}" readonly type="number" class="form-control" id="fees" placeholder="{{ __('main.fees') }}">
                        <label for="fees">{{ __('main.fees') }}</label>
                    </div>
                </div>
                <div class="col-md-6 col-lg">
                    <div class="form-floating mb-3">
                        <input value="{{ $doctor->clinic->waiting_time }}" readonly type="number" class="form-control" id="waiting_time" placeholder="{{ __('main.waiting_time') }}">
                        <label for="waiting_time">{{ __('main.waiting_time') }}</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating mb-3">
                        <input value="{{ $doctor->clinic->address }}" readonly type="text" class="form-control" id="address" placeholder="{{ __('main.address_your_clinic') }}">
                        <label for="address">{{ __('main.address_your_clinic') }}</label>
                    </div>
                </div>
            </div>
        </div>

        @if ($doctor->is_active === 0)
            <div class="btns my-3 ">
                <form action="{{ route('admin.approve.doctor', $doctor->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-lg text-white primary-bg w-100 fw-bold">{{ __('main.Active Account') }}</button>
                </form>
            </div>
        @endif

    </div>

@endsection

@extends("layouts.doctor_dashboard_layout.master")

@section('title', 'Appointments Booking')

@section('content')
    <div class="card my-3">
        <div class="row g-0">
            <div class="col-md-3 wow fadeInLeft">
                <div class="d-flex justify-content-center align-items-center h-100 primary-bg">
                    <img src="{{ asset('images/users_pic/date.jpg') }}" class="img-fluid rounded-start" alt="doctor-pic">
                </div>
            </div>
            <div class="col-md-9">
                <div class="card-body wow fadeInRight">
                    <h5 class="card-title doctor-title rounded fs-2 fw-bold mb-3">{{ __('main.Patient Information') }}</h5>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="info p-1 mb-2 fs-5">
                                <span class="fw-bold ">{{ __('main.name') }} : </span>{{ $appointment->user->name }}
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="info p-1 mb-2 fs-5">
                                <span class="fw-bold"> {{ __('main.National ID Number') }} : </span> {{ $appointment->user->national_id_number }}
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="info p-1 mb-2 fs-5">
                                <span class="fw-bold"> {{ __('main.email') }} :</span> {{ $appointment->user->email }}
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="info p-1 mb-2 fs-5">
                                <span class="fw-bold"> {{ __('main.Phone Number') }} :</span> {{ $appointment->user->phone_number }}
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="info p-1 mb-2 fs-5">
                                <span class="fw-bold"> {{ __('main.Date Birth') }} :</span> {{ $appointment->user->date_birth }}
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="info p-1 mb-2 fs-5">
                                <span class="fw-bold"> {{ __('main.Gender') }} :</span> {{ $appointment->user->gender }}
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="info p-1 mb-2 fs-5">
                                <span class="fw-bold"> {{ __('main.Blood Type') }} :</span> {{ $appointment->user->blood_type }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="info p-1 mb-2 fs-5">
                                <span class="fw-bold"> {{ __('main.Address') }} :</span> {{ $appointment->user->address }}
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-body wow fadeInRight">
                    <h5 class="card-title doctor-title rounded fs-2 fw-bold mb-3">{{ __('main.Appointment Information') }}</h5>
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="info p-1 mb-3 fs-5">
                                <span class="fw-bold"> {{ __('main.Booking Date') }} :</span> {{ $appointment->booking_date }}
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="info p-1 mb-3 fs-5">
                                <span class="fw-bold"> {{ __('main.Booking Time') }} :</span> {{ $appointment->booking_time }}
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="info p-1 mb-3 fs-5">
                                <span class="fw-bold"> {{ __('main.Status') }} :</span> <span class="rounded-pill p-1 @if ($appointment->status == 'pending') bg-warning @endif @if ($appointment->status == 'failed') bg-danger text-white @endif @if ($appointment->status == 'done') primary-bg text-white @endif">{{ $appointment->status }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                @if (isset($appointment->medicalReport) && $appointment->medicalReport->count() > 0)
                                    <a href="{{ route('doctor.edit.medical.report', $appointment->medicalReport->id) }}" class="btn btn-dark w-100 text-center fw-bold mb-2"><i class="fas fa-file-medical-alt fa-lg mx-2 text-white"></i>{{ __('main.Edit medical report') }}</a>
                                @else
                                    <a href="{{ route('doctor.create.medical.report', $appointment->id) }}" class="btn btn-dark w-100 text-center fw-bold  mb-2"><i class="fas fa-file-medical-alt fa-lg mx-2 text-white"></i>{{ __('main.create medical report') }}</a>
                                @endif
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <button class="btn primary-bg text-center w-100 text-white fw-bold  mb-2" data-bs-toggle="modal" data-bs-target="#editBookig{{ $appointment->id }}"><i class="fas fa-edit fa-lg  mx-2 "></i>{{ __('global.edit') }}</button>
                                @include('doctor.appoinments_booking._edit')
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <button class="btn btn-warning text-center w-100 text-dark fw-bold  mb-2" data-bs-toggle="modal" data-bs-target="#changeState{{ $appointment->id }}"><i class="fas fa-exchange-alt fa-lg mx-2 text-dark"></i>{{ __('main.Change State') }}</button>
                                @include('doctor.appoinments_booking._changeSate')
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <button class="btn btn-danger text-center w-100 text-white fw-bold  mb-2" data-bs-toggle="modal" data-bs-target="#deleteBookig{{ $appointment->id }}"><i class="fas fa-trash fa-lg mx-2 text-white"></i>{{ __('global.delete') }}</button>
                                @include('doctor.appoinments_booking._delete')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

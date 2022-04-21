@extends("layouts.doctor_dashboard_layout.master")

@section('title', 'dashobard')

@section('content')
    <div class="row g-3 my-2 wow fadeInDown">
        <div class="col-lg-4 col-sm-12">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded wow fadeInLeft">
                <div>
                    <h3 class="fs-5 text-center">{{ __('main.Done Appointments') }}</h3>
                    <p class="fs-5 text-center text-primary fw-bold fs-3">{{ $done_counter }}</p>
                </div>
                <i class="fas fa-check-circle fs-1 primary-text border rounded-full p-3 text-primary"></i>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded wow fadeInLeft">
                <div>
                    <h3 class="fs-5 text-center">{{ __('main.Pending Appointments') }}</h3>
                    <p class="fs-5 text-secondary text-center text-warning fw-bold fs-3">{{ $pending_counter }}</p>
                </div>
                <i class="fas fa-spinner fs-1 primary-text border rounded-full p-3 text-warning"></i>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded wow fadeInLeft">
                <div>
                    <h3 class="fs-5 text-center">{{ __('main.Fail Appointments') }}</h3>
                    <p class="fs-5 text-secondary text-center text-danger fw-bold fs-3">{{ $failed_counter }}</p>
                </div>
                <i class="fas fa-exclamation-circle fs-1 primary-text border rounded-full p-3 text-danger"></i>
            </div>
        </div>
    </div>

    <h3 class="mt-5 mb-3 text-secondary">{{ __("main.Today's Appointments") }} : </h3>
    <table class="table table-borderless wow fadeInUp">
        <thead>
            <tr>
                <th class="primary-bg">#</th>
                <th class="primary-bg">{{ __('main.name') }}</th>
                <th class="primary-bg">{{ __('main.Booking Time') }}</th>
                <th class="primary-bg">{{ __('main.Booking Date') }}</th>
                <th class="primary-bg">{{ __('main.Status') }}</th>
                <th class="primary-bg">{{ __('main.Controls') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($appointments_of_today as $appointment)
                <tr>
                    <th class="primary-bg">{{ $loop->iteration }}</th>
                    <td class="bg-transparent">{{ $appointment->user->name }}</td>
                    <td class="bg-transparent">{{ $appointment->booking_time }}</td>
                    <td class="bg-transparent">{{ $appointment->booking_date }}</td>
                    <td class="bg-transparent">
                        <span class="rounded-pill px-2 fw-bold @if ($appointment->status == 'pending') bg-warning @endif @if ($appointment->status == 'failed') bg-danger text-white @endif @if ($appointment->status == 'done') primary-bg text-white @endif">
                            {{ $appointment->status }}
                        </span>
                    </td>
                    <td class="bg-transparent">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm primary-bg text-white dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('main.Controls') }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('doctor.show.appointment', $appointment->id) }}" class="dropdown-item"><i class="far fa-eye fa-lg mx-2 text-secondary"></i>{{ __('global.show') }}</a></li>
                                <hr class="dropdown-divider">
                                @if (isset($appointment->medicalReport) && $appointment->medicalReport->count() > 0)
                                    <li><a href="{{ route('doctor.edit.medical.report', $appointment->medicalReport->id) }}" class="dropdown-item"><i class="fas fa-file-medical-alt fa-lg mx-2 text-success"></i>{{ __('main.Edit medical report') }}</a></li>
                                @else
                                    <li><a href="{{ route('doctor.create.medical.report', $appointment->id) }}" class="dropdown-item"><i class="fas fa-file-medical-alt fa-lg mx-2 text-success"></i>{{ __('main.create medical report') }}</a></li>
                                @endif
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changeState{{ $appointment->id }}"><i class="fas fa-exchange-alt fa-lg mx-2 text-warning"></i>{{ __('main.Change State') }}</button></li>
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editBookig{{ $appointment->id }}"><i class="fas fa-edit fa-lg  mx-2 primary-text"></i>{{ __('global.edit') }}</button></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteBookig{{ $appointment->id }}"><i class="fas fa-trash fa-lg  mx-2 text-danger"></i>{{ __('global.delete') }}</button></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @include('doctor.appoinments_booking._changeSate')
                @include('doctor.appoinments_booking._edit')
                @include('doctor.appoinments_booking._delete')
            @empty
                <tr>
                    <td colspan="6" class="fw-bold">{{ __('main.No Booking Yet') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

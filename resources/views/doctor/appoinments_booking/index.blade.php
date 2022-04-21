@extends("layouts.doctor_dashboard_layout.master")

@section('title', 'Appointments Booking')

@section('content')
    <div class="d-flex mb-3 justify-content-center align-items-center wow fadeInDown">
        <form action="{{ route('doctor.get.appointments') }}" method="GET">
            <input type="hidden" name="type" value="all">
            <button type="submit" class="btn bg-transparent text-dark border border-primary  border-1 fs-5 mx-2">{{ __('main.All Appoinments') }}</button>
        </form>
        <form action="{{ route('doctor.get.appointments') }}" method="GET">
            <input type="hidden" name="type" value="done">
            <button type="submit" class=" btn bg-transparent text-dark border border-primary  border-1  fs-5 mx-2">{{ __('main.done') }} <span class="text-primary fw-bold"></span></button>
        </form>
        <form action="{{ route('doctor.get.appointments') }}" method="GET">
            <input type="hidden" name="type" value="pending">
            <button type="submit" class=" btn bg-transparent text-dark border-primary  border-1 fs-5 mx-2">{{ __('main.pending') }} <span class="text-danger fw-bold"></span></button>
        </form>
        <form action="{{ route('doctor.get.appointments') }}" method="GET">
            <input type="hidden" name="type" value="failed">
            <button type="submit" class=" btn bg-transparent text-dark border-primary  border-1 fs-5 mx-2">{{ __('main.failed') }} <span class="text-danger fw-bold"></span></button>
        </form>
    </div>
    @if ($errors->any())
        <div class="alert text-danger">
            @foreach ($errors->all() as $error)
                <span class="fw-bold fs-5">{{ $error }}</span>
            @endforeach
        </div>
    @endif

    <h3 class="mt-5 mb-3 text-secondary">{{ __('main.All Appointments') }} :</h3>
    <table class="table table-borderless wow fadeInLeft">
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
            @forelse ($appoinments as $appointment)
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

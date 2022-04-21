@extends('layouts.user_layout.master')

@section('content')
    <div class="container">
        <h3 class="mt-5 mb-3 text-secondary">{{ __("main.Today's Appointments") }} : </h3>
        <table class="table mb-5 wow fadeInUp">
            <thead class="text-center">
                <tr>
                    <th class="bg-primary text-white">#</th>
                    <th class="bg-primary text-white">{{ __('main.doctor Name') }}</th>
                    <th class="bg-primary text-white">{{ __('main.Hospital') }}</th>
                    <th class="bg-primary text-white">{{ __('main.Booking Time') }}</th>
                    <th class="bg-primary text-white">{{ __('main.Booking Date') }}</th>
                    <th class="bg-primary text-white">{{ __('main.Status') }}</th>
                    <th class="bg-primary text-white">{{ __('main.Controls') }}</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($appointments_of_today as $appointment)
                    <tr>
                        <th class="bg-primary text-white">{{ $loop->iteration }}</th>
                        <td class="bg-transparent">{{ $appointment->user->name }}</td>
                        <td class="bg-transparent">{{ $appointment->doctor->hospital->name }}</td>
                        <td class="bg-transparent">{{ $appointment->booking_time }}</td>
                        <td class="bg-transparent">{{ $appointment->booking_date }}</td>
                        <td class="bg-transparent">
                            <span class="rounded-pill px-2 fw-bold @if ($appointment->status == 'pending') bg-warning @endif @if ($appointment->status == 'failed') bg-danger text-white @endif @if ($appointment->status == 'done') bg-primary text-white @endif">
                                {{ $appointment->status }}
                            </span>
                        </td>
                        <td class="bg-transparent">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm  bg-primary text-white dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('main.Controls') }}
                                </button>
                                <ul class="dropdown-menu">
                                    @if ($appointment->medicalReport)
                                        <li><a href="{{ route('user.show.medical.report', $appointment->id) }}" class="dropdown-item"><i class="far fa-eye fa-lg mx-2 text-success"></i>{{ __('main.show medical report') }}</a></li>
                                    @endif
                                    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editBookig{{ $appointment->id }}"><i class="fas fa-edit fa-lg  mx-2 primary-text"></i>{{ __('global.edit') }}</button></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteBookig{{ $appointment->id }}"><i class="fas fa-trash fa-lg  mx-2 text-danger"></i>{{ __('main.Remove Appointment') }}</button></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @include('user.medical_record._edit')
                    @include('user.medical_record._delete')
                @empty
                    <tr>
                        <td colspan="7" class="fw-bold text-secondary">{{ __('main.No Booking Yet') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <h3 class="mt-5 mb-3 text-secondary">{{ __('main.All Your Appointments') }} : </h3>
        <table class="table mb-5 wow fadeInUp">
            <thead class="text-center">
                <tr>
                    <th class="bg-primary text-white">#</th>
                    <th class="bg-primary text-white">{{ __('main.doctor Name') }}</th>
                    <th class="bg-primary text-white">{{ __('main.Hospital') }}</th>
                    <th class="bg-primary text-white">{{ __('main.Booking Time') }}</th>
                    <th class="bg-primary text-white">{{ __('main.Booking Date') }}</th>
                    <th class="bg-primary text-white">{{ __('main.Status') }}</th>
                    <th class="bg-primary text-white">{{ __('main.Controls') }}</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($appointments as $appointment)
                    <tr>
                        <th class="bg-primary text-white">{{ $loop->iteration }}</th>
                        <td class="bg-transparent">{{ $appointment->user->name }}</td>
                        <td class="bg-transparent">{{ $appointment->doctor->hospital->name }}</td>
                        <td class="bg-transparent">{{ $appointment->booking_time }}</td>
                        <td class="bg-transparent">{{ $appointment->booking_date }}</td>
                        <td class="bg-transparent">
                            <span class="rounded-pill px-2 fw-bold @if ($appointment->status == 'pending') bg-warning @endif @if ($appointment->status == 'failed') bg-danger text-white @endif @if ($appointment->status == 'done') bg-primary text-white @endif">
                                {{ $appointment->status }}
                            </span>
                        </td>
                        <td class="bg-transparent">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm  bg-primary text-white dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('main.Controls') }}
                                </button>
                                <ul class="dropdown-menu">
                                    @if ($appointment->medicalReport)
                                        <li><a href="{{ route('user.show.medical.report', $appointment->id) }}" class="dropdown-item"><i class="far fa-eye fa-lg mx-2 text-success"></i>{{ __('main.show medical report') }}</a></li>
                                    @endif
                                    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editBookig{{ $appointment->id }}"><i class="fas fa-edit fa-lg  mx-2 primary-text"></i>{{ __('global.edit') }}</button></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteBookig{{ $appointment->id }}"><i class="fas fa-trash fa-lg  mx-2 text-danger"></i>{{ __('main.Remove Appointment') }}</button></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @include('user.medical_record._edit')
                    @include('user.medical_record._delete')
                @empty
                    <tr>
                        <td colspan="7" class="fw-bold text-secondary">{{ __('main.No Booking Yet') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

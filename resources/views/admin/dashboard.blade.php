@extends("layouts.dashboard_layout.master")

@section('title', 'dashboard')

@section('content')

    <div class="row g-3 my-2 wow bounceInDown">
        <div class="col-md-4">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded wow fadeInLeft">
                <div>
                    <h3 class="fs-2 text-center">{{ $hospital_count }}</h3>
                    <p class="fs-5 text-secondary">{{ __('dashboard.hospitals') }}</p>
                </div>
                <i class="fas fa-hospital-alt fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded wow fadeInLeft">
                <div>
                    <h3 class="fs-2 text-center">{{ $doctors_count }}</h3>
                    <p class="fs-5 text-secondary">{{ __('dashboard.doctors') }}</p>
                </div>
                <i class="fas fa-stethoscope fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-4 ">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded wow fadeInLeft">
                <div>
                    <h3 class="fs-2 text-center">{{ $patients_count }}</h3>
                    <p class="fs-5 text-secondary">{{ __('dashboard.Patients') }}</p>
                </div>
                <i class="fas fa-procedures fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
    </div>
    <hr class="mt-4">
    <h3 class="fs-4 mb-3">{{ __('dashboard.Recent Patients') }} :</h3>
    <table class="table wow bounceInUp" style="width:100%">
        <thead>
            <tr>
                <th>{{ __('dashboard.name') }}</th>
                <th>{{ __('dashboard.National ID Number') }}</th>
                <th>{{ __('dashboard.email') }}</th>
                <th>{{ __('dashboard.Phone Number') }}</th>
                <th>{{ __('dashboard.Date Birth') }}</th>
                <th>{{ __('dashboard.Gender') }}</th>
                <th>{{ __('dashboard.Blood Type') }}</th>
                <th>{{ __('dashboard.Address') }}</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @forelse ($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>{{ $patient->national_id_number }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>{{ $patient->phone_number }}</td>
                    <td>{{ $patient->date_birth }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->blood_type }}</td>
                    <td>{{ $patient->address }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-secondary">{{ __('dashboard.There are no registered patients yet') }}</td>
                </tr>
            @endforelse

        </tbody>
    </table>

@endsection

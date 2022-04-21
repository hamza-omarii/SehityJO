@extends("layouts.doctor_dashboard_layout.master")

@section('title', 'create medical report')

@section('content')
    <div class="card my-3">
        <div class="row g-0">
            <div class="col-md-3">
                <div class="d-flex justify-content-center align-items-center h-100 primary-bg wow fadeInDown">
                    <img src="{{ asset('images/users_pic/medicalReport.jpg') }}" class="img-fluid rounded-start" alt="doctor-pic">
                </div>
            </div>
            <div class="col-md-9">
                <div class="card-body wow fadeInUp">
                    <h5 class="card-title doctor-title rounded fs-4 fw-bold mb-5">{{ __('main.Create Medical Report') }}</h5>
                    <form action="{{ route('doctor.store.medical.report') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="booking_id" value="{{ $appointment_id }}">
                        <div class="form-floating mb-4">
                            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="floatingInput" placeholder="title">
                            <label for="floatingInput">{{ __('main.title') }}</label>
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <textarea name="content" class="form-control @error('content') is-invalid @enderror" placeholder="content" id="floatingTextarea2" style="height: 170px"></textarea>
                            <label for="floatingTextarea2">{{ __('main.Contet') }}</label>
                            @error('content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5 ">
                            <label for="formFile" class="form-label">{{ __('main.Attachment') }} :</label>
                            <input name="attachment" class="form-control @error('attachment') is-invalid @enderror" type="file" id="formFile">
                            @error('attachment')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn primary-bg w-100 fs-6 text-white fw-bold">{{ __('global.create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

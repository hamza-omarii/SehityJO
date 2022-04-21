@extends('layouts.user_layout.master')

@section('content')
    <div class="container">
        <div class="card my-3">
            <div class="row g-0">
                <div class="col-md-3">
                    <div class="d-flex justify-content-center align-items-center h-100 primary-bg wow fadeInDown">
                        <img src="{{ asset('images/' . $medical_report->attachments) }}" class="img-fluid rounded-start" alt="doctor-pic">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card-body wow fadeInUp">
                        <h5 class="card-title doctor-title rounded fs-4 fw-bold mb-5">{{ __('main.medical reports') }}</h5>
                        <form>
                            @csrf
                            <div class="form-floating mb-4">
                                <input name="title" type="text" disabled class="form-control" id="floatingInput" placeholder="title" value="{{ $medical_report->title }}">
                                <label for="floatingInput">{{ __('main.title') }}</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea name="content" disabled class="form-control" placeholder="content" id="floatingTextarea2" style="height: 170px">{{ $medical_report->content }}</textarea>
                                <label for="floatingTextarea2">{{ __('main.Contet') }}</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.user_layout.master')

@section('css')
    <style>
        /* rating */
        .rating-css div {
            color: #f5f80f;
            font-size: 30px;
            font-family: sans-serif;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            padding: 20px 0;
        }

        .rating-css input {
            display: none;
        }

        .rating-css input+label {
            font-size: 60px;
            text-shadow: 1px 1px 0 #a8a8a8;
            cursor: pointer;
        }

        .rating-css input:checked+label~label {
            color: #b4afaf;
        }

        .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }

        .checked {
            color: #f5f80f;
            text-shadow: 1px 1px 0 #a8a8a8;
        }

        /* End of Star Rating */

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="card my-3 wow bounceInLeft">
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="d-flex justify-content-center align-items-end h-100">
                        <img src="{{ $doctor->image_url }}" class="img-fluid rounded-start" alt="doctor-pic">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title doctor-title rounded fs-4 fw-bold">{{ __('main.Personal Information') }}</h5>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="info p-1">
                                    <span class="fw-bold">{{ __('main.name') }} : </span>{{ $doctor->name }}
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="info p-1">
                                    <span class="fw-bold"> {{ __('main.specialization') }} : </span> {{ $doctor->specialization->name }}
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="info p-1">
                                    <span class="fw-bold"> {{ __('main.Hospital') }} :</span> {{ $doctor->hospital->name }}
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="info p-1">
                                    <span class="fw-bold"> {{ __('main.Gender') }} :</span> {{ $doctor->gender }}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="info p-1">
                                    <span class="fw-bold"> {{ __('main.description') }} :</span> {{ $doctor->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title doctor-title rounded fs-4 fw-bold">{{ __('main.Clinc Inforamtion') }}</h5>

                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="info p-1">
                                    <span class="fw-bold"> {{ __('main.Clinc Number') }} :</span> {{ $doctor->clinic->clinic_number }}
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="info p-1">
                                    <span class="fw-bold"> {{ __('main.Phone Number') }} :</span> {{ $doctor->clinic->phone_number }}
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="info p-1">
                                    <span class="fw-bold"> {{ __('main.floor') }} :</span> {{ $doctor->clinic->floor }}
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="info p-1">
                                    <span class="fw-bold"> {{ __('main.fees') }} :</span> {{ $doctor->clinic->clinic_number }} <span class="text-danger fw-bold">JD</span>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="info p-1">
                                    <span class="fw-bold"> {{ __('main.Waiting Time') }} :</span> {{ $doctor->clinic->clinic_number }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="info p-1">
                                    <span class="fw-bold"> {{ __('main.Address') }} :</span> {{ $doctor->clinic->address }}
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{-- Rating System --}}
                        <div>

                            @if ($ratings_count > 0)
                                <div class="my-3">
                                    @for ($i = 1; $i <= $ratings_value; $i++)
                                        <i class="fa-solid fa-star checked fa-2x"></i>
                                    @endfor
                                    @for ($j = $ratings_value + 1; $j <= 5; $j++)
                                        <i class="fa-solid fa-star fa-2x"></i>
                                    @endfor
                                    <span class="ms-2 bg-primary rounded p-1 text-white fw-bold">( {{ $ratings_value }} )</span>
                                    <span class="mx-2 fw-bold text-dark fs-3">|</span>
                                    <span class="bg-danger rounded text-white p-1 fw-bold">{{ $ratings_count }} {{ __('main.Patients Rated This Doctor') }}</span>
                                </div>
                            @else
                                <div class="my-3">
                                    <span class="text-center text-danger d-block fw-bold">{{ __('main.No Rating Yet') }}</span>
                                </div>
                            @endif

                            {{-- ==========   Rating Modal   =========== --}}
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                {{ __('main.Rate this Doctor') }}
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('user.submit.rating') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $doctor->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="rating-css">
                                                    <div class="star-icon">
                                                        @if ($user_rating)
                                                            @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                                                <input type="radio" value="{{ $i }}" name="product_rating" checked id="rating{{ $i }}">
                                                                <label for="rating{{ $i }}" class="fa fa-star"></label>
                                                            @endfor
                                                            @for ($j = $user_rating->stars_rated + 1; $j <= 5; $j++)
                                                                <input type="radio" value="{{ $j }}" name="product_rating" id="rating{{ $j }}">
                                                                <label for="rating{{ $j }}" class="fa fa-star"></label>
                                                            @endfor
                                                        @else
                                                            <input type="radio" value="1" name="product_rating" checked id="rating1">
                                                            <label for="rating1" class="fa fa-star"></label>
                                                            <input type="radio" value="2" name="product_rating" id="rating2">
                                                            <label for="rating2" class="fa fa-star"></label>
                                                            <input type="radio" value="3" name="product_rating" id="rating3">
                                                            <label for="rating3" class="fa fa-star"></label>
                                                            <input type="radio" value="4" name="product_rating" id="rating4">
                                                            <label for="rating4" class="fa fa-star"></label>
                                                            <input type="radio" value="5" name="product_rating" id="rating5">
                                                            <label for="rating5" class="fa fa-star"></label>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('global.close') }}</button>
                                                <button type="submit" class="btn btn-primary">{{ __('global.Save changes') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- appointments --}}

        <div class="card mb-3 p-3 wow bounceInRight">
            <div class="row g-0">
                <h5 class="card-title appointments-title rounded fs-4 fw-bold mb-4"><i class="fas fa-calendar-check mx-2 text-primary fa-lg"></i>{{ __('main.Available Appointments') }}<i class="fas fa-calendar-check mx-2 text-primary fa-lg"></i></h5>
                <form action="{{ route('user.make.appointment') }}" method="POST">
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            @if ($errors->any())
                                <div class="alert text-danger">
                                    @foreach ($errors->all() as $error)
                                        <span class="fw-bold fs-5">{{ $error }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <div class="booking rounded">
                                <div class="date-box d-flex justify-content-center align-items-center rounded-top">
                                    <input type="date" name="booking_date" class="rounded">
                                </div>
                                <div class="times-box">
                                    <div class="customRadionBtns d-flex flex-wrap justify-content-center align-items-center">
                                        @foreach ($hours_avialable as $hour)
                                            <div class="m-3">
                                                <input name="booking_time" label="{{ $hour }}" type="radio" value="{{ $hour }}" class="p-2 text-center rounded">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 rounded-bottom">{{ __('main.Book now') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection

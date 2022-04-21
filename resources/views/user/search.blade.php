@extends("layouts.user_layout.master")

@section('content')
    <div class="page-hero bg-image overlay-dark" style=" background-position: center ; background-image: url({{ asset('images/welcome_page/bg_image_1.jpg') }});">
        <div class="hero-section">
            <div class="container text-center">
                <form action="{{ route('user.search.doctor') }}" method="GET" class="bg-white form-search p-5 rounded mt-5 wow bounceInDown">
                    <div class="title d-flex justify-content-center align-items-center">
                        <h2 class="text-primary mb-4 h1 fw-bold title-image">{{ __('main.Find your doctor') }} !</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-3">
                            <div class="box position-relative">
                                <select name="city_id" class="form-select  mb-2 form-select-lg  ps-5" aria-label=".form-select-lg example">
                                    <option selected disabled value="">{{ __('main.Search for the City') }}</option>
                                    @foreach ($cites as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-map-marker-alt position-absolute bg-primary text-white  serach-icon  fa-lg rounded-start"></i>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-3">
                            <div class="box position-relative">
                                <select name="hospital_id" class="form-select  mb-2 form-select-lg  ps-5" aria-label=".form-select-lg example">
                                    <option selected disabled value="">{{ __('main.Search for the Hospital') }}</option>
                                </select>
                                <i class="fas fa-hospital-symbol position-absolute bg-primary text-white  serach-icon  fa-lg rounded-start"></i>
                            </div>
                        </div>
                        <div class=" col-md-12 col-lg-3">
                            <div class="box position-relative">
                                <select name="specialist_id" class="form-select  mb-2 form-select-lg  ps-5" aria-label=".form-select-lg example">
                                    <option selected disabled value="">{{ __('main.Search for the Specialist') }}</option>
                                </select>
                                <i class="fas fa-stethoscope position-absolute bg-primary text-white  serach-icon  fa-lg rounded-start"></i>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-3">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-search mx-3 fa-lg"></i>{{ __('main.Search') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <h3 class="text-secondary my-3">{{ $resultWord }} : </h3>
            @foreach ($doctors as $doctor)
                <div class="col-lg-4 col-md-6 col-xxl-3 wow fadeInUpBig">
                    <div class="card mb-3">
                        <div class="mx-auto">
                            <img src="{{ $doctor->image_url }}" class="card-img-top rounded-circle p-2" alt="doctor-pic" width="200" height="200">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $doctor->name }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item py-2 px-3">
                                <span class="text-secondary">{{ __('main.Hospital') }} : </span> {{ $doctor->hospital->name }}
                            </li>
                            <li class="list-group-item py-2 px-3">
                                <span class="text-secondary">{{ __('main.specialization') }} : </span> {{ $doctor->specialization->name }}
                            </li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('user.show.doctor.details', $doctor->id) }}" class="btn bg-primary w-100 text-white fw-bold fs-5">{{ __('main.Make Appointment') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mx-auto">
                {{ $doctors->appends($_GET)->links() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if (Config::get('app.locale') == 'en')
        <script>
            /*  | 1 |  get_Hospitals_CitiesID WHEN  == $id [EN] */
            $(document).ready(function() {
                $('select[name="city_id"]').on('change', function() {

                    var city_id = $(this).val();

                    if (city_id) {
                        $.ajax({
                            url: "{{ URL::to('user/get/hospitals-city/ajax') }}/" + city_id, // this in route
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="hospital_id"]').empty();
                                $.each(data, function(key, value) {
                                    console.log(value.name);
                                    $('select[name="hospital_id"]').append('<option value="' + value.id + '">' + value.name.en + '</option>');
                                });
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });

            /*  | 2 |  get_Specialization_When_Hospital_id == $id [EN] */
            $(document).ready(function() {
                $('select[name="hospital_id"]').on('change', function() {

                    var hospital_id = $(this).val();

                    if (hospital_id) {
                        $.ajax({
                            url: "{{ URL::to('user/get/specialization-hospitals/ajax') }}/" + hospital_id, // this in route
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="specialist_id"]').empty();
                                $.each(data, function(key, value) {
                                    console.log(value.name);
                                    $('select[name="specialist_id"]').append('<option value="' + value.id + '">' + value.name.en + '</option>');
                                });
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>
    @else
        <script>
            /* # 1 # get hospitals when city == $id [Ar] */
            $(document).ready(function() {
                $('select[name="city_id"]').on('change', function() {

                    var city_id = $(this).val();

                    if (city_id) {
                        $.ajax({
                            url: "{{ URL::to('user/get/hospitals-city/ajax') }}/" + city_id, // this in route
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="hospital_id"]').empty();
                                $.each(data, function(key, value) {
                                    console.log(value.name);
                                    $('select[name="hospital_id"]').append('<option value="' + value.id + '">' + value.name.ar + '</option>');
                                });
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });

            /* | 2 | get_Specialization_When_Hospital_id == $id [Ar] */
            $(document).ready(function() {
                $('select[name="hospital_id"]').on('change', function() {

                    var hospital_id = $(this).val();

                    if (hospital_id) {
                        $.ajax({
                            url: "{{ URL::to('doctor/get/specific/specialization/') }}/" + hospital_id, // this in route
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="specialist_id"]').empty();
                                $.each(data, function(key, value) {
                                    console.log(value.name);
                                    $('select[name="specialist_id"]').append('<option value="' + value.id + '">' + value.name.ar + '</option>');
                                });
                            },
                        });
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
        </script>
    @endif
@endsection

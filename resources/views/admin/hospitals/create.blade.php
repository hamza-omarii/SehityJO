@extends("layouts.dashboard_layout.master")

@section('title', 'create hospital')

@section('content')
    <form action="{{ route('admin.hospitals.store') }}" class="p-sm-1 p-md-3 rounded bg-white wow fadeInDown" method="POST">
        @csrf
        <h3 class="text-center primary-text mb-3 fw-bold">{{ __('dashboard.Create New Hospital') }}</h3>
        <div class="row">
            <div class="col-6 wow fadeInLeft">
                <div class="form-floating mb-4">
                    <input name="name_en" type="text" value="{{ old('name_en') }}" class="form-control @error('name_en') is-invalid @enderror" id="floatingInput">
                    <label for="floatingInput">{{ __('dashboard.Hospital Name_en') }}</label>
                    @error('name_en')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-6 wow fadeInRight">
                <div class="form-floating mb-4">
                    <input name="name_ar" type="text" value="{{ old('name_ar') }}" class="form-control @error('name_ar') is-invalid @enderror" id="floatingInput">
                    <label for="floatingInput">{{ __('dashboard.Hospital Name_ar') }}</label>
                    @error('name_ar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-floating mb-4">
            <select name="city_id" value="{{ old('city_id') }}" class="form-select @error('city_id') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example">
                <option selected disabled>{{ __('global.Choose one ..') }}</option>
                @foreach ($cites as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
            <label for="floatingSelect">{{ __('dashboard.Choose City') }} :</label>
            @error('city_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="mb-2">{{ __('dashboard.specializations') }} :</label>
            <div class="row">
                @foreach ($specializations as $spec)
                    <div class="col-3">
                        <div class="form-check m-1">
                            <input name="spec[]" value="{{ $spec->id }}" id="flexCheckDefault{{ $spec->id }}" class="form-check-input" type="checkbox">
                            <label class="form-check-label text-secondary" for="flexCheckDefault{{ $spec->id }}">
                                {{ $spec->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn primary-bg w-100 text-white fw-bold">{{ __('global.create') }}</button>
    </form>
@endsection

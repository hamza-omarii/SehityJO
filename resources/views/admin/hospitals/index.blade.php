@extends("layouts.dashboard_layout.master")

@section('title', 'hospitals')

@section('content')
    <a href="{{ route('admin.hospitals.create') }}" class="btn primary-bg w-100 text-white fw-bold mb-3 wow fadeInDown">{{ __('dashboard.Create New Hospital') }}</a>
    <div class="row">
        @foreach ($hospitals as $hospital)
            <div class="col-lg-4 col-md-6 mb-3 wow fadeInLeft">
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-h-square mb-2 fa-3x text-center d-block primary-text"></i>
                        <h4 class="card-title text-center">{{ $hospital->name }}</h4>
                        <hr>
                        <p class="card-text">{{ __('dashboard.specializations') }} :</p>
                        <select name="spec[]" class="form-select bg-white" disabled multiple aria-label="multiple select example" style="overflow: auto">
                            @foreach ($hospital->specializations as $spec)
                                <option value="{{ $spec->id }}" class="bg-light text-dark mb-1 rounded p-1" selected>{{ $spec->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ __('dashboard.city') }} :{{ $hospital->city->name }}</li>
                    </ul>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <a href="{{ route('admin.hospitals.edit', $hospital->id) }}" class="btn primary-bg text-white mb-2 w-100"><i class="fas fa-edit mx-2"></i>{{ __('global.edit') }}</a>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <button type="button" class="btn btn-outline-dark w-100" data-bs-toggle="modal" data-bs-target="#hosp{{ $hospital->id }}">
                                    <i class="fas fa-trash mx-2"></i>{{ __('global.delete') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.hospitals._delete')
        @endforeach
    </div>
@endsection

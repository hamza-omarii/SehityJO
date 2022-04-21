@extends("layouts.admin_dashboard_layout.master")

@section('title', 'doctors')

@section('content')

    <div class="d-flex mb-3 justify-content-center align-items-center wow fadeInDown">
        <form action="{{ route('admin.doctors') }}" method="GET">
            <input type="hidden" name="type" value="all">
            <button type="submit" class="btn bg-transparent text-dark border border-primary  border-1 fs-5 mx-2">{{ __('main.All Doctors') }}</button>
        </form>
        <form action="{{ route('admin.doctors') }}" method="GET">
            <input type="hidden" name="type" value="active">
            <button type="submit" class=" btn bg-transparent text-dark border border-primary  border-1  fs-5 mx-2">{{ __('main.Doctors') }} <span class="text-primary fw-bold">[ {{ __('main.Active') }} ]</span></button>
        </form>
        <form action="{{ route('admin.doctors') }}" method="GET">
            <input type="hidden" name="type" value="notActive">
            <button type="submit" class=" btn bg-transparent text-dark border-primary  border-1 fs-5 mx-2">{{ __('main.Doctors') }} <span class="text-danger fw-bold">[ {{ __('main.Not_Active') }} ]</span></button>
        </form>
    </div>

    <div class="row">
        @foreach ($doctors as $doctor)
            <div class="col-lg-4 col-md-6 col-xxl-3 wow fadeInLeft">
                <div class="card mb-3">
                    <div class="mx-auto">
                        <img src="{{ $doctor->image_url }}" class="card-img-top rounded-circle p-2" alt="doctor-pic" width="250" height="250">
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
                        <li class="list-group-item py-2 px-3 fw-bold  {{ $doctor->is_active ? 'text-primary' : 'text-danger' }}">
                            <span class="text-secondary">{{ __('main.Status Account') }} : </span> {{ $doctor->is_active_deafult }}
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 mb-2">
                                <a href="{{ route('admin.show.doctor.details', $doctor->id) }}" class="card-link btn primary-bg text-white w-100 fs-6">{{ __('global.show') }} <i class="fas fa-eye me-2"></i></a>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <form action="{{ route('admin.destroy.doctor', $doctor->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="card-link btn btn-outline-danger w-100 fs-6">{{ __('global.delete') }} <i class="fas fa-trash mx-2"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mx-auto">
            {{ $doctors->appends($_GET)->links() }}
        </div>
    </div>
@endsection

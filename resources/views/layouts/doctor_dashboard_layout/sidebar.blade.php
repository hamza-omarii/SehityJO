<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="logo-pad sidebar-heading text-center  primary-text fs-4 fw-bold border-bottom">
        <img src="{{ asset('images/logo/doctor-logo.svg') }}" alt="logo" width="85">
        <a href="{{ route('doctor.dashboard') }}" class="primary-text text-decoration-none"> {{ __('global.sehity') }}</a>
    </div>

    <div class=" list-group list-group-flush my-3 my-side">
        <a href="{{ route('doctor.dashboard') }}" class="list-group-item list-group-item-action second-text fw-bold bg-transparent {{ Route::currentRouteNamed('doctor.dashboard') ? 'active rounded-pill py-3' : '' }}">
            <div class="row">
                <div class="col-2 d-flex justifiy-content-center align-items-center">
                    <i class="fas fa-tachometer-alt me-2 fa-lg"></i>
                </div>
                <div class="col-10">
                    {{ __('main.dashboard') }}
                </div>
            </div>
        </a>
        <a href="{{ route('doctor.show.times') }}" class="list-group-item list-group-item-action second-text fw-bold bg-transparent {{ Route::currentRouteNamed('doctor.show.times') ? 'active rounded-pill py-3' : '' }}">
            <div class="row">
                <div class="col-2 d-flex justifiy-content-center align-items-center">
                    <i class="far fa-clock me-2 fa-lg"></i>
                </div>
                <div class="col-10">
                    {{ __('main.TimesAvilable') }}
                </div>
            </div>
        </a>
        <a href="{{ route('doctor.get.appointments') }}" class="list-group-item list-group-item-action second-text fw-bold bg-transparent {{ Route::currentRouteNamed('doctor.get.appointments') ? 'active rounded-pill py-0' : '' }}">
            <div class="row">
                <div class="col-2 d-flex justifiy-content-center align-items-center">
                    <i class="far fa-calendar-check me-2 fa-lg"></i>
                </div>
                <div class="col-10">
                    {{ __('main.Manage Appointments') }}
                </div>
            </div>
        </a>
        <a href="{{ route('doctor.articles.index') }}" class="list-group-item list-group-item-action second-text fw-bold bg-transparent {{ Route::currentRouteNamed('doctor.articles.index') ? 'active rounded-pill py-3' : '' }}">
            <div class="row">
                <div class="col-2 d-flex justifiy-content-center align-items-center">
                    <i class="fas fa-paperclip me-2 fa-lg"></i>
                </div>
                <div class="col-10">
                    {{ __('main.articles') }}
                </div>
            </div>
        </a>

        <form action="{{ route('doctor.logout') }}" method="POST">
            @csrf
            <button type="submit" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2 fa-lg"></i>{{ __('main.logout') }}</button>
        </form>
    </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="logo-pad sidebar-heading text-center  primary-text fs-4 fw-bold border-bottom">
        <img src="{{ asset('images/logo/admin-logo.svg') }}" alt="logo" width="85">
        {{ __('global.sehity') }}
    </div>

    <div class="list-group list-group-flush my-3 my-side">
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action second-text fw-bold bg-transparent {{ Route::currentRouteNamed('admin.dashboard') ? 'active rounded-pill py-3' : '' }}">
            <i class="fas fa-tachometer-alt me-2 fa-lg"></i>
            {{ __('main.dashboard') }}
        </a>
        <a href="{{ route('admin.specialization.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Route::currentRouteNamed('admin.specialization.index') ? 'active rounded-pill py-3' : '' }}">
            <i class="fas fa-briefcase-medical me-2 fa-lg"></i>
            {{ __('main.specializations') }}
        </a>
        <a href="{{ route('admin.hospitals.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Route::currentRouteNamed('admin.hospitals.index') ? 'active rounded-pill py-3' : '' }}">
            <i class="fa-solid fa-hospital me-2 fa-lg"></i>
            {{ __('main.hospitals') }}
        </a>
        <a href="{{ route('admin.doctors') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Route::currentRouteNamed('admin.doctors') ? 'active rounded-pill py-3' : '' }}">
            <i class="fa-solid fa-user-doctor me-2 fa-lg"></i>
            {{ __('main.doctors') }}
        </a>
        <a href="{{ route('admin.suggestions') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold {{ Route::currentRouteNamed('admin.suggestions') ? 'active rounded-pill py-3' : '' }}">
            <i class="fas fa-envelope-open me-2 fa-lg"></i>
            {{ __('main.Suggestions') }}
        </a>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2 fa-lg"></i>{{ __('main.logout') }}</button>
        </form>
    </div>
</div>
<!-- /#sidebar-wrapper -->

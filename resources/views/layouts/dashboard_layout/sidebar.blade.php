<!-- Sidebar -->
<div class="bg-white" id="sidebar-wrapper">
    <div class="logo-pad sidebar-heading text-center  primary-text fs-4 fw-bold border-bottom">
        <img src="{{ asset('images/logo/10.svg') }}" alt="logo" width="85">
        {{ __('global.sehity') }}
    </div>

    <div class="list-group list-group-flush my-3 my-side">
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action second-text fw-bold bg-transparent">
            <i class="fas fa-tachometer-alt me-2 fa-lg"></i>
            {{ __('dashboard.dashboard') }}
        </a>
        <a href="{{ route('admin.specialization.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-briefcase-medical me-2 fa-lg"></i>
            {{ __('dashboard.specializations') }}
        </a>
        <a href="{{ route('admin.hospitals.index') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa-solid fa-hospital me-2 fa-lg"></i>
            {{ __('dashboard.hospitals') }}
        </a>
        <a href="{{ route('admin.doctors') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fa-solid fa-user-doctor me-2 fa-lg"></i>
            {{ __('dashboard.doctors') }}
        </a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-paperclip me-2 fa-lg"></i>
            {{ __('dashboard.articles') }}
        </a>
        <a href="{{ route('admin.suggestions') }}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-envelope-open me-2 fa-lg"></i>
            {{ __('dashboard.Suggestions') }}
        </a>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-power-off me-2 fa-lg"></i>{{ __('dashboard.logout') }}</button>
        </form>
    </div>
</div>
<!-- /#sidebar-wrapper -->

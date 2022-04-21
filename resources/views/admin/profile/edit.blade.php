@extends("layouts.admin_dashboard_layout.master")

@section('title', 'edit profile')

@section('content')

    <form action="{{ route('admin.update.profile', Auth::guard('admin')->user()->id) }}" class="p-5 rounded bg-white wow bounceInDown" method="POST">
        @csrf
        @method("PUT")
        <h3 class="text-center primary-text mb-3 fw-bold">{{ __('main.Edit Account Information') }}</h3>
        <div class="form-floating mb-4">
            <input type="text" name="name" value="{{ old('name', $admin->name) }}" class="form-control @error('name') is-invalid @enderror" id="name">
            <label for="name">{{ __('main.name') }}</label>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating mb-4">
            <input type="email" name="email" value="{{ old('email', $admin->email) }}" class="form-control @error('email') is-invalid @enderror" id="floatingInput">
            <label for="floatingInput">{{ __('main.email') }}</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input name="old_password" type="password" autocomplete class="form-control @error('old_password') is-invalid @enderror" id="old-password">
            <label for="old-password">{{ __('main.Old Password') }}</label>
        </div>
        @error('old_password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="row mb-3">
            <div class="col-6">
                <div class="form-floating ">
                    <input name="new_password" type="password" autocomplete class="form-control @error('new_password') is-invalid @enderror" id="new_password">
                    <label for="new_password">{{ __('main.new_password') }}</label>
                </div>
                @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-6">
                <div class="form-floating">
                    <input name="new_password_confirmation" type="password" autocomplete class="form-control @error('new_password_confirmation') is-invalid @enderror" id="password_confirmation">
                    <label for="password_confirmation">{{ __('main.password-confirm') }}</label>
                </div>
                @error('new_password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn primary-bg w-100 text-white fw-bold">{{ __('global.update') }}</button>
    </form>
@endsection

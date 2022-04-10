@extends("layouts.whoAreYou_layout.app")

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7 p-3">
            <div class="card wow bounceIn border-0">
                <div class="card-header text-center title-register">{{ __('who_are_you.reset_password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="label col-12 col-form-label">{{ __('who_are_you.email') }}</label>
                            <div class="col-12">
                                <input id="email" type="email" placeholder="{{ __('who_are_you.enter_your_email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="py-2  ">
                            <button type="submit" class="btn butt-send-link">
                                {{ __('who_are_you.send_pass_link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<nav class="navbar navbar-expand-lg p-3 border-bottom justify-content-between custom-height">

    {{-- Toggle Btn --}}
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
    </div>

    {{-- Notification Btn --}}
    <div class="d-flex justify-content-end position-relative">

        <div class="btn-group mx-3 ">

            <button type="button" class="btn rounded-circle  btn-outline bg-light" data-bs-toggle="dropdown" aria-expanded="false" style="width: 60px;height: 60px;">
                <i class="fas fa-bell fa-solid fa-2x text-dark "></i>
                <span class="position-absolute top-0  start-100 translate-middle badge bg-danger">
                    {{ Auth::guard('admin')->user()->unreadNotifications->count() }}
                </span>
            </button>

            @if (Auth::guard('admin')->user()->unreadNotifications->count() > 0)
                <ul class="dropdown-menu dropdown-menu-end p-0" style="width: 400px ; border:none">
                    @foreach (Auth::guard('admin')->user()->unreadNotifications as $notify)
                        <div class="bg-light text-dark " style="box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;">
                            <div class="toast-header bg-secandory  text-black">
                                <strong class="me-auto">{{ $notify->data['title'] }}</strong>
                                <small>{{ $notify->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="toast-body">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-3">
                                        <img src="{{ $notify->data['icon'] }}" class="rounded-circle p-2" alt="..." width="80" height="80">
                                    </div>
                                    <div class="col-7">
                                        {{ $notify->data['body'] }}
                                    </div>
                                    <div class="col-2">
                                        <form action="{{ $notify->data['url'] }}" method="GET">
                                            <input type="hidden" name="mark" value="mark">
                                            <input type="hidden" name="id_of_notify" value="{{ $notify->id }}">
                                            <button type="submit" class="btn text-white primary-bg"><i class="fas fa-eye"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
            @endif
        </div>

        {{-- Profile Btn --}}
        <div class="btn-group ms-auto ">
            <button type="button" class="rounded-circle btn btn-outline primary-bg" data-bs-toggle="dropdown" aria-expanded="false" style="width: 60px;height: 60px;">
                <i class="icon-user fa-solid fa-user fa-2x primary-bg text-white rounded-circle"></i>
            </button>

            <ul class="dropdown-menu dropdown-menu-end">

                <li><a href="{{ route('admin.edit.profile', Auth::guard()->user()->id) }}" class="dropdown-item p-3 fw-bold"><i class="fa-solid fa-id-card me-2"></i>{{ __('main.profile') }}</a></li>
                <li>
                    <form action="{{ route('admin.logout') }}" method="POST" class="dropdown-item p-1">
                        @csrf
                        <button type="submit" class="btn bg-transparent text-danger fw-bold"><i class="fas fa-power-off  me-2 text-danger fw-bold"></i>
                            {{ __('main.logout') }}
                        </button>
                    </form>
                </li>
                <hr>
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class=" fw-bold dropdown-item p-3" rel="alternate" hreflang="{{ $localeCode }}">
                            @if ($properties['native'] == 'العربية')
                                <img src="{{ URL::asset('images/flags/JO.png') }}" alt="Ar">
                            @endif
                            @if ($properties['native'] == 'English')
                                <img src="{{ URL::asset('images/flags/US.png') }}" alt="En">
                            @endif
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</nav>

@extends("layouts.admin_dashboard_layout.master")

@section('title', 'specializations')

@section('content')

    @include('admin.specializations._create')

    @if ($errors->any())
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span>
            @endforeach
        </div>
    @endif

    <button type="button" class="btn primary-bg text-white w-100 fw-bold mb-3 wow fadeInDown" data-bs-toggle="modal" data-bs-target="#createModal">
        {{ __('main.create_new_specialization') }}
    </button>

    <table class="table rounded wow bounceInUp" style="border-radius: 10px">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('main.name') }}</th>
                <th>{{ __('global.processes') }}</th>
            </tr>
        </thead>
        <tbody class="bg-white text-secondary">
            @forelse ($specializations as $specialization)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $specialization->name }}</td>
                    <td class="d-flex justify-content-center">
                        <button type="button" class="btn primary-bg text-white mx-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $specialization->id }}">
                            <i class="fas fa-edit mx-2"></i>{{ __('global.edit') }}
                        </button>
                        <form action="{{ route('admin.specialization.destroy', $specialization->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash mx-2"></i>{{ __('global.delete') }}</button>
                        </form>
                    </td>
                </tr>
                @include('admin.specializations._edit')
            @empty
                <tr>
                    <td colspan="3">{{ __('main.There are no registered specializations yet') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

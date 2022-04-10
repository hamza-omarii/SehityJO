@extends("layouts.dashboard_layout.master")

@section('title', 'suggestions')

@section('content')
    @foreach ($suggestions as $suggestion)
        <div class="card mb-3 mx-auto wow fadeInLeft position-relative" style="width: 90%">
            <div class="card-header primary-bg text-white d-flex justfiy-content-center align-items-center">
                <h4 class="p-0">{{ $suggestion->subject }}</h4>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p class="mt-2 fs-6">{{ $suggestion->message }}</p>
                    <footer class="blockquote-footer mt-2" style="font-size: 15px">{{ $suggestion->name }} | <cite title="Source Title">{{ $suggestion->email }}</cite></footer>
                </blockquote>
            </div>
            <form action="{{ route('admin.suggestions.destroy', $suggestion->id) }}" method="POST" class="position-absolute p-3 bottom-0 end-0">
                @csrf
                @method("DELETE")
                <button class="btn btn-outline-light" type="submit"><i class="fas fa-trash text-danger mx-2"></i></button>
            </form>
        </div>
    @endforeach
@endsection

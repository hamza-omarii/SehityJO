@extends("layouts.doctor_dashboard_layout.master")

@section('title', 'articles')

@section('content')
    <button type="button" class="btn primary-bg text-white w-100 fw-bold mb-3 wow fadeInDown" data-bs-toggle="modal" data-bs-target="#createModal">
        {{ __('main.create new article') }}
    </button>
    @include('doctor.articles._create')
    <div class="row">
        @forelse ($articles as $article)
            <div class="col-sm-6 col-lg-4 wow fadeInLeft">
                <div class="card mb-3">
                    <img src="{{ $article->image_url }}" class="img-fluid" alt="article_pic">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->description }}</p>
                        <p class="card-text mt-3"><small class="text-muted">{{ $article->created_at->diffForHumans() }}</small></p>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn primary-bg mx-2 text-white w-100" data-bs-toggle="modal" data-bs-target="#editModal{{ $article->id }}">
                                    <i class="fas fa-edit me-2"></i>{{ __('global.edit') }}
                                </button>
                                @include('doctor.articles._edit')
                            </div>
                            <div class="col-6">
                                <form action="{{ route('doctor.articles.destroy', $article->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-outline-danger w-100"><i class="fas fa-trash me-2"></i>{{ __('global.delete') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-secondary text-center">{{ __('main.No article has been published yet') }}</p>
        @endforelse
    </div>
@endsection


@section('script-files')

@endsection

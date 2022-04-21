@extends('layouts.user_layout.master')

@section('css')
    <style>
        .blockquote-custom {
            font-size: 1.1rem;
        }

        .blockquote-custom-icon {
            width: 70px;
            height: 70px;
            top: -25px;
            left: 50px;
        }

        .doctor-img {
            width: 150px;
        }

    </style>
@endsection

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row">
                @forelse ($articles as $article)
                    <div class="col-lg-4 col-sm-6 mb-4 wow fadeIn">
                        <blockquote class="blockquote blockquote-custom position-relative bg-white p-5 shadow rounded">
                            <div class="blockquote-custom-icon rounded-circle bg-info shadow-sm d-flex justify-content-center position-absolute align-items-center">
                                <img src="{{ $article->doctor->image_url }}" alt="image" class="doctor-img img-thumbnail rounded-circle m-1">
                            </div>
                            <div class="mt-3">
                                <img src="{{ $article->image_url }}" class="img-fluid" alt="article-image">
                            </div>
                            <h5 class="mt-2 text-center text-secondary">{{ $article->title }}</h5>
                            <hr>
                            <p class="mb-0 mt-2 font-italic">{{ $article->description }}</p>
                            <footer class="blockquote-footer pt-4 mt-4 border-top">
                                <span title="Source Title">{{ $article->created_at->diffForHumans() }}</span>
                            </footer>
                            <a href="{{ route('user.show.doctor.details', $article->doctor->id) }}" class="blockquote-footer pt-4 mt-4 text-primary">{{ __('main.Show Doctor Profile') }}</a>
                        </blockquote>
                    </div>
                @empty
                    <p class="col-12 text-center text-secondary">{{ __('main.No Articles Yet') }}</p>
                @endforelse
                <div class="mx-auto">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

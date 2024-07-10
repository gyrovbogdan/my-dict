@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                @api_token

                @include('components.home.description')
                @include('components.home.dictionary')

                <p class="mt-4 fs-4 fw-semibold"> Последние <a href="{{ route('articles.index') }}">статьи</a>: </p>
                @foreach ($articles as $article)
                    @include('components.articles.article_card', $article)
                @endforeach
                @vite('resources/js/pages/home.js')
            </div>
        </div>
    </div>
@endsection

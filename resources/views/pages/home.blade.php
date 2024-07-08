@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                @api_token
                @include('components.common.description', [
                    'title' => 'Ваш Словарь',
                    'text' =>
                        'Добро пожаловать в Ваш Словарь. Здесь вы можете записывать слова и они всегда будут у вас под рукой! Введите новое слово и нажмите "Enter", чтобы оно сохранилось.',
                ])
                @include('components.home.dictionary')

                <h1 class="my-4"> Последние <a href="{{ route('article.index') }}"> статьи </a>: </h1>
                @foreach ($articles as $article)
                    @include('components.articles.article-card', $article)
                @endforeach
                @vite('resources/js/pages/home.js')
            </div>
        </div>
    </div>
@endsection

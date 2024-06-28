@extends('layouts.app')

@section('content')
    <div class="d-flex no-wrap container">

        @include('components.article-card', [
            'image' =>
                'https://images.unsplash.com/photo-1594904351111-a072f80b1a71?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'title' => 'IT-слова',
            'text' =>
                'Знание ключевых IT-слов помогает лучше понимать технологические процессы и эффективно взаимодействовать в профессиональной среде. Здесь вы найдете переводы и пояснения наиболее распространенных IT-слов.',
            'caption' => 'Обновлено 3 минуты назад',
        ])

        @include('components.home.table')

        @include('components.article-card', [
            'image' =>
                'https://images.unsplash.com/photo-1507608616759-54f48f0af0ee?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'title' => 'IT-слова',
            'text' =>
                'Знание ключевых IT-слов помогает лучше понимать технологические процессы и эффективно взаимодействовать в профессиональной среде. Здесь вы найдете переводы и пояснения наиболее распространенных IT-слов.',
            'caption' => 'Обновлено 3 минуты назад',
        ])
    @endsection

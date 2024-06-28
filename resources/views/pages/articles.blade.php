@extends('layouts.app')

@section('content')
    <div class='container align-items-center d-flex flex-column'>
        @foreach ($articles as $article)
            @include('components.articles.article-card', $article)
        @endforeach
    </div>
@endsection

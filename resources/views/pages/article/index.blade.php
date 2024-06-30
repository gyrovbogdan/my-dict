@extends('layouts.app')

@section('content')
    <div class='container align-items-center d-flex flex-column my-3'>
        @if ($isAdmin)
            <a type="button" class="btn btn-primary"
                href="{{ action([App\Http\Controllers\Web\ArticleController::class, 'create']) }}">Создать новую статью</a>
        @endif

        @foreach ($articles as $article)
            @include('components.articles.article-card', $article)
        @endforeach
        <div class="d-flex">
            {!! $articles->links() !!}
        </div>
    </div>
@endsection

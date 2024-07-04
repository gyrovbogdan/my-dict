@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                @if ($isAdmin)
                    <a type="button" class="btn btn-primary"
                        href="{{ action([App\Http\Controllers\Web\ArticleController::class, 'create']) }}">Создать новую
                        статью</a>
                @endif

                @foreach ($articles as $article)
                    @include('components.articles.article-card', $article)
                @endforeach
                <div class="d-flex">
                    {!! $articles->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

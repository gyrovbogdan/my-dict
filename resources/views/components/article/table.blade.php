<div class="d-flex flex-column m-3">
    <div class="row justify-content-center">
        @if ($isAdmin)
            <div class="btn-group my-3" role="group" aria-label="Basic mixed styles example">
                <a href="{{ action([App\Http\Controllers\Web\ArticleController::class, 'edit'], ['article' => $article['id']]) }}"
                    class="btn btn-info">Изменить статью</a>
                {{-- <form method="POST"
                    action="{{ action([App\Http\Controllers\Web\ArticleController::class, 'destroy'], ['article' => $article['id']]) }}">
                    @method('DELETE')
                    @csrf
                </form> --}}
                <button class="btn btn-danger" id="delete-article">Удалить</button>
            </div>
        @endif
        <div hidden id="article-id" data-id="{{ $article['id'] }}"></div>
        <div class="card">
            <div class="card-header">{{ $article['title'] }}</div>
            <div class="card-body">
                {{ $article['text'] }}
            </div>
        </div>
        @include('components.article.api-token')
        @include('components.article.dictionary')
        @include('components.article.pagination')
        @if ($isAdmin)
            @vite('resources/js/article/admin/main.js')
        @else
            @vite('resources/js/article/user/main.js')
        @endif
    </div>
</div>

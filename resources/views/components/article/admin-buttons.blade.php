@if ($isAdmin)
    <div class="btn-group mb-3" role="group" aria-label="Basic mixed styles example">
        <a href="{{ action([App\Http\Controllers\Web\ArticleController::class, 'edit'], ['article' => $article['id']]) }}"
            class="btn btn-primary">Изменить статью</a>
        <button class="btn btn-danger" id="delete-article">Удалить</button>
    </div>
@endif

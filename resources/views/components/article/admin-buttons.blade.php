@admin
    <div class="text-center">
        <div class="btn-group mb-3 w-100" role="group" aria-label="Basic mixed styles example">
            <a href="{{ route('article.edit', ['article' => $article['id']]) }}" class="btn btn-dark">Изменить статью</a>
            <button class="btn btn-secondary" id="delete-article">Удалить</button>
        </div>
    </div>
@endadmin

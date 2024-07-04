@if ($isAdmin)
    <a type="button" class="btn btn-primary mb-3"
        href="{{ action([App\Http\Controllers\Web\ArticleController::class, 'create']) }}">Создать новую
        статью</a>
@endif

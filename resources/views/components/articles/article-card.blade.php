<a class="card text-bg-light text-dark border-dark m-3"
    href="{{ action([App\Http\Controllers\Web\ArticleController::class, 'show'], ['article' => $id]) }}">
    <div style="background-image: url({{ asset($image) }});" class="card-img" alt="...">
        <div class="card-img-overlay">
            <div class="card-header border-dark">
                <h5 class="card-title">{{ $title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $text }}</p>
                <p class="card-text"><small>{{ $caption }}</small></p>
            </div>
        </div>
    </div>
</a>

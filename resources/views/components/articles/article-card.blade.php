<a class="card mb-3 text-decoration-none" href="{{ route('article.show', ['article' => $id]) }}">
    <div class="card-img" style="background-image: url({{ asset($image) }});">
        <div class="card-content">
            <p class="card-header text-center py-3 fs-4">{{ $title }}</p>
            <div class="card-body h-100">
                <p class="card-text fs-5">{{ $text }}</p>
            </div>
            <div class="card-footer text-body-secondary fs-5">
                <p><small>{{ $caption }}</small></p>
            </div>
        </div>
    </div>
</a>

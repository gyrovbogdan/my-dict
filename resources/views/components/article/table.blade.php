<div class="d-flex flex-column m-3">
    <div class="row justify-content-center">
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
        @vite('resources/js/article/main.js')
    </div>
</div>

<div class="d-flex flex-column flex-shrink-0" style="width: 330px;">
    <div class="card text-bg-light text-light border-light-subtle">
        <img src="{{ $image }}" class="card-img blur" alt="...">
        <div class="card-img-overlay">
            <div class="card-header border-light-subtle">
                <h5 class="card-title">{{ $title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text"> {{ $text }}</p>
                <p class="card-text"><small>{{ $caption }}</small></p>
            </div>
        </div>
    </div>
</div>

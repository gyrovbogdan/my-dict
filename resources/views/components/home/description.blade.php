<div class="card">
    <div class="card-header fw-bold"> Ваш Словарь </div>
    <div class="card-body">
        Добро пожаловать в Ваш Словарь. Здесь вы можете записывать слова и они всегда будут у вас под рукой!
        @auth
            Введите новое слово и нажмите "Enter", чтобы оно сохранилось.
        @else
            Войдите в <a href="{{ route('login') }}">аккаунт</a> чтобы сохранять новые слова.
        @endauth
    </div>
</div>
<div class="d-flex flex-column mx-3">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    Добро пожаловать в Ваш Словарь. Здесь вы можете записывать слова и они всегда будут у вас под
                    рукой!
                    Введите новое слово и нажмите "Enter", чтобы оно сохранилось. Вы можете вводить слова на русском
                    языке
                    в первую колонку и на английском во вторую. После того как вы вписали слово нажмите "Enter",
                    чтобы
                    сохранить
                    его или кликните мышью в свободное место, чтобы отменить ввод.
                </div>
            </div>
            @include('components.api-token')
            @include('components.dictionary')
            @include('components.pagination')
            @vite('resources/js/home/main.js')
        </div>

    </div>
</div>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.parts.head')
</head>

<body class="d-flex flex-column vh-100">
    <header>
        @include('layouts.parts.navbar')
    </header>

    <main class="flex-shrink-0">
        @yield('content')
        <div class="toast-container position-fixed bottom-0 end-0 p-3" id='toast-container'>
            @include('layouts.parts.toast_container')
    </main>

    <footer class="mt-auto">
        @include('layouts.parts.footer')
    </footer>
</body>

</html>

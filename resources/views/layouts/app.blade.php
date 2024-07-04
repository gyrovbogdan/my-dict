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
    </main>

    <footer class="mt-auto">
        @include('layouts.parts.footer')
    </footer>
</body>

</html>

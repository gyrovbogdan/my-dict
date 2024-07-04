@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                @include('components.article.api-token', compact('token'))

                @include('components.article.admin-buttons')
                @include('components.article.description')
                @include('components.article.dictionary')

                @if ($isAdmin)
                    @vite('resources/js/article/admin/main.js')
                @else
                    @vite('resources/js/article/user/main.js')
                @endif


            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                @api_token()

                @include('components.article.admin-buttons')
                @include('components.article.description')
                @include('components.article.dictionary')

                @vite('resources/js/pages/article.js')

            </div>
        </div>
    </div>
@endsection

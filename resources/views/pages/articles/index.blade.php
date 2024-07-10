@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                @include('components.articles.admin_button')

                @foreach ($articles as $article)
                    @include('components.articles.article_card', $article)
                @endforeach

                @include('components.articles.pagination')

            </div>
        </div>
    </div>
@endsection

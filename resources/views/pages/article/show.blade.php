@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                @include('components.article.table', compact('article', 'isAdmin', 'token'))
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container col-6">
        @include('components.article.table', compact('article', 'isAdmin'))
    </div>
@endsection

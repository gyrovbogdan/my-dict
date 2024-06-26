@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        Welcome to Home Page!
                    </div>
                </div>
                @include('components.api-token')
                @include('components.dictionary')
                @include('components.pagination')
                @vite('public/js/home/main.js')
            </div>
        </div>
    </div>
@endsection

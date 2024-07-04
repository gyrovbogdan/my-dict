@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                @api_token

                @include('components.home.description')
                @include('components.home.dictionary')

                @vite('resources/js/home/main.js')

            </div>
        </div>
    </div>
@endsection

@extends('app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card" style="width: 25rem;">
                <a href="{{ $payload['url'] }}" target="_blank">
                    <img src="{{ $payload['thumbnail_image'] }}" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <div class="">
                        <p class="text-end text-muted small text-capitalize">Source: {{ $payload['providerName'] }}</p>
                    </div>
                    <h5 class="card-title">{{ $payload['title'] }}</h5>
                    <p class="card-text">{{ $payload['description'] }}</p>
                    <a href="{{ route('home') }}" class="btn btn-primary w-100">Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

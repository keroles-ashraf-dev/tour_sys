@extends('layouts.app')
@section('title', 'Tours')
@section('navbar_title', __('messages.tours'))
@section('navbar_title_target', route('tours.index'))
@section('content')
    <div class="min-vh-100 container">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="tours-container container">
            <div class="row">
                @foreach ($tours as $tour)
                    <a class="col-md-3 mb-3 text-decoration-none text-dark" role="button"
                        href="{{ route('tours.show', $tour->slug) }}">
                        <div class="card">
                            <div class="card-body text-center">
                                <span class="card-text d-block">{{ $tour->slug }}</span>
                                <span class="card-text d-block">{{ $tour->name }}</span>
                                <span class="card-text d-block">{{ $tour->adult_price }}$</span>
                                <span class="card-text d-block">{{ $tour->child_price }}$</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection

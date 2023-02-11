@extends('layouts.app')
@section('title', 'Tour')
@section('navbar_title', __('messages.tours'))
@section('navbar_title_target', route('tours.index'))
@section('content')
    <div class="min-vh-100 container mb-5">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body text-center">
                        <span class="card-text d-block">{{ $tour->slug }}</span>
                        <h5 class="card-text d-block">{{ $tour->name }}</h5>
                        <span class="card-text d-block">{{ $tour->adult_price }}$</span>
                        <span class="card-text d-block">{{ $tour->child_price }}$</span>
                    </div>
                </div>
            </div>
            @livewire('booking', ['tour' => $tour->slug])
        </div>
    </div>
@endsection

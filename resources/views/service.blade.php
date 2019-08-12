@extends('layouts/master')

@section('title', 'Dashboard')

@section('body')

    <h1>Service</h1>
    <h2>{{ $service->getTitle() }}</h2>

    <h4>{{ $service->getCategory() }}</h4>

    <img src="{{ $service->getIcon() }}" class="img-thumbnail">

    <hr>

    <div class="description">
        {!! $service->getDescription() !!}
    </div>

@endsection

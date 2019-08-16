@extends('layouts/master')

@section('title', 'Dashboard')

@section('body')

    @include('partials/actions', ['actions' => ['print', 'edit', 'delete', 'ambience']])

    <h2>{{ $service->getTitle() }}</h2>

    <h4>{{ $service->getCategory() }}</h4>

    <img src="{{ $service->getIcon() }}" class="img-thumbnail">

    <hr>

    <div class="description">
        {!! $service->getDescription() !!}
    </div>

    <hr>

    <a class="btn btn-lg btn-primary" href="{{ $service->getInternalEditorUrl() }}">Bearbeiten</a>

@endsection

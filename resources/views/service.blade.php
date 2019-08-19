@extends('layouts/master')

@section('title', 'Dashboard')

@section('body')

    @include('partials/actions', ['actions' => ['print', 'edit', 'delete', 'ambience']])

    <div class="container service">
        <div class="row">
            <div class="col-6">
                <h2 class="service-title"><strong>{{ $service->getTitle() }}</strong></h2>
                <h4 class="service-category"><strong>{{ $service->getCategory() }}</strong></h4>
            </div>
            <div class="col-6">
                <img src="{{ $service->getIcon() }}" class="img-thumbnail">
            </div>
        </div>
        <div class="row">
            <div class="description">
                <div class="col-8">
                    {!! $service->getDescription() !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-lg btn-primary" href="{{ $service->getInternalEditorUrl() }}">Bearbeiten</a>
            </div>
        </div>
    </div>

@endsection

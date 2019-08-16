@extends('layouts/master')

@section('title', 'Dashboard')

@section('body')

    @include('partials/actions', ['actions' => ['print', 'edit', 'delete', 'ambience']])

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $service->getTitle() }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4>{{ $service->getCategory() }}</h4>
            </div>
        </div>
            <!-- <img src="{{ $service->getIcon() }}" class="img-thumbnail"> -->
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

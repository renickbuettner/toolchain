@extends('layouts/master')

@section('title', 'Dashboard')

@section('body')

    @php
        $actions = ['print'];

        if (auth()->user()->hasPermission('manage')) {
            $actions[] = 'edit';
            $actions[] = 'delete';
        }

        $actions[] = 'ambience';
    @endphp

    @include('partials/actions', ['actions' => $actions])

    <div class="container service">
        <div class="row">
            <div class="col-12">
                <h2>{{ $service->getTitle() }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4>{{ ucfirst($service->getCategory()) }}</h4>
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
    </div>

@endsection

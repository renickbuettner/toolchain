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
            <div class="col-6">
                <h2>{{ $service->getTitle() }}</h2>
            </div>
            <div class="col-6">
                    @if($service->getIcon() !== '')
                        <img src="{{$service->getIcon()}}" class="img-thumbnail">
                    @endif
            </div>

        </div>
        <div class="row">
                <div class="col-8">
                    <div class="shortdescription">
                    {!! $service->getShortDescription() !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="description">
                    {!! $service->getDescription() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

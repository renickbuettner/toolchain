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

    <div class="service">
        <div class="row">
            <div class="col-6">
                <h1>{{ $service->getTitle() }}</h1>
                <div class="service-category">
                    {{ ucfirst($service->getCategory()) }}
                </div>
            </div>
            @if($service->getIcon() !== '')
            <div class="col-4">
                <img src="{{$service->getIcon()}}" class="img-thumbnail" alt="Logo des Services">
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="description">
                    {!! $service->getDescription() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

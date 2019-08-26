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
                <div class="service-category">
                    {{ ucfirst($service->getCategory()) }}
                </div>
            </div>
            @if($service->getIcon() !== '')
            <div class="col-5">
                <img src="{{$service->getIcon()}}" class="img-thumbnail" alt="Logo des Services">
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="description">
                    {!! $service->getDescription() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

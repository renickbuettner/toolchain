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
                <h2><strong>{{ $service->getTitle() }}</strong></h2>
                <div class="service-category">
                    {!! $service->getCategory() !!}
                </div>
            </div>
            <div class="col-5">
                @if($service->getIcon() !== '')
                    <img src="{{$service->getIcon()}}" class="img-thumbnail" alt="Logo des Services">
                @endif
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="categorie">
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

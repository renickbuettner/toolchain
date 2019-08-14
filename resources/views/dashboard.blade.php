@extends('layouts/master')

@section('title', 'Dashboard')

@section('body')

    @include('partials/actions', ['actions' => ['print', 'ambience']])

    <h1>Dashboard</h1>

    @foreach ($services->getCategories() as $cat)
        <section class="category py-5">
            <h1 class="category-title">{{ucfirst($cat)}}</h1>
            <div class="category-items row">
               @each('partials.service', $services->getServices($cat), 'service', 'partials.noServices')
            </div>
        </section>
    @endforeach

@endsection

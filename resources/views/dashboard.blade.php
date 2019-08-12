@extends('layouts/master')

@section('title', 'Dashboard')

@section('body')

<section class="row m-0 ui">
    <div class="col-12 col-sm-12 col-md-12 col-lg-3 sidebar">
        <header>
            <h1>Toolchain</h1>
            <h5>Beat your toolchain mess</h5>
        </header>

        @include('partials.sidebar')
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-3">
        <h1>Dashboard</h1>

        @foreach ($services->getCategories() as $cat)
            <section class="category py-5">
                <h1 class="category-title">{{ucfirst($cat)}}</h1>
                <div class="category-items row">
                    @each('partials.service', $services->getServices($cat), 'service', 'partials.noServices')
                </div>
            </section>
        @endforeach


    </div>
</section>

@endsection

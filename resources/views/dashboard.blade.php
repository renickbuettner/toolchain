@extends('layouts/master')

@section('title', 'Dashboard')

@section('body')

<section class="row m-0 ui">
    <div class="col-12 col-sm-12 col-md-12 col-lg-3 sidebar">
        <header>
            <h1>Toolchain</h1>
            <h5>Beat your toolchain mess</h5>
        </header>

        <section class="ui-group">
            <a href="#" class="ui-btn active">All services</a>
            <a href="#" class="ui-btn">Add a service</a>
            <a href="#" class="ui-btn">Request approval</a>
            <a href="#" class="ui-btn">Help center</a>
        </section>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-3">
        <h1>Dashboard</h1>

        {{ serialize($services->getCategories()) }}


    </div>
</section>

@endsection

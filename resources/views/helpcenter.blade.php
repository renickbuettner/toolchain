@extends('layouts/master')

@section('title', 'Dashboard')

@section('body')

    @include('partials/actions', ['actions' => ['print', 'ambience']])

    <h1 class="pb-3">Help center</h1>

    <hr>

    @foreach ($faq as $rowItem)
        <section class="faq-item py-3">
            <h3 class="question text-primary">{{ucfirst($rowItem->question)}}</h3>
            <div class="answer">
                <blockquote class="blockquote">
                    {!! $rowItem->answer !!}
                </blockquote>
            </div>
        </section>
    @endforeach

@endsection

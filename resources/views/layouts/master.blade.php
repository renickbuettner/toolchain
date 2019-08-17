<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title') | Toolchain</title>
    @if (isset($defaultTheme))
        <script>
            window._defaultTheme = '{{$defaultTheme}}';
        </script>`;
    @endif
</head>
<body>
<!--
@if (Route::has('login'))
<div class="top-right links">
    @auth
    <a href="{{ url('/home') }}">Home</a>
    @else
    <a href="{{ route('login') }}">Login</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}">Register</a>
    @endif
    @endauth
</div>
@endif-->

<section class="row m-0 ui">
    <div class="col-12 col-sm-12 col-md-12 col-lg-3 sidebar">
        <header>
            <h1>Toolchain</h1>
            <h5>Beat your toolchain mess</h5>
        </header>

        @include('partials.sidebar')
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-9 offset-lg-3 content-area">
        @yield('body')
    </div>
</section>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>

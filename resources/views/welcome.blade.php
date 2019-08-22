@extends('layout')

@section('title', 'Welcome')

@section('content')

    @if (auth()->check())
        <script>
            // fallback
            window.location.href = '/dashboard';
        </script>
    @endif

    <section class="home-page">
        <div class="wrapper">
            <h1 class="title" data-text="TOOLCHAIN">TOOLCHAIN</h1>
            <button id="login" onclick="window.location.href='/login/google';">Sign in with Google</button>
        </div>
    </section>

@endsection

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
    <!--
    <div class="flex-center position-ref full-height">
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
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Dashborad
                </div>
            </div>
        </div>
        -->

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
        </section>

    </body>
</html>

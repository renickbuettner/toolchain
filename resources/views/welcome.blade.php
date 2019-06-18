@extends('layouts.master')

@section('body')

<div class="space-holder">
    <div class="space"></div>
</div>
<div class="scroll-x">
    <div class="galaxy-holder">
        <div class="sun-holder planet-holder">
            <div class="gradient-holder">
                <div class="gradient first"></div>
                <div class="gradient second"></div>
                <div class="gradient third"></div>
            </div>
        </div>

        <div class="mercury-holder  planet-holder">
            <div class="gradient-holder">
                <div class="gradient first"></div>
                <div class="gradient second"></div>
            </div>
        </div>

        <div class="venus-holder  planet-holder">
            <div class="gradient-holder">
                <div class="gradient first"></div>
                <div class="gradient second"></div>
            </div>
        </div>

        <div class="earth-holder  planet-holder">
            <div class="gradient-holder">
                <div class="gradient first"></div>
                <div class="gradient second">
                    <div class="gradient third"></div>
                    <div class="gradient fourth"></div>
                    <div class="gradient fifth"></div>
                </div>

            </div>
        </div>

        <div class="mars-holder  planet-holder">
            <div class="gradient-holder">
                <div class="gradient first"></div>
                <div class="gradient second"></div>
            </div>
        </div>

        <div class="jupiter-holder  planet-holder">
            <div class="gradient-holder">
                <div class="gradient first"></div>
                <div class="gradient second"></div>
            </div>
        </div>

        <div class="saturn-holder  planet-holder">
            <div class="gradient-holder">
                <div class="gradient first"></div>
                <div class="gradient second"></div>
                <div class="gradient third"></div>
            </div>
        </div>

        <div class="uran-holder  planet-holder">
            <div class="gradient-holder">
                <div class="gradient first"></div>
                <div class="gradient second"></div>
            </div>
        </div>

        <div class="neptune-holder  planet-holder">
            <div class="gradient-holder">
                <div class="gradient first"></div>
                <div class="gradient second"></div>
            </div>
        </div>

        <div class="pluto-holder  planet-holder">
            <div class="gradient-holder">
                <div class="gradient first"></div>
                <div class="gradient second"></div>
            </div>
        </div>
    </div>
</div>

<section class="login">
    <!--<div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto text-center ui-form">
                <h1>Toolchain</h1>
                <div class="card text-white bg-dark mt-5">
                    <div class="card-body">
                        <button class="btn btn-outline-light btn-block">Login via SSO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <div class="screen">
        <div class="window text-center" id="window">
            <div class="title-bar">
                <div class="controls">
                    <div class="control close" onclick="window.location.reload()"></div>
                    <div class="control minimize" onclick="document.getElementById('window').style.display = 'none';"></div>
                    <div class="control maximize"></div>
                </div>
                <div class="title">Login into Toolchain</div>
                <img class="img-fluid img-thumbnail rounded-circle mt-5" src="https://via.placeholder.com/144?text=LOGO">
                <div class="p-5">
                    <button class="btn btn-outline-light btn-block">Login via SSO</button>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
    html, body{
        margin:0;
        padding:0;
        height: 100%;
    }

    body{
        background: #101010;
        overflow: hidden;
    }

    .scroll-x{
        width: 100%;
        height: 100%;
        overflow-y: hidden;
        overflow-x: auto;
        position: relative;
    }

    .space-holder{
        position:fixed;
        width: 100%;
        height: 100%;
        z-index: -1;
    }

    .galaxy-holder{
        height: 100%;
        width: 2000px;
        overflow-y: hidden;
        position: relative;
        user-select: none;
        pointer-events: none;
    }



    .gradient-holder{
        width:400px;
        height:400px;
        position:relative;
        margin:0 auto;
    }

    .planet-holder{
        position:absolute;
        top: 50%;
        left: 50px;
        transform: translate(-50%,-50%);
    }

    .sun-holder{
        top:50%;
        left: 50px;
        transform:translate(-20px,-50%);
    }

    .gradient{
        border-radius:50%;
        background: #ffeb3b;
        position:absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
    }

    .gradient.first{width: 100%; height: 100%;}
    .gradient.second{width: 75%;height: 75%;}
    .gradient.third{width:50%;height:50%;}


    .mercury-holder{
        margin-left: 420px;
    }

    .mercury-holder .gradient.second{
        position:relative;
        overflow:hidden;
    }

    .mercury-holder .gradient.second:before {
        content: '';
        display: block;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        background: rgba(0, 0, 0, 0.12);
        position: absolute;
        right: 0px;
        bottom: -1px;
        z-index: 1;
    }

    .mercury-holder .gradient.second:after{
        content: '';
        display: block;
        border-radius: 50%;
        width: 15px;
        height: 15px;
        background: rgba(0, 0, 0, 0.12);
        position: absolute;
        left: 10px;
        top: 10px;
        z-index: 1;
    }

    .mercury-holder .gradient-holder{
        width:70px;
        height:70px;
        position:relative;
    }

    .mercury-holder .gradient {
        border-radius: 50%;
        background: #607d8b;
    }

    .venus-holder{
        margin-left: 540px;
    }

    .venus-holder .gradient-holder{
        width:130px;
        height:130px;
        position:relative;
    }

    .venus-holder .gradient {
        border-radius: 50%;
        background: #ca521c;
    }

    .earth-holder{
        margin-left: 710px;
    }

    .earth-holder .gradient-holder{
        width:180px;
        height:180px;
        position:relative;
    }

    .earth-holder .gradient {
        border-radius: 50%;
        background: rgba(33, 150, 243, 0.29);
    }

    .earth-holder .second{
        width: 75%;
        height: 75%;
        background: #3581bd;
    }

    .earth-holder .third{
        background: transparent;
        width: 67px;
        height: 68px;
        border-radius: 50%;
        box-shadow: 30px 15px 0 0 #3581bd;
        z-index: 1;
        transform: rotate(147deg) translate(-12px, 31px);
    }

    .earth-holder .fourth {
        width: 0;
        height: 0;
        border-left: 61px solid transparent;
        border-right: 61px solid transparent;
        border-top: 109px solid #4CAF50;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        transform: rotate(90deg) translate(-54px, 47px);
        background: transparent;
    }

    .earth-holder .fifth {
        width: 60px;
        height: 20px;
        background: #fff;
        z-index: 2;
        border-radius: 10px;
        opacity: .7;
        margin-top:10px;
    }

    .earth-holder .fifth:before {
        content: "";
        width: 25px;
        height: 30px;
        background: #fff;
        position: absolute;
        border-radius: 50%;
        margin-top: -12px;
        margin-left: 11px;
    }

    .mars-holder{
        margin-left: 885px;
    }

    .mars-holder .gradient-holder{
        width:130px;
        height:130px;
        position:relative;
    }

    .mars-holder .gradient {
        border-radius: 50%;
        background: #c1352b;
    }

    .mars-holder .gradient.second{
        overflow:hidden;
        position:relative;
    }

    .mars-holder .gradient.second:before {
        content: '';
        display: block;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        background: rgba(0, 0, 0, 0.13);
        position: absolute;
        right: 0px;
        bottom: -20px;
        z-index: 1;
    }

    .mars-holder .gradient.second:after{
        content: '';
        display: block;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        background: rgba(0, 0, 0, 0.13);
        position: absolute;
        left: 20px;
        top: 20px;
        z-index: 1;
    }

    .jupiter-holder{
        margin-left: 1050px;
    }

    .jupiter-holder .gradient-holder{
        width:180px;
        height:180px;
        position:relative;
    }

    .jupiter-holder .gradient {
        border-radius: 50%;
        background: #dec372;
    }
    .jupiter-holder .gradient.second{
        overflow:hidden;
    }
    .jupiter-holder .gradient.second:before {
        content: "";
        width: 100%;
        height: 20%;
        border-radius: 2px;
        position: absolute;
        top: 43px;
        background: #b99450;
    }

    .jupiter-holder .gradient.second:after {
        content: "";
        width: 100%;
        height: 12%;
        border-radius: 2px;
        position: absolute;
        top: 95px;
        background: #b99450;
    }


    .saturn-holder{
        margin-left: 1260px;
    }

    .saturn-holder .gradient-holder{
        width:150px;
        height:150px;
        position:relative;
    }

    .saturn-holder .gradient {
        border-radius: 50%;
        background: rgba(158, 158, 158, 0.46);
    }

    .saturn-holder .gradient {
        border-radius: 50%;
        background: #755b36;
    }
    .saturn-holder .gradient.third {
        background: transparent;
        border-left: 14px solid #252525;
        border-top: 14px solid #252525;
        border-radius: 50%;
        opacity: 0.5;
        height: 57px;
        width: 59px;
        transform: skew(70deg, -33deg) rotate(301deg) translate(20px, -1px);
    }

    .uran-holder{
        margin-left: 1450px;
    }

    .uran-holder .gradient-holder{
        width:130px;
        height:130px;
        position:relative;
    }

    .uran-holder .gradient {
        border-radius: 50%;
        background: #607d8b;
    }

    .neptune-holder{
        margin-left: 1610px;
    }

    .neptune-holder .gradient-holder{
        width:120px;
        height:120px;
        position:relative;
    }

    .neptune-holder .gradient {
        border-radius: 50%;
        background: #2196f3;
    }

    .pluto-holder{
        margin-left: 1750px;
    }

    .pluto-holder .gradient-holder{
        width: 80px;
        height: 80px;
        position:relative;
    }

    .pluto-holder .gradient {
        border-radius: 50%;
        background: #805f47;
    }

    .pluto-holder .gradient.second{
        overflow:hidden;
        position:relative;
    }

    .pluto-holder .gradient.second:before {
        content: '';
        display: block;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        background: #7b392f;
        position: absolute;
        right: 0px;
        bottom: -1px;
        z-index: 1;
    }

    .pluto-holder .gradient.second:after{
        content: '';
        display: block;
        border-radius: 50%;
        width: 15px;
        height: 15px;
        background: #7b392f;
        position: absolute;
        left: 10px;
        top: 10px;
        z-index: 1;
    }

    /*reset styles*/

    .sun-holder .gradient-holder{
        animation: none;
        display: flex;
        display: -webkit-flex;
        justify-content: center;
        align-items: center;
    }

    .sun-holder .gradient-holder .gradient{
        animation: scaling 2s, scalingSun 2s infinite;
    }

    .sun-holder .gradient-holder .gradient.first{animation-duration: 1s, 5s;}
    .sun-holder .gradient-holder .gradient.second{animation-duration: 2s, 8s;}
    .sun-holder .gradient-holder .gradient.third{animation-duration:3s, 10s;}

    .gradient-holder{
        animation: scaling 1s;
    }

    .gradient-holder .first{
        animation: scalingPlanetGradient 5s infinite;
        opacity: 0.4;
    }

    .sun-holder .gradient.second {
        opacity: .4;
    }

    .mercury-holder .gradient-holder .first{animation-duration: 5s}
    .venus-holder .gradient-holder .first{animation-duration: 3s}
    .earth-holder .gradient-holder .first{animation-duration: 6s}
    .mars-holder .gradient-holder .first{animation-duration: 7s}
    .jupiter-holder .gradient-holder .first{animation-duration: 8s}
    .saturn-holder .gradient-holder .first{animation-duration: 6s}
    .neptune-holder .gradient-holder .first{animation-duration: 9s}
    .pluto-holder .gradient-holder .first{animation-duration: 3s}


    .planet-holder{
        display:flex;
        display:-webkit-flex;
        justify-content: center;
        align-items: center;
    }

    .earth-holder .gradient.second{
        overflow:hidden;
    }


    .saturn-holder .third{
        animation: scaleRing 1s;
    }

    @keyframes scaleRing{
        0%{
            transform: scale(0) skew(70deg, -33deg) rotate(301deg) translate(20px, -1px);
        }
        100%{
            transform: scale(1) skew(70deg, -33deg) rotate(301deg) translate(20px, -1px);
        }
    }

    /*animation styles*/

    @keyframes scaling{
        0%{
            width: 0px;
            height:0px;
        }
    }

    @keyframes scalingSun{
        0%{
            transform: translate(-50%, -50%) scale(0.9);
        }
        50%{
            transform: translate(-50%, -50%) scale(1);
        }
        100%{
            transform: translate(-50%, -50%) scale(0.9);
        }
    }

    @keyframes scalingPlanetGradient{
        0%{
            transform: translate(-50%, -50%) scale(0.9);
        }
        50%{
            transform: translate(-50%, -50%) scale(1);
        }
        100%{
            transform: translate(-50%, -50%) scale(0.9);
        }
    }


    /*stars*/

    /* Animations */

    @keyframes spin {

        from {
            transform: rotate( 0deg );
        }

        to {
            transform: rotate( 360deg );
        }
    }

    .space {
        position: absolute;
        width: 400vw;
        height: 400vh;
        top: 50%;
        left: 50%;
        margin-top: -200vh;
        margin-left: -200vw;
        animation: spin 800s linear infinite;
        background-size: 240px;
        backface-visibility: visible;

        /* Had to base64 SVG background for FF compatibility */
        background-image: url(data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8yIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDI0MCAyNDAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0MCAyNDAiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxyZWN0IHg9IjEwNiIgeT0iOTAiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIyIiBoZWlnaHQ9IjIiLz48cmVjdCB4PSI3NCIgeT0iNjMiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSIyMyIgeT0iNjYiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSI1MCIgeT0iMTEwIiBmaWxsPSIjRkZGRkZGIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIi8+PHJlY3QgeD0iNjMiIHk9IjEyOCIgZmlsbD0iI0ZGRkZGRiIgd2lkdGg9IjEiIGhlaWdodD0iMSIvPjxyZWN0IHg9IjQ1IiB5PSIxNDkiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSI5MiIgeT0iMTUxIiBmaWxsPSIjRkZGRkZGIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIi8+PHJlY3QgeD0iNTgiIHk9IjgiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSIxNDciIHk9IjMzIiBmaWxsPSIjRkZGRkZGIiB3aWR0aD0iMiIgaGVpZ2h0PSIyIi8+PHJlY3QgeD0iOTEiIHk9IjQzIiBmaWxsPSIjRkZGRkZGIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIi8+PHJlY3QgeD0iMTY5IiB5PSIyOSIgZmlsbD0iI0ZGRkZGRiIgd2lkdGg9IjEiIGhlaWdodD0iMSIvPjxyZWN0IHg9IjE4MiIgeT0iMTkiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSIxNjEiIHk9IjU5IiBmaWxsPSIjRkZGRkZGIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIi8+PHJlY3QgeD0iMTM4IiB5PSI5NSIgZmlsbD0iI0ZGRkZGRiIgd2lkdGg9IjEiIGhlaWdodD0iMSIvPjxyZWN0IHg9IjE5OSIgeT0iNzEiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIzIiBoZWlnaHQ9IjMiLz48cmVjdCB4PSIyMTMiIHk9IjE1MyIgZmlsbD0iI0ZGRkZGRiIgd2lkdGg9IjIiIGhlaWdodD0iMiIvPjxyZWN0IHg9IjEyOCIgeT0iMTYzIiBmaWxsPSIjRkZGRkZGIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIi8+PHJlY3QgeD0iMjA1IiB5PSIxNzQiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSIxNTIiIHk9IjIwMCIgZmlsbD0iI0ZGRkZGRiIgd2lkdGg9IjEiIGhlaWdodD0iMSIvPjxyZWN0IHg9IjUyIiB5PSIyMTEiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIyIiBoZWlnaHQ9IjIiLz48cmVjdCB5PSIxOTEiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSIxMTAiIHk9IjE4NCIgZmlsbD0iI0ZGRkZGRiIgd2lkdGg9IjEiIGhlaWdodD0iMSIvPjwvc3ZnPg==);
    }
</style>

<style>
    .screen {
        width: 100%;
        position: fixed;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .window {
        position: relative;
        width: 100%;
        max-width: 500px;
        margin-left: calc(50% - 250px);
        height: 340px;
        background-color: rgba(52, 61, 70, 0.95);
        border-radius: 8px;
        box-shadow: 0 0 30px 2px rgba(0, 0, 0, 0.5);
        animation-name: openWindow;
        animation-duration: 1s;
        animation-iteration-count: initial;
    }

    .title-bar {
        position: relative;
        height: 22px;
        width: 100%;
        border-radius: 8px 8px 0 0;
        clear: both;
        background-color: rgba(52, 61, 70, 1);
    }

    .controls {
        position: absolute;
        display: flex;
        top: 5px;
        left: 8px;
        width: 100%;
    }

    .control {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        margin-right: 8px;
        opacity: 1;
    }
    .control.close {
        background-color: #df6158;
    }
    .control.minimize {
        background-color: #eebc3c;
    }
    .control.maximize {
        background-color: #7aca4f;
    }

    .title {
        font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, Ubuntu;
        font-size: 14px;
        text-align: center;
        color: #c3c5c8;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .space-holder {
        z-index: -1;
    }

    .login {
        position: absolute;
        top: 20%;
        margin: 0 auto;
        width: 100%;
        color: white;
    }

    @keyframes openWindow {
        from { transform: scale(0); }
        to { transform: scale(1); }
    }
</style>

@stop

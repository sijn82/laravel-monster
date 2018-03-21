<!doctype html>
<html lang="{{ app()->getLocale() }}">

{{--I will be using this template as the main (master) template,--}}
{{--which will be extended by other pages (templates) as the viewer navigates--}}
{{--this single page application (SPA).--}}

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Stuff -->

        {{--I have added this to the master template so there should be a default csrf token on every template used.--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-field" content="{{ csrf_field() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        <script>window.Laravel = { csrfField: '{{ csrf_field() }}' }</script>

        <title>Blood Thirsty Monsters</title>

        <!-- Fonts -->

        {{--The same goes with fonts and any other CDN's used.--}}
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }
    h2 {
        color: lightseagreen;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
</style>

    <body>
        <div class="flex-center position-ref full-height">

            {{--Worth creating at some point, currently = false, I assume.--}}

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div id="app">
                    <div id="navigationBar">
                        <navbar></navbar>
                    </div>
                    <div id="otherDiv">
                        <monsters></monsters>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="{{  asset('js/app.js') }}"></script>
</html>

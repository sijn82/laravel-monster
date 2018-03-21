@extends('layouts.app')
{{--@extends('master')--}}


@section('dashboard')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                        {{--<div id="app">--}}
                            <passport-clients></passport-clients>
                            <passport-authorized-clients></passport-authorized-clients>
                            <passport-personal-access-tokens></passport-personal-access-tokens>
                        {{--</div>--}}
                    <a href="/monsters/new">Create New Monster</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
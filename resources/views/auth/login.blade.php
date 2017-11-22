@extends('layouts.master')
@section('header')
@endsection
@section('footer')
@endsection
@section('styles')
    <link rel="stylesheet" href="/css/style.css">
@endsection
@section('content')
    <div id="wrapper">
        <!--https://codepen.io/andytran/pen/RPBdgM-->

        <div class="login-form-wrapper">
            <h1>
                Log In
            </h1>
            <div class="form-body">
                <form name="auth-form" action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="fieldset">
                        <input id="email" name="email" type="text" required>
                        <label for="email">
                            @lang('E-Mail Address')
                        </label>
                        <div class="highlighter"></div>
                    </div>
                    <div class="fieldset">
                        <input id="password" name="password" type="password" required>
                        <label for="password">
                            @lang('Password')
                        </label>
                        <div class="highlighter"></div>
                    </div>
                    <div class="fieldset button-set">
                        <input type="submit" value="@lang('login')">
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Body inner end -->
@endsection

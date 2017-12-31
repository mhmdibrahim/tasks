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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <label for="email">
                            @lang('E-Mail Address')
                        </label>
                        <input id="email" name="email" type="text">
                    </div>
                    <div class="fieldset">
                           <label for="password">
                            @lang('Password')
                        </label>
                        <input id="password" name="password" type="password">
                    
                  
                    </div>
                    <div class="fieldset button-set text-right">
                        <input type="submit" value="@lang('login')">
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Body inner end -->
@endsection

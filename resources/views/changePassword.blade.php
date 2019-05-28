@extends('layouts.master')
<br>
<br>
<br>
@section('nav')
    <div>
        <ul class="breadcrumb">
            <li><a href="/">@lang('Home')</a></li>
            <li class="active">@lang('Change Password')</li>
        </ul>
    </div>
@endsection
@section('content')
    <main class="container">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('status') != null)
                <div class="alert alert-success">{{session('status')}}</div>
            @endif
        </div>
        <div class="post">
        <div class="post-header">
            <h1>@lang('Change Password')</h1>
        </div>
        <form action="/change" method="post" class="form-horizontal post-content ">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label col-md-4 col-xs-12">@lang('new password')</label>
                <div class="col-md-8 col-xs-12">
                    <input type="password" name="newPassword" placeholder=" @lang('Enter') @lang('new password')" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4 col-xs-12">@lang('confirm password')</label>
                <div class="col-md-8 col-xs-12">
                    <input type="password" name="confirmPassword" placeholder=" @lang('Enter the password agin')" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="changeBtn">
                    <button type="submit" class="btn btn-primary")>@lang('Change')</button>
                </div>
            </div>
        </form>
        </div>
    </main>
@endsection
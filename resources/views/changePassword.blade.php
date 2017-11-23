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
    <div class="container">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('status') != null)
                <div class="alert alert-success">{{session('status')}}</div>
            @endif
        </div>
        <h1>@lang('Change Password')</h1>
        <form action="/change" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label col-md-3">@lang('new password')</label>
                <div class="col-md-4">
                    <input type="password" name="newPassword" placeholder=@lang("Enter new password") class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">@lang('confirm password')</label>
                <div class="col-md-4">
                    <input type="password" name="confirmPassword" placeholder=@lang("Enter the password agin") class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-md-offset-3">
                    <button type="submit" class="btn btn-primary")>@lang('Change')</button>
                </div>
            </div>
        </form>
    </div>
@endsection
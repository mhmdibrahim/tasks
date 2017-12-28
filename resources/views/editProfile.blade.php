@extends('layouts.master')
<br>
<br>
<br>
@section('nav')
    <div>
        <ul class="breadcrumb">
            <li><a href="/">@lang('Home')</a></li>
            <li class="active">@lang('Edit Profile')</li>
        </ul>
    </div>
@endsection
@section('content')
    <main class="container ">
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
        
        <form method="post" action="/edit" class="form-horizontal post">
       
                   <h1 class="heading">@lang("Edit Profile")</h1>
            {{csrf_field()}}
            <div class="post-content ">
            <div class="form-group ">
                <label class="control-label col-md-3 col-xs-12">@lang('First Name')</label>
                <div class="col-md-9 col-xs-12">
                    @if($errors->any())
                        <input class="form-control" type="text" name="firstName"
                               placeholder="@lang('Enter') @lang('First Name')" value="{{old('firstName')}}">
                    @else
                        <input class="form-control" type="text" name="firstName"
                               placeholder="@lang('Enter') @lang('First Name')" value="{{auth()->user()->first_name}}">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-12">@lang('Last Name')</label>
                <div class="col-md-9 col-xs-12">
                    @if($errors->any())
                        <input class="form-control" type="text" name="lastName"
                               placeholder="@lang('Enter') @lang('Last Name')" value="{{old('lastName')}}">
                    @else
                        <input class="form-control" type="text" name="lastName"
                               placeholder="@lang('Enter') @lang('Last Name')" value="{{auth()->user()->last_name}}">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-12">@lang('Email')</label>
                <div class="col-md-9 col-xs-12">
                    @if($errors->any())
                        <input class="form-control" type="email" name="email"
                               placeholder="@lang('Enter') @lang('Email')" value="{{old('email')}}">
                    @else
                        <input class="form-control" type="email" name="email"
                               placeholder="@lang('Enter') @lang('Email')" value="{{auth()->user()->email}}">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-12">@lang('Job Title')</label>
                <div class="col-md-9 col-xs-12">
                    @if($errors->any())
                        <input class="form-control" type="text" name="jobTitle"
                               placeholder="@lang('Enter') @lang('Job Title')" value="{{old('jobTitle')}}">
                    @else
                        <input class="form-control" type="text" name="jobTitle"
                               placeholder="@lang('Enter') @lang('Job Title')" value="{{auth()->user()->job_title}}">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-12">@lang('Phone Number')</label>
                <div class="col-md-9 col-xs-12">
                    @if($errors->any())
                        <input class="form-control" type="text" name="phoneNumber"
                               placeholder="@lang('Enter') @lang('Phone Number')" value="{{old('phoneNumber')}}">
                    @else
                        <input class="form-control" type="text" name="phoneNumber"
                               placeholder="@lang('Enter') @lang('Phone Number')" value="{{auth()->user()->phone}}">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-12">@lang('Department')</label>
                <div class="col-md-9 col-xs-12">
                    <select class="form-control" name="department">
                        @if(old('department') == null && auth()->user()->department_id == null)
                            <option disabled selected>@lang('-Select Department-')</option>
                        @else
                            <option disabled>@lang('-Select Department-')</option>
                        @endif
                        @foreach($departments as $department)
                            @if(old('department') == $department->id)
                                <option value="{{$department->id}}" selected>{{$department->name}}</option>
                            @elseif(!$errors->any() && $department->id == auth()->user()->department_id )
                                <option value="{{$department->id}}" selected>{{$department->name}}</option>
                            @else
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="btn-right" >
                <button type="submit" class="btn btn-primary">@lang('Edit')</button>
            </div>
            </div>
        </form>
    </main>
@endsection

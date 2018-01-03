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
    @php
    if(empty($user)){
        $user = Auth::user();
    }
    @endphp
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
                <div class="alert alert-success">@lang('Profile Edited')</div>
            @endif
        </div>

        <form method="POST" action="/edit" class="form-horizontal post" readonly>
            @if(auth()->user()->role == 'admin')
                <h1 class="heading">
                    <div class="col-md-6 col-xs-6 user-name">
                        <span class="">{{$user->first_name}} {{$user->last_name}}</span></div>
                    <div class="col-md-6 col-xs-6">
                        <button type="button" class="btn btn-danger pull-right" id="delete">@lang('delete')</button>
                        <button type="button" class="btn btn-primary pull-right" id="edit">@lang('Edit')</button>
                    </div>
                </h1>
            @else
                <h1 class="heading">@lang("Edit Profile") </h1>
            @endif
            {{csrf_field()}}
            <div class="post-content ">
            <div class="form-group ">
                <label class="control-label col-md-3 col-xs-12">@lang('First Name')</label>
                <div class="col-md-9 col-xs-12">
                    @if($errors->any())
                        <input class="form-control" type="text" name="firstName"
                               placeholder="@lang('Enter')@lang('First Name')" value="{{old('firstName')}}">
                    @else
                        <input class="form-control" type="text" name="firstName" @if(auth()->user()->role == 'admin' || auth()->user()->role == 'tracker')readonly @endif
                               placeholder="@lang('Enter') @lang('First Name')" value="{{$user->first_name}}">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-12">@lang('Last Name')</label>
                <div class="col-md-9 col-xs-12">
                    @if($errors->any())
                        <input class="form-control" type="text" name="lastName"
                               placeholder="@lang('Enter')@lang('Last Name')" value="{{old('lastName')}}">
                    @else
                        <input class="form-control" type="text" name="lastName" @if(auth()->user()->role == 'admin' || auth()->user()->role == 'tracker')readonly @endif
                               placeholder="@lang('Enter') @lang('Last Name')") value="{{$user->last_name}}">
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
                        <input class="form-control" type="email" name="email" @if(auth()->user()->role == 'admin' || auth()->user()->role == 'tracker')readonly @endif
                               placeholder="@lang('Enter') @lang('Email')" value="{{$user->email}}">
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
                        <input class="form-control" type="text" name="jobTitle" @if(auth()->user()->role == 'admin' || auth()->user()->role == 'tracker')readonly @endif
                               placeholder="@lang('Enter') @lang('Job Title')" value="{{$user->job_title}}">
                    @endif
                </div>
            </div>

                @if(auth()->user()->role == 'regular')
                <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">@lang('Image')</label>
                    <div class="col-md-9 col-xs-12">
                        @if($errors->any())
                            <input class="form-control" type="file" name="image"
                                   placeholder="@lang('Insert') @lang('Image')" value="{{old('image')}}">
                        @else
                            <input class="form-control" type="text" name="image"
                            placeholder="@lang('Insert') @lang('Image')" value="{{$user->image}}">
                        @endif
                    </div>
                </div>
                @endif
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-12">@lang('Phone Number')</label>
                <div class="col-md-9 col-xs-12">
                    @if($errors->any())
                        <input class="form-control" type="text" name="phoneNumber"
                               placeholder="@lang('Enter') @lang('Phone Number')" value="{{old('phoneNumber')}}">
                    @else
                        <input class="form-control" type="text" name="phoneNumber" @if(auth()->user()->role == 'admin' || auth()->user()->role == 'tracker')readonly @endif
                               placeholder="@lang('Enter') @lang('Phone Number')" value="{{$user->phone}}">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-12">@lang('gender')</label>
                <div class="col-md-9 col-xs-12">
                    <select name="gender" class="form-control" @if(auth()->user()->role == 'admin' && !$errors->any() || auth()->user()->role == 'tracker')disabled @endif>
                        @if($errors->any())
                            <option value="male" @if(old('gender')=='male')selected @endif>@lang('male')</option>
                            <option value="female" @if(old('gender')=='female')selected @endif>@lang('female')</option>
                        @else
                            <option value="male" @if($user->gender == 'male')selected @endif>
                                @lang('male')</option>
                            <option value="female" @if($user->gender == 'female')selected @endif>
                                @lang('female')</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-12">@lang('Department')</label>
                <div class="col-md-9 col-xs-12">
                    <select class="form-control" name="department" @if(auth()->user()->role == 'admin' && !$errors->any() || auth()->user()->role == 'tracker')disabled @endif>
                        @if(old('department') == null && $user->department_id == null)
                            <option disabled id="holder" selected>@lang('-Select Department-')</option>
                        @else
                            <option id="holder" disabled>@lang('-Select Department-')</option>
                        @endif
                        @foreach($departments as $department)
                            @if(old('department') == $department->id)
                                <option value="{{$department->id}}" selected>{{$department->name}}</option>
                            @elseif(!$errors->any() && $department->id == $user->department_id )
                                <option value="{{$department->id}}" selected>{{$department->name}}</option>
                            @else
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="btn-right" >
                @if (!(auth()->user()->role == 'tracker' ))
                <button type="submit" id="submit" class="btn btn-primary"
                        @if(auth()->user()->role == 'admin' && !$errors->any() && session('status') == null ) style="display: none" @endif>
                    @lang('Edit')</button>
                @endif
            </div>
                <input type="hidden" name="id" value="{{$user->id}}">
            </div>
        </form>
        <form action="/delete/user" method="POST" id="form-delete">
            {{csrf_field()}}
            {{method_field('delete')}}
            <input type="hidden" name="id" value="{{$user->id}}">
        </form>
    </main>
    <script>
        var edit = document.getElementById('edit');
        var inputs = document.getElementsByClassName('form-control');
        var btn = document.getElementById('submit');
        var btn2 = document.getElementById('delete');
        var form = document.getElementById('form-delete');
        edit.addEventListener('click',function(){
            for(var i=0 ; i<inputs.length ; i++){
                inputs[i].readOnly = false;
                inputs[i].disabled = false
            }
            btn.style.display = 'inline';
        });
        btn2.addEventListener('click',function(){
            var confirmed = deleteConfirm();
           if(confirmed)form.submit();
        });
        function deleteConfirm(){
            return confirm('are you sure you want to delete this department');
        }
    </script>
@endsection

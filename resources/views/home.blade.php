@extends('layouts\app')
@section('nav')
    <div>
        <ul class="breadcrumb">
            <li class="active"><a>@lang('Home')</a></li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
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
        </div>

        <div class="row">
            <div class="col-md-5 pull-left">
                <h1 class="text-center">@lang('Add Employee') </h1>
                <hr>
                <form method="post" action="addemp" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-md-4">@lang('First Name')</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="firstName" placeholder=@lang('Enter First Name') value="{{old('firstName')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">@lang('Last Name') </label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="lastName" placeholder=@lang('Enter Last Name') value="{{old('lastName')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">@lang('Email') </label>
                        <div class="col-md-8">
                            <input class="form-control" type="email" name="email" placeholder=@lang("Enter Email")  value="{{old('email')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">@lang('Password') </label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="password" placeholder=@lang("Enter Password")  >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">@lang('Job Title') </label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="jobTitle" placeholder=@lang("Enter Job Title")  value="{{old('jobTitle')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">@lang('Phone Number') </label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="phoneNumber" placeholder=@lang("Enter Phone Number")  value="{{old('phoneNumber')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">@lang('Department')</label>
                        <div class="col-md-8">
                            <select class="form-control" name="department">
                                @if(old('department') == null)
                                    <option disabled selected>@lang('-Select Department-')</option>
                                @else
                                    <option disabled>@lang('-Select Department-')</option>
                                @endif
                                @foreach($departments as $department)
                                    @if(old('department') == $department->id)
                                        <option value="{{$department->id}}" selected>{{$department->name}}</option>
                                    @else
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success col-md-offset-5" type="submit" value=@lang("Add Emplyee") >
                    </div>
                </form>

            </div>
            <div class="col-md-5 pull-right">
                <h1>@lang('Add department') </h1>
                <hr>
                <form action="d-department" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-md-4">@lang('Department Name') </label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="department" placeholder=@lang("Enter Department Name") >
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success col-md-offset-4" type="submit" value=@lang("Add Department") >
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach($departments as $department)
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{$department->name}}
                            @if($department->employees->count() < 1)
                                <button class="btn btn-danger btn-sm pull-right"><a
                                            href="/deletDepartment/{{$department->id}}">X</a></button>@endif
                        </div>
                        <div class="panel-body">
                            <ul>
                                @foreach($department->employees as $employee)
                                    <li>
                                        {{$employee->first_name}} {{$employee->last_name}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

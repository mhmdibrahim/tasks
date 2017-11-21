@extends('layouts\app')
@section('nav')
    <div>
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">Edit Profile</li>
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
        <form method="post" action="/edit" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label col-md-4">First Name</label>
                <div class="col-md-4">
                    @if($errors->any())
                        <input class="form-control" type="text" name="firstName"
                               placeholder="Enter First Name" value="{{old('firstName')}}">
                    @else
                        <input class="form-control" type="text" name="firstName"
                               placeholder="Enter First Name" value="{{auth()->user()->first_name}}">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Last Name</label>
                <div class="col-md-4">
                    @if($errors->any())
                        <input class="form-control" type="text" name="lastName"
                               placeholder="Enter Last Name" value="{{old('lastName')}}">
                    @else
                        <input class="form-control" type="text" name="lastName"
                               placeholder="Enter Last Name" value="{{auth()->user()->last_name}}">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Email</label>
                <div class="col-md-4">
                    @if($errors->any())
                        <input class="form-control" type="email" name="email"
                               placeholder="Enter Email" value="{{old('email')}}">
                    @else
                        <input class="form-control" type="email" name="email"
                               placeholder="Enter Email" value="{{auth()->user()->email}}">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Job Title</label>
                <div class="col-md-4">
                    @if($errors->any())
                        <input class="form-control" type="text" name="jobTitle"
                               placeholder="Enter Job Title" value="{{old('jobTitle')}}">
                    @else
                        <input class="form-control" type="text" name="jobTitle"
                               placeholder="Enter Job Title" value="{{auth()->user()->job_title}}">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Phone Number</label>
                <div class="col-md-4">
                    @if($errors->any())
                        <input class="form-control" type="text" name="phoneNumber"
                               placeholder="Enter Phone Number" value="{{old('phoneNumber')}}">
                    @else
                        <input class="form-control" type="text" name="phoneNumber"
                               placeholder="Enter Phone Number" value="{{auth()->user()->phone}}">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Department</label>
                <div class="col-md-4">
                    <select class="form-control" name="department">
                        @if(old('department') == null && auth()->user()->department_id == null)
                            <option disabled selected>-Select Department-</option>
                        @else
                            <option disabled>-Select Department-</option>
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
            <div class="form-group">
                <input class="btn btn-success col-md-offset-5" type="submit" value="Add Emplyee">
            </div>
        </form>
    </div>
@endsection

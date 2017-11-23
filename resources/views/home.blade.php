@extends('layouts.master')
@section('content')
    <main class="container">
        <div>
            <ul class="breadcrumb">
                <li class="active"><a>@lang('Home')</a></li>
            </ul>
        </div>
        <section>
            <div class="row">
                <div class="col-xs-12">
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
        </section>
        <section class="row addSec">
            <aside class="col-md-6">
                <form method="post" action="/addemp">
                {{csrf_field()}}
                <!--  General -->
                    <div class="form-group">
                        <h2 class="heading">@lang('Add Employee')</h2>
                        <div class="controls">
                            <input type="text" id="firstName" class="floatLabel" name="firstName" value="{{old('firstName')}}">
                            <label for="firstName">@lang('First Name')</label>
                        </div>
                        <div class="controls">
                            <input type="text" id="lastName" class="floatLabel" name="lastName" value="{{old('lastName')}}">
                            <label for="lastName">@lang('Last Name')</label>
                        </div>
                        <div class="controls">
                            <input type="text" id="email" class="floatLabel" name="email" value="{{old('email')}}">
                            <label for="email">@lang('Email')</label>
                        </div>
                        <div class="controls">
                            <input type="text" id="password" class="floatLabel" name="password">
                            <label for="password">@lang('Password')</label>
                        </div>
                        <div class="controls">
                            <input type="text" id="jobTitle" class="floatLabel" name="jobTitle" value="{{old('jobTitle')}}">
                            <label for="jobTitle">@lang('Job Title')</label>
                        </div>
                        <div class="controls">
                            <input type="tel" id="phoneNumber" class="floatLabel" name="phoneNumber" value="{{old('phoneNumber')}}">
                            <label for="phoneNumber">@lang('Phone Number')</label>
                        </div>
                        <div class="controls">
                            <i class="fa fa-sort"></i>
                            <select class="floatLabel" name="department">
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
                            <label>@lang('Department')</label>
                        </div>
                        <button type="submit" class="btn btn-primary">@lang("Add Emplyee")</button>
                    </div>
                </form>
            </aside>

            <aside class="col-md-6">
                <form action="/d-department" method="post">
                    <!--  Details -->
                    <div class="form-group">
                        <h2 class="heading">@lang('Add department')</h2>
                        <form action="/d-department" method="post">
                            {{csrf_field()}}
                            <div class="controls">
                                <input type="text" id="department" class="floatLabel" name="department">
                                <label for="department">@lang('Department Name')</label>
                            </div>
                            <button type="submit" class="btn btn-primary">@lang("Add Department")</button>
                        </form>


                    </div> <!-- /.form-group -->
                </form>
            </aside>
        </section>
        <hr>
        <!--        added departments     -->
        <section class="row department">
            <h2 class="heading">@lang('Departments')</h2>
            <div class="container">
                @foreach($departments as $department)
                <div class="notification  col-md-6">
                    @if($department->employees->count() < 1)
                    <span  data-id="{{$department->id}}"  class="notification-close"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                    @endif
                    <h3 class="notification-title">{{$department->name}}</h3>
                    <ol class="custom-counter">
                        @foreach($department->employees as $employee)
                        <li>{{$employee->first_name}} {{$employee->last_name}}</li>
                        @endforeach
                    </ol>
                </div>
                @endforeach
            </div>
        </section>
        <form action="/deletDepartment" id="form-delete" method="post">
            {{csrf_field()}}
            <input type="hidden" id="inputId" name="id">
        </form>
    </main>
@endsection
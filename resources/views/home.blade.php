@extends('layouts.master')
@section('content')
    <main class="container ">
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
                           <label for="firstName">@lang('First Name')</label>
                            <input type="text" id="firstName" class="floatLabel form-control" name="firstName" value="{{old('firstName')}}">
                            
                        </div>
                        <div class="controls">
                           <label for="lastName" >@lang('Last Name')</label>
                            <input type="text" id="lastName" class="floatLabel form-control" name="lastName" value="{{old('lastName')}}">
                            
                        </div>
                        <div class="controls">
                             <label for="email">@lang('Email')</label>
                            <input type="text" id="email" class="floatLabel form-control" name="email" value="{{old('email')}}">
                          
                        </div>
                        <div class="controls">
                            <label for="password">@lang('Password')</label>
                            <input type="text" id="password" class="floatLabel form-control" name="password">
                         
                        </div>
                        <div class="controls">
                            <label for="jobTitle">@lang('Job Title')</label>
                            <input type="text" id="jobTitle" class="floatLabel form-control" name="jobTitle" value="{{old('jobTitle')}}">
                           
                        </div>
                        <div class="controls">
                            <label for="phoneNumber">@lang('Phone Number')</label>
                            <input type="tel" id="phoneNumber" class="floatLabel form-control" name="phoneNumber" value="{{old('phoneNumber')}}">
                 
                        </div>
                        <div class="controls">
                            <i class="fa fa-sort"></i>
                            <label>@lang('Department')</label>
                            <select class="floatLabel form-control" name="department">
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
                        <div class="btn-right">
                            <button type="submit" class="btn btn-primary">@lang("Add Emplyee")</button>
                        </div>
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
                                 <label for="department">@lang('Department Name')</label>
                                <input type="text" id="department" class="floatLabel" name="department">
                              
                            </div>
                          <div class="btn-right">
                            <button type="submit" class="btn btn-primary">@lang("Add Department")</button>
                            </div>
                        </form>


                    </div> <!-- /.form-group -->
                </form>
            </aside>
        </section>
        <hr>
        <!--        added departments     -->
        <section class="row container department">
        
        
        
        
        <section class="row department">
            <br>
            <h2 class="heading">@lang('Departments')</h2>
            <div class="container">
                <div class="row">
                    @forelse($departments as $department)
                    <div class="col-lg-6">
                        <div class=" department-box">
                            <div class="dep-title">
                                <h3 class="left">{{$department->name}} </h3>
                                <a class="close-icon btn pull-right"><i class="fa fa-close"></i>Delete</a>
                            </div>
                            <div class="dep-box-content auto-height">
                                <!--<div class="emp-title">
                                     <h5 class="pull-left">Department Employees</h5>
                                 <span class=" pull-right">View All Employess </span>
                                </div>-->
                                <div class="employees-list">
                                    @forelse($department->employees as $employee)
                                    <div class="row col-md-12 col-xs-12 list-element">
                                        <div class="col-md-2 col-xs-2">
                                            <a href="profile.html" ><img alt="" class="img-circle"  src="/images/Blank_Avatar.png" ></a>
                                        </div>
                                        <div class="col-md-10 col-xs-10">
                                            <strong class=" name">{{$employee->first_name}} {{$employee->last_name}}</strong>
                                            <div class=" col-md-12 col-xs-12 emp-info">
                                                <p class="  job-title">{{$employee->job_title}}</p>
                                                <p class= "phone">{{$employee->phone}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @empty @lang('No Employees')
                                    @endforelse
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-md-6 col-xs-6">
                                    <div class="font-bold">Employees Count</div>
                                    <strong>{{$department->employees->count()}}</strong>
                                </div>

                            </div>
                        </div>
                    </div>

                    @empty @lang('No Departments')
                    @endforelse
                </div>
            </div>
        </section>
        
        
        
        
        
        
        
        
        
        
<!--



        <section class="row department">
            <h2 class="heading">@lang('Departments')</h2>
            <div class="">
                @foreach($departments as $department)
                <div class="notification  col-md-6">
                    @if($department->employees->count() < 1)
                        <span  data-id="{{$department->id}}"  class="notification-close">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </span>
                    @endif
                    <h3 class="notification-title">{{$department->name}}</h3>
                    <ol class="custom-counter auto-height">
                        @foreach($department->employees as $employee)
                        <li>{{$employee->first_name}} {{$employee->last_name}}</li>
                        @endforeach
                    </ol>
                </div>
                @endforeach
            </div>
        </section>
-->
        <form action="/deletDepartment" id="form-delete" method="post">
            {{csrf_field()}}
            <input type="hidden" id="inputId" name="id">
        </form>
    </main>
@endsection
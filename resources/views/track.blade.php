@extends('layouts.master')
@section('content')
    <main class="container">
        <!--        added departments     -->
        
        <section class="row department">
            <br>
            <h2 class="heading">@lang('Departments')</h2>
            <div>
                <ul class="breadcrumb">
                    <li class="active">@lang('Home')</li>
                </ul>
            </div>
            <div class="container">
                <div class="row">
                    @forelse($departments as $department)
                    <div class="col-lg-6">
                        <div class=" department-box">
                            <div class="dep-title">
                                <h3 class="left">{{$department->name}} </h3><br/>
                            </div>
                            <div class="dep-box-content auto-height">
                                <!--<div class="emp-title">
                                     <h5 class="pull-left">Department Employees</h5>
                                 <span class=" pull-right">View All Employess </span>
                                </div>-->
                                <div class="employees-list">
                                    @forelse($department->employees as $employee)
                                    <div class="col-md-12 list-element">
                                        <div class="col-md-2">
                                            <a href="profile.html" class="pull-left"><img alt="" class="img-circle"  src="/images/Blank_Avatar.png" ></a>
                                        </div>
                                        <div class="col-md-10">
                                            <strong class=" col-xs-12 name">{{$employee->first_name}} {{$employee->last_name}}</strong>
                                            <div class="col-md-12 emp-info">
                                                <p class="col-md-6 col-xs-12  job-title">{{$employee->job_title}}</p>
                                                <p class="col-md-6 col-xs-12 phone">{{$employee->phone}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @empty @lang('No Employees')
                                    @endforelse
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-md-6 col-xs-6">
                                    <div class="font-bold">TASKS NUMBER</div>
                                    <strong>12</strong>
                                </div>
                                <div class="col-md-6 col-xs-6 text-right ">
                                    <a href="/track/{{$department->id}}" class="btn btn-primary">@lang('View All Tasks')</a>
                                </div>
                            </div>
                        </div>
                    </div>
<!--
                <div class="notification  col-md-6">
                <h3 class="notification-title"> {{$department->name}}</h3>
                <ol class="custom-counter1 auto-height">
                    @forelse($department->employees as $employee)
                        <ul> <span class="Emp-Name">{{$employee->first_name}} {{$employee->last_name}}</span>
                        <li><span class="title">@lang('Job Title'):</span><p class="description">{{$employee->job_title}}</p></li>
                        <li><span class="title">@lang('Tel'):</span><p class="description">{{$employee->phone}}</p></li>
                    </ul>
                    @empty @lang('No Employees')
                    @endforelse
                </ol>
                <div class="footer">
                    <a href="/track/{{$department->id}}" class="btn btn-default">@lang('Details')</a>
                </div>
            </div>
-->
                    @empty @lang('No Departments')
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection

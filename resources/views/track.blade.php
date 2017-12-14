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
                @forelse($departments as $department)
                <div class="row">
                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-title">
                           
                            <h3 class="left">{{$department->name}} </h3><br/>
                        </div>
                        
                           
                        <div class="ibox-content auto-height">
<!--
                            <div class="emp-title">
                                 <h5 class="pull-left">Department Employees</h5>
                             <span class=" pull-right">View All Employess </span>
                            </div>
-->
                           
                            <div class="feed-activity-list">
                                 <ol>
                                    <div class="feed-element">
                                        <div class="media-body ">
                                            @forelse($department->employees as $employee)
                                            <ul>
                                            <strong>{{$employee->first_name}} {{$employee->last_name}}</strong><br>
                                            <li>
                                                <a href="profile.html" class="pull-left">
                                                    <img alt="" class="img-circle" src="/images/Blank_Avatar.png" >
                                                </a>
                                            </li>
                                            <small class="text-muted">{{$employee->job_title}}</small>-
                                            <small class="text-muted">{{$employee->phone}}</small>
                                            </ul>
                                            @empty @lang('No Employees')
                                            @endforelse
                                        </div>
                                     </div>
                                    </ol>
                                </div>

                                <div class="feed-element">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="" class="img-circle" src="/images/Blank_Avatar.png" >
                                    </a>
                                    <div class="media-body ">
                                        <strong>Employee Name</strong><br>
                                        <small class="text-muted">Job Title</small>
                                        <small class="text-muted">Phone Number</small>
                                    </div>
                                </div>

                                <div class="feed-element">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="" class="img-circle" src="/images/Blank_Avatar.png" >
                                    </a>
                                    <div class="media-body ">
                                        <strong>Employee Name</strong><br>
                                        <small class="text-muted">Job Title</small>
                                        <small class="text-muted">Phone Number</small>
                                    </div>
                                </div>
                                <div class="feed-element">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="" class="img-circle" src="/images/Blank_Avatar.png" >
                                    </a>
                                    <div class="media-body ">
                                        <strong>Employee Name</strong><br>
                                        <small class="text-muted">Job Title</small>
                                        <small class="text-muted">Phone Number</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row  card-footer">
                                <div class="col-sm-6">
                                    <div class="font-bold">TASKS NUMBER</div>
                                    12
                                </div>
                                
                                <div class="col-sm-6 text-right ">
                                    <button class="btn btn-primary btn-block m-t"> All Tasks</button>
                                </div>
                            </div>

                        </div>
                    </div>
                  
                   
                
             
                   
                </div>
            </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
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
                @empty @lang('No Departments')
                @endforelse
            </div>
        </section>
    </main>
@endsection

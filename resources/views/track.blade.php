@extends('layouts.master')
@section('content')
    <main class="container">
        <!--        added departments     -->

        <section class="row department">
            <br>
            <h2 class="heading">@lang('Departments')</h2>
            <div class="container">
                <div class="row">
                    @forelse($departments as $department)
                    <div class="col-lg-6">
                        <div class=" department-box">
                            <div class="dep-title">
                                <h3 class="left">{{$department->name}} </h3><br/>
                            </div>
                            <div class="dep-box-content auto-height">
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
                                    <div class="font-bold">TASKS NUMBER</div>
                                    <strong>{{$department->tasks->count()}}</strong>
                                </div>
                                <div class="col-md-6 col-xs-6 text-right ">
                                    <a href="/track/{{$department->id}}" class="btn btn-primary">@lang('View All Tasks')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty @lang('No Departments')
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection

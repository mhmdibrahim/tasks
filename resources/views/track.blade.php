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

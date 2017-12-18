@extends('layouts.master')
@section('content')
    <main class="container">
        <section class="row department">
           
            <h2 class="heading">@lang('Department Employees Tasks')</h2>
            <div>
                <ul class="breadcrumb">
                    <li><a href="/">@lang('Home')</a></li>
                    <li><a href="/track/{{$department->id}}">@lang('Show Department Tasks')</a></li>
                    <li class="active">@lang('Show Department Employees Tasks')</li>
                </ul>
            </div>
            <section class="addSec">
                <form id="form" method="GET">
                    <div class="form-group date-form">
                        <div class="controls DateControl">
                            <label for="arrive" class="label-date">&nbsp;&nbsp;@lang('Choose date')</label>
                            <input class="form-control " type="date" id="myID" class="floatLabel" name="date" value="{{$date}}">
                        </div>
                    </div>
                </form>
            </section>
            <section>
              
                <div class="container tasks">
                    @forelse($department->employees as $employee)
                        <div class="notification ">
                            <h3 class="notification-title"><img alt="" class="img-circle"  src="/images/Blank_Avatar.png" width="30" height="30"><span>{{$employee->first_name}} {{$employee->last_name}}</span></h3>
                            <ol class="emp-tasks">
                                @forelse($employee->tasks as $task)
                                    <li class="task">{{$task->content}}</li>
                                @empty<div class="task">@lang('No Tasks')</div> 
                                @endforelse
                            </ol>
                        </div>
                    @empty @lang('No Employees')
                    @endforelse
                </div>
            </section>
        </section>
    </main>
@endsection
@section('scripts')
    <script>
        var date = document.getElementById('myID');
        var form = document.getElementById('form');
        date.addEventListener('change',function () {
            form.submit();
        });
    </script>
@endsection

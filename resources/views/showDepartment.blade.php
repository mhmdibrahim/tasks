@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="/css/default.css">
@endsection
@section('content')
    <main class="container ">
        <section class=" department">

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
                        <h2 for="arrive" class="heading">&nbsp;&nbsp;@lang('Choose date')</h2>
                        <div class="controls DateControl">
                            <label for="arrive" class="label-date">&nbsp;&nbsp;@lang('Choose date')</label>
                            <input class="form-control " type="date" id="myID" class="floatLabel" name="date"
                                   value="{{$date}}">
                        </div>
                    </div>
                </form>
            </section>
            <section>

                <div class="container tasks">
                    @forelse($department->employees as $employee)
                        <div class="notification ">
                            <h3 class="notification-title"><img alt="" class="img-circle" src="/images/Blank_Avatar.png"
                                                                width="30"
                                                                height="30"><span>{{$employee->first_name}} {{$employee->last_name}}</span>
                            </h3>
                            <ol class="emp-tasks">
                                @forelse($employee->tasks as $task)
                                    <li class="task">{{$task->content}}</li>
                                @empty
                                    <div class="task">@lang('No Tasks')</div>
                                @endforelse
                            </ol>
                        </div>
                    @empty
                        <div class="icon text-center">
                            <div class="block">
                                <i class="fa fa-user-times" aria-hidden="true"></i>
                                <p>@lang('No Employees')</p>
                            </div>
                            @endforelse
                        </div>
                </div>

            </section>
        </section>
    </main>
@endsection
@section('scripts')
    <script>
        var date = document.getElementById('myID');
        var form = document.getElementById('form');
        date.addEventListener('change', function () {
            form.submit();
        });
    </script>
@endsection

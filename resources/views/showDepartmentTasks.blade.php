@extends('layouts.master')
@section('styles')
    @if($tasks <1)
        <link rel="stylesheet" href="/css/default.css">
    @endif
@endsection
@section('content')
    <main class="container @if($tasks <1) default @endif">
        <!--        employee details     -->
        <section class="row department">
            <h2 class="heading">@lang('Department Tasks')</h2>
            <div>
                <ul class="breadcrumb">
                    <li><a href="/">@lang('Home')</a></li>
                    <li class="active">@lang('Show Department Tasks')</li>
                </ul>
            </div>
            <section class="addSec">
                <form id="form" method="GET">
                    <div class="form-group date-form">
                        <div class="controls DateControl">
                            <label for="arrive" class="label-date">&nbsp;&nbsp;@lang('Choose date')</label>
<!--                                <input type="date" id="arrive" class="floatLabel" name="date" value="{{$date}}">-->
                            <input class="form-control " type="date" id="arrive" class="floatLabel" name="date" value="{{$date}}">
                        </div>
                    </div>
                </form>
            </section>
            <div class="tasks-box col-md-12">
                <div class="dep-title">
                    <h3 class="left">{{$department->name}} </h3><br/>
                </div>
                <ol class="tasks-list auto-height">
                    @foreach($department->employees as $employee)
                        @foreach($employee->tasks as $task)
                            <li class="task">{{$task->content}}</li>
                        @endforeach
                    @endforeach
                    @if($tasks<1)
                            <div class="icon text-center">
                                <div class="block">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </div>
                                <p>@lang('No Tasks')</p>
                            </div>
                    @endif
                </ol>
            </div>
            <div class="footer">
                <a href="/moreDetails/{{$department->id}}" class="btn btn-primary">@lang('View Employees Tasks')</a>
            </div>
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
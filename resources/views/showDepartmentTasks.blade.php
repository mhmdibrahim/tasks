@extends('layouts.master')
@section('styles')
    @if($tasks <1)
        <link rel="stylesheet" href="/css/default.css">
    @endif
@endsection
@section('content')
    <main class="container @if($tasks <1) default @endif">
        
        <!--        employee details     -->
        
        <section class="row department ">
            <h2 class="heading">@lang('Department Tasks')</h2>
            <div>
                <ul class="breadcrumb">
                    <li><a href="/">@lang('Home')</a></li>
                    <li class="active">@lang('Show Department Tasks')</li>
                </ul>
            </div>
            <section class="addSec">
                <form id="form" method="GET">
                    <div class="form-group">
                                <div class="controls DateControl">
                                    <label for="arrive" class="label-date">&nbsp;&nbsp;@lang('Choose date')</label>
<!--                                <input type="date" id="arrive" class="floatLabel" name="date" value="{{$date}}">-->
                                    <input class="form-control" type="date" id="arrive" class="floatLabel" name="date" value="{{$date}}">
                                </div>
                    </div>
                </form>
            </section>
            <div class="container">
                <div class="notification  col-md-12">
                    <h3 class="notification-title">{{$department->name}}</h3>
                    <ol class="custom-counter auto-height">
                        @foreach($department->employees as $employee)
                            @foreach($employee->tasks as $task)
                                <li>{{$task->content}}</li>
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
            </div>
        </section>
    </main>
    <div class="footer">
        <a href="/moreDetails/{{$department->id}}" class="btn btn-default">@lang('Details')</a>
    </div>
@endsection
@section('scripts')
    <script>
        var date = document.getElementById('arrive');
        var form = document.getElementById('form');
        date.addEventListener('change',function () {
            form.submit();
        });
    </script>
@endsection
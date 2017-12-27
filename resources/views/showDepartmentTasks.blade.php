@extends('layouts.master')
@section('styles')
    @if($tasks <1)
        <link rel="stylesheet" href="/css/default.css">
    @endif
@endsection
@section('content')
    <main class="container @if($tasks <1) default @endif">
        <div>
            <ul class="breadcrumb">
                <li><a href="/">@lang('Home')</a></li>
                <li class="active">@lang('Show Department Tasks')</li>
            </ul>
        </div>
        <!--        employee details     -->
        <section class="row addSec">
            <form id="form" method="GET">
                <div class="form-group">
                    <div class="grid">
                        <div class="row">
                            <div class="controls">
                                <input type="date" id="arrive" class="floatLabel" name="date" value="{{$date}}">
                                <label for="arrive" class="label-date"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Date</label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <section class="row department margin-top">
            <h2 class="heading">department tasks</h2>
            <div class="container">
                <div class="notification  col-md-6">
                    <h3 class="notification-title">{{$department->name}}</h3>
                    <ol class="custom-counter auto-height">
                        @foreach($department->employees as $employee)
                            @foreach($employee->tasks as $task)
                                <li>{{$task->content}}</li>
                            @endforeach
                        @endforeach
                        @if($tasks <1)
                                <div class="icon text-center">
                                    <div class="block">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </div>
                                    <p>No Tasks ..</p>
                                </div>
                        @endif
                    </ol>
                    <div class="footer">
                        <a href="/moreDetails/{{$department->id}}" class="btn btn-default">@lang('Details')</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
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


@extends('layouts.app')
@section('nav')
    <div>
        <ul class="breadcrumb">
           
            <li><a href="/">@lang('Home')</a></li>
            <li><a href="/track/{{$department->id}}">@lang('Show Department Tasks')</a></li>
            <li class="active">@lang('Show Department Employees Tasks')</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <form  id="form" method="GET">
                <input name="date" type="date"  id="myID" value="{{$date}}">
            </form>
        </div>
        <br>
        
        @forelse($department->employees as $employee)
            <div class="col-md-6">
        
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        {{$employee->first_name}}
                    </div>
                    <div class="panel-body">
                        <ul>
                            @forelse($employee->tasks as $task)
                                <li>{{$task->content}}</li>
                            @empty @lang('No Tasks')
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        @empty @lang('No Employees')
        @endforelse
    </div>
@endsection
@section('script')
    <script>
        var date = document.getElementById('myID');
        var form = document.getElementById('form');
        date.addEventListener('change',function () {
            form.submit();
        });
    </script>
@endsection
@extends('layouts\app')
@section('content')
    <div class="container">
        @forelse($department->employees as $employee)
            <div class="col-md-6">
                <div class="row">
                    <input type="date" id="date" value="{{$date}}">
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        {{$employee->first_name}}
                    </div>
                    <div class="panel-body">
                        <ul>
                            @forelse($employee->tasks as $task)
                                <li>{{$task->content}}</li>
                            @empty No Tasks
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        @empty No Employees
        @endforelse
    </div>
@endsection

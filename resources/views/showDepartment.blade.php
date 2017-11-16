@extends('layouts\app')
@section('content')
    <div class="container">
        <div class="row">
<<<<<<< HEAD
            <form  id="form" method="GET">
                <input name="date" type="date" id="date" value="{{$date}}">
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
@section('script')
<script>
    var date = document.getElementById('date');
    var form = document.getElementById('form');
    date.addEventListener('change',function () {
       form.submit();
    });
</script>
@endsection

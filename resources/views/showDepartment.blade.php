@extends('layouts\app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form  id="form" method="GET" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-2">
                            <input name="date" type="date" id="date" value="{{$date}}" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            {{$date}}
        </div>
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

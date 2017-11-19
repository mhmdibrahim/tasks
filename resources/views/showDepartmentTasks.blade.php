@extends('layouts\app')
@section('content')
    <div class="container">
        <div class="row">
            <form  id="form" method="GET">
                <input name="date" type="date" id="date" value="{{$date}}">
            </form>
        </div>
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{$department->name}}
            </div>
            <div class="panel-body">
                <ul>
                    @forelse($department->employees as $employee)
                        @forelse($employee->tasks as $task)
                            <li>{{$task->content}}</li>
                        @empty
                        @endforelse
                    @empty No Tasks
                    @endforelse
                </ul>
                <a href="/moreDetails/{{$department->id}}">Details</a>
            </div>
        </div>
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

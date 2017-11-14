@extends('layouts\app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>New Task </h1>
            </div>
        </div>
        <form action="/task" method="post" >
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-10">
                    <input class="form-control" type="text" name="task" placeholder="Enter Your Task Here">
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-success" value="ADD">
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-10" >
                @forelse($tasks as $task)
                    <div class="row">
                        {{$task->content}}
                    </div>
                @empty
                    <h1>You Have No Tasks</h1>
                @endforelse
            </div>
        </div>
    @endsection

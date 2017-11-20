@extends('layouts\app')
@section('nav')
    <div>
        <ul class="breadcrumb">
            <li class="active">Home</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('status') != null)
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>New Task </h1>
            </div>
        </div>
        <hr>
        <form action="/task" method="post"  class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group">
            <div class="form-group">
                <div class="col-md-10">
                    <input autofocus="autofocus" class="form-control" type="text" name="task" placeholder="Enter Your Task Here">
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-success" value="ADD">
                </div>
            </div>
        </form>
        <hr>
        <div class="row">
            <div class="col-md-12"><h1>Today's Tasks</h1></div>
            <div class="col-md-10">
                <div class="list-group" >
                    @forelse($tasks as $task)
                        <div  class="list-group-item">
                            {{$task->content}}
                        </div>
                    @empty
                        <h1>You Have No Tasks</h1>
                    @endforelse
                </div>
            </div>
        </div>
    @endsection

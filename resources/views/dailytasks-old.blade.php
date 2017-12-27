@extends('layouts.app')
@section('nav')
    <div>
        <ul class="breadcrumb">
            <li class="active">@lang('Home')</li>
        </ul>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="">
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
                    <div class="alert alert-success">{{__(session('status'))}}</div>
                @endif
            </div>
        </div>
        <div class="">
            <div class="col-md-12">
                <h1>@lang('New Task')  </h1>
            </div>
        </div>
        <hr>
        <form action="/task" method="post"  class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group">
            <div class="form-group">
                <div class="col-md-10">
                    <input autofocus="autofocus" class="form-control "id="myID" type="text" name="task" placeholder= @lang('Enter Your Task Here')>
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-success" value= @lang("ADD")>
                </div>
            </div>
        </form>
        <hr>
        <div class="">
            <div class="col-md-12"><h1>@lang("Today's Tasks")</h1></div>
            <div class="col-md-10">
                <div class="list-group" >
                    @forelse($tasks as $task)
                        <div  class="list-group-item">
                            {{$task->content}}
                        </div>
                    @empty
                        <h1>@lang('You Have No Tasks') </h1>
                    @endforelse
                </div>
            </div>
        </div>
    @endsection

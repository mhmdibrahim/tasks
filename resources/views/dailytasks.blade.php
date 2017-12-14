@extends('layouts.master')
@section('styles')
    @if($tasks->count() == 0)
    <link rel="stylesheet" href="/css/default.css">
    @endif
@endsection
@section('content')
    <main class="container @if($tasks->count() == 0) default @endif">
        <div>
            <ul class="breadcrumb">
                <li class="active">@lang('Home')</li>
            </ul>
        </div>
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
                <div class="alert alert-success">{{__(session('status'))}}</div>
            @endif
            </div>
        </div>
        <section class="row enter-task">
            <form action="/task" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                    <h2 class="heading">@lang('New Task')</h2>
                    <div class="controls">
                        <label for="task">@lang('Enter Your Task Here')</label>
                        <input type="text"  id="myID" class="form-control floatLabel" name="task">
  
                    </div>
                    <button type="submit" class="btn btn-primary">@lang('ADD')</button>
                </div>
            </form>
        </section>
        <hr>
        <section class="row task">
            <h2 class="heading">@lang("Today's Tasks")</h2>
            @forelse($tasks as $task)
            <div class="notification">
                <h3 class="notification-title">{{$task->content}}</h3>
            </div>
            @empty
                <div class="icon text-center">
                    <div class="block">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </div>
                    <p>@lang('You Have No Tasks')</p>
                </div>
            @endforelse
        </section>
      
    </main>

@endsection

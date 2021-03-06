@extends('layouts.master')
@section('styles')
    @if($tasks->count() == 0)
    <link rel="stylesheet" href="/css/default.css">
    @endif
@endsection
@section('content')
    <main class="container @if($tasks->count() == 0) default @endif">
        <h2 class="heading">@lang('Tasks')</h2>
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
            @if(session('status') == 1)
                <div class="alert alert-success">@lang('added')</div>
            @elseif(session('status') == 2)
                <div class="alert alert-success">@lang('deleted')</div>
            @endif
            </div>
        </div>
        <section class=" enter-task">
            <form action="/task" method="post" >
                {{csrf_field()}}
                <div class="form-group">
                    <h2 class="heading">@lang('New Task')</h2>
                    <div class="controls">
                       <div class="col-md-1 col-xs-12 pad-0">
                            <label for="task" >@lang('Your Task')</label>
                        </div>
                        <div class="col-md-11 col-xs-12 pad-0">
                            <input type="text"  id="" class="form-control floatLabel " placeholder="@lang('Enter') @lang('your Task here')" name="task">
                        </div>
  
                    </div>
                    <div class="btn-right">
                    <button type="submit" class="btn btn-primary">@lang('ADD')</button></div>
                </div>
            </form>
        </section>
        <hr>
        <section class="row task">
            <h2 class="heading">@lang("Today's Tasks")</h2>
            @forelse($tasks as $task)
            <div class="notification">
                <h3 class="task">
                    {{$task->content}}
                    <form action="/task/delete" method="POST">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <input type="hidden" name="id" value="{{$task->id}}">
                        <button type="button" class="btn btn-danger pull-right">@lang('delete')</button>
                    </form>
                </h3>
            </div>
            @empty
                <div class="icon text-center">
                    <div class="block">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </div>
                    <p>@lang('You Have No Tasks')</p>
                </div>
            @endforelse

                <div class="footer text-right">
                    <a href="/task/previous" class="btn btn-primary">@lang("Yesterday Tasks")</a>
                </div>
        </section>
    </main>
    <script>
        var buttons = document.getElementsByClassName('btn-danger');
        for(var i=0 ; i<buttons.length ; i++){
            buttons[i].addEventListener('click',function(){
                var confirmed = deleteConfirm();
                if(confirmed)this.parentElement.submit();
            });
        }
        function deleteConfirm(){
            return confirm('are you sure you want to delete this tracker');
        }
    </script>

@endsection

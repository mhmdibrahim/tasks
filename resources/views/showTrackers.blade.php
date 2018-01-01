@extends('layouts.master')
<br>
<br>
<br>
@section('content')
    <main class="container">
        <div class="post">
            @if(session('status') == 1)
                <div class="alert alert-success">@lang('Tracker Deleted')</div>
            @endif
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <strong>@lang('Trackers')</strong>
                </div>
                <div class="panel-body">
                    @forelse($trackers as $tracker)
                        <div class=" list-element">
                            <strong class=" name">{{$tracker->first_name}} {{$tracker->last_name}}</strong>
                            <form action="/delete/tracker" method="POST">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <input type="hidden" name="id" value="{{$tracker->id}}">
                                <input type="button" class="btn btn-danger" value="@lang('delete')">
                            </form>
                        </div>
                    @empty
                        <div class="icon text-center">
                            <div class="block">
                                <i class="fa fa-user-times" aria-hidden="true"></i>
                                <p>@lang('No Trackers')</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
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
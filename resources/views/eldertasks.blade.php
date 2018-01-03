@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="/css/default.css">
@endsection
@section('content')
    <main class="container ">
        <section class=" department">
            <section class="addSec">
                <form id="form" method="GET">
                    <div class="form-group date-form">
                        <h2 for="arrive" class="heading">&nbsp;&nbsp;@lang('Choose date')</h2>
                        <div class="controls DateControl">
                            <label for="arrive" class="label-date">&nbsp;&nbsp;@lang('Choose date')</label>
                            <input class="form-control " type="date" id="myID" class="floatLabel" name="date"
                                   value="">
                        </div>
                    </div>
                </form>
            </section>
            <section>

                <div class="container tasks">
                        <div class="notification ">
                            <ol class="emp-tasks">
                                @forelse($tasks as $task)
                                    <li class="task">{{$task->content}}</li>
                                @empty
                                    <div class="task">@lang('No Tasks')</div>
                                @endforelse
                            </ol>
                        </div>
                </div>
            </section>
        </section>
    </main>
@endsection
@section('scripts')
    <script>
        var date = document.getElementById('myID');
        var form = document.getElementById('form');
        date.addEventListener('change', function () {
            form.submit();
        });
    </script>
@endsection

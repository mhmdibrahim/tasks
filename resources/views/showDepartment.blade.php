@extends('layouts.master')
{{--@section('styles')--}}
    {{--@if($tasks <1)--}}
        {{--<link rel="stylesheet" href="/css/default.css">--}}
    {{--@endif--}}
{{--@endsection--}}
@section('content')
    <main class="container">
        <section class="row addSec">
            <form id="form" method="GET">
                <div class="form-group">
                    <div class="grid">
                        <div class="row">
                            <div class="controls">
                                <input type="date" id="arrive" class="floatLabel" name="date" value="{{$date}}">
                                <label for="arrive" class="label-date"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Date</label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <section class="row ">
            <div class="container tasks">
                @forelse($department->employees as $employee)
                    <div class="notification ">
                    <h3 class="notification-title">{{$employee->first_name}} {{$employee->last_name}}</h3>
                    <ol class="custom-counter ">
                        @forelse($employee->tasks as $task)
                            <li>{{$task->content}}</li>
                        @empty @lang('No Tasks')
                        @endforelse
                    </ol>
                </div>
                @empty @lang('No Employees')
                @endforelse
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    <script>
        var date = document.getElementById('arrive');
        var form = document.getElementById('form');
        date.addEventListener('change',function () {
            form.submit();
        });
    </script>
@endsection

@extends('layouts\app')
@section('content')
    <div class="container">
       @forelse($departments as $department)
           <div class="col-md-6">
               <div class="panel panel-primary">
                   <div class="panel-heading">
                       {{$department->name}}
                   </div>
                   <div class="panel-body">
                       <ul>
                           @forelse($department->employees as $employee)
                               <li> <h4>{{$employee->first_name}} {{$employee->last_name}}</h4>
                                   @lang('Job Title') : {{$employee->job_title}} &ensp; &thinsp; &thinsp;
                                   @lang('Tel'): {{$employee->phone}}</li>
                           @empty @lang('No Employees')
                           @endforelse
                       </ul>
                   </div>
                   <div class="panel-footer">
                       <a href="/track/{{$department->id}}">@lang('Details')</a>
                   </div>
               </div>
           </div>
       @empty @lang('No Departments')
       @endforelse
    </div>
@endsection
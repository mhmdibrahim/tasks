@extends('layouts\app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="float: left">
                <h1>Add Employee</h1>
                 <form method="post" action="addemp" >
                    {{csrf_field()}}
                    <div class="row">
                       <label>First Name</label>
                        <input type="text" name="firstName" placeholder="Enter First Name" style="float: right">
                    </div>
                    <div class="row">
                       <label>Last Name</label>
                        <input type="text" name="lastName" placeholder="Enter Last Name" style="float: right">
                    </div>
                    <div class="row">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Enter Email" style="float: right">
                    </div>
                    <div class="row">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter Password" style="float: right">
                    </div>
                    <div class="row">
                    <label>Department</label>
                        <select name="department"   style="float: right ; width: 165px ; height:1.9em ">
                            <option disabled selected>-Select Department-</option>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                     <div class="row" >
                         <input class="btn btn-success col-md-offset-5" type="submit" value="Add Emplyee">

                     </div>
                </form>

            </div>
            <div class="col-md-4" style="float: right">
               <h1>Add department</h1>
                <form action="d-department" method="post">
                    {{csrf_field()}}
                    <div class="row" >
                        <label>Department Name</label>
                        <input type="text" name="department" placeholder="Enter Department Name" >
                    </div>
                    <div class="row">
                        <input class="btn btn-success col-md-offset-4" type="submit" value="Add Department" >
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
           @foreach($departments as $department)
               <div class="col-md-6">
                   <div class="panel panel-primary">
                       <div class="panel-heading">
                           {{$department->name}}
                           @if($department->employees->count() < 1)<button class="btn btn-danger btn-sm pull-right"><a href="/deletDepartment/{{$department->id}}">X</a></button>@endif
                       </div>
                       <div class="panel-body">
                           <ul>
                           @foreach($department->employees as $employee)
                               <li>
                               {{$employee->first_name}}
                               </li>
                           @endforeach
                           </ul>
                       </div>
                   </div>
               </div>
           @endforeach
        </div>
    </div>
@endsection
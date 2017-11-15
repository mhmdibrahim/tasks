@extends('layouts\app')
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
            <div class="col-md-5 pull-left">
                <h1 class="text-center">Add Employee</h1>
                <hr>
                <form method="post" action="addemp" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-md-4">First Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="firstName" placeholder="Enter First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Last Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="lastName" placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Email</label>
                        <div class="col-md-8">
                            <input class="form-control" type="email" name="email" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Password</label>
                        <div class="col-md-8">
                            <input class="form-control" type="password" name="password" placeholder="Enter Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Department</label>
                        <div class="col-md-8">
                            <select class="form-control" name="department">
                                <option disabled selected>-Select Department-</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success col-md-offset-5" type="submit" value="Add Emplyee">
                    </div>
                </form>

            </div>
            <div class="col-md-5 pull-right">
                <h1>Add department</h1>
                <hr>
                <form action="d-department" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-md-4">Department Name</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="department" placeholder="Enter Department Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-success col-md-offset-4" type="submit" value="Add Department">
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach($departments as $department)
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{$department->name}}
                            @if($department->employees->count() < 1)
                                <button class="btn btn-danger btn-sm pull-right"><a
                                            href="/deletDepartment/{{$department->id}}">X</a></button>@endif
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

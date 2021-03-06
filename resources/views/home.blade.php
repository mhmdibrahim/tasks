@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="/css/default.css">
@endsection
@section('content')
    <main class="container ">
        <div>
            <ul class="breadcrumb">
                <li class="active"><a>@lang('Home')</a></li>
            </ul>
        </div>
        <section>
            <div class="row">
                <div class="col-xs-12">
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
        </section>
        <section class="row addSec">
            <aside class="col-md-6">
                <form method="post" action="/addemp">
                {{csrf_field()}}
                <!--  General -->
                    <div class="form-group">
                        <h2 class="heading">@lang('Add Employee')</h2>
                        <div class="controls">
                            <label for="firstName">@lang('First Name')</label>
                            <input type="text" id="firstName" class="floatLabel form-control"
                                   placeholder="@lang('Enter') @lang('First Name')" name="firstName"
                                   value="{{old('firstName')}}">
                        </div>
                        <div class="controls">
                            <label for="lastName">@lang('Last Name')</label>
                            <input type="text" id="lastName" class="floatLabel form-control"
                                   placeholder="@lang('Enter') @lang('Last Name')" name="lastName"
                                   value="{{old('lastName')}}">

                        </div>
                        <div class="controls">
                            <label for="email">@lang('Email')</label>
                            <input type="text" id="email" class="floatLabel form-control"
                                   placeholder="@lang('Enter') @lang('Email')" name="email" value="{{old('email')}}">
                        </div>
                        <div class="controls">
                            <label for="password">@lang('Password')</label>
                            <input type="text" id="password" class="floatLabel form-control"
                                   placeholder="@lang('Enter') @lang('Password')" name="password">
                        </div>
                        <div class="controls">
                            <i class="fa fa-sort"></i>
                            <label for="gender">@lang('gender')</label>
                            <select name="gender" class="floatLabel form-control">
                                <option value="male" @if(old('gender') == 'male') selected @endif>@lang('male')</option>
                                <option value="female"
                                        @if(old('gender') == 'female') selected @endif>@lang('female')</option>
                            </select>
                        </div>
                        <div class="controls">
                            <i class="fa fa-sort"></i>
                            <label for="role">@lang('Role')</label>
                            <select name="role" id="role" class="floatLabel form-control">
                                <option value="regular" selected>@lang('regular')</option>
                                <option value="tracker">@lang('tracker')</option>
                            </select>
                        </div>
                        <div class="controls">
                            <label for="jobTitle" class="optional">@lang('Job Title')</label>
                            <input type="text" id="jobTitle" class="floatLabel form-control optional"
                                   placeholder="@lang('Enter') @lang('Job Title')" name="jobTitle"
                                   value="{{old('jobTitle')}}">
                        </div>

                        <div class="controls">
                            <label for="phoneNumber" class="optional">@lang('Phone Number')</label>
                            <input type="tel" id="phoneNumber" class="floatLabel form-control optional"
                                   placeholder="@lang('Enter') @lang('Phone Number')" name="phoneNumber"
                                   value="{{old('phoneNumber')}}">
                        </div>
                        <div class="controls">
                            <i class="fa fa-sort optional"></i>
                            <label class="optional">@lang('Department')</label>
                            <select class="floatLabel form-control optional" name="department">
                                @if(old('department') == null)
                                    <option disabled selected>@lang('-Select Department-')</option>
                                @else
                                    <option disabled>@lang('-Select Department-')</option>
                                @endif
                                @foreach($departments as $department)
                                    @if(old('department') == $department->id)
                                        <option value="{{$department->id}}"selected>{{$department->name}}</option>
                                    @else
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="btn-right">
                            <button type="submit" class="btn btn-primary">@lang("Add Emplyee")</button>
                        </div>
                    </div>
                </form>
            </aside>
            <aside class="col-md-6">
                <form action="/d-department" method="post">
                    <!--  Details -->
                    <div class="form-group">
                        <h2 class="heading">@lang('Add department')</h2>
                        <form action="/d-department" method="post">
                            {{csrf_field()}}
                            <div class="controls">
                                <label for="department">@lang('Department Name')</label>
                                <input type="text" id="department"
                                       placeholder="  @lang('Enter') @lang('Department Name')" class="floatLabel"
                                       name="department">
                            </div>
                            <div class="btn-right">
                                <button type="submit" class="btn btn-primary">@lang("Add Department")</button>
                            </div>
                        </form>
                    </div> <!-- /.form-group -->
                </form>
            </aside>
        </section>
        <hr>
        <!--        added departments     -->
        <section class="row container department">
            <section class="row department">
                <br>
                <h2 class="heading">@lang('Departments')</h2>
                <div class="container">
                    <div class="row">
                        @forelse($departments as $department)
                            <div class="col-lg-6">
                                <div class=" department-box">
                                    <div class="dep-title">
                                        <h3 class="left">{{$department->name}} </h3>
                                        @if($department->employees->count() == 0)
                                            <form action="/deleteDepartment" id="form" method="post">
                                                {{csrf_field()}}
                                                <a class="delete close-icon  pull-right"><i
                                                            class="fa fa-trash"></i> @lang('Delete')</a>
                                                <input type="hidden" name="id" value="{{$department->id}}">
                                            </form>
                                        @endif

                                    </div>
                                    <div class="dep-box-content auto-height">
                                        <div class="employees-list">
                                            @forelse($department->employees as $employee)
                                                <div class="row col-md-12 col-xs-12 list-element">
                                                    <div class="col-md-2 col-xs-2 pad-0">
                                                        <a href="admin/edit/user/{{$employee->id}}">
                                                            @if($employee->gender == "female" )
                                                            <img alt="" class="img-circle" src="/images/avatar-icono.png">
                                                             @else
                                                                <img alt="" class="img-circle" src="/images/blank_profile_male.jpg">
                                                            @endif
                                                        </a>

                                                    </div>
                                                    <div class="col-md-10 col-xs-10">
                                                        <a href="admin/edit/user/{{$employee->id}}">
                                                            <strong class=" name">{{$employee->first_name}} {{$employee->last_name}}</strong>
                                                        </a>
                                                        <div class=" col-md-12 col-xs-12 emp-info">
                                                            <p class="  job-title">{{$employee->job_title}}</p>
                                                            <p class="phone">{{$employee->phone}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="icon text-center">
                                                    <div class="block">
                                                        <i class="fa fa-user-times" aria-hidden="true"></i>
                                                        <p>@lang('No Employees')</p>
                                                    </div>
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                            <div class="font-bold">@lang ('Employees')</div>
                                            <strong>{{$department->employees->count()}}</strong>
                                    </div>
                                </div>
                            </div>
                        @empty @lang('No Departments')
                        @endforelse
                    </div>
                </div>
            </section>
        </section>
    </main>
    <script>
        var a = document.getElementsByClassName('delete');
        for (var i = 0; i < a.length; i++) {
            a[i].addEventListener('click', function () {
                var confirmed = deleteConfirm();
                if(confirmed)this.parentElement.submit();
            });
        }
        var selectRole = document.getElementById('role');
        var optionalFields = document.getElementsByClassName('optional');
        selectRole.addEventListener('change',function(){
            switchOptionalFields();
        });
        function switchOptionalFields(){
            console.log('function');
            for(var i=0 ; i<optionalFields.length ; i++){
                if(selectRole.value === 'regular'){
                    console.log('first');
                    optionalFields[i].style.display = 'block';
                }else if(selectRole.value === 'tracker'){
                    console.log('second');
                    optionalFields[i].style.display = 'none';
                }
            }
        }
        function deleteConfirm(){
            return confirm('are you sure you want to delete this department');
        }
    </script>
@endsection

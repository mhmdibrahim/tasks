@extends('layouts\app')
@section('content')
    <div class="container">
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
        <h1>Change Password</h1>
        <form action="/change" method="post" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label col-md-3">new password</label>
                <div class="col-md-4">
                    <input type="password" name="newPassword" placeholder="Enter new password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">confirm password</label>
                <div class="col-md-4">
                    <input type="password" name="confirmPassword" placeholder="Enter the password agin" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-md-offset-3">
                    <input type="submit" value="change password" class="form-control btn btn-success">
                </div>
            </div>
        </form>
    </div>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;

class Dashboard extends Controller
{
    public function index(){
        return view('home')
            ->with('departments',Department::all());
    }

    public function createUser(Request $request){
        $request->validate([
            'firstName'=>'required|max:255',
            'lastName'=>'required|max:255',
            'email'=>'required|max:255|email|unique:users,email',
            'password'=>'required|max:255',
            'department'=>'required|exists:departments,id',
            'jobTitle'=>'required|max:255',
            'phoneNumber'=>[
                'required',
                'regex:/^01[0124]\d{8}$/'
            ]
        ]);
        $user = new User();
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->department_id = $request->department;
        $user->password =bcrypt($request->password);
        $user->job_title = $request->jobTitle;
        $user->phone = $request->phoneNumber;
        $user->save();
        return back()->with('status','Employee Added');
    }

    public function createDepartment(Request $request){
        $request->validate([
            'department'=>'required|unique:departments,name'
        ]);
        $department = new  Department();
        $department->name = $request->department;
        $department->save();
        return back()->with('status','Department Added');
    }

    public function deleteDepartment(Request $request){
        Department::destroy($request->id);
        return back()->with('status','Department Deleted');
    }

}

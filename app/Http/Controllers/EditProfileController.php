<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class EditProfileController extends Controller
{
    //
    public function index(){
        return view('editProfile')
            ->with('departments',Department::all());
    }

    public function edit(Request $request){
        $request->validate([
            'firstName'=>'required|max:255',
            'lastName'=>'required|max:255',
            'email'=>'required|max:255|email',
            'department'=>'required|exists:departments,id',
            'jobTitle'=>'required|max:255',
            'phoneNumber'=>[
                'required',
                'regex:/^01[0124]\d{8}$/'
            ]
        ]);

        auth()->user()->first_name = $request->firstName;
        auth()->user()->last_name = $request->lastName;
        auth()->user()->email = $request->email;
        auth()->user()->department_id = $request->department;
        auth()->user()->job_title = $request->jobTitle;
        auth()->user()->phone = $request->phoneNumber;
        auth()->user()->save();
        return back()->with('status','Profile Edited');
    }
}

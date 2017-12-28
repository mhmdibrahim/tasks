<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Illuminate\Validation\Rule;
use App\User;

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
            'email' => ['required','max:255','email',Rule::unique('users','email')->ignore($request->email,'email')],
            'department'=>'required|exists:departments,id',
            'gender'=>'required|exists:users,gender',
            'jobTitle'=>'required|max:255',
            'phoneNumber'=>[
                'required',
                'regex:/^01[0124]\d{8}$/'
            ]
        ]);

        $user = User::find($request->id);
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->department_id = $request->department;
        $user->password =bcrypt($request->password);
        $user->job_title = $request->jobTitle;
        $user->phone = $request->phoneNumber;
        $user->gender = $request->gender;
        $user->save();
        return back()->with('status','Profile Edited');
    }
}

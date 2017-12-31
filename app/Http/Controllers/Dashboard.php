<?php

namespace App\Http\Controllers;

use ClassesWithParents\D;
use Illuminate\Http\Request;
use App\User;
use App\Department;
use Illuminate\Validation\Rule;

class Dashboard extends Controller
{
    public function index(){
        return view('home')
            ->with('departments',Department::with('employees')->latest()->get());
    }

    public function createUser(Request $request){
        $validations = $this->validateRules();
        if ($request->role == 'regular'){
            $validations['jobTitle'] ='required|max:255';
            $validations['phoneNumber'] = [
                'required',
                'regex:/^(\d+\-?\s*\d+)+$/'
            ];
            $validations['department'] = 'required|exists:departments,id';
        }
        $request->validate($validations);
        $user = new User();
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->password =bcrypt($request->password);
        $user->gender = $request->gender;
        $user->role = $request->role;
        if($request->role == 'regular'){
            $user->department_id = $request->department;
            $user->job_title = $request->jobTitle;
            $user->phone = $request->phoneNumber;
        }
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

    public function editUSer($id){
        return view('editProfile')
            ->with('departments',Department::all())
            ->with('user',User::find($id));
    }

    public function deleteUser(Request $request){
        User::destroy($request->id);
        return redirect('/')->with('status','User Deleted');
    }

    public function showTrackers(){
        return view('showTrackers')
            ->with('trackers',User::where('role','tracker')->latest()->get());
    }

    public function deleteTracker(Request $request){
        User::destroy($request->id);
        return back()->with('status',1);
    }

    public function validateRules(){
        return[
            'firstName'=>'required|max:255',
            'lastName'=>'required|max:255',
            'email'=>'required|max:255|email|unique:users,email',
            'password'=>'required|max:255',
            'department'=>'exists:departments,id',
            'gender'=>[
                'required',
                Rule::in(['male','female'])
            ],
            'jobTitle'=>'max:255',
            'role'=>[
                'required',
                Rule::in(['tracker','regular']),
            ]
        ];
    }

}

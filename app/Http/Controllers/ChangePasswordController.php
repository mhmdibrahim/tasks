<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ChangePasswordController extends Controller
{
    //
    public function index(){
        return view('changePassword');
    }

    public function change(Request $request){
        $request->validate([
            'newPassword'=>'required|max:255',
            'confirmPassword'=>'required|max:255|same:newPassword'
        ]);
        auth()->user()->password = bcrypt($request->newPassword);
        auth()->user()->save();
        return back()->with('status','password changed');
    }
}

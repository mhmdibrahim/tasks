<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use App\Department;
use Carbon\Carbon;

class TrackController extends Controller
{
    public function index()
    {
        return view('track')->with('departments', Department::all());
    }
    public function showDepartment(Request $request,$department)
    {
        if($request->date != null){
            $day = $request->date;
        }else{
            $day = Carbon::today()->toDateString();
        }
        $department = Department::with([
            'employees.tasks' => function($query) use($day) {
                $query->where('created_at','>=',(new Carbon($day)))
                        ->where('created_at','<',((new Carbon($day))->addDay()));
            }
        ])->find($department);
        return view('showDepartmentTasks')->with('department',$department)->with('date',$day);
    }
    public function moreDetails(Request $request,$department)
    {
        if($request->date != null){
            $day = $request->date;
        }else{
            $day = Carbon::today()->toDateString();
        }
        $department = Department::with([
            'employees.tasks' => function($query) use($day) {
                $query->where('created_at','>=',(new Carbon($day)))
                    ->where('created_at','<',((new Carbon($day))->addDay()));
            }
        ])->find($department);
        return view('showDepartment')->with('department',$department)->with('date',$day);
    }
}


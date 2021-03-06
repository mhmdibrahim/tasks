<?php

namespace App\Http\Controllers;
use function foo\func;
use Illuminate\Http\Request;
use App\Department;
use Carbon\Carbon;
use App\User ;

class TrackController extends Controller
{
    public function index()
    {
        return view('track')
            ->with('departments', Department::latest()->get());
    }

    public function showDepartment(Request $request,$id)
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
        ])->find($id);
        $tasks = Department::with([
            'employees.tasks' => function($query) use($day) {
                $query->where('created_at','>=',(new Carbon($day)))
                    ->where('created_at','<',((new Carbon($day))->addDay()));
            }
        ])->find($id);
        $tasksCount = $tasks->tasks()->where('tasks.created_at','>=',(new Carbon($day)))
            ->where('tasks.created_at','<',((new Carbon($day))->addDay()))->get()->count();
        return view('showDepartmentTasks')
            ->with('department',$department)
            ->with('date',$day)
            ->with('tasks',$tasksCount);
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
    public function showEmployeeDitails($id){
        return view('editProfile')
            ->with('departments',Department::all())
            ->with('user',User::find($id));
    }
}


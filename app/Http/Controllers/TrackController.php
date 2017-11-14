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
    public function showDepartment($department)
    {
        $department = Department::with([
            'employees.tasks' => function($query) {
                $today = Carbon::today();
                $tomorrow = $today->addDay();
                $query->where('created_at','>=',$today)
                        ->where('created_at','<',$tomorrow);
            }
        ])->find($department);
        return view('showDepartment')->with('department',$department);
    }

}


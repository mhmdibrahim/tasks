<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Carbon\Carbon;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->where('created_at', '>=', Carbon::today())
            ->where('created_at', '<', Carbon::tomorrow())
            ->get();
        return view('dailytasks')->with('tasks', $tasks)
            ->with('id', auth()->user()->id);
    }

    public function addTask(Request $request)
    {
        $request->validate([
            'task' => 'required|max:255'
        ]);
        $task = new Task();
        $task->content = $request->task;
        $task->user_id = auth()->user()->id;
        $task->save();
        return back()->with('status',1);
    }

    public function delete(Request $request){
        Task::destroy($request->id);
        return back()->with('status',2);
    }
}

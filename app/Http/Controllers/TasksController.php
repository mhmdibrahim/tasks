<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        return view('dailytasks')->with('tasks',Task::where('user_id',auth()->user()->id)->get())
            ->with('id',auth()->user()->id);
    }
    public function addTask(Request $request)
    {
        $request->validate([
            'task' => 'required|max:255'
        ]);

        $task = new Task();
        $task->content = $request->task;
        $task->user_id =auth()->user()->id;
        $task->save();
        return redirect('task');
    }
}

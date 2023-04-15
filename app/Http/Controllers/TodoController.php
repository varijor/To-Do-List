<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $task = new Todo;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        error_log($task);
        $task->save();

        return redirect('/');
    }

    public function index()
    {
        $tasks = Todo::all();

        return view('welcome', compact('tasks'));
    }

    public function remove($id)
    {
        $task = Todo::findOrFail($id);
        $task->delete();
        return redirect('/');
    }
}

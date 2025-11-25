<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.form', [
            'model' => new Task(),
            'users' => \App\Models\User::all(),
        ]);
    }

    public function store(TaskRequest $request)
    {
        Task::create(array_merge($request->validated(), [
            'user_id' => 1, // auth()->id(),
        ]));

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        return view('tasks.form', [
            'model' => $task,
            'users' => \App\Models\User::all(),
        ]);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}

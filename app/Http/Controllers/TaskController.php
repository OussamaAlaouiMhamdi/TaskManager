<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    






    public function index(Request $request)
    {
        $filter = $request->query('filter', 'all');

        if ($filter === 'completed') {
            $tasks = Task::where('is_completed', true)->latest()->get();
        } elseif ($filter === 'incomplete') {
            $tasks = Task::where('is_completed', false)->latest()->get();
        } else {
            $tasks = Task::latest()->get();
        }

        return view('tasks.index', compact('tasks', 'filter'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'nullable',
        ]);

        $data['is_completed'] = $request->has('is_completed');

        Task::create($data);

        return redirect()->route('tasks.index')->with('success', 'Task created.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_completed' => 'nullable',
        ]);

        $data['is_completed'] = $request->has('is_completed');

        $task->update($data);

        return redirect()->route('tasks.index')->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted.');
    }
}

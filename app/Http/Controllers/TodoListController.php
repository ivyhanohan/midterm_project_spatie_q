<?php

namespace App\Http\Controllers;



use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index()
    {
        $tasks = TodoList::all();
        return view('todolists.index', compact('tasks'));
    }

    public function create()
    {
        return view('todolists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date'
        ]);

        TodoList::create($request->all());

        return redirect()->route('todolists.index')->with('success', 'Task created successfully.');
    }

    public function edit(TodoList $task)
    {
        if (!Gate::allows('manage-tasks')) {
            abort(403, 'Unauthorized');
        }
        return view('todolists.edit', compact('task'));
    }

    public function update(Request $request, TodoList $task)
    {
        if (!Gate::allows('manage-tasks')) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date'
        ]);

        $task->update($request->all());

        return redirect()->route('todolists.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(TodoList $task)
    {
        if (!Auth::user()->role === 'Administrator') {
            abort(403, 'Unauthorized');
        }

        $task->delete();
        return redirect()->route('todolists.index')->with('success', 'Task deleted successfully.');
    }
}


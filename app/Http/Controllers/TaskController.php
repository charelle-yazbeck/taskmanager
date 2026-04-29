<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
//comment test
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = auth()->user()->tasks();

        if ($request->filter === 'pending') {
            $query->where('status', false);
        } elseif ($request->filter === 'completed') {
            $query->where('status', true);
        }

        $tasks = $query->latest()->get();

        return view('home', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        auth()->user()->tasks()->create($validated);

        return redirect('/')->with('success', 'Your task has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }
        return view('tasks.edit', compact('task'));        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);
        $task->update($validated);
         return redirect('/')->with('success', 'Your task has been updated!');
               
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }
        //$this->authorize('delete', $task); this requires policies
        $task->delete();
        return redirect('/')->with('success', 'Task deleted!');
    }

    public function complete(Task $task){
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        if ($task->status) {
            $task->status = false;
            $task->completed_at = null;
        } else {
            $task->status = true;
            $task->completed_at = now();
        }

        $task->save();

        return redirect('/')->with('success', 'Task status updated!');
    }
}

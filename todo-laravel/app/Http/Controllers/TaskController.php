<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // Get the filter parameters from the request
        $priority = $request->get('priority');
        $status = $request->get('status');
        $due_date = $request->get('due_date');

        // Start with all tasks
        $tasks = Task::query();

        // Apply filters
        if ($priority) {
            $tasks->where('priority', $priority);
        }

        if ($status) {
            $tasks->where('status', $status);
        }

        if ($due_date) {
            $tasks->whereDate('due_date', '=', $due_date);
        }

        // Get the filtered tasks
        $tasks = Task::where('user_id', auth()->id())
            ->when($request->priority, function ($query, $priority) {
                $query->where('priority', $priority);
            })
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->when($request->due_date, function ($query, $dueDate) {
                $query->whereDate('due_date', $dueDate);
            })
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to-do,in progress,done',
            'due_date' => 'nullable|date',
        ]);

        $task = new Task($validated);
        $task->user_id = auth()->id();
        $task->save();
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to-do,in progress,done',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}

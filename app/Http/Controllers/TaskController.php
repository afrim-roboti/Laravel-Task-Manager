<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    // Shfaq listen e te gjitha detyrave me mundesine e filtrimit
    public function index(Request $request)
    {
        $userId = auth()->id(); // Merr ID-në e përdoruesit të autentifikuar
        $filters = $request->only(['status', 'priority']);
        $tasks = $this->taskService->filterTasks($filters, auth()->id());
        return view('tasks.index', compact('tasks'));
    }

    // Shfaq formularin per krijimin e nje detyre të re
    public function create()
    {
        return view('tasks.create');
    }

    // Ruaj detyren e re
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'boolean',
            'priority' => 'integer|between:1,3'
        ]);

        // Shto ID e perdoruesit te autentifikuar te dhanat
        $data['user_id'] = auth()->id();

        $this->taskService->createTask($data);

        return redirect()->route('tasks.index')->with('success', 'Detyra u krijua me sukses.');
    }

    // Shfaq nje detyre specifike
    public function show($id)
    {
        $task = $this->taskService->getTaskById($id);
        return view('tasks.show', compact('task'));
    }

    // Shfaq formularin për përditësimin e një detyre
    public function edit($id)
    {
        $task = $this->taskService->getTaskById($id);
        return view('tasks.edit', compact('task'));
    }

    // Përditëso një detyrë ekzistuese
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'boolean',
            'priority' => 'integer|between:1,3'
        ]);

        $data['status'] = $request->has('status') ? 1 : 0;

        $this->taskService->updateTask($id, $data);

        return redirect()->route('tasks.index')->with('success', 'Detyra u përditësua me sukses.');
    }

    // Fshij një detyrë
    public function destroy($id)
    {
        $this->taskService->deleteTask($id);

        return redirect()->route('tasks.index')->with('success', 'Detyra u fshi me sukses.');
    }
}

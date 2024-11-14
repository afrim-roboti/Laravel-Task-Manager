<?php

namespace App\Http\Controllers;

use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $completedTasksCount = Task::where('status', true)->where('user_id', auth()->id())->count();
        $pendingTasksCount = Task::where('status', false)->where('user_id', auth()->id())->count();
        $totalTasksCount = Task::where('user_id', auth()->id())->count();

        return view('dashboard', compact('completedTasksCount', 'pendingTasksCount', 'totalTasksCount'));
    }
}


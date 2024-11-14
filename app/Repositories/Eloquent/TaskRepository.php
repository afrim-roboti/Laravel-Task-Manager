<?php

namespace App\Repositories\Eloquent;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAllTasks()
    {
        return Task::all();
    }

    public function getTaskById($id)
    {
        return Task::findOrFail($id);
    }

    public function createTask(array $data)
    {
        return Task::create($data);
    }

    public function updateTask($id, array $data)
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        return $task->delete();
    }

    public function filterTasks(array $filters, $userId)
    {
            $query = Task::where('user_id', $userId); // Filtro sipas user_id

            if (isset($filters['status'])) {
                $query->where('status', $filters['status']); // Filtro sipas statusit
            }

            if (isset($filters['priority'])) {
                $query->where('priority', $filters['priority']); // Filtro sipas prioritetit
            }

            return $query->get(); // Kthe detyrat që përputhen me kriteret e filtrimit
    }

}

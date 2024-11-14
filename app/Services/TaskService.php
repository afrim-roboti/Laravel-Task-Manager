<?php

namespace App\Services;

use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks()
    {
        return $this->taskRepository->getAllTasks();
    }

    public function getTaskById($id)
    {
        return $this->taskRepository->getTaskById($id);
    }

    public function createTask(array $data)
    {
        return $this->taskRepository->createTask($data);
    }

    public function updateTask($id, array $data)
    {
        return $this->taskRepository->updateTask($id, $data);
    }

    public function deleteTask($id)
    {
        return $this->taskRepository->deleteTask($id);
    }

    public function filterTasks(array $filters, $userId)
    {
        return $this->taskRepository->filterTasks($filters, auth()->id());
    }
}

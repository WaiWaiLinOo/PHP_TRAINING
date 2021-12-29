<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Contracts\Dao\TaskDaoInterface;
use App\Contracts\Services\TaskServiceInterface;

/**
 * Service class for task.
 */
class TaskService implements TaskServiceInterface
{
    /**
     * task dao
     */
    private $taskDao;
    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }
    public function getTaskList()
    {
        return $this->taskDao->getTaskList();
    }
    public function saveTask(Request $request)
    {
        return $this->taskDao->saveTask($request);
    }
    public function deleteTask(Task $task)
    {
        return $this->taskDao->deleteTask($task);
    }
}

<?php

namespace App\Contracts\Services;

use App\Models\Task;
use Illuminate\Http\Request;

/**
 * Interface for task service
 */
interface TaskServiceInterface
{
    /**
     * To get task list
     * @return array $postList Task list
     */
    public function getTaskList();

    /**
     * To store post
     * @param Request $request request with inputs
     * @return Object $task saved task
     */
    public function saveTask(Request $request);

    /**
     * To delete task
     * @param \App\Models\Task  $task
     * @return string $message message success or not
     */
    public function deleteTask(Task $task);
}

<?php

namespace App\Contracts\Services;

use App\Models\Task;
use Illuminate\Http\Request;


interface TaskServiceInterface
{
    public function getTaskList();
    public function saveTask(Request $request);
    public function deleteTask(Task $task);
}

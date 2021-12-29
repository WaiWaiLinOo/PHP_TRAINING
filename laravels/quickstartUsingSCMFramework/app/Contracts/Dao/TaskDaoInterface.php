<?php

namespace App\Contracts\Dao;

use Illuminate\Http\Request;
use App\Models\Task;

interface TaskDaoInterface
{

    public function getTaskList();
    public function saveTask(Request $request);
    public function deleteTask(Task $task);
}

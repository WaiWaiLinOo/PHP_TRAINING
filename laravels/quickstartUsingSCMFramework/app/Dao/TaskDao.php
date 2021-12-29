<?php

namespace App\Dao;

use App\Contracts\Dao\TaskDaoInterface;
use Illuminate\Http\Request;
use App\Models\Task;


class TaskDao implements TaskDaoInterface
{

    public function getTaskList()
    {
        return Task::orderBy('created_at', 'asc')->get();
    }

    public function saveTask(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return $task;
    }
    public function deleteTask(Task $task)
    {
        return $task->delete();
    }
}

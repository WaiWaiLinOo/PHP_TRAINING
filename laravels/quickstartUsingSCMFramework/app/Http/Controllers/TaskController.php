<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\TaskServiceInterface;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    private $taskInterface;
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }

    public function index()
    {
        $tasks = $this->taskInterface->getTaskList();
        return view('tasks', ['tasks' => $tasks]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('tasks.index')
                ->withInput()
                ->withErrors($validator);
        }

        $task = $this->taskInterface->saveTask($request);

        if ($task) {
            return redirect()
                ->route('tasks.index')
                ->with('success', 'Task created successfully.');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Task $task)
    {
        $result = $this->taskInterface->deleteTask($task);

        if ($result) {
            return redirect()
                ->route('tasks.index')
                ->with('success', 'Task deleted successfully.');
        }
    }
}

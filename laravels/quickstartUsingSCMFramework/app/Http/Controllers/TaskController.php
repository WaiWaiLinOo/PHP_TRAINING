<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\TaskServiceInterface;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * task interface
     */
    private $taskInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->taskInterface->getTaskList();
        return view('tasks', ['tasks' => $tasks]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
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

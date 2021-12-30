@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-8 mx-auto my-2">
    <div class="card mb-5">
      <div class="card-header">
        New Task
      </div>
      <div class="card-body">
        @include('common.errors')
        <form action="{{ route('tasks.store') }}" method="POST" class="form-horizontal">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Task</label>

            <div class="col-sm-6">
              <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
            </div>
          </div>
          <!-- Add Task Button -->
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-default">
                <i class="fa fa-btn fa-plus"></i>Add Task
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    @if (count($tasks) > 0)
    <div class="card-header">
      Current Tasks.
    </div>

    <div class="card-body">
      <table class="table table-striped task-table">
        <thead>
          <th>Task</th>
          <th>&nbsp;</th>
        </thead>
        <tbody>
          @foreach ($tasks as $task)
          <tr>
            <td class="table-text">
              <div>{{ $task->name }}</div>
            </td>
            <td>
              <form action="{{ route('tasks.destroy', [$task->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-danger">
                  <i class="fa fa-btn fa-trash"></i>Delete
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif
  </div>
</div>
@endsection
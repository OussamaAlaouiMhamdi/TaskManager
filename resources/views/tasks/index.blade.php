@extends('layout')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>All Tasks</h1>
    <div>
      <a href="{{ route('tasks.index', ['filter' => 'all']) }}" class="btn btn-outline-secondary btn-sm">All</a>
      <a href="{{ route('tasks.index', ['filter' => 'completed']) }}" class="btn btn-outline-success btn-sm">Completed</a>
      <a href="{{ route('tasks.index', ['filter' => 'incomplete']) }}" class="btn btn-outline-warning btn-sm">Incomplete</a>
    </div>
  </div>

  @if($tasks->isEmpty())
    <p class="text-muted">No tasks yet. <a href="{{ route('tasks.create') }}">Create one</a>.</p>
  @else
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Done</th>
          <th>Title</th>
          <th>Description</th>
          <th>Created</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($tasks as $task)
        <tr>
          <td>
            <!-- toggle completed using small form that PATCHes to update -->
            <form action="{{ route('tasks.update', $task) }}" method="POST" style="display:inline">
              @csrf
              @method('PUT')
              <input type="hidden" name="title" value="{{ $task->title }}">
              <input type="hidden" name="description" value="{{ $task->description }}">
              @if($task->is_completed)
                <input type="hidden" name="is_completed" value="0">
                <button class="btn btn-sm btn-success" type="submit" title="Mark incomplete">✓</button>
              @else
                <input type="hidden" name="is_completed" value="1">
                <button class="btn btn-sm btn-outline-secondary" type="submit" title="Mark complete">○</button>
              @endif
            </form>
          </td>
          <td @if($task->is_completed) style="text-decoration:line-through;color:gray" @endif>
            {{ $task->title }}
          </td>
          <td>{{ \Illuminate\Support\Str::limit($task->description, 80) }}</td>
          <td>{{ $task->created_at->format('Y-m-d') }}</td>
          <td>
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">Edit</a>

            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline" onsubmit="return confirm('Delete this task?')">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  @endif
@endsection

@extends('layout')

@section('content')
  <h1>Edit Task</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('tasks.update', $task) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control">{{ old('description', $task->description) }}</textarea>
    </div>

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" name="is_completed" id="is_completed" {{ old('is_completed', $task->is_completed) ? 'checked' : '' }}>
      <label class="form-check-label" for="is_completed">Completed</label>
    </div>

    <button class="btn btn-primary">Save</button>
    <a class="btn btn-link" href="{{ route('tasks.index') }}">Cancel</a>
  </form>
@endsection

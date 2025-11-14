@extends('layout')

@section('content')
  <h1>Create Task</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('tasks.store') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Category</label>
      <select name="category_id" class="form-control">
        <option value="">-- Select a Category --</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" name="is_completed" id="is_completed" {{ old('is_completed') ? 'checked' : '' }}>
      <label class="form-check-label" for="is_completed">Mark as completed</label>
    </div>

    <button class="btn btn-primary">Create</button>
    <a class="btn btn-link" href="{{ route('tasks.index') }}">Cancel</a>
  </form>
@endsection

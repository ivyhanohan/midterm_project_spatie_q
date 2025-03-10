@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Create New Todo</h2>
    <form action="{{ route('todolists.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('todolists.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection




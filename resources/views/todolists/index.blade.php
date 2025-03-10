@extends('layouts.app')

@section('content')
<div class="container">
    <h2>TODO List</h2>
    <a href="{{ route('todolists.create') }}" class="btn btn-primary">Add Task</a>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        @foreach($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->due_date }}</td>
            <td>{{ $task->status }}</td>
            <td>
                @if(Auth::user()->hasRole('Administrator'))
                <a href="{{ route('todolists.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('todolists.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection




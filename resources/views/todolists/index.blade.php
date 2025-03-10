{{-- @extends('layouts.app')

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


//// --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>TODO List</h2>

    {{-- All users can add a task --}}
    <a href="{{ route('todolists.create') }}" class="btn btn-primary mb-3">Add Task</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->due_date }}</td>
                <td>
                    <span class="badge
                        {{ $task->status == 'Pending' ? 'bg-warning' : ($task->status == 'In Progress' ? 'bg-primary' : 'bg-success') }}">
                        {{ $task->status }}
                    </span>
                </td>
                <td>
                    @if(Auth::user()->hasRole('admin'))
                        {{-- Only admins can edit and delete --}}
                        <a href="{{ route('todolists.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('todolists.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this task?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @else
                        <span class="text-muted">No Actions Available</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection






@extends('template-admin')
@section('title', 'Home')
@section('main')
<div class="container">
    <h1>My Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Create New Project</a>
    <ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('projects.show', $project) }}">{{ $project->name }}</a>
                <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
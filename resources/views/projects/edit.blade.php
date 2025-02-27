@extends('template-wpadmin')
@section('title', 'Home')
@section('main')
<div class="container">
    <h1>Edit Proyek</h1>

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Proyek</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $project->name }}" required>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea id="description" name="description" class="form-control">{{ $project->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $project->start_date }}">
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Tanggal Selesai</label>
            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $project->end_date }}">
        </div>

        <div class="mb-3">
            <label for="isDone" class="form-label">Status</label>
            <select id="isDone" name="isDone" class="form-control">
                <option value="0" {{ !$project->isDone ? 'selected' : '' }}>Belum Selesai</option>
                <option value="1" {{ $project->isDone ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <label for="json">Edit JSON:</label>
        <textarea name="json" id="json" class="form-control" rows="10">{{ json_encode($project->json, JSON_PRETTY_PRINT) }}</textarea>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

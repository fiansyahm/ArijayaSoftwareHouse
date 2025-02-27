@extends('template-wpadmin')
@section('title', 'Home')
@section('main')
<div class="container">
<h1 class="mb-3">Daftar Proyek</h1>

    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Tambah Proyek</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->isDone ? 'Selesai' : 'Belum Selesai' }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
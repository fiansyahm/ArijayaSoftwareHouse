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
                        <a href="/projects/{id}/kanban" class="btn btn-warning btn-sm">Proses</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>




<div class="container">
    <h1>Project Board</h1>

    <div class="row">
        <div class="col-md-4">
            <h3>To Do</h3>
            <div id="todo" class="droppable bg-light p-3">
                @foreach ($projects as $project)
                    @foreach ($project->json as $feature)
                        @if ($feature['status'] == "0")
                            <div class="draggable card p-2" data-project="{{ $project->id }}" data-feature="{{ $feature['id'] }}">
                                {{ $feature['feature'] }} - Assigned to: {{ $feature['assigned_to'] ?? 'None' }}
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <h3>In Progress</h3>
            <div id="progress" class="droppable bg-light p-3">
                @foreach ($projects as $project)
                    @foreach ($project->json as $feature)
                        @if ($feature['status'] == "1")
                            <div class="draggable card p-2 bg-danger text-white" data-project="{{ $project->id }}" data-feature="{{ $feature['id'] }}">
                                {{ $feature['feature'] }} - Assigned to: {{ $feature['assigned_to'] ?? 'None' }}
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>

        <div class="col-md-4">
            <h3>Done</h3>
            <div id="done" class="droppable bg-light p-3">
                @foreach ($projects as $project)
                    @foreach ($project->json as $feature)
                        @if ($feature['status'] == "2")
                            <div class="draggable card p-2 bg-success text-white" data-project="{{ $project->id }}" data-feature="{{ $feature['id'] }}">
                                {{ $feature['feature'] }} - Assigned to: {{ $feature['assigned_to'] ?? 'None' }}
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.draggable').forEach(item => {
            item.draggable = true;
            item.addEventListener('dragstart', event => {
                event.dataTransfer.setData('project', event.target.dataset.project);
                event.dataTransfer.setData('feature', event.target.dataset.feature);
            });
        });

        document.querySelectorAll('.droppable').forEach(zone => {
            zone.addEventListener('dragover', event => {
                event.preventDefault();
            });

            zone.addEventListener('drop', event => {
                event.preventDefault();
                let projectId = event.dataTransfer.getData('project');
                let featureId = event.dataTransfer.getData('feature');
                let newStatus = event.target.id === 'progress' ? "1" : event.target.id === 'done' ? "2" : "0";

                fetch(`/projects/${projectId}/progress/${featureId}`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(response => response.json())
                .then(data => location.reload())
                .catch(error => console.error("Error:", error));
            });
        });
    </script>
</div>

@endsection
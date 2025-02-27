@extends('template-wpadmin')
@section('title', 'Edit Proyek')
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

        @php
            $jsonData = is_string($project->json) ? json_decode($project->json, true) : ($project->json ?? []);
        @endphp

        <h3>Fitur Proyek</h3>
        <div id="features-container">
            @foreach ($jsonData as $index => $feature)
                <div class="card p-3 mb-3 feature-item">
                    <h5>Fitur {{ $index + 1 }}</h5>

                    <div class="mb-2">
                        <label class="form-label">Nama Fitur</label>
                        <input type="text" name="json[{{ $index }}][feature]" class="form-control" value="{{ $feature['feature'] }}" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Status</label>
                        <select name="json[{{ $index }}][status]" class="form-control">
                            <option value="0" {{ $feature['status'] == "0" ? 'selected' : '' }}>To Do</option>
                            <option value="1" {{ $feature['status'] == "1" ? 'selected' : '' }}>In Progress</option>
                            <option value="2" {{ $feature['status'] == "2" ? 'selected' : '' }}>Done</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Stakeholder (PM)</label>
                        <select name="json[{{ $index }}][stakeholder]" class="form-control">
                            <option value="PM 1" {{ $feature['stakeholder'] == "PM 1" ? 'selected' : '' }}>PM 1</option>
                            <option value="PM 2" {{ $feature['stakeholder'] == "PM 2" ? 'selected' : '' }}>PM 2</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Assigned To (Programmer)</label>
                        <select name="json[{{ $index }}][assigned_to]" class="form-control">
                            <option value="Programmer 1" {{ $feature['assigned_to'] == "Programmer 1" ? 'selected' : '' }}>Programmer 1</option>
                            <option value="Programmer 2" {{ $feature['assigned_to'] == "Programmer 2" ? 'selected' : '' }}>Programmer 2</option>
                            <option value="Programmer 3" {{ $feature['assigned_to'] == "Programmer 3" ? 'selected' : '' }}>Programmer 3</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="datetime-local" name="json[{{ $index }}][start]" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($feature['start'])) }}">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="datetime-local" name="json[{{ $index }}][end]" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($feature['end'])) }}">
                    </div>

                    <button type="button" class="btn btn-danger btn-sm remove-feature">Hapus Fitur</button>
                </div>
            @endforeach
        </div>

        <button type="button" id="add-feature" class="btn btn-primary">Tambah Fitur</button>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script>
    document.getElementById('add-feature').addEventListener('click', function () {
        let index = document.querySelectorAll('.feature-item').length;
        let featureHTML = `
            <div class="card p-3 mb-3 feature-item">
                <h5>Fitur Baru</h5>

                <div class="mb-2">
                    <label class="form-label">Nama Fitur</label>
                    <input type="text" name="json[${index}][feature]" class="form-control" required>
                </div>

                <div class="mb-2">
                    <label class="form-label">Status</label>
                    <select name="json[${index}][status]" class="form-control">
                        <option value="0">To Do</option>
                        <option value="1">In Progress</option>
                        <option value="2">Done</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label class="form-label">Stakeholder (PM)</label>
                    <select name="json[${index}][stakeholder]" class="form-control">
                        <option value="PM 1">PM 1</option>
                        <option value="PM 2">PM 2</option>
                    </select>
                </div>

                <div class="mb-2">
                    <label class="form-label">Assigned To (Programmer)</label>
                    <select name="json[${index}][assigned_to]" class="form-control">
                        <option value="Programmer 1">Programmer 1</option>
                        <option value="Programmer 2">Programmer 2</option>
                        <option value="Programmer 3">Programmer 3</option>
                    </select>
                </div>

                <button type="button" class="btn btn-danger btn-sm remove-feature">Hapus Fitur</button>
            </div>
        `;
        document.getElementById('features-container').insertAdjacentHTML('beforeend', featureHTML);
    });

    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-feature')) {
            event.target.closest('.feature-item').remove();
        }
    });
</script>
@endsection









<!-- [
    {
        "id": 1,
        "feature": "Membuat CRUD",
        "status": "0",
        "stakeholder": [
            "Rudi",
            "Ciko",
            "Baim"
        ],
        "assigned_to": "Rudi",
        "start": "2025-02-27 10:00:00",
        "end": "2025-03-01 18:00:00"
    },
    {
        "id": 2,
        "feature": "Membuat Profile",
        "status": "1",
        "stakeholder": [
            "Rudi",
            "Ciko"
        ],
        "assigned_to": "Ciko",
        "start": "2025-02-28 08:30:00",
        "end": "2025-03-02 17:00:00"
    },
    {
        "id": 3,
        "feature": "Membuat Profile",
        "status": "2",
        "stakeholder": [
            "Rudi",
            "Ciko"
        ],
        "assigned_to": "Ciko",
        "start": "2025-02-28 08:30:00",
        "end": "2025-03-02 17:00:00"
    }
] -->

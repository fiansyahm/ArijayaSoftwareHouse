@extends('template-wpadmin')
@section('navbar_menu_project', 'active')
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

        <!-- JSON Features Section -->
        <div class="mb-3">
            <label class="form-label">Fitur Proyek</label>
            <div id="features-container">
                @php
                    $jsonData = $project->json ?? [];
                @endphp
                @foreach($jsonData as $index => $feature)
                    <div class="feature-entry card mb-2 p-3" data-index="{{ $index }}">
                        <input type="hidden" name="json[{{ $index }}][id]" value="{{ $feature['id'] }}">
                        
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <label class="form-label">Fitur</label>
                                <input type="text" name="json[{{ $index }}][feature]" class="form-control" value="{{ $feature['feature'] }}" required>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label class="form-label">Status</label>
                                <select name="json[{{ $index }}][status]" class="form-control">
                                    <option value="0" {{ $feature['status'] == 0 ? 'selected' : '' }}>Belum Selesai</option>
                                    <option value="1" {{ $feature['status'] == 1 ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label class="form-label">Stakeholder</label>
                                <input type="text" name="json[{{ $index }}][stakeholder]" class="form-control" value="{{ implode(',', $feature['stakeholder']) }}" placeholder="Pisahkan dengan koma" required>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label class="form-label">Ditugaskan Kepada</label>
                                <input type="text" name="json[{{ $index }}][assigned_to]" class="form-control" value="{{ $feature['assigned_to'] }}" required>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label class="form-label">Tanggal Mulai</label>
                                <input type="datetime-local" name="json[{{ $index }}][start]" class="form-control" value="{{ str_replace(' ', 'T', $feature['start']) }}" required>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label class="form-label">Tanggal Selesai</label>
                                <input type="datetime-local" name="json[{{ $index }}][end]" class="form-control" value="{{ str_replace(' ', 'T', $feature['end']) }}" required>
                            </div>
                            <div class="col-md-1 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-sm remove-feature">Hapus</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-primary mt-2" id="add-feature">Tambah Fitur</button>
        </div>

        <div class="mb-3">
            <label for="programmers" class="form-label">Programmer</label>
            <div>
                @php
                    $selectedUsers = json_decode($project->programmers, true) ?? [];
                @endphp
                @foreach($users as $user)
                    <input type="checkbox" name="programmers[]" value="{{ $user->id }}" 
                        {{ in_array($user->id, $selectedUsers) ? 'checked' : '' }}>
                    {{ $user->name }}<br>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<!-- JavaScript for Dynamic Form -->
<script>
    document.getElementById('add-feature').addEventListener('click', function() {
        const container = document.getElementById('features-container');
        const index = container.children.length;
        const newFeature = `
            <div class="feature-entry card mb-2 p-3" data-index="${index}">
                <input type="hidden" name="json[${index}][id]" value="${index + 1}">
                
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <label class="form-label">Fitur</label>
                        <input type="text" name="json[${index}][feature]" class="form-control" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Status</label>
                        <select name="json[${index}][status]" class="form-control">
                            <option value="0">Belum Selesai</option>
                            <option value="1">Selesai</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Stakeholder</label>
                        <input type="text" name="json[${index}][stakeholder]" class="form-control" placeholder="Pisahkan dengan koma" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Ditugaskan Kepada</label>
                        <input type="text" name="json[${index}][assigned_to]" class="form-control" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="datetime-local" name="json[${index}][start]" class="form-control" required>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="datetime-local" name="json[${index}][end]" class="form-control" required>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button" class="btn btn-danger btn-sm remove-feature">Hapus</button>
                    </div>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newFeature);
    });

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-feature')) {
            e.target.closest('.feature-entry').remove();
        }
    });
</script>
@endsection
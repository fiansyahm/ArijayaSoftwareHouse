@extends('template-wpadmin')
@section('navbar_menu_project', 'active')
@section('main')
<div class="container">
    <h1>Tambah Proyek</h1>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Proyek</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" id="start_date" name="start_date" class="form-control">
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Tanggal Selesai</label>
            <input type="date" id="end_date" name="end_date" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Programmer</label>
            <div class="border p-2 rounded">
                @foreach($users as $user)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="user_{{ $user->id }}" name="programmers[]" value="{{ $user->id }}">
                        <label class="form-check-label" for="user_{{ $user->id }}">{{ $user->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
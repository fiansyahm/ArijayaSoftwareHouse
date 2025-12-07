@extends('template-wpadmin')
@section('navbar_menu_project', 'active')
@section('main')
<div class="container">
    <h1 class="mb-3">Daftar Proyek</h1>

    @if(Auth::user()->isAdmin=='2' || Auth::user()->isAdmin=='3')
    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Tambah Proyek</a>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>start_date</th>
                <th>end_date</th>
                <th>Status</th>
                @if(Auth::user()->isAdmin=='2')
                <th>Programmers</th>
                @endif
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->end_date }}</td>
                    <td
                        @if ($project->isDone == 0)
                            class="text-danger">Belum Selesai
                        @elseif ($project->isDone == 1)
                            class="text-warning">Progres
                        @elseif($project->isDone == 2)
                            class="text-success">Selesai
                        @elseif($project->isDone == 3)
                            class="text-info">Gagal
                        @elseif($project->isDone == 4)
                            class="text-info-emphasis">Selesai(Tidak Aktif)
                        @endif
                    </td>
                    @if(Auth::user()->isAdmin=='2')
                    <td>
                        @php
                            $selectedUsers = json_decode($project->programmers, true) ?? [];
                        @endphp
                        <ul>
                            @foreach($users as $user)
                                @if(in_array($user->id, $selectedUsers))
                                    <li>{{ $user->name }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    @endif
                    <td>
                        @if(Auth::user()->isAdmin=='2'||Auth::user()->isAdmin=='3')
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                            @if(Auth::user()->isAdmin=='2')
                                <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            @endif

                        @endif
                        <a href="/projects/{{ $project->id }}/kanban" class="btn btn-success btn-sm">Progres</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

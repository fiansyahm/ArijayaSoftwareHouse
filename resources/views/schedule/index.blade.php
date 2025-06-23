@extends('template-wpadmin')
@section('navbar_menu_absence', 'active')
@section('main')
    <h1>Daftar Jadwal</h1>

    <a href="/admin/schedule/create" class="btn btn-success mb-3">Tambah Jadwal</a>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Schedule</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Arrival 1</th>
                    <th scope="col">Arrival 1 End</th>
                    <th scope="col">Departure 1</th>
                    <th scope="col">Departure 1 End</th>
                    <th scope="col">Arrival 2</th>
                    <th scope="col">Arrival 2 End</th>
                    <th scope="col">Departure 2</th>
                    <th scope="col">Departure 2 End</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $schedule->title }}</td>
                        <td>{{ $schedule->isActive == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>{{ $schedule->arrival_time_1_start }}</td>
                        <td>{{ $schedule->arrival_time_1_end }}</td>
                        <td>{{ $schedule->departure_time_1_start }}</td>
                        <td>{{ $schedule->departure_time_1_end }}</td>
                        <td>{{ $schedule->arrival_time_2_start }}</td>
                        <td>{{ $schedule->arrival_time_2_end }}</td>
                        <td>{{ $schedule->departure_time_2_start }}</td>
                        <td>{{ $schedule->departure_time_2_end }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="/admin/schedule/edit/{{ $schedule->id }}" class="btn btn-primary">Edit</a>
                                <a href="/admin/schedule/delete/{{ $schedule->id }}" class="btn btn-danger"onclick="return confirm('Apakah kamu yakin?')">Hapus</a>
                                <a href="/admin/schedule/updateStatus/{{ $schedule->id }}" class="btn btn-success">Active</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

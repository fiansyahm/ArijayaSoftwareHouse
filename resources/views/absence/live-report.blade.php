@extends('template-wpadmin')

@section('navbar_menu_absence', 'active')

@section('main')

<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
<style>
    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }
</style>

<h1 class="text-center my-5">Shift Live Shopee</h1>
<div id="calendar"></div>

<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                @foreach($liveshopees as $item)
                {
                    iddb: '{{ $item["id"] }}',
                    title: '1. {{ $item["shop"] }}',
                    start: '{{ $item["start"] }}',
                    end: '{{ $item["end"] }}',
                    color: '{{ $item["color"] }}',
                    name: '{{ $item["name"] }}',
                    income: '{{ $item["income"] }}',
                    image: '{{ $item["image"] }}',
                },
                @endforeach
            ],
            eventClick: function(info) {
                // Set konten modal
                var modalContent = `
                <p>${info.event.title}</p>
                <p>Waktu Mulai: ${info.event.start.toLocaleDateString()}</p>
                <p>Waktu Selesai: ${info.event.end.toLocaleDateString()}</p>
                <p>Streamer: ${info.event.extendedProps.name || 'No description available'}</p>
                @if(Auth::user()->id == 1)
                    <p>pendapatan: ${info.event.extendedProps.income || 'No description available'}</p>
                    <img class="img-fluid" src="${info.event.extendedProps.image}" alt="image">
                    <a href="/liveshopee/${info.event.extendedProps.iddb}/edit" class="btn btn-primary mt-1">Edit</a>
                    <form action="/liveshopee/${info.event.extendedProps.iddb}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        {{-- confirmasi deete --}}
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                @endif
                `;
                document.getElementById('modalContent').innerHTML = modalContent;

                // Tampilkan modal
                var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                eventModal.show();
            }
        });

        calendar.render();
    });
</script>

<div class="container">
    <h1 class="my-5 text-center">{{ isset($liveshopee) ? 'Edit Laporan Streaming' : 'Tambah Laporan Streaming' }}</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ isset($liveshopee) ? route('liveshopee.update', $liveshopee->id) : route('liveshopee.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($liveshopee))
            @method('PUT')
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" name="id" class="form-control" value="{{ $liveshopee->id }}" readonly>
            </div>
        @endif
        <div class="form-group">
            <label for="name">Nama Streamer</label>
            <select class="form-select" name="name" id="name">
                <option value="{{ Auth::user()->name }}" selected>{{ Auth::user()->name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start">Waktu Mulai</label>
            <input type="datetime-local" name="start" class="form-control" value="{{ old('start', $liveshopee->start ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="end">Waktu Selesai</label>
            <input type="datetime-local" name="end" class="form-control" value="{{ old('end', $liveshopee->end ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="shop">Toko</label>
            <select class="form-select" name="shop" id="shop">
                <option value="arijayaprinting" 
                {{ isset($liveshopee) && $liveshopee->shop == 'arijayaprinting' ? 'selected' : '' }}
                >Arijaya Printing</option>
                <option value="arijayatale"
                {{ isset($liveshopee) && $liveshopee->shop == 'arijayatale' ? 'selected' : '' }}
                >Arijaya Tale</option>
                <option value="akadin"
                {{ isset($liveshopee) && $liveshopee->shop == 'akadin' ? 'selected' : '' }}
                >Akadin</option>
                <option value="toko click"
                {{ isset($liveshopee) && $liveshopee->shop == 'toko click' ? 'selected' : '' }}
                >Toko Click</option>
                <option value="toko cerah"
                {{ isset($liveshopee) && $liveshopee->shop == 'toko cerah' ? 'selected' : '' }}
                >Toko Cerah</option>
                <option value="geraiku makmur"
                {{ isset($liveshopee) && $liveshopee->shop == 'geraiku makmur' ? 'selected' : '' }}
                >Geraiku Makmur</option>
            </select>
        </div>
        <div class="form-group">
            <label for="income">Omset</label>
            <input type="text" name="income" class="form-control" value="{{ old('income', $liveshopee->income ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="image">Screenshoot</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($liveshopee) ? 'Update' : 'Tambah' }}</button>
    </form>
</div>

<!-- Modal HTML -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalContent">
                <!-- Content will be injected here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

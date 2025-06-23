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

<h1>Shift Absensi </h1>
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
              @foreach($absences as $absence)
                {
                  title: '1. {{ $absence["title"] }}',
                  start: '{{ $absence["start"] }}',
                  end: '{{ $absence["end"] }}',
                  color: '{{ $absence["color"] }}',
                },
              @endforeach
            ]
        });

        calendar.render();
    });
</script>



@endsection
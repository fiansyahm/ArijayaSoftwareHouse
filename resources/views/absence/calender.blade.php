@extends('template-wpadmin')

@section('navbar_menu_absence', 'active')

@section('main')
{{-- jika sudah login --}}
    @if(Auth::user()->id == 1)
      <a href="/list-holiday" class="btn btn-success">Tambah Libur</a>
      <a href="/admin/list-gmeet" class="btn btn-primary">Tambah Gmeet</a>
    @endif
    <div id='calendar'></div>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: [
          @foreach($absences as $absence)
            {
              title: '1. {{ $absence["title"] }}',
              start: '{{ $absence["start"] }}',
              color: '{{ $absence["color"] }}',
            },
          @endforeach

          @foreach($absents as $absent)
            {
              title: '2. {{ $absent["title"] }}',
              start: '{{ $absent["start"] }}',
              color: '{{ $absent["color"] }}'
            },
          @endforeach

          @foreach($reports as $report)
            {
              title: '3. {{ $report["title"] }}',
              start: '{{ $report["start"] }}',
              color: '{{ $report["color"] }}'
            },
          @endforeach

          @foreach($holidays as $holiday)
            {
              title: '4. {{ $holiday["title"] }}',
              start: '{{ $holiday["date"] }}',
              color: 'red'
            },
          @endforeach

          @foreach($gmeets as $gmeet)
              {
                  title: "{{ $gmeet['title'] }}",
                  start: "{{ $gmeet['date'] }}",
                  color: 'black',
                  description: "{{ $gmeet['description'] }}<br>Link: <a href='{{ $gmeet['link'] }}'>{{ $gmeet['link'] }}</a>"
              },
          @endforeach


          ],


          eventClick: function(info) {
      
             // Set konten modal
            var modalContent = `
              <p>${info.event.title}</p>
              <p>Date: ${info.event.start.toLocaleDateString()}</p>
              <p>Description: ${info.event.extendedProps.description || 'No description available'}</p>
            `;
            var detail = '';
            if (info.event.title.includes('Hadir')) {
              detail = `<a href="/absence/${info.event.start.getDate().toString().padStart(2, '0')}/${(info.event.start.getMonth() + 1).toString().padStart(2, '0')}/${info.event.start.getFullYear().toString()}/all" class="btn btn-primary">Detail</a>`;
            }
            else if(info.event.title.includes('Izin')){
              detail = `<a href="/absence/${info.event.start.getDate().toString().padStart(2, '0')}/${(info.event.start.getMonth() + 1).toString().padStart(2, '0')}/${info.event.start.getFullYear().toString()}/all" class="btn btn-primary">Detail</a>`;
            }
            else if(info.event.title.includes('Laporan')){
              detail = `<a href="/absence/report/list/${info.event.start.getDate().toString().padStart(2, '0')}/${(info.event.start.getMonth() + 1).toString().padStart(2, '0')}/${info.event.start.getFullYear().toString()}/all" class="btn btn-primary">Detail</a>`;
            }
            document.getElementById('modalContent').innerHTML = modalContent + detail;

            // Tampilkan modal
            var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
            eventModal.show();
          }
        });
        calendar.render();
      });
    </script>

    {{-- buat tabel dengan looping $top_employee --}}
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          <h2 class="text-center mt-5">Absence Ranking This Month</h2>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Poin Absence</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              @foreach($top_employee_absences as $key => $employee)
                <tr>
                  <th scope="row">{{ $no++ }}</th>
                  <td>{{ $key }}</td>
                  <td>{{ $employee }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <h2 class="text-center mt-5">Report Ranking This Month</h2>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Poin Report</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              @foreach($top_employee_reports as $key => $employee)
                <tr>
                  <th scope="row">{{ $no++ }}</th>
                  <td>{{ $key }}</td>
                  <td>{{ $employee }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>


        </div>
      </div>



      <!-- Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
      </div>
      <div class="modal-body" id="modalContent">
        <!-- Konten modal akan diisi secara dinamis -->
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div> --}}
    </div>
  </div>
</div>

@endsection
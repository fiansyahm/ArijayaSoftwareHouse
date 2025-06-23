@extends('template-wpadmin')
@section('navbar_menu_absence', 'active')

@section('main')
<div class="container">
    <h2> Jadwal {{ $active_schedule->title }}</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Schedule</th>
          <th scope="col">Start Time</th>
          <th scope="col">End Time</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Arrival 1</th>
          <td>{{ $active_schedule->arrival_time_1_start }}</td>
          <td>{{ $active_schedule->arrival_time_1_end }}</td>
        </tr>
        <tr>
          <th scope="row">Departure 1</th>
          <td>{{ $active_schedule->departure_time_1_start }}</td>
          <td>{{ $active_schedule->departure_time_1_end }}</td>
        </tr>
        <tr>
          <th scope="row">Arrival 2</th>
          <td>{{ $active_schedule->arrival_time_2_start }}</td>
          <td>{{ $active_schedule->arrival_time_2_end }}</td>
        </tr>
        <tr>
          <th scope="row">Departure 2</th>
          <td>{{ $active_schedule->departure_time_2_start }}</td>
          <td>{{ $active_schedule->departure_time_2_end }}</td>
        </tr>
      </tbody>
    </table>

    <h2>Form Absensi</h2>
    <form id="absence-form" 
    action="/absence/create" method="post"
    >
      @csrf
      <div class="form-group">
        <label for="id_absensi">ID Absensi</label>
        <select class="form-select" name="id_absence" id="id_absence">
            {{-- @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach --}}
            <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
        </select>
      </div>
      <div class="form-group">
        <label for="jenis_absen">Jenis Absen</label>
        <select class="form-select" name="jenis_absen" id="jenis_absen">
            <option value="Masuk">Masuk</option>
            <option value="Pulang">Pulang</option>
        </select>
      </div>
      <div class="form-group" style="display: none">
        <label for="status_absen">Status Absen</label>
        <input type="text" class="form-control" id="status_absen" name="status_absen" readonly>
      </div>
      <div class="form-group" style="display: none">
        <label for="waktu">Waktu</label>
        <input type="text" class="form-control" id="waktu" name="waktu" readonly>
      </div>
      <div class="form-group" style="display: none">
        <label for="posisi_absen">Posisi Absen</label>
        <input type="text" class="form-control" id="posisi_absen" name="posisi_absen" value="Rumah" readonly>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
    
    const absenceForm = document.getElementById('absence-form');
    absenceForm.addEventListener('submit', function(e) {
      var currenttime = new Date();
      var options = {timeZone: "Asia/Jakarta"};
      var formattedDate = currenttime.toLocaleDateString("en-US", options);
      var formattedTime = currenttime.toLocaleTimeString("en-US", {hour12: false});
      var formattedDateTime = currenttime.toISOString().slice(0, 10) + ' ' + formattedTime;
      document.getElementById('waktu').value = formattedDateTime;
      var status_absen = null;
      if (document.getElementById('jenis_absen').value === "Masuk") {
        if (currenttime.getHours() >= {{$active_schedule->arrival_time_1_start_hour}} && currenttime.getHours() < {{$active_schedule->arrival_time_1_end_hour+1}}) {
            if (currenttime.getHours() === {{$active_schedule->arrival_time_1_start_hour}} && currenttime.getMinutes() >= {{$active_schedule->arrival_time_1_start_minute}}) {
                status_absen = "Tepat Waktu";
            } else if (currenttime.getHours() === {{$active_schedule->arrival_time_1_end_hour}} && currenttime.getMinutes() <= {{$active_schedule->arrival_time_1_end_minute}}) {
                status_absen = "Tepat Waktu";
            } else {
                status_absen = "Terlambat";
            }
        } 
        else if(currenttime.getHours() === {{$active_schedule->arrival_time_2_start_hour}} && currenttime.getMinutes() >= {{$active_schedule->arrival_time_2_start_minute}} || currenttime.getHours() <= {{$active_schedule->arrival_time_2_end_hour+1}}){
          if (currenttime.getHours() === {{$active_schedule->arrival_time_2_start_hour}} && currenttime.getMinutes() >= {{$active_schedule->arrival_time_2_start_minute}} || currenttime.getHours() === {{$active_schedule->arrival_time_2_end_hour}} && currenttime.getMinutes() <= {{$active_schedule->arrival_time_2_end_minute}}) {
              status_absen = "Tepat Waktu";
          } else {
              status_absen = "Terlambat";
          }
        }

      } else {
          if((currenttime.getHours() === {{$active_schedule->departure_time_1_start_hour}} && currenttime.getMinutes() >= {{$active_schedule->departure_time_1_start_minute}}) || (currenttime.getHours() === {{$active_schedule->departure_time_1_end_hour}} && currenttime.getMinutes() <= {{$active_schedule->departure_time_1_end_minute}})){
              status_absen = "Tepat Waktu";
          } 
          else if((currenttime.getHours() === {{$active_schedule->departure_time_2_start_hour}} && currenttime.getMinutes() >= {{$active_schedule->departure_time_2_start_minute}}) || (currenttime.getHours() <= {{$active_schedule->departure_time_2_end_hour}} && currenttime.getMinutes() <= {{$active_schedule->departure_time_2_end_minute}})){
              status_absen = "Tepat Waktu";
          }
          // condition if not mbak vina
          // else if((currenttime.getHours() === {{$active_schedule->departure_time_2_start_hour}} && currenttime.getMinutes() >= {{$active_schedule->departure_time_2_start_minute}}) || (currenttime.getHours() === {{$active_schedule->departure_time_2_end_hour}} && currenttime.getMinutes() <= {{$active_schedule->departure_time_2_end_minute}})){
          //     status_absen = "Tepat Waktu";
          // }
      }
      document.getElementById('status_absen').value = status_absen;

      this.submit();
    });
        
    </script>

  </div>
@endsection

@extends('template-wpadmin')

@section('navbar_menu_absence', 'active')

@section('main')
<div class="container">
    <h2>Form Izin</h2>
    @if (session('status'))
        <div class="alert alert-success m-3">
            {{ session('status') }}
        </div>
    @endif
    <form id="absence-form" action="/absence/absent" method="post">
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
      <div class="form-group" style="display: none">
        <label for="waktu">Waktu</label>
        <input type="text" class="form-control" id="waktu" name="waktu" readonly>
      </div>
      <div class="form-group">
        <label for="jenis_absen">Jenis Absen</label>
        <select class="form-select" name="jenis_absen" id="jenis_absen">
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
        </select>
      </div>
      <div class="form-group">
        <label for="reason_absen">Alasan Absen</label>
        <textarea class="form-control" id="reason_absen" name="reason_absen" rows="3"></textarea>
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
      });
      this.submit();
    </script>

  </div>
@endsection

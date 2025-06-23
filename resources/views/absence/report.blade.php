@extends('template-wpadmin')

@section('navbar_menu_absence', 'active')

@section('main')
<div class="container">
    <h2>Form Laporan</h2>
    <form id="absence-form" 
    action="/absence/report" method="post"
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
        <label for="contain">Contain</label>
        <textarea name="description" id="contain" class="form-control" required>{{ old('contain', $templatereport->contain ?? '') }}</textarea>
      </div>
      <div class="form-group" style="display: none">
        <label for="waktu">Waktu</label>
        <input type="text" class="form-control" id="waktu" name="waktu" readonly>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    
    <script>
    CKEDITOR.replace('contain');
    
    const absenceForm = document.getElementById('absence-form');
    absenceForm.addEventListener('submit', function(e) {
      var currenttime = new Date();
      var options = {timeZone: "Asia/Jakarta"};
      var formattedDate = currenttime.toLocaleDateString("en-US", options);
      var formattedTime = currenttime.toLocaleTimeString("en-US", {hour12: false});
      var formattedDateTime = currenttime.toISOString().slice(0, 10) + ' ' + formattedTime;
      document.getElementById('waktu').value = formattedDateTime;
      this.submit();
    });
        
    </script>

  </div>
@endsection

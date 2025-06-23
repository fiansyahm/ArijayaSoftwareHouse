@extends('template-wpadmin')
@section('navbar_menu_absence', 'active')
@section('main')

<h1>Form Tambah Jadwal</h1>
<form method="POST" action="/admin/schedule/create">
  @csrf
  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="isActive">isActive:</label>
    <input type="text" class="form-control" id="isActive" name="isActive">
  </div>
  <div class="form-group">
    <label for="arrivalTime1Start">Arrival Time 1 Start:</label>
    <input type="time" class="form-control" id="arrival_time_1_start" name="arrival_time_1_start">
  </div>
  <div class="form-group">
    <label for="arrivalTime1End">Arrival Time 1 End:</label>
    <input type="time" class="form-control" id="arrival_time_1_end" name="arrival_time_1_end">
  </div>
  <div class="form-group">
    <label for="departureTime1Start">Departure Time 1 Start:</label>
    <input type="time" class="form-control" id="departure_time_1_start" name="departure_time_1_start">
  </div>
  <div class="form-group">
    <label for="departureTime1End">Departure Time 1 End:</label>
    <input type="time" class="form-control" id="departure_time_1_end" name="departure_time_1_end">
  </div>
  <div class="form-group">
    <label for="arrivalTime2Start">Arrival Time 2 Start:</label>
    <input type="time" class="form-control" id="arrival_time_2_start" name="arrival_time_2_start">
  </div>
  <div class="form-group">
    <label for="arrivalTime2End">Arrival Time 2 End:</label>
    <input type="time" class="form-control" id="arrival_time_2_end" name="arrival_time_2_end">
  </div>
  <div class="form-group">
    <label for="departureTime2Start">Departure Time 2 Start:</label>
    <input type="time" class="form-control" id="departure_time_2_start" name="departure_time_2_start">
  </div>
  <div class="form-group">
    <label for="departureTime2End">Departure Time 2 End:</label>
    <input type="time" class="form-control" id="departure_time_2_end" name="departure_time_2_end">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
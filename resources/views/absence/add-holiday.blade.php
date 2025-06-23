@extends('template-wpadmin')

@section('navbar_menu_absence', 'active')

@section('main')
<div class="container">
    <h2>Tambah Holiday</h2>
    @if (session('status'))
        <div class="alert alert-success m-3">
            {{ session('status') }}
        </div>
    @endif
    <form action="/add-holiday" method="post">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
      </div>
      <div class="form-group">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date" placeholder="Enter date">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
@endsection

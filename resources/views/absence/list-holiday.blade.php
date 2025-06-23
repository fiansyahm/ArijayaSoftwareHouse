@extends('template-wpadmin')

@section('navbar_menu_absence', 'active')

@section('main')
<div class="container">
    <h2>List Holiday</h2>
    <a href="/add-holiday" class="btn btn-primary">Add Holiday</a>
    @if (session('status'))
        <div class="alert alert-success m-3">
            {{ session('status') }}
        </div>
    @endif
    {{-- make table holidays and CRUD --}}
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($holidays as $holiday)
          <tr>
            <th scope="row">{{$holiday->title}}</th>
            <td>{{$holiday->date}}</td>
            <td>
              <a href="/edit-holiday/{{ $holiday->id }}" class="btn btn-primary">Edit</a>
              <a href="/delete-holiday/{{ $holiday->id }}" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  </div>
@endsection

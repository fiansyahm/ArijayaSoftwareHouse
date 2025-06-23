@extends('template-wpadmin')

@section('navbar_menu_absence', 'active')

@section('main')
<div class="container mt-5">
  <h1>Manage Gmeets</h1>

  <!-- Form Add/Edit -->
  <div class="card mb-4">
      <div class="card-header">
          {{ isset($editGmeet) ? 'Edit Gmeet' : 'Add Gmeet' }}
      </div>
      <div class="card-body">
          <form action="{{ isset($editGmeet) ? url('/edit-gmeet/' . $editGmeet->id) : url('/add-gmeet') }}" method="POST">
              @csrf
              <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" name="title" id="title" class="form-control" value="{{ $editGmeet->title ?? '' }}" maxlength="50" required>
              </div>
              <div class="mb-3">
                  <label for="link" class="form-label">Link</label>
                  <input type="url" name="link" id="link" class="form-control" value="{{ $editGmeet->link ?? '' }}" maxlength="255" required>
              </div>
              <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea name="description" id="description" class="form-control" rows="4" required>{{ $editGmeet->description ?? '' }}</textarea>
              </div>
              <div class="mb-3">
                  <label for="date" class="form-label">Date</label>
                  <input type="datetime-local" name="date" id="datetime" class="form-control" value="{{ isset($editGmeet) ? date('Y-m-d\TH:i', strtotime($editGmeet->date)) : '' }}" required>
              </div>
              <button type="submit" class="btn btn-primary">
                  {{ isset($editGmeet) ? 'Update Gmeet' : 'Add Gmeet' }}
              </button>
          </form>
      </div>
  </div>

  <!-- Gmeet List -->
  <div class="card">
      <div class="card-header">Gmeet List</div>
      <div class="card-body">
          <table class="table table-bordered">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Link</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($gmeets as $gmeet)
                  <tr>
                      <td>{{ $gmeet->id }}</td>
                      <td>{{ $gmeet->title }}</td>
                      <td><a href="{{ $gmeet->link }}" target="_blank">View Link</a></td>
                      <td>{{ $gmeet->description }}</td>
                      <td>{{ $gmeet->date }}</td>
                      <td>
                          <a href="{{ url('/admin/edit-gmeet/' . $gmeet->id) }}" class="btn btn-warning btn-sm">Edit</a>
                          <a href="{{ url('/admin/delete-gmeet/' . $gmeet->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>

@endsection

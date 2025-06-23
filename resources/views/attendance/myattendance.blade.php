@extends('template-wpadmin')
@section('navbar_menu_absence', 'active')
@section('main')
<div class="container">
        <h1 class="d-flex">Daftar User</h1>
        <div class="d-flex flex-row-reverse bd-highlight container">
            <a href="/create-myattendance" class="btn btn-success">Tambah User</a>
        </div>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
<div class="table-responsive">        
  <table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">phone</th>
        <th scope="col">private phone</th>
        <th scope="col">attendance</th>
        <th scope="col">Email</th>
        <th scope="col">division</th>
        <th scope="col">Manage SKU</th>
        <th scope="col">Jobdescription</th>
        <th scope="col">fitur</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->private_phone }}</td>
        <td>
          @if ($user->attendance === 0)
              Izin
          @elseif ($user->attendance === 1)
              Masuk
          @else
              Unknown
          @endif
        </td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->division }}</td>
        <td>{{ $user->manage_sku }}</td>
        <td>{{ $user->position }}</td>
        <td>
          <a href="/edit-myattendance/{{ $user->id }}" type="button" class="btn btn-warning mx-1">Edit</button>
          <a href="/delete-myattendance/{{ $user->id }}" type="button" class="btn btn-danger"onclick="return confirm('Apakah kamu yakin?')">Delete</button>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection
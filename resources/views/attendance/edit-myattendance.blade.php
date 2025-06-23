@extends('template-wpadmin')
@section('navbar_menu_absence', 'active')
@section('main')
<div class="container">
    <h1 class="my-5">Edit User</h1>
    <form enctype="multipart/form-data" class="mx-5 mb-5" class="ps-checkout__form" action="/update-myattendance/{{$user->id}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name" value="{{$user->name}}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            @if(Auth::user()->id == '1')
            <div class="mb-3">
                <label for="isAdmin" class="form-label">Admin</label>
                <input type="isAdmin" class="form-control @error('isAdmin') is-invalid @enderror" id="isAdmin" name="isAdmin" placeholder="isAdmin" value="{{$user->isAdmin}}">
                @error('isAdmin')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            @endif
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="email" value="{{$user->email}}">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Password Baru">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Hanphone</label>
                <input type="name" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="phone" value="{{$user->phone}}">
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="private_phone" class="form-label">Private Handphone</label>
                <input type="name" class="form-control @error('private_phone') is-invalid @enderror" id="private_phone" name="private_phone" placeholder="private_phone" value="{{$user->private_phone}}">
                @error('private_phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
             <div class="mb-3">
                <label for="division" class="form-label">Division</label>
                <input type="division" class="form-control @error('division') is-invalid @enderror" id="division" name="division" placeholder="division" value="{{$user->division}}">
                @error('division')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="manage_sku" class="form-label">Manage SKU</label>
                <input type="manage_sku" class="form-control @error('manage_sku') is-invalid @enderror" id="manage_sku" name="manage_sku" placeholder="manage_sku" value="{{$user->manage_sku}}">
                @error('manage_sku')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="attendance" class="form-label">Attendance</label>
                <!--<input type="attendance" class="form-control @error('attendance') is-invalid @enderror" id="attendance" name="attendance" placeholder="attendance" value="{{$user->attendance}}">-->
                <select class="form-select @error('attendance') is-invalid @enderror" id="attendance" name="attendance" placeholder="attendance" value="{{$user->attendance}}">
                  <!--<option selected>Open this select menu</option>-->
                  <option selected value="0">Izin</option>
                  <option value="1">Masuk</option>
                </select>
                
                @error('attendance')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary create-confirm">Submit</button>
        </form>
    
</div>
@endsection
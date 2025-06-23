@extends('template-wpadmin')
@section('navbar_menu_absence', 'active')
@section('main')
<div class="container">
    <h1 class="my-5">Tambah User</h1>
    <form enctype="multipart/form-data" class="mx-5 mb-5" class="ps-checkout__form" action="/add-myattendance" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="name" >
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Hanphone</label>
                <input type="name" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="phone" >
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="private_phone" class="form-label">Private Handphone</label>
                <input type="name" class="form-control @error('private_phone') is-invalid @enderror" id="private_phone" name="private_phone" placeholder="private_phone">
                @error('private_phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
             <div class="mb-3">
                <label for="division" class="form-label">Division</label>
                <input type="division" class="form-control @error('division') is-invalid @enderror" id="division" name="division" placeholder="division" >
                @error('division')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="manage_sku" class="form-label">Manage SKU</label>
                <input type="manage_sku" class="form-control @error('manage_sku') is-invalid @enderror" id="manage_sku" name="manage_sku" placeholder="manage_sku" >
                @error('manage_sku')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="attendance" class="form-label">Attendance</label>
                <select class="form-select @error('attendance') is-invalid @enderror" id="attendance" name="attendance" placeholder="attendance">
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
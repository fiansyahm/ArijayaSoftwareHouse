@extends('template-wpadmin')

@section('navbar_menu_affliate', 'active')

@section('main')
<div class="container">
    <h1>Add New Affliate Product</h1>
    <form action="{{ route('affliateproducts.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="url">URL</label>
            <input type="text" name="url" id="url" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="isActive">Status</label>
            <select name="isActive" id="isActive" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
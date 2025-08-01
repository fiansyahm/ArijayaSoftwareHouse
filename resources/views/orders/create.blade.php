@extends('template-admin')
@section('navbar_dashboard', 'active')
@section('main')
<div class="container mb-5">
    <h1 class="text-center mt-5">Form Order Awal</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_name" class="form-label">Nama Customer</label>
            <input class="form-control" type="text" name="customer_name" placeholder="Rudi Pambudi" required>
        </div>  
        <div class="mb-3">
            <label for="phone" class="form-label">Nomor Telepon</label>
            <div class="input-group">
                <span class="input-group-text">62</span>
                <input class="form-control" type="text" name="phone" placeholder="8123456789" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="application_type" class="form-label">Tipe Aplikasi</label>
            <select class="form-control" name="application_type" required>
                <option value="Web">Web</option>
                <option value="Android">Android</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="main_features" class="form-label">Fitur Fitur</label>
            <textarea class="form-control" name="main_features" placeholder="Update Stok, Pencarian, dll" required></textarea>
        </div>
        <div class="mb-3" style="display: none">
            <label for="cost" class="form-label">Harga</label>
            <input class="form-control" type="number" name="cost" step="0.01" placeholder="0" value="0">
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Catatan</label>
            <textarea class="form-control" name="notes" placeholder="Kalau bisa temanya warna biru"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

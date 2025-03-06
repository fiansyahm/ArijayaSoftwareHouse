@extends('template-wpadmin')
@section('navbar_dashboard', 'active')
@section('main')
    <h1 class="text-center">Orders</h1>
    <h1>Form Order</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_name" class="form-label">Nama Customer</label>
            <input class="form-control" type="text" name="customer_name" placeholder="Rudi Pambudi" required>
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
            <textarea class="form-control" name="main_features" placeholder="Fitur-fitur Utama" required></textarea>
        </div>
        <div class="mb-3">
            <label for="cost" class="form-label">Harga</label>
            <input class="form-control" type="number" name="cost" step="0.01" placeholder="0" required>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Catatan</label>
            <textarea class="form-control" name="notes" placeholder="Catatan Singkat"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

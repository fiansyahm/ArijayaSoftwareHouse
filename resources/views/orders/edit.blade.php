@extends('template-admin')
@section('navbar_dashboard', 'active')
@section('main')
<div class="container mb-5">
    <h1 class="text-center mt-5">Edit Order</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="customer_name" class="form-label">Nama Customer</label>
            <input class="form-control" type="text" name="customer_name" value="{{ old('customer_name', $order->customer_name) }}" required>
        </div>  
        <div class="mb-3">
            <label for="application_type" class="form-label">Tipe Aplikasi</label>
            <select class="form-control" name="application_type" required>
                <option value="Web" {{ $order->application_type == 'Web' ? 'selected' : '' }}>Web</option>
                <option value="Android" {{ $order->application_type == 'Android' ? 'selected' : '' }}>Android</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="main_features" class="form-label">Fitur Fitur</label>
            <textarea class="form-control" name="main_features" required>{{ old('main_features', $order->main_features) }}</textarea>
        </div>
        <div class="mb-3" style="display: none">
            <label for="cost" class="form-label">Harga</label>
            <input class="form-control" type="number" name="cost" step="0.01" value="{{ old('cost', $order->cost) }}">
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Catatan</label>
            <textarea class="form-control" name="notes">{{ old('notes', $order->notes) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

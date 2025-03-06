@extends('template-wpadmin')
@section('navbar_dashboard', 'active')
@section('main')
    <h1>Orders</h1>
    <a class="btn btn-success" href="{{ route('orders.create') }}">Create New Order</a>
    <table class="table table-bordered mt-5">
        <tr>
            <th>Customer Name</th>
            <th>Application Type</th>
            <th>Main Features</th>
            <th>Cost</th>
            <th>Notes</th>
            <th>Actions</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->application_type }}</td>
                <td>
                    <textarea rows="5">{{ $order->main_features }}</textarea>
                </td>
                <td>{{ $order->cost }}</td>
                <td>{{ $order->notes }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('orders.edit', $order) }}">Edit</a>
                    <form action="{{ route('orders.destroy', $order) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection


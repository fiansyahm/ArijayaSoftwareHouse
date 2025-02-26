@extends('template-admin')
@section('navbar_pendingpayment','bg-primary text-white')
@section('main')

<h1>Daftar Pending Payment</h1>

<ol class="list-group list-group-numbered">
    @foreach ($pendingpayment as $pendingpayment)
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Id : {{$pendingpayment->id_invitation}}</div>
                <div class="fw-bold">Type : {{$pendingpayment->type}}</div>
                <a href="/pendingpayment/delete/{{ $pendingpayment->id }}">Hapus</a>
                <a href="/invitation-wedding/{{$pendingpayment->id_invitation}}/guest">Show</a>
                <a href="/pendingpayment/accept/{{$pendingpayment->id}}">Accept</a>
            </div>
        </li>
    @endforeach
</ol>

@endsection
@extends('template-wpadmin')
@section('title', 'Home')
@section('main')
<div class="container">
    <h1>Detail Proyek</h1>
    
    <p><strong>Nama:</strong> {{ $project->name }}</p>
    <p><strong>Teknologi:</strong> {{ $project->tech }}</p>
    <p><strong>Deskripsi[Developer Only]:</strong> {{ $project->description }}</p>
    <p><strong>Tanggal Mulai:</strong> {{ $project->start_date }}</p>
    <p><strong>Tanggal Selesai:</strong> {{ $project->end_date }}</p>
    <p><strong>Status:</strong> {{ $project->isDone ? 'Selesai' : 'Belum Selesai' }}</p>

    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Kembali</a>
</div>
 @endsection
<!-- 
 https://chatgpt.com/share/67bfec8e-7e44-8004-bd6b-0c638572f569 -->
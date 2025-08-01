@extends('template-admin')

@section('title', 'Home')

@section('main')
<div class="container my-5">
    <h1 class="mb-4">Detail Proyek</h1>

    <div class="card mb-4 shadow-sm">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $project->thumbnail }}" class="img-fluid rounded-start" alt="Thumbnail Proyek">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->name }}</h5>
                    <p class="card-text"><strong>Deskripsi:</strong> {{ $project->brief }}</p>
                    <p class="card-text"><strong>Teknologi:</strong> {{ $project->tech }}</p>
                    
                    <div class="mt-3">
                        @if($project->demo)
                            <a href="{{ $project->demo }}" target="_blank" class="btn btn-primary me-2">Lihat Demo</a>
                        @endif

                        @if($project->file)
                            <a href="{{ $project->file }}" target="_blank" class="btn btn-success">Download File</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="/our-projects" class="btn btn-secondary">Kembali</a>
</div>
@endsection

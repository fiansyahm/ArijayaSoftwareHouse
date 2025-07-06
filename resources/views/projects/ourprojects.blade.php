@extends('template-admin')

@section('title')
Our Project
@endsection

@section('main')
    {{-- Custom CSS Variables for Dark Blue Theme --}}
    <style>
        :root {
            --bs-primary: #4a90e2; /* A vibrant blue for accents */
            --bs-dark-blue-bg: #1a2a4a; /* Deep navy for main sections */
            --bs-darker-blue-bg: #0f1a2a; /* Even darker navy for specific sections */
            --bs-text-light-custom: #e0e0e0; /* Light grey for text on dark backgrounds */
        }
        .bg-dark-blue {
            background-color: var(--bs-dark-blue-bg) !important;
        }
        .bg-darker-blue {
            background-color: var(--bs-darker-blue-bg) !important;
        }
        .text-light-custom {
            color: var(--bs-text-light-custom) !important;
        }
        .btn-custom-primary {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
            color: #fff;
        }
        .btn-custom-primary:hover {
            background-color: #3a7bd5; /* Slightly darker hover */
            border-color: #3a7bd5;
        }
        .btn-outline-custom-light {
            color: var(--bs-text-light-custom);
            border-color: var(--bs-text-light-custom);
        }
        .btn-outline-custom-light:hover {
            background-color: var(--bs-text-light-custom);
            color: var(--bs-dark-blue-bg);
        }
        .border-custom-primary {
            border-color: var(--bs-primary) !important;
        }
        .text-custom-primary {
            color: var(--bs-primary) !important;
        }
        /* Adjust existing custom classes for dark theme visibility */
        .cl-3 { color: var(--bs-text-light-custom); } /* Assuming cl-3 was dark text on light bg */
        .cl-12 { color: var(--bs-text-light-custom); } /* Assuming cl-12 was dark text on light bg */
        .cl-13 { color: var(--bs-text-light-custom); } /* Assuming cl-13 was dark text on light bg */
        .bg-3 { background-color: var(--bs-primary); } /* Assuming bg-3 was a separator color */
    </style>


    <!-- Project section -->
    <section id="project" class="bg-dark-blue py-5">
        <div class="container">
            <!-- Title section -->
            <div class="text-center pb-4">
                <h3 class="fw-bold text-white mb-2">
                    Project Kami
                </h3>
                <div class="bg-custom-primary mx-auto" style="width: 50px; height: 3px;"></div>
            </div>

            <!-- Project cards -->
            <div class="row justify-content-center">
                @foreach($projects as $project)
                    @if($project->isDone == 1)
                        <div class="col-sm-10 col-md-8 col-lg-4 mb-4">
                            <!-- Block2 - Bootstrap Card -->
                            <div class="card h-100 border-0 shadow-sm block2" style="background-image: url({{ $project->thumbnail }}); background-size: cover; background-position: center;">
                                <div class="card-body d-flex flex-column justify-content-end text-white p-4 block2-content trans-04">
                                    <h4 class="card-title text-uppercase text-white fw-bold mb-2 block2-title trans-04">
                                        {{ $project->name }}
                                    </h4>

                                    <p class="card-text text-white-75 mb-3">
                                        {{ $project->brief }}<br><br>
                                        Teknologi yang digunakan:<br>
                                        {{ $project->tech }}
                                    </p>

                                    <div class="d-flex flex-wrap">
                                        @if($project->demo != null)
                                            <a href="{{ $project->demo }}" class="btn btn-custom-primary text-uppercase me-2 mb-2">
                                                Lihat Demo
                                            </a>
                                        @endif
                                        @if($project->file != null)
                                            <a href="{{ $project->file }}" class="btn btn-outline-custom-light text-uppercase mb-2">
                                                Download Aplikasi
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>


@endsection

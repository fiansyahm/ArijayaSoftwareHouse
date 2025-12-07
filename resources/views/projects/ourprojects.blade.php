@extends('template-admin')

@section('title')
Our Project
@endsection

@section('main')
    <!-- Updated CSS for Light and Modern Theme -->
    <style>
        :root {
            --bs-primary: #ff6b6b; /* Vibrant coral for accents */
            --bs-light-bg: #f8f9fa; /* Light gray for main sections */
            --bs-lighter-bg: #ffffff; /* Pure white for specific sections */
            --bs-text-dark-custom: #333333; /* Dark gray for text on light backgrounds */
            --bs-text-accent: #ff8c94; /* Soft coral for secondary text */
        }
        .bg-light-bg {
            background-color: var(--bs-light-bg) !important;
        }
        .bg-lighter-bg {
            background-color: var(--bs-lighter-bg) !important;
        }
        .text-dark-custom {
            color: var(--bs-text-dark-custom) !important;
        }
        .text-accent {
            color: var(--bs-text-accent) !important;
        }
        .btn-custom-primary {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
            color: #fff;
            transition: all 0.3s ease;
        }
        .btn-custom-primary:hover {
            background-color: #ff5252; /* Slightly darker coral on hover */
            border-color: #ff5252;
            transform: translateY(-2px);
        }
        .btn-outline-custom-dark {
            color: var(--bs-text-dark-custom);
            border-color: var(--bs-text-dark-custom);
            transition: all 0.3s ease;
        }
        .btn-outline-custom-dark:hover {
            background-color: var(--bs-text-dark-custom);
            color: var(--bs-lighter-bg);
            transform: translateY(-2px);
        }
        .border-custom-primary {
            border-color: var(--bs-primary) !important;
        }
        .text-custom-primary {
            color: var(--bs-primary) !important;
        }
        .cl-3, .cl-12, .cl-13 {
            color: var(--bs-text-dark-custom);
        }
        .bg-3 {
            background-color: var(--bs-primary);
        }

        /* Styles for project section hover and click effect */
        .project-card {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .project-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease, filter 0.3s ease;
        }
        .project-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: end;
            padding: 1.5rem;
            z-index: 10;
        }
        .project-card:hover .project-overlay,
        .project-card.active .project-overlay {
            opacity: 1;
        }
        .project-card:hover .project-image,
        .project-card.active .project-image {
            transform: scale(1.05);
            filter: brightness(0.8);
        }
        .project-title {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 1rem;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), transparent);
            color: #fff;
            cursor: pointer;
            z-index: 20;
            transition: background 0.3s ease;
            font-weight: bold;
            text-transform: uppercase;
        }
        .project-title:hover {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.9), transparent);
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
    </style>

    <!-- Project section -->
    <section id="project" class="bg-light-bg py-5">
        <div class="container">
            <!-- Title section -->
            <div class="text-center pb-4">
                <h3 class="fw-bold text-dark-custom mb-2">
                    Project Kami
                </h3>
                <h6 class="text-dark-custom">Klik Gambar Project Untuk Melihat Detail</h6>
                <div class="bg-custom-primary mx-auto" style="width: 50px; height: 3px;"></div>
            </div>

            <!-- Project cards -->
            <div class="row justify-content-center">
                @foreach($projects as $project)
                    @if($project->isDone == 2)
                        <div class="col-sm-10 col-md-8 col-lg-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm project-card" style="height: 300px;">
                                <img src="{{ $project->thumbnail }}" class="project-image" alt="{{ $project->name }}">
                                <div class="project-title text-uppercase fw-bold">
                                    {{ $project->name }}
                                </div>
                                <div class="project-overlay text-dark-custom">
                                    <h4 class="card-title text-uppercase fw-bold mb-2">
                                        {{ $project->name }}
                                    </h4>
                                    <p class="card-text text-dark-custom mb-3">
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
                                            <a href="{{ $project->file }}" class="btn btn-success text-uppercase mb-2">
                                                Download Aplikasi
                                            </a>
                                        @endif
                                        <a href="/projects/{{ $project->id }}/detail" class="btn btn-outline-custom-dark text-uppercase mb-2">
                                            Detail Aplikasi
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll('.project-card').forEach(card => {
            const title = card.querySelector('.project-title');
            title.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent any default behavior
                card.classList.toggle('active');
            });
        });
    </script>
@endsection
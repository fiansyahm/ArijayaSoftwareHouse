@extends('template-admin')

@section('title')
Our Project
@endsection

@section('main')
    <!-- Existing CSS from previous artifact -->
    <style>
        :root {
            --bs-primary: #4a90e2;
            --bs-dark-blue-bg: #1a2a4a;
            --bs-darker-blue-bg: #0f1a2a;
            --bs-text-light-custom: #e0e0e0;
        }
        .bg-dark-blue { background-color: var(--bs-dark-blue-bg) !important; }
        .bg-darker-blue { background-color: var(--bs-darker-blue-bg) !important; }
        .text-light-custom { color: var(--bs-text-light-custom) !important; }
        .btn-custom-primary {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
            color: #fff;
        }
        .btn-custom-primary:hover {
            background-color: #3a7bd5;
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
        .border-custom-primary { border-color: var(--bs-primary) !important; }
        .text-custom-primary { color: var(--bs-primary) !important; }
        .cl-3, .cl-12, .cl-13 { color: var(--bs-text-light-custom); }
        .bg-3 { background-color: var(--bs-primary); }

        /* Styles for project section hover and click effect */
        .project-card {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .project-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: filter 0.3s ease;
        }
        .project-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
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
            filter: blur(3px);
        }
        .project-title {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 1rem;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            cursor: pointer;
            z-index: 20;
            transition: background 0.3s ease;
        }
        .project-title:hover {
            background: rgba(0, 0, 0, 0.7);
        }
    </style>

    <!-- Other sections (Slider, Company Profile, Services, Why Choose Us) remain unchanged -->

    <!-- Modified Project section -->
    <section id="project" class="bg-dark-blue py-5">
        <div class="container">
            <!-- Title section -->
            <div class="text-center pb-4">
                <h3 class="fw-bold text-white mb-2">
                    Project Kami
                </h3>
                <h6 class="text-light-custom">Klik Gambar Project Untuk Melihat Detail</h6>
                <div class="bg-custom-primary mx-auto" style="width: 50px; height: 3px;"></div>
            </div>

            <!-- Project cards -->
            <div class="row justify-content-center">
                @foreach($projects as $project)
                    @if($project->isDone == 1)
                        <div class="col-sm-10 col-md-8 col-lg-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm project-card" style="height: 300px;">
                                <img src="{{ $project->thumbnail }}" class="project-image" alt="{{ $project->name }}">
                                <div class="project-title text-uppercase fw-bold">
                                    {{ $project->name }}
                                </div>
                                <div class="project-overlay text-white">
                                    <h4 class="card-title text-uppercase fw-bold mb-2">
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
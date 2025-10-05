<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="https://i.ibb.co.com/8zZ7CdS/ideea-logo.jpg" />

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Custom CSS Variables for Dark Elegant Theme -->
    <style>
        :root {
            --bs-primary: #d4af37; /* Gold for elegant accents */
            --bs-dark-bg: #1c2526; /* Deep gray for main sections */
            --bs-darker-bg: #12191a; /* Midnight blue for specific sections */
            --bs-text-light-custom: #e0e0e0; /* Light gray for text on dark backgrounds */
            --bs-text-accent: #b8960f; /* Subtle gold for secondary text */
        }

        .bg-dark-bg {
            background-color: var(--bs-dark-bg) !important;
        }

        .bg-darker-bg {
            background-color: var(--bs-darker-bg) !important;
        }

        .text-light-custom {
            color: var(--bs-text-light-custom) !important;
        }

        .text-accent {
            color: var(--bs-text-accent) !important;
        }

        .btn-custom-primary {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
            color: #1c2526;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn-custom-primary:hover {
            background-color: #b8960f; /* Slightly darker gold on hover */
            border-color: #b8960f;
            transform: translateY(-2px);
            color: #1c2526;
        }

        .btn-outline-custom-light {
            color: var(--bs-text-light-custom);
            border-color: var(--bs-text-light-custom);
            transition: all 0.3s ease;
        }

        .btn-outline-custom-light:hover {
            background-color: var(--bs-text-light-custom);
            color: var(--bs-dark-bg);
            transform: translateY(-2px);
        }

        .border-custom-primary {
            border-color: var(--bs-primary) !important;
        }

        .text-custom-primary {
            color: var(--bs-primary) !important;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: var(--bs-text-light-custom);
            transition: color 0.3s ease;
            font-weight: 500;
        }

        .navbar-dark .navbar-nav .nav-link.active,
        .navbar-dark .navbar-nav .nav-link:hover {
            color: var(--bs-primary);
        }

        .dropdown-menu {
            background-color: var(--bs-darker-bg);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
        }

        .dropdown-menu .dropdown-item {
            color: var(--bs-text-light-custom);
            transition: all 0.3s ease;
        }

        .dropdown-menu .dropdown-item:hover,
        .dropdown-menu .dropdown-item:focus {
            background-color: var(--bs-dark-bg);
            color: var(--bs-primary);
        }

        .navbar {
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand img {
            transition: transform 0.3s ease;
            filter: brightness(1.2);
        }

        .navbar-brand img:hover {
            transform: scale(1.1);
        }

        .social-icon {
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: translateY(-2px);
            background-color: var(--bs-primary) !important;
            border-color: var(--bs-primary) !important;
            color: var(--bs-dark-bg) !important;
        }

        footer {
            transition: background-color 0.3s ease;
        }

        footer a {
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: var(--bs-primary);
        }

        /* Hide phone and hours section in mobile view */
        @media (max-width: 767.98px) {
            .contact-hours-section {
                display: none;
            }
        }
    </style>

    @yield('css')
</head>
<body>

    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark-bg py-3 shadow-sm">
            <div class="container">
                <div class="bg-darker-bg text-light-custom py-2 w-100 mb-3 rounded contact-hours-section">
                    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div class="d-flex flex-wrap justify-content-center justify-content-md-start mb-2 mb-md-0">
                            <div class="me-4 mb-1 mb-md-0 text-light-custom">
                                <i class="fa fa-phone me-2"></i>
                                <a href="https://api.whatsapp.com/send?phone=+6281515829443&text=Halo%20Admin%20Saya%20Mau%20Konsultasi%20Jasanya" target="_blank" class="text-light-custom text-decoration-none">(+62)81515829443</a>
                            </div>
                            <div class="mb-1 mb-md-0 text-light-custom">
                                <i class="fa fa-clock-o me-2"></i>
                                Senin-Sabtu 09:00 - 17:00 WIB / Minggu TUTUP
                            </div>
                        </div>
                    </div>
                </div>

                <a class="navbar-brand" href="/">
                    <img src="https://i.ibb.co.com/8zZ7CdS/ideea-logo.jpg" width="40" height="40" alt="Logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="/">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="/our-projects">Proyek Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about.html">Tentang Kami</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown">Layanan Kami</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/service/entry">Jasa Entry Data</a></li>
                                <li><a class="dropdown-item" href="/service/website">Jasa Pembuatan Website</a></li>
                                <li><a class="dropdown-item" href="/service/ui">Jasa Konsul UI/UX</a></li>
                                <li><a class="dropdown-item" href="/service/android">Jasa Pembuatan Aplikasi Android</a></li>
                                <li><a class="dropdown-item" href="/service/resume">Jasa Pembuatan Resume</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#contact.html">Kontak Kami</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('main')

    <!-- Footer -->
    <footer class="bg-dark-bg text-light-custom py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <img src="https://i.ibb.co.com/8zZ7CdS/ideea-logo.jpg" width="50" height="50" alt="Logo" class="mb-3">
                    <p class="text-light-custom">Kami Menyediakan Berbagai Jasa Dengan Kualitas & Hasil Terbaik.</p>
                    <div class="d-flex mt-3">
                        @foreach (['facebook', 'twitter', 'google-plus', 'instagram', 'linkedin'] as $icon)
                        <a href="#" class="btn btn-outline-custom-light rounded-circle p-2 me-2 social-icon"><i class="fa fa-{{ $icon }}"></i></a>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <h4 class="text-uppercase mb-3 text-light-custom">Contact Us</h4>
                    <ul class="list-unstyled text-light-custom">
                        <li class="mb-2"><i class="fa fa-home me-2"></i>JATIM</li>
                        <li class="mb-2"><i class="fa fa-envelope-o me-2"></i>arijaya@gmail.com</li>
                        <li class="mb-2">
                            <i class="fa fa-phone me-2"></i>
                            <a href="https://api.whatsapp.com/send?phone=6281515829443&text=Halo%20Admin%20Saya%20Mau%20Order%20" class="text-light-custom text-decoration-none d-block">(+62)878 8897 1186</a>
                            <a href="https://api.whatsapp.com/send?phone=6281515829443&text=Halo%20Admin%20Saya%20Mau%20Order%20" class="text-light-custom text-decoration-none d-block">(+62)878 8897 1186</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 mb-4">
                    <h4 class="text-uppercase mb-3 text-light-custom">Company</h4>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled text-light-custom">
                                <li class="mb-2"><a href="/" class="text-light-custom text-decoration-none">Home</a></li>
                                <li class="mb-2"><a href="projects-grid.html" class="text-light-custom text-decoration-none">Projects</a></li>
                                <li class="mb-2"><a href="services-list.html" class="text-light-custom text-decoration-none">Services</a></li>
                                <li class="mb-2"><a href="#" class="text-light-custom text-decoration-none">About Us</a></li>
                                <li class="mb-2"><a href="#" class="text-light-custom text-decoration-none">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled text-light-custom">
                                <li class="mb-2"><a href="#" class="text-light-custom text-decoration-none">Blogs</a></li>
                                <li class="mb-2"><a href="#" class="text-light-custom text-decoration-none">404 Page</a></li>
                                <li class="mb-2"><a href="shop-grid.html" class="text-light-custom text-decoration-none">Shop</a></li>
                                <li class="mb-2"><a href="#" class="text-light-custom text-decoration-none">Elements</a></li>
                                <li class="mb-2"><a href="typography.html" class="text-light-custom text-decoration-none">Typography</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-darker-bg border-top border-custom-primary text-center text-light-custom py-3 mt-4">
            &copy; 2025 arijayasoftwarehouse.site. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
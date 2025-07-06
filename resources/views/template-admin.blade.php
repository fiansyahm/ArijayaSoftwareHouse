<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/png" href="https://i.ibb.co.com/8zZ7CdS/ideea-logo.jpg"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/revolution/css/navigation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/MagnificPopup/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/css/util.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/css/main.css') }}">
    
    {{-- Custom CSS Variables for Dark Blue Theme (Global) --}}
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

        /* Navbar specific adjustments for dark theme */
        .navbar-dark .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.75); /* Default light color for nav links */
        }
        .navbar-dark .navbar-nav .nav-link.active,
        .navbar-dark .navbar-nav .nav-link:hover {
            color: #fff; /* White for active/hover */
        }
        .dropdown-menu {
            background-color: var(--bs-dark-blue-bg); /* Dark background for dropdown */
            border: 1px solid rgba(255, 255, 255, 0.15);
        }
        .dropdown-menu .dropdown-item {
            color: var(--bs-text-light-custom); /* Light text for dropdown items */
        }
        .dropdown-menu .dropdown-item:hover,
        .dropdown-menu .dropdown-item:focus {
            background-color: var(--bs-darker-blue-bg); /* Darker background on hover/focus */
            color: #fff;
        }
    </style>

    @yield('css')
</head>
<body class="animsition">

    <header>
        {{-- Main Navigation Bar --}}
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark-blue py-3 shadow-sm">
            <div class="container">
                  <div class="bg-darker-blue text-white py-2">
            <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
                <div class="d-flex flex-wrap justify-content-center justify-content-md-start mb-2 mb-md-0">
                  
                    <div class="me-4 mb-1 mb-md-0 text-light-custom">
                        <i class="fa fa-phone me-2" aria-hidden="true"></i>
                        <span>
                            <a href="https://api.whatsapp.com/send?phone=+6281515829443&text=Halo%20Admin%20Saya%20Mau%20Konsultasi%20Jasanya" target="_blank" class="text-light-custom text-decoration-none">(+62)81515829443</a>
                        </span>
                    </div>
                    <div class="mb-1 mb-md-0 text-light-custom">
                        <i class="fa fa-clock-o me-2" aria-hidden="true"></i>
                        <span>Senin-Sabtu 09:00 - 17:00 WIB / Minggu TUTUP</span>
                    </div>
                </div>
            </div>
        </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/our-projects">Proyek Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about.html">Tentang Kami</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Layanan Kami
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                <li><a class="dropdown-item" href="/service/entry">Jasa Entry Data</a></li>
                                <li><a class="dropdown-item" href="/service/website">Jasa Pembuatan Website</a></li>
                                <li><a class="dropdown-item" href="/service/ui">Jasa Konsul UI/UX</a></li>
                                <li><a class="dropdown-item" href="/service/android">Jasa Pembuatan Aplikasi Android</a></li>
                                <li><a class="dropdown-item" href="/service/resume">Jasa Pembuatan Resume</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact.html">Kontak Kami</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('main')
    
    <footer class="bg-darker-blue text-white py-5">
        <div class="container">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-sm-8 col-md-4 col-lg-3 mb-4">
                    <div class="mb-3">
                        <a href="/">
                            <img class="img-fluid" height="50px" width="50px" src="https://i.ibb.co.com/8zZ7CdS/ideea-logo.jpg" alt="LOGO">
                        </a>
                    </div>
                    <p class="text-light-custom">
                        Kami Menyediakan Berbagai Jasa Dengan Kualitas & Hasil Terbaik.
                    </p>
                    <div class="d-flex mt-3">
                        <a href="#" class="btn btn-outline-custom-light rounded-circle p-2 me-2"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="btn btn-outline-custom-light rounded-circle p-2 me-2"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="btn btn-outline-custom-light rounded-circle p-2 me-2"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="btn btn-outline-custom-light rounded-circle p-2 me-2"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="btn btn-outline-custom-light rounded-circle p-2"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-sm-8 col-md-4 col-lg-3 mb-4">
                    <h4 class="text-uppercase text-white mb-3">Contact Us</h4>
                    <ul class="list-unstyled">
                        <li class="d-flex mb-2 text-light-custom">
                            <span class="me-2"><i class="fa fa-home" aria-hidden="true"></i></span>
                            <span>JATIM</span>
                        </li>
                        <li class="d-flex mb-2 text-light-custom">
                            <span class="me-2"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                            <span>arijaya@gmail.com</span>
                        </li>
                        <li class="d-flex mb-2 text-light-custom">
                            <span class="me-2"><i class="fa fa-phone" aria-hidden="true"></i></span>
                            <span>
                                <a href="https://api.whatsapp.com/send?phone=6281515829443&text=Halo%20Admin%20Saya%20Mau%20Order%20" class="text-light-custom text-decoration-none">(+62)878 8897 1186</a>
                                <br>
                                <a href="https://api.whatsapp.com/send?phone=6281515829443&text=Halo%20Admin%20Saya%20Mau%20Order%20" class="text-light-custom text-decoration-none">(+62)878 8897 1186</a>
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-8 col-md-4 col-lg-3 mb-4">
                    <h4 class="text-uppercase text-white mb-3">Company</h4>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="/" class="text-light-custom text-decoration-none">Home</a></li>
                                <li class="mb-2"><a href="projects-grid.html" class="text-light-custom text-decoration-none">Projects</a></li>
                                <li class="mb-2"><a href="services-list.html" class="text-light-custom text-decoration-none">Services</a></li>
                                <li class="mb-2"><a href="#" class="text-light-custom text-decoration-none">About Us</a></li>
                                <li class="mb-2"><a href="#" class="text-light-custom text-decoration-none">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="#" class="text-light-custom text-decoration-none">Blogs</a></li>
                                <li class="mb-2"><a href="#" class="text-light-custom text-decoration-none">404 Page</a></li>
                                <li class="mb-2"><a href="shop-grid.html" class="text-light-custom text-decoration-none">Shop</a></li>
                                <li class="mb-2"><a href="#" class="text-light-custom text-decoration-none">Elements</a></li>
                                <li class="mb-2"><a href="typography.html" class="text-light-custom text-decoration-none">Typography</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8 col-md-6 col-lg-3 mb-4">
                    <h4 class="text-uppercase text-white mb-3">Gallery</h4>
                    <div class="row g-2">
                        <div class="col-4">
                            <a href="images/gallery-01.jpg" class="d-block overflow-hidden rounded js-show-gallery">
                                <img src="{{ asset('theme/cprofile1/images/gallery-01.jpg') }}" alt="Gallery Image" class="img-fluid w-100 h-100 object-fit-cover">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="images/gallery-02.jpg" class="d-block overflow-hidden rounded js-show-gallery">
                                <img src="{{ asset('theme/cprofile1/images/gallery-02.jpg') }}" alt="Gallery Image" class="img-fluid w-100 h-100 object-fit-cover">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="images/gallery-03.jpg" class="d-block overflow-hidden rounded js-show-gallery">
                                <img src="{{ asset('theme/cprofile1/images/gallery-03.jpg') }}" alt="Gallery Image" class="img-fluid w-100 h-100 object-fit-cover">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="images/gallery-04.jpg" class="d-block overflow-hidden rounded js-show-gallery">
                                <img src="{{ asset('theme/cprofile1/images/gallery-04.jpg') }}" alt="Gallery Image" class="img-fluid w-100 h-100 object-fit-cover">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="images/gallery-05.jpg" class="d-block overflow-hidden rounded js-show-gallery">
                                <img src="{{ asset('theme/cprofile1/images/gallery-05.jpg') }}" alt="Gallery Image" class="img-fluid w-100 h-100 object-fit-cover">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="images/gallery-06.jpg" class="d-block overflow-hidden rounded js-show-gallery">
                                <img src="{{ asset('theme/cprofile1/images/gallery-06.jpg') }}" alt="Gallery Image" class="img-fluid w-100 h-100 object-fit-cover">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-darker-blue border-top border-custom-primary mt-4 py-3">
            <div class="container text-center text-light-custom">
                <span>
                    Copyright &copy; 2023 arijayasoftwarehouse.site. All rights reserved. 
                </span>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="{{ asset('theme/cprofile1/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/js/revo-custom.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/parallax100/parallax100.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/waypoint/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/countterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/js/slick-custom.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('theme/cprofile1/js/main.js') }}"></script>

</body>
</html>

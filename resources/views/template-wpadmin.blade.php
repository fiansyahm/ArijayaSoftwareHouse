<!DOCTYPE html>
<html lang="en">
<head>
    <title>Arijayasoftwarehouse</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, follow">

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous">

    <!-- Poppins Font (Latin only for simplicity) -->
    <style>
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLDz8Z1xlFQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJfecg.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLGT9Z1xlFQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLEj6Z1xlFQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLCz7Z1xlFQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 800;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLDD4Z1xlFQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 900;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/poppins/v20/pxiByp8kv8JHgFVrLBT5Z1xlFQ.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #343a40;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .logo {
            display: block;
            width: 120px;
            height: 120px;
            background-size: cover;
            margin: 0 auto;
        }

        #sidebar ul.components {
            padding: 20px 0;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
            color: #fff;
        }

        #sidebar ul li a:hover {
            color: #fff;
            background: #495057;
        }

        #sidebar ul li.active > a,
        a[aria-expanded="true"] {
            color: #fff;
            background: #495057;
        }

        a[data-bs-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        #content {
            width: 100%;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #content {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.jpg);"></a>
                <ul class="list-unstyled components mb-5">
                    <li class="nav-item @yield('navbar_dashboard')">
                        <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                    </li>
                    @if(Auth::check() && (Auth::user()->isAdmin == '2' || Auth::user()->isAdmin == '3'))
                        <li class="@yield('navbar_menu_absence')">
                            <a class="nav-link" href="#submenu_absence" data-bs-toggle="collapse" aria-expanded="false">Laporan & Absensi</a>
                            <ul class="collapse list-unstyled" id="submenu_absence">
                                <?php
                                $day = date('d');
                                $month = date('m');
                                $year = date('Y');
                                ?>
                                @if(Auth::check() && Auth::user()->isAdmin == '2')
                                    <li class="nav-item"><a class="nav-link" href="/absence/calender">Kalender Absensi</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/absence/shift">Kalender Shift</a></li>
                                    @if(Auth::user()->id == '1')
                                        <li class="nav-item"><a class="nav-link" href="/myattendance">Daftar User</a></li>
                                    @endif
                                    <li class="nav-item"><a class="nav-link" href="/absence/{{$day}}/{{$month}}/{{$year}}/all">Daftar Absensi</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/absence/report/list/{{$day}}/{{$month}}/{{$year}}/all">Daftar Laporan</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/absence/create">Form Absensi Online</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/absence/report">Form Laporan</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/admin/schedule">Jadwal Absensi</a></li>
                                @else
                                    <li class="nav-item"><a class="nav-link" href="/absensi">Form Absensi</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/absence/report">Form Laporan</a></li>
                                @endif
                                <li class="nav-item"><a class="nav-link" href="/absence/absent">Form Izin</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item @yield('navbar_menu_project')">
                        <a class="nav-link" href="#submenu_project" data-bs-toggle="collapse" aria-expanded="false">Project</a>
                        <ul class="collapse list-unstyled" id="submenu_project">
                            <li class="nav-item"><a class="nav-link" href="/projects">List Project</a></li>
                        </ul>
                    </li>
                    @if(Auth::user()->isAdmin == '2' || Auth::user()->isAdmin == '3')
                        <li class="nav-item @yield('navbar_menu_templatechat')">
                            <a class="nav-link" href="#submenu_templatechats" data-bs-toggle="collapse" aria-expanded="false">Template Chat</a>
                            <ul class="collapse list-unstyled" id="submenu_templatechats">
                                <li class="nav-item"><a class="nav-link" href="/templatechats">List Template Chat</a></li>
                                <li class="nav-item"><a class="nav-link @yield('navbar_side_1')" href="/questions">Q&A</a></li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->isAdmin == '2' || Auth::user()->isAdmin == '3')
                        <li class="nav-item @yield('navbar_menu_order')">
                            <a class="nav-link" href="#submenu_order" data-bs-toggle="collapse" aria-expanded="false">Order</a>
                            <ul class="collapse list-unstyled" id="submenu_order">
                                <li class="nav-item"><a class="nav-link" href="/orders">List Order</a></li>
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->isAdmin == '2' || Auth::user()->isAdmin == '3')
                        <li class="nav-item @yield('navbar_menu_affliate')">
                            <a class="nav-link" href="#submenu_affliate" data-bs-toggle="collapse" aria-expanded="false">Affliate Products</a>
                            <ul class="collapse list-unstyled" id="submenu_affliate">
                                <li class="nav-item"><a class="nav-link" href="/affliateproducts">List Affliate Products</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <div class="footer">
                    <p>
                        Copyright © <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fas fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                    </p>
                </div>
            </div>
        </nav>
        <div id="content" class="p-4 p-md-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary me-2">
                        <i class="fas fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @if(Auth::check())
                            <ul class="nav navbar-nav ms-auto">
                                <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">{{ Auth::user()->email }}</a></li>
                                @if(Auth::user()->isAdmin == '1')
                                    <li class="nav-item"><a href="#" class="nav-link" aria-current="page">Status: Admin</a></li>
                                @else
                                    <li class="nav-item"><a href="#" class="nav-link" aria-current="page">Status: User</a></li>
                                @endif
                                <li class="nav-item"><a href="/session/logout" class="nav-link">Logout</a></li>
                            </ul>
                        @else
                        @endif
                    </div>
                </div>
            </nav>
            @if(Auth::check())
                @yield('main')
            @else
            @endif
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        // Sidebar toggle functionality
        document.getElementById('sidebarCollapse').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"83b165448a9b4056","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>
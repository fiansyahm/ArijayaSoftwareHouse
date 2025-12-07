@extends('template-admin')

@section('title')
Home 
@endsection

@section('main')
    {{-- Custom CSS Variables for Bright and Modern Theme --}}
    <style>
        :root {
            --bs-primary: #ff6b6b; /* Vibrant coral for accents */
            --bs-light-bg: #f8f9fa; /* Light gray for main sections */
            --bs-lighter-bg: #ffffff; /* Pure white for specific sections */
            --bs-text-dark-custom: #333333; /* Dark gray for text on light backgrounds */
            --bs-text-accent: #ff8c94; /* Soft coral for secondary text */
            --bs-success: #28a745; /* Green for success elements */
            --bs-info: #17a2b8; /* Cyan for info elements */
            --bs-warning: #ffc107; /* Yellow for warning elements */
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
        /* Adjust existing custom classes for bright theme visibility */
        .cl-3, .cl-12, .cl-13 { color: var(--bs-text-dark-custom); }
        .bg-3 { background-color: var(--bs-primary); }
        /* Enhanced styles for project section hover and click effect */
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
            cursor: pointer;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }
        /* Smooth section transitions */
        section {
            transition: background-color 0.3s ease;
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        .block1-symbol {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px; /* bisa disesuaikan */
            width: 100%;
        }

        .block1-symbol img {
            max-width: 80px; /* sesuaikan ukuran */
            height: auto;
        }

    </style>

    <!-- Slide - Revolution Slider Section -->
    <section class="slider bg-light-bg">
        <div class="rev_slider_wrapper fullwidthbanner-container">
            <div id="rev_slider_1" class="rev_slider fullwidthabanner" data-version="5.4.5" style="display:none">
                <ul>
                    <!-- Slide 1 -->
                    <li data-transition="slidingoverlayhorizontal">
                        <img src="https://i.pinimg.com/564x/f1/a4/fa/f1a4fa6f4a666d8d425dbec0927451cd.jpg" alt="IMG-SLIDE" class="rev-slidebg">

                        <h2 class="tp-caption tp-resizeme caption-1 text-uppercase" 
                        data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"x:left;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="['on', 'on', 'on', 'on']"
                        data-fontsize="['48', '48', '48', '38']" 
                        data-lineheight="['58', '58', '58', '58']"
                        data-color="['#333333']" 
                        data-textAlign="['center', 'center', 'center', 'center']"
                        data-x="['center']" 
                        data-y="['center']" 
                        data-hoffset="['0', '0', '0', '0']" 
                        data-voffset="['-83', '-83', '-83', '-93']" 
                        data-width="['1200','992','768','480']"
                        data-height="['auto', 'auto', 'auto', 'auto']" 
                        data-whitespace="['normal']" 
                        data-paddingtop="[0, 0, 0, 0]"
                        data-paddingright="[15, 15, 15, 15]"
                        data-paddingbottom="[0, 0, 0, 0]"
                        data-paddingleft="[15, 15, 15, 15]"
                        data-basealign="slide" 
                        data-responsive_offset="off"
                        >Welcome to the Arijaya Softwarehouse</h2>

                        <p class="tp-caption tp-resizeme caption-2" 
                        data-frames='[{"delay":1500,"speed":1500,"frame":"0","from":"x:right;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="['on', 'on', 'on', 'on']"
                        data-fontsize="['30', '30', '30', '25']" 
                        data-lineheight="['39', '39', '39', '39']"
                        data-color="['#ff6b6b']" 
                        data-textAlign="['center', 'center', 'center', 'center']"
                        data-x="['center']" 
                        data-y="['center']" 
                        data-hoffset="['0', '0', '0', '0']" 
                        data-voffset="['-13', '-13', '-13', '-13']" 
                        data-width="['1200','992','768','480']"
                        data-height="['auto', 'auto', 'auto', 'auto']" 
                        data-whitespace="['normal']" 
                        data-paddingtop="[0, 0, 0, 0]"
                        data-paddingright="[15, 15, 15, 15]"
                        data-paddingbottom="[0, 0, 0, 0]"
                        data-paddingleft="[15, 15, 15, 15]"
                        data-basealign="slide" 
                        data-responsive_offset="off"
                        >
                            Make Your Idea To Be True
                        </p>

                        <div class="tp-caption tp-resizeme caption-3 d-flex justify-content-center"
                        data-frames='[{"delay":3000,"speed":1500,"frame":"0","from":"y:bottom;rX:-20deg;rY:-20deg;rZ:0deg;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-x="['center']" 
                        data-y="['center']" 
                        data-hoffset="['0', '0', '0', '0']" 
                        data-voffset="['88', '88', '88', '88']" 
                        data-width="['1200','992','768','480']"
                        data-height="['auto']" 
                        data-paddingtop="[0, 0, 0, 0]"
                        data-paddingright="[10, 10, 10, 10]"
                        data-paddingbottom="[0, 0, 0, 0]"
                        data-paddingleft="[10, 10, 10, 10]"
                        data-basealign="slide" 
                        data-responsive_offset="off"
                        >
                            <a href="#project" class="btn btn-custom-primary me-3">OUR PROJECT</a>
                            <a href="/" class="btn btn-outline-custom-dark">Learn more</a>
                        </div>
                    </li>

                    <!-- Slide 2 -->
                    <li data-transition="slidingoverlayvertical">
                        <img src="https://i.pinimg.com/564x/f9/1f/6d/f91f6df5d0a2a2db60e456774cc6a03f.jpg" alt="IMG-SLIDE" class="rev-slidebg">

                        <h2 class="tp-caption tp-resizeme caption-1 text-uppercase" 
                        data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"y:top;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="['on', 'on', 'on', 'on']"
                        data-fontsize="['48', '48', '48', '38']" 
                        data-lineheight="['58', '58', '58', '58']"
                        data-color="['#333333']" 
                        data-textAlign="['center', 'center', 'center', 'center']"
                        data-x="['center']" 
                        data-y="['center']" 
                        data-hoffset="['0', '0', '0', '0']" 
                        data-voffset="['-83', '-83', '-83', '-93']" 
                        data-width="['1200','992','768','480']"
                        data-height="['auto', 'auto', 'auto', 'auto']" 
                        data-whitespace="['normal']" 
                        data-paddingtop="[0, 0, 0, 0]"
                        data-paddingright="[15, 15, 15, 15]"
                        data-paddingbottom="[0, 0, 0, 0]"
                        data-paddingleft="[15, 15, 15, 15]"
                        data-basealign="slide" 
                        data-responsive_offset="off"
                        >Welcome to the Arijaya Softwarehouse</h2>

                        <p class="tp-caption tp-resizeme caption-2" 
                        data-frames='[{"delay":1500,"speed":1500,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="['on', 'on', 'on', 'on']"
                        data-fontsize="['30', '30', '30', '25']" 
                        data-lineheight="['39', '39', '39', '39']"
                        data-color="['#ff6b6b']" 
                        data-textAlign="['center', 'center', 'center', 'center']"
                        data-x="['center']" 
                        data-y="['center']" 
                        data-hoffset="['0', '0', '0', '0']" 
                        data-voffset="['-13', '-13', '-13', '-13']" 
                        data-width="['1200','992','768','480']"
                        data-height="['auto', 'auto', 'auto', 'auto']" 
                        data-whitespace="['normal']" 
                        data-paddingtop="[0, 0, 0, 0]"
                        data-paddingright="[15, 15, 15, 15]"
                        data-paddingbottom="[0, 0, 0, 0]"
                        data-paddingleft="[15, 15, 15, 15]"
                        data-basealign="slide" 
                        data-responsive_offset="off"
                        >
                            Make Your Idea To Be True
                        </p>

                        <div class="tp-caption tp-resizeme caption-3 d-flex justify-content-center"
                        data-frames='[{"delay":3000,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-x="['center']" 
                        data-y="['center']" 
                        data-hoffset="['0', '0', '0', '0']" 
                        data-voffset="['88', '88', '88', '88']" 
                        data-width="['1200','992','768','480']"
                        data-height="['auto']" 
                        data-paddingtop="[0, 0, 0, 0]"
                        data-paddingright="[10, 10, 10, 10]"
                        data-paddingbottom="[0, 0, 0, 0]"
                        data-paddingleft="[10, 10, 10, 10]"
                        data-basealign="slide" 
                        data-responsive_offset="off"
                        >
                            <a href="#project" class="btn btn-custom-primary me-3">Our project</a>
                            <a href="/" class="btn btn-outline-custom-dark">Learn more</a>
                        </div>
                    </li>

                    <!-- Slide 3 -->
                    <li data-transition="boxslide">
                        <img src="https://i.pinimg.com/564x/34/33/f0/3433f083b186a7edbf02e8cf1968c356.jpg" alt="IMG-SLIDE" class="rev-slidebg">

                        <h2 class="tp-caption tp-resizeme caption-1 text-uppercase" 
                        data-frames='[{"delay":500,"speed":1500,"frame":"0","from":"x:-500px;skX:85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="['on', 'on', 'on', 'on']"
                        data-fontsize="['48', '48', '48', '38']" 
                        data-lineheight="['58', '58', '58', '58']"
                        data-color="['#333333']" 
                        data-textAlign="['center', 'center', 'center', 'center']"
                        data-x="['center']" 
                        data-y="['center']" 
                        data-hoffset="['0', '0', '0', '0']" 
                        data-voffset="['-83', '-83', '-83', '-93']" 
                        data-width="['1200','992','768','480']"
                        data-height="['auto', 'auto', 'auto', 'auto']" 
                        data-whitespace="['normal']" 
                        data-paddingtop="[0, 0, 0, 0]"
                        data-paddingright="[15, 15, 15, 15]"
                        data-paddingbottom="[0, 0, 0, 0]"
                        data-paddingleft="[15, 15, 15, 15]"
                        data-basealign="slide" 
                        data-responsive_offset="off"
                        >Welcome to the Arijaya Softwarehouse</h2>

                        <p class="tp-caption tp-resizeme caption-2" 
                        data-frames='[{"delay":1500,"speed":1500,"frame":"0","from":"x:500px;skX:-85px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-visibility="['on', 'on', 'on', 'on']"
                        data-fontsize="['30', '30', '30', '25']" 
                        data-lineheight="['39', '39', '39', '39']"
                        data-color="['#ff6b6b']" 
                        data-textAlign="['center', 'center', 'center', 'center']"
                        data-x="['center']" 
                        data-y="['center']" 
                        data-hoffset="['0', '0', '0', '0']" 
                        data-voffset="['-13', '-13', '-13', '-13']" 
                        data-width="['1200','992','768','480']"
                        data-height="['auto', 'auto', 'auto', 'auto']" 
                        data-whitespace="['normal']" 
                        data-paddingtop="[0, 0, 0, 0]"
                        data-paddingright="[15, 15, 15, 15]"
                        data-paddingbottom="[0, 0, 0, 0]"
                        data-paddingleft="[15, 15, 15, 15]"
                        data-basealign="slide" 
                        data-responsive_offset="off"
                        >
                            Make Your Idea To Be True
                        </p>

                        <div class="tp-caption tp-resizeme caption-3 d-flex justify-content-center"
                        data-frames='[{"delay":3000,"speed":1500,"frame":"0","from":"y:bottom;rZ:90deg;sX:2;sY:2;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                        data-x="['center']" 
                        data-y="['center']" 
                        data-hoffset="['0', '0', '0', '0']" 
                        data-voffset="['88', '88', '88', '88']" 
                        data-width="['1200','992','768','480']"
                        data-height="['auto']" 
                        data-paddingtop="[0, 0, 0, 0]"
                        data-paddingright="[10, 10, 10, 10]"
                        data-paddingbottom="[0, 0, 0, 0]"
                        data-paddingleft="[10, 10, 10, 10]"
                        data-basealign="slide" 
                        data-responsive_offset="off"
                        >
                            <a href="#project" class="btn btn-custom-primary me-3">OUR PROJECT</a>
                            <a href="/" class="btn btn-outline-custom-dark">Learn more</a>
                        </div>
                    </li>
                </ul>         
            </div>
        </div>
    </section>

    <!-- Company Profile Section - New Model -->
    <section id="company-profile" class="bg-lighter-bg py-5">
        <div class="container">
            <!-- Title section -->
            <div class="text-center pb-4">
                <h3 class="fw-bold text-dark-custom mb-2">
                    Profil Perusahaan
                </h3>
                <div class="bg-custom-primary mx-auto" style="width: 50px; height: 3px;"></div>
            </div>

            <!-- Introduction Block -->
            <div class="row align-items-center justify-content-center mb-5">
                <div class="col-md-6 col-lg-7 order-md-2 mb-4 mb-md-0">
                    <!-- Carousel for Company Profile Images -->
                    <div id="companyProfileCarousel" class="carousel slide carousel-fade rounded shadow-lg" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#companyProfileCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#companyProfileCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#companyProfileCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://placehold.co/800x500/12191a/d4af37?text=Tim+Profesional&font=montserrat" class="d-block w-100" alt="Tim Profesional">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/800x500/12191a/d4af37?text=Inovasi+dan+Kreativitas&font=montserrat" class="d-block w-100" alt="Inovasi dan Kreativitas">
                            </div>
                            <div class="carousel-item">
                                <img src="https://placehold.co/800x500/12191a/d4af37?text=Solusi+Digital+Terbaik&font=montserrat" class="d-block w-100" alt="Solusi Digital Terbaik">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#companyProfileCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#companyProfileCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 order-md-1 text-center text-md-start">
                    <h1 class="fw-bold text-custom-primary mb-3">Mewujudkan Ide Anda Menjadi Kenyataan Digital</h1>
                    <p class="lead text-dark-custom mb-4">
                        Arijaya Softwarehouse adalah mitra terpercaya Anda dalam transformasi digital. Kami menggabungkan keahlian teknis dengan kreativitas untuk menghadirkan solusi perangkat lunak yang inovatif, efisien, dan berdampak nyata bagi bisnis Anda.
                    </p>
                    <a href="https://api.whatsapp.com/send?phone=+6281515829443&text=Halo%20Admin%20Saya%20Mau%20Konsultasi%20Jasanya" class="btn btn-custom-primary btn-lg text-uppercase">
                        Mulai Proyek Anda
                    </a>      
                </div>
            </div>

            <!-- Visi & Misi Section -->
            <div class="row mb-5">
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-start border-custom-primary border-4 rounded-3 bg-light-bg">
                        <div class="card-body p-4">
                            <h4 class="card-title fw-bold text-dark-custom mb-3">Visi Kami</h4>
                            <p class="card-text text-dark-custom">
                                Menjadi perusahaan pengembang perangkat lunak terkemuka yang diakui secara global, memberikan solusi inovatif yang memberdayakan bisnis dan individu untuk berkembang di era digital.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-start border-success border-4 rounded-3 bg-light-bg">
                        <div class="card-body p-4">
                            <h4 class="card-title fw-bold text-dark-custom mb-3">Misi Kami</h4>
                            <p class="card-text text-dark-custom">
                                Menyediakan layanan pengembangan perangkat lunak berkualitas tinggi, mengedepankan inovasi dan kepuasan pelanggan, serta membangun kemitraan jangka panjang yang saling menguntungkan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Nilai-nilai Kami Section -->
            <div class="text-center pb-4">
                <h3 class="fw-bold text-dark-custom mb-2">
                    Nilai-nilai Kami
                </h3>
                <div class="bg-custom-primary mx-auto" style="width: 50px; height: 3px;"></div>
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3 p-3 bg-light-bg">
                        <div class="card-body d-flex flex-column align-items-center">
                            <i class="fa fa-lightbulb-o text-custom-primary fs-1 mb-3"></i>
                            <h5 class="card-title fw-bold text-dark-custom">Inovasi</h5>
                            <p class="card-text text-dark-custom">Terus berinovasi untuk solusi terbaik.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3 p-3 bg-light-bg">
                        <div class="card-body d-flex flex-column align-items-center">
                            <i class="fa fa-handshake-o text-success fs-1 mb-3"></i>
                            <h5 class="card-title fw-bold text-dark-custom">Kolaborasi</h5>
                            <p class="card-text text-dark-custom">Bekerja sama untuk hasil optimal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3 p-3 bg-light-bg">
                        <div class="card-body d-flex flex-column align-items-center">
                            <i class="fa fa-star-o text-info fs-1 mb-3"></i>
                            <h5 class="card-title fw-bold text-dark-custom">Kualitas</h5>
                            <p class="card-text text-dark-custom">Menyajikan produk berkualitas tinggi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3 p-3 bg-light-bg">
                        <div class="card-body d-flex flex-column align-items-center">
                            <i class="fa fa-users text-warning fs-1 mb-3"></i>
                            <h5 class="card-title fw-bold text-dark-custom">Fokus Klien</h5>
                            <p class="card-text text-dark-custom">Prioritas utama adalah kepuasan klien.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services-section" class="bg-light-bg py-5">
        <div class="container">
            <!-- Title section -->
            <div class="text-center pb-4">
                <h3 class="fw-bold text-dark-custom mb-2">
                    Layanan Kami
                </h3>
                <div class="bg-custom-primary mx-auto" style="width: 50px; height: 3px;"></div>
            </div>

            <div class="row justify-content-center">
                <!-- Service Item: Jasa Entry Data -->
                <div class="col-sm-10 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3 p-4 bg-lighter-bg text-center">
                        <div class="card-body">
                            <i class="fa fa-database text-custom-primary fs-1 mb-3"></i>
                            <h5 class="card-title fw-bold text-dark-custom mb-3">Jasa Entry Data</h5>
                            <p class="card-text text-dark-custom">
                                Kami menyediakan layanan entri data yang akurat dan efisien untuk membantu Anda mengelola informasi bisnis dengan mudah.
                            </p>
                            <a href="/service/entry" class="btn btn-outline-custom-dark mt-3">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>

                <!-- Service Item: Jasa Pembuatan Website -->
                <div class="col-sm-10 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3 p-4 bg-lighter-bg text-center">
                        <div class="card-body">
                            <i class="fa fa-globe text-custom-primary fs-1 mb-3"></i>
                            <h5 class="card-title fw-bold text-dark-custom mb-3">Jasa Pembuatan Website</h5>
                            <p class="card-text text-dark-custom">
                                Bangun kehadiran online yang kuat dengan website profesional, responsif, dan menarik yang kami kembangkan khusus untuk Anda.
                            </p>
                            <a href="/service/website" class="btn btn-outline-custom-dark mt-3">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>

                <!-- Service Item: Jasa Konsul UI/UX -->
                <div class="col-sm-10 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3 p-4 bg-lighter-bg text-center">
                        <div class="card-body">
                            <i class="fa fa-paint-brush text-custom-primary fs-1 mb-3"></i>
                            <h5 class="card-title fw-bold text-dark-custom mb-3">Jasa Konsul UI/UX</h5>
                            <p class="card-text text-dark-custom">
                                Tingkatkan pengalaman pengguna dengan desain antarmuka yang intuitif dan menarik melalui konsultasi UI/UX ahli kami.
                            </p>
                            <a href="/service/ui" class="btn btn-outline-custom-dark mt-3">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>

                <!-- Service Item: Jasa Pembuatan Aplikasi Android -->
                <div class="col-sm-10 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3 p-4 bg-lighter-bg text-center">
                        <div class="card-body">
                            <i class="fa fa-mobile text-custom-primary fs-1 mb-3"></i>
                            <h5 class="card-title fw-bold text-dark-custom mb-3">Jasa Pembuatan Aplikasi Android</h5>
                            <p class="card-text text-dark-custom">
                                Wujudkan ide aplikasi mobile Anda menjadi kenyataan dengan pengembangan aplikasi Android yang inovatif dan berkinerja tinggi.
                            </p>
                            <a href="/service/android" class="btn btn-outline-custom-dark mt-3">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>

                <!-- Service Item: Jasa Pembuatan Resume -->
                <div class="col-sm-10 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3 p-4 bg-lighter-bg text-center">
                        <div class="card-body">
                            <i class="fa fa-file-text-o text-custom-primary fs-1 mb-3"></i>
                            <h5 class="card-title fw-bold text-dark-custom mb-3">Jasa Pembuatan Resume</h5>
                            <p class="card-text text-dark-custom">
                                Buat resume yang profesional dan menarik perhatian rekruter dengan bantuan ahli kami.
                            </p>
                            <a href="/service/resume" class="btn btn-outline-custom-dark mt-3">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why choose us section -->
    <section class="bg-light-bg py-5">
        <div class="container">
            <!-- Title section -->
            <div class="text-center pb-4">
                <h3 class="fw-bold text-dark-custom mb-2">
                    Kenapa Memilih Kami
                </h3>
                <div class="bg-custom-primary mx-auto" style="width: 50px; height: 3px;"></div>
            </div>

            <!-- Content blocks -->
            <div class="row justify-content-center text-center">
                <div class="col-sm-10 col-md-6 col-lg-3 mb-4">
                    <!-- Block1 -->
                    <div class="card h-100 border-0 shadow-sm block1 trans-04 bg-lighter-bg">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center block1-show trans-04">
                            <div class="block1-symbol d-flex justify-content-center align-items-center mb-3">
                                <img class="symbol-dark trans-04" src="{{ asset('theme/cprofile1/images/icons/symbol-01-dark.png') }}" alt="IMG">
                                <img class="symbol-light ab-t-c op-00 trans-04" src="{{ asset('theme/cprofile1/images/icons/symbol-01-light.png') }}" alt="IMG">
                            </div>
                            <h4 class="card-title text-uppercase text-dark-custom fw-bold block1-title trans-04">
                                Tim Profesional dan Berpengalaman
                            </h4>
                        </div>
                            
                        <div class="card-footer bg-lighter-bg border-0 d-flex flex-column align-items-center justify-content-center block1-hide trans-04">
                            <p class="text-dark-custom mb-3">
                                Tim kami terdiri dari orang-orang yang berpengalaman dan profesional di bidangnya.
                            </p>
                            <a href="#" class="btn btn-outline-custom-dark text-uppercase">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-6 col-lg-3 mb-4">
                    <!-- Block2 -->
                    <div class="card h-100 border-0 shadow-sm block1 trans-04 bg-lighter-bg">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center block1-show trans-04">
                            <div class="block1-symbol d-flex justify-content-center align-items-center mb-3">
                                <img class="symbol-dark trans-04" src="{{ asset('theme/cprofile1/images/icons/symbol-02-dark.png') }}" alt="IMG">
                                <img class="symbol-light ab-t-c op-00 trans-04" src="{{ asset('theme/cprofile1/images/icons/symbol-02-light.png') }}" alt="IMG">
                            </div>
                            <h4 class="card-title text-uppercase text-dark-custom fw-bold block1-title trans-04">
                                Ide Kreatif dan Inovatif
                            </h4>
                        </div>
                            
                        <div class="card-footer bg-lighter-bg border-0 d-flex flex-column align-items-center justify-content-center block1-hide trans-04">
                            <p class="text-dark-custom mb-3">
                                Kami selalu berusaha untuk memberikan ide-ide kreatif dan inovatif untuk kebutuhan bisnis anda.
                            </p>
                            <a href="#" class="btn btn-outline-custom-dark text-uppercase">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-6 col-lg-3 mb-4">
                    <!-- Block3 -->
                    <div class="card h-100 border-0 shadow-sm block1 trans-04 bg-lighter-bg">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center block1-show trans-04">
                            <div class="block1-symbol d-flex justify-content-center align-items-center mb-3">
                                <img class="symbol-dark trans-04" src="{{ asset('theme/cprofile1/images/icons/symbol-03-dark.png') }}" alt="IMG">
                                <img class="symbol-light ab-t-c op-00 trans-04" src="{{ asset('theme/cprofile1/images/icons/symbol-03-light.png') }}" alt="IMG">
                            </div>
                            <h4 class="card-title text-uppercase text-dark-custom fw-bold block1-title trans-04">
                                Proses Cepat dan Tepat
                            </h4>
                        </div>
                            
                        <div class="card-footer bg-lighter-bg border-0 d-flex flex-column align-items-center justify-content-center block1-hide trans-04">
                            <p class="text-dark-custom mb-3">
                                Kami selalu berusaha untuk memberikan pelayanan yang cepat dan tepat untuk kebutuhan bisnis anda.
                            </p>
                            <a href="#" class="btn btn-outline-custom-dark text-uppercase">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-6 col-lg-3 mb-4">
                    <!-- Block4 -->
                    <div class="card h-100 border-0 shadow-sm block1 trans-04 bg-lighter-bg">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center block1-show trans-04">
                            <div class="block1-symbol d-flex justify-content-center align-items-center mb-3">
                                <img class="symbol-dark trans-04" src="{{ asset('theme/cprofile1/images/icons/symbol-04-dark.png') }}" alt="IMG">
                                <img class="symbol-light ab-t-c op-00 trans-04" src="{{ asset('theme/cprofile1/images/icons/symbol-04-light.png') }}" alt="IMG">
                            </div>
                            <h4 class="card-title text-uppercase text-dark-custom fw-bold block1-title trans-04">
                                Harga Terjangkau
                            </h4>
                        </div>
                            
                        <div class="card-footer bg-lighter-bg border-0 d-flex flex-column align-items-center justify-content-center block1-hide trans-04">
                            <p class="text-dark-custom mb-3">
                                Kami selalu berusaha untuk memberikan harga yang terjangkau untuk kebutuhan bisnis anda.
                            </p>
                            <a href="#" class="btn btn-outline-custom-dark text-uppercase">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Project section -->
    <section id="project" class="bg-light-bg py-5">
        <div class="container">
            <!-- Title section -->
            <div class="text-center pb-4">
                <h3 class="fw-bold text-dark-custom mb-2">
                    Project Kami
                </h3>
                <div class="bg-custom-primary mx-auto" style="width: 50px; height: 3px;"></div>
            </div>

            <!-- Project cards -->
            <div class="row justify-content-center">
                @foreach($projects as $project)
                    @if($project->isDone == 2)
                        <div class="col-sm-10 col-md-8 col-lg-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm project-card" style="height: 300px;">
                                <img src="{{ $project->thumbnail }}" class="project-image" alt="{{ $project->name }}">
                                <div class="project-title text-white text-uppercase fw-bold">
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
            title.addEventListener('click', () => {
                card.classList.toggle('active');
            });
        });
    </script>
@endsection
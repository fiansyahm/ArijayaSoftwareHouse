
<!DOCTYPE html>
<html lang="en">
<head>
	<title>
        @yield('title')
    </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="https://i.ibb.co.com/8zZ7CdS/ideea-logo.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/revolution/css/layers.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/revolution/css/navigation.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/revolution/css/settings.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/slick/slick.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/vendor/MagnificPopup/magnific-popup.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/css/util.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('theme/cprofile1/css/main.css') }}">
<!--===============================================================================================-->
	@yield('css')
</head>
<body class="animsition">

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<nav class="container-header-desktop">
			<div class="top-bar">
				<div class="content-topbar container flex-sb-c h-full">
					<div class="size-w-0 flex-wr-s-c">
						<div class="t1-s-1 cl-13 m-r-50">
							<span class="fs-16 m-r-6">
								<i class="fa fa-home" aria-hidden="true"></i>
							</span>
							<span>JATIM</span>
						</div>

						<div class="t1-s-1 cl-13 m-r-50">
							<span class="fs-16 m-r-6">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</span>
							<span>
								<a href="https://api.whatsapp.com/send?phone=+6285812570358&text=Halo%20Admin%20Saya%20Mau%20Konsultasi%20Jasanya" target="_blank">(+62)87888971186</a>
							</span>
						</div>

						<div class="t1-s-1 cl-13 m-r-50">
							<span class="fs-16 m-r-6">
								<i class="fa fa-clock-o" aria-hidden="true"></i>
							</span>
							<span>Senin-Sabtu 09:00 - 17:00 WIB /Minggu TUTUP</span>
						</div>					
					</div>

					<div class="text-nowrap">
						<a href="#" class="fs-16 cl-13 hov-link2 trans-02 m-l-15">
							<i class="fa fa-facebook-official"></i>	
						</a>

						<a href="#" class="fs-16 cl-13 hov-link2 trans-02 m-l-15">
							<i class="fa fa-twitter"></i>	
						</a>

						<a href="#" class="fs-16 cl-13 hov-link2 trans-02 m-l-15">
							<i class="fa fa-google-plus"></i>	
						</a>

						<a href="#" class="fs-16 cl-13 hov-link2 trans-02 m-l-15">
							<i class="fa fa-instagram"></i>	
						</a>

						<a href="#" class="fs-16 cl-13 hov-link2 trans-02 m-l-15">
							<i class="fa fa-linkedin"></i>	
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<div class="limiter-menu-desktop container">					
					<!-- Logo desktop -->		
					<div class="logo">
						<a href="/"><img src="https://i.ibb.co.com/8zZ7CdS/ideea-logo.jpg" height="100px" width="100px" alt="LOGO"></a>
					</div>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu respon-sub-menu">
							<li>
								<a href="/">Home</a>
								{{-- <ul class="sub-menu">
									<li><a href="index.html">Homepage v1</a></li>
									<li><a href="home-02.html">Homepage v2</a></li>
									<li><a href="home-03.html">Homepage v3</a></li>
								</ul> --}}
							</li>

							<li>
								<a href="#about.html">About Us</a>
							</li>

							<li>
								<a href="services-list.html">Services</a>
								<ul class="sub-menu">
									{{-- <li><a href="services-list.html">Services List</a></li> --}}
									<li>
										<a href="#">Services Detail</a>

										<ul class="sub-menu">
											<li><a href="/service/entry">Jasa Entry Data</a></li>
											<li><a href="/service/website">Jasa Pembuatan Website</a></li>
											<li><a href="/service/ui">Jasa Konsul UI/UX</a></li>
											<li><a href="/service/android">Jasa Pembuatan Aplikasi Android</a></li>
											<li><a href="/service/resume">Jasa Pembuatan Resume</a></li>
											{{-- <li><a href="services-detail-05.html">Penyedia Prompt Chatgpt</a></li> --}}
										</ul>
									</li>
								</ul>
							</li>

							{{-- <li>
								<a href="news-grid.html">News</a>
								<ul class="sub-menu">
									<li><a href="news-grid.html">News Grid</a></li>
									<li><a href="news-list.html">News List</a></li>
									<li><a href="news-detail.html">News Detail</a></li>
								</ul>
							</li>

							<li>
								<a href="projects-grid.html">Projects</a>
								<ul class="sub-menu">
									<li><a href="projects-grid.html">Projects Grid</a></li>
									<li>
										<a href="#">Projects Detail</a>

										<ul class="sub-menu">
											<li><a href="projects-detail-01.html">Projects Detail v1</a></li>
											<li><a href="projects-detail-02.html">Projects Detail v2</a></li>
										</ul>
									</li>
								</ul>
							</li>

							<li>
								<a href="shop-grid.html">Shop</a>
								<ul class="sub-menu">
									<li><a href="shop-grid.html">Shop Grid</a></li>
									<li><a href="shop-detail.html">Shop Detail</a></li>
									<li><a href="shop-cart.html">Shop Cart</a></li>
								</ul>
							</li> --}}

							<li>
								<a href="#contact.html">Contact us</a>
							</li>
						</ul>
					</div>					
				</div>
			</div>	
		</nav>

		<!-- Header Mobile -->
		<nav class="container-header-mobile">
			<div class="wrap-header-mobile">
				<!-- Logo moblie -->		
				<div class="logo-mobile">
					<a href="/"><img src="https://i.ibb.co.com/8zZ7CdS/ideea-logo.jpg" height="100px" width="100px" alt="LOGO"></a>
				</div>
				

				<!-- Button show menu -->
				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>			
			</div>

			<div class="menu-mobile">
				<ul class="top-bar-m p-l-20 p-tb-8">
					<li>
						<div class="t1-s-1 cl-5 p-tb-3">
							<span class="fs-16 m-r-6">
								<i class="fa fa-home" aria-hidden="true"></i>
							</span>
							<span>379 5Th Ave New York, Nyc 10018</span>
						</div>
					</li>

					<li>
						<div class="t1-s-1 cl-5 p-tb-3">
							<span class="fs-16 m-r-6">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</span>
							<span>
								<a href="https://api.whatsapp.com/send?phone=+6285812570358&text=Halo%20Admin%20Saya%20Mau%20Konsultasi%20Jasanya" target="_blank">(+62)87888971186
								</a>
							</span>
						</div>
					</li>

					<li>
						<div class="t1-s-1 cl-5 p-tb-3">
							<span class="fs-16 m-r-6">
								<i class="fa fa-clock-o" aria-hidden="true"></i>
							</span>
							<span>Mon-Sat 09:00 am - 17:00 pm/Sunday CLOSE</span>
						</div>
					</li>

					<li>
						<div>
							<a href="#" class="fs-16 cl-5 hov-link2 trans-02 m-r-15">
								<i class="fa fa-facebook-official"></i>	
							</a>

							<a href="#" class="fs-16 cl-5 hov-link2 trans-02 m-r-15">
								<i class="fa fa-twitter"></i>	
							</a>

							<a href="#" class="fs-16 cl-5 hov-link2 trans-02 m-r-15">
								<i class="fa fa-google-plus"></i>	
							</a>

							<a href="#" class="fs-16 cl-5 hov-link2 trans-02 m-r-15">
								<i class="fa fa-instagram"></i>	
							</a>

							<a href="#" class="fs-16 cl-5 hov-link2 trans-02 m-r-15">
								<i class="fa fa-linkedin"></i>	
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
	</header>

    @yield('main')
	
	<!-- Footer -->
	<footer>
		<div class="parallax100 kit-overlay1 p-t-35 p-b-10" style="background-image: url(images/bg-03.jpg);">
			<div class="container">
				<div class="row justify-content-center justify-content-md-start">
					<div class="col-sm-8 col-md-4 col-lg-3 p-b-20">
						<div class="size-h-1 flex-s-e p-b-6 m-b-18">
							<a href="/">
								<img class="max-s-full" height="50px" width="50px" src="https://i.ibb.co.com/8zZ7CdS/ideea-logo.jpg" alt="LOGO">
							</a>
						</div>

						<div>
							<p class="t1-s-2 cl-13 p-b-17">
								Kami Menyediakan Berbagai Jasa Dengan Kualitas & Hasil Terbaik.
							</p>

							<div class="flex-wr-s-c p-t-10">
								<a href="#" class="flex-c-c size-a-7 borad-50per bg-11 fs-16 cl-0 hov-btn2 trans-02 m-r-10">
									<i class="fa fa-facebook"></i>	
								</a>

								<a href="#" class="flex-c-c size-a-7 borad-50per bg-11 fs-16 cl-0 hov-btn2 trans-02 m-r-10">
									<i class="fa fa-twitter"></i>	
								</a>

								<a href="#" class="flex-c-c size-a-7 borad-50per bg-11 fs-16 cl-0 hov-btn2 trans-02 m-r-10">
									<i class="fa fa-google-plus"></i>	
								</a>

								<a href="#" class="flex-c-c size-a-7 borad-50per bg-11 fs-16 cl-0 hov-btn2 trans-02 m-r-10">
									<i class="fa fa-instagram"></i>	
								</a>

								<a href="#" class="flex-c-c size-a-7 borad-50per bg-11 fs-16 cl-0 hov-btn2 trans-02 m-r-10">
									<i class="fa fa-linkedin"></i>	
								</a>
							</div>
						</div>
					</div>

					<div class="col-sm-8 col-md-4 col-lg-3 p-b-20">
						<div class="size-h-1 flex-s-e m-b-18">
							<h4 class="t1-m-3 text-uppercase cl-0">
								Contact us
							</h4>
						</div>

						<ul>
							<li class="flex-wr-s-s t1-s-2 cl-13 p-b-9">
								<span class="size-w-3">
									<i class="fa fa-home" aria-hidden="true"></i>
								</span>

								<span class="size-w-4">
									JATIM
								</span>
							</li>

							<li class="flex-wr-s-s t1-s-2 cl-13 p-b-9">
								<span class="size-w-3">
									<i class="fa fa-envelope-o" aria-hidden="true"></i>
								</span>

								<span class="size-w-4">
									arijayadigitalprinting@gmail.com
								</span>
							</li>

							<li class="flex-wr-s-s t1-s-2 cl-13 p-b-9">
								<span class="size-w-3">
									<i class="fa fa-phone" aria-hidden="true"></i>
								</span>

								<span class="size-w-4">
									<a href="api.whatsapp.com/send?phone=6285812570358&text=Halo%20Admin%20Saya%20Mau%20Order%20">(+62)878 8897 1186</a>
									<br>
									<a href="api.whatsapp.com/send?phone=6285812570358&text=Halo%20Admin%20Saya%20Mau%20Order%20">(+62)878 8897 1186</a>
								</span>
							</li>
						</ul>
					</div>

					<div class="col-sm-8 col-md-4 col-lg-3 p-b-20">
						<div class="size-h-1 flex-s-e m-b-18">
							<h4 class="t1-m-3 text-uppercase cl-0">
								Company
							</h4>
						</div>

						<div class="flex-wr-s-s">
							<ul class="w-50">
								<li class="kit-list1 p-b-9">
									<a href="/" class="t1-s-2 cl-13 hov-link2 trans-02">
										Home
									</a>
								</li>

								<li class="kit-list1 p-b-9">
									<a href="projects-grid.html" class="t1-s-2 cl-13 hov-link2 trans-02">
										Projects
									</a>
								</li>

								<li class="kit-list1 p-b-9">
									<a href="services-list.html" class="t1-s-2 cl-13 hov-link2 trans-02">
										Services
									</a>
								</li>

								<li class="kit-list1 p-b-9">
									<a href="#" class="t1-s-2 cl-13 hov-link2 trans-02">
										About us
									</a>
								</li>

								<li class="kit-list1 p-b-9">
									<a href="#" class="t1-s-2 cl-13 hov-link2 trans-02">
										Contact
									</a>
								</li>
							</ul>

							<ul class="w-50">
								<li class="kit-list1 p-b-9">
									<a href="#" class="t1-s-2 cl-13 hov-link2 trans-02">
										Blogs
									</a>
								</li>

								<li class="kit-list1 p-b-9">
									<a href="#" class="t1-s-2 cl-13 hov-link2 trans-02">
										404 Page
									</a>
								</li>

								<li class="kit-list1 p-b-9">
									<a href="shop-grid.html" class="t1-s-2 cl-13 hov-link2 trans-02">
										Shop
									</a>
								</li>

								<li class="kit-list1 p-b-9">
									<a href="#" class="t1-s-2 cl-13 hov-link2 trans-02">
										Elements
									</a>
								</li>

								<li class="kit-list1 p-b-9">
									<a href="typography.html" class="t1-s-2 cl-13 hov-link2 trans-02">
										Typography
									</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="col-sm-8 col-md-6 col-lg-3 p-b-20">
						<div class="size-h-1 flex-s-e m-b-18">
							<h4 class="t1-m-3 text-uppercase cl-0">
								Gallery
							</h4>
						</div>

						<div class="flex-wr-s-s p-t-6 gallery-mp">
							<a href="images/gallery-01.jpg') }}" class="d-block size-a-8 bg-img1 hov-overlay1 m-r-10 m-b-20 js-show-gallery" style="background-image: url(images/gallery-01.jpg);"></a>
							<a href="images/gallery-02.jpg') }}" class="d-block size-a-8 bg-img1 hov-overlay1 m-r-10 m-b-20 js-show-gallery" style="background-image: url(images/gallery-02.jpg);"></a>
							<a href="images/gallery-03.jpg') }}" class="d-block size-a-8 bg-img1 hov-overlay1 m-r-10 m-b-20 js-show-gallery" style="background-image: url(images/gallery-03.jpg);"></a>
							<a href="images/gallery-04.jpg') }}" class="d-block size-a-8 bg-img1 hov-overlay1 m-r-10 m-b-20 js-show-gallery" style="background-image: url(images/gallery-04.jpg);"></a>
							<a href="images/gallery-05.jpg') }}" class="d-block size-a-8 bg-img1 hov-overlay1 m-r-10 m-b-20 js-show-gallery" style="background-image: url(images/gallery-05.jpg);"></a>
							<a href="images/gallery-06.jpg') }}" class="d-block size-a-8 bg-img1 hov-overlay1 m-r-10 m-b-20 js-show-gallery" style="background-image: url(images/gallery-06.jpg);"></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg-10">
			<div class="container txt-center p-tb-15">
				<span class="t1-s-2 cl-14">
					Copyright @ 2023 ideea.link . All rights reserved. 
				</span>
			</div>
		</div>
	</footer>

<!--===============================================================================================-->	
	<script src="{{ asset('theme/cprofile1/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/cprofile1/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/cprofile1/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('theme/cprofile1/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
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
<!--===============================================================================================-->
	<script src="{{ asset('theme/cprofile1/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/cprofile1/vendor/parallax100/parallax100.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/cprofile1/vendor/waypoint/jquery.waypoints.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/cprofile1/vendor/countterup/jquery.counterup.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/cprofile1/vendor/slick/slick.min.js') }}"></script>
	<script src="{{ asset('theme/cprofile1/js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/cprofile1/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('theme/cprofile1/js/main.js') }}"></script>

</body>
</html>
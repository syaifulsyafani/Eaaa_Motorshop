<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config ('app.name') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/Logo.png') }}" rel="icon" type="text/css">
  <link href="{{ asset('img/Logo.png') }}" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('vendor/icofont/icofont.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('vendor/venobox/venobox.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet" type="text/css">

  <!-- Datepicker CSS Files -->
  <link href="{{ asset('air-datepicker/dist/css/datepicker.css') }}" rel="stylesheet" type="text/css">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

  <!-- =======================================================
  * Template Name: Dewi - v2.2.1
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="eaaamotorshop" class="logo">
        <img src="img/Logo.png" alt="" class="img-fluid"></a>

      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#bundling">Pricelist</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Home Section ======= -->
  <section id="home">
    <div class="home-container" data-aos="fade-up" data-aos-delay="150">
      <h1>{{ config ('app.name') }}</h1>
      <h2>We are a custom motorbike specialist workshop</h2>
      <div class="d-flex">
        <a href="login" class="btn-get-started scrollto">Make Appointment</a>
      </div>
    </div>
  </section><!-- End Home -->

  <main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about-boxes">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
          <p>About Us</p>
        </div>

        <div class="row">

          <div class="col-lg-6 col-md-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <img src="img/6.jpeg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-brush-4-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Our Mission</a></h5>
                <p class="card-text">1. Memberikan solusi serta pelayanan yang terbaik<br>
                  2. Memprioritaskan kepuasan konsumen<br>
                  3. Profesionalitas dalam bekerja<br>
                  4. Menerapkan standar mutu dalam proses kerja
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <img src="img/11.jpeg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="ri-movie-2-line"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Our Vision</a></h5>
                <p class="card-text">Menjadi bengkel yang dapat dipercaya oleh customer dari segi kualitas barang serta pelayanan yang diberikan.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Our Services</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-md-6">
            <div class="icon-box">
              <i class="icofont-motor-bike-alt"></i>
              <h4>Custom</h4>
              <p>Menerima segala model custom motor dari perubahan ringan sampai merubah total bentuk motor.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="icofont-gears"></i>
              <h4>Maintenance</h4>
              <p>Menerima perawatan berkala untuk kendaraan bermotor roda dua kesayangan anda.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="icofont-paint"></i>
              <h4>Repaint</h4>
              <p>Menerima pengecatan motor dari body, rangka, velg, dll. dengan bahan serta kualitas cat yang diinginkan.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="icofont-repair"></i>
              <h4>Installation</h4>
              <p>Menerima pemasangan part-part kendaraan bermotor roda dua.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="icofont-refresh"></i>
              <h4>Restoration</h4>
              <p>Menerima perbaikan pada kendaraan roda dua berupa perbaikan mesin, perbaikan rangka, dll.</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="icofont-shopping-cart"></i>
              <h4>Spareparts</h4>
              <p>Menerima pembelian serta perbaikan sparepart baik pembelian yang ada pada workshop atau by request.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Our Portfolio</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="img/1.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="img/2.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="img/3.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="img/4.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="img/5.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="img/6.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="img/7.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="img/8.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="img/9.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="img/10.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="img/11.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="img/12.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="img/13.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="img/14.jpeg" class="img-fluid" alt="">
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="img/15.jpeg" class="img-fluid" alt="">
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Bundling ======= -->
    <section id="bundling" class="bundling section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pricelist</h2>
          <p>Our Package</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="package">
              <div class="package-info">
                <h4>Package 1</h4>
                <span>Oli Mesin<br>
                  Service Ringan<br>
                </span>
                <p><br><br>IDR. 150.000-300.000</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="package">
              <div class="package-info">
                <h4>Package 2</h4>
                <span>Oli Mesin<br>
                  Service Ringan<br>
                  Cleaning Injektor/Karbulator<br>
                </span>
                <p><br>IDR. 200.000-450.000</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="package">
              <div class="package-info">
                <h4>Package 3</h4>
                <span>Oli Mesin<br>
                  Service Ringan<br>
                  Cleaning Injektor/Karbulator<br>
                  Tune Up
                </span>
                <p>IDR. 300.000-550.000</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="package">
              <div class="package-info">
                <h4>Repaint 1</h4>
                <span>Body Repaint (include repair)</span>
                <p><br><br>Start From <br>
                  IDR. 800.000
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="package">
              <div class="package-info">
                <h4>Repaint 2</h4>
                <span>Body Repaint (include repair)<br>
                  + Rangka <br>
                </span>
                <p><br>Start From <br>
                  IDR. 1.500.000</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="package">
              <div class="package-info">
                <h4>Repaint 3</h4>
                <span>Body Repaint (include repair)<br>
                  + Rangka <br>
                  + Velg
                </span>
                <p>Start From <br>
                  IDR. 2.000.000 </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="package">
              <div class="package-info">
                <h4>Custom up to 150cc</h4>
                <span>Request by Customer</span>
                <p><br><br>Start From<br>
                  IDR. 1.700.000
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="package">
              <div class="package-info">
                <h4>Custom 150-500cc</h4>
                <span>Request by Customer</span>
                <p><br><br>Start From<br>
                  IDR. 2.500.000</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="package">
              <div class="package-info">
                <h4>Custom 500cc Up</h4>
                <span>Request by Customer</span>
                <p><br><br>Start From<br>
                  IDR. 3.000.000 </p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Bundling Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container text-center">
        <div class="row">

          <div class="col-sm-4 col-md-4">
            <div class="footer-info">
              <h3>Contact Us</h3>
              <div class="social-links mt-3">
                <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                <a href="https://www.instagram.com/eaaamotoshop/" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>

          <div class="col-sm-4 col-md-4">
            <div class="footer-info">
              <h3>Address</h3>
              <p>Jl. Pejaten Raya No.Kav.30, RT.5/RW.6<br>
                Pejaten Barat, Pasar Minggu, Jakarta Selatan, Jakarta 12510<br>
            </div>
          </div>

          <div class="col-sm-4 col-md-4">
            <div class="footer-info">
              <h3>Open Hours</h3>
              <p>Monday-Saturday<br>
                08.00-18.00 WIB</p>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Dewi</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#home" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/counterup/counterup.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/venobox/venobox.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/aos/aos.js') }}"></script>

  <!-- Datepicker Js Files -->
  <script type="text/javascript" src="{{ asset('air-datepicker/dist/js/datepicker.js') }}"></script>
  <script type="text/javascript" src="{{ asset('air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>
    
  <!-- Template Main JS File -->
  <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</body>

</html>
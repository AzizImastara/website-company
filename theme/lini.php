<?php 
require_once 'config/database.php';

// Ambil kategori portfolio untuk mapping
$kategori_portofolio = getKategoriPortofolio();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8" />
    <title>Lini Bisnis</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Construction Html5 Template" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=5.0"
    />
    <meta name="author" content="Themefisher" />
    <meta name="generator" content="Themefisher Constra HTML Template v1.0" />

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="images/favicon.png" />

    <!-- CSS
================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css" />
    <!-- Animation -->
    <link rel="stylesheet" href="plugins/animate-css/animate.css" />
    <!-- slick Carousel -->
    <link rel="stylesheet" href="plugins/slick/slick.css" />
    <link rel="stylesheet" href="plugins/slick/slick-theme.css" />
    <!-- Colorbox -->
    <link rel="stylesheet" href="plugins/colorbox/colorbox.css" />
    <!-- Template styles-->
    <link rel="stylesheet" href="css/style.css" />
    <style>
  .business-card {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.08);
    padding: 2rem 1.5rem 1.5rem 1.5rem;
    margin-bottom: 2rem;
    transition: box-shadow 0.2s;
    position: relative;
    overflow: hidden;
  }
  .business-card:hover {
    box-shadow: 0 8px 32px rgba(0,0,0,0.13);
    transform: translateY(-4px) scale(1.02);
  }
  .business-card .ts-service-image-wrapper img {
    border-radius: 12px;
    margin-bottom: 1.2rem;
    box-shadow: 0 2px 12px rgba(0,0,0,0.06);
  }
  .business-card .ts-service-box-img {
    margin-right: 1.2rem;
    display: flex;
    align-items: flex-start;
  }
  .business-card .ts-service-info h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
  }
  .business-card .ts-service-info p {
    color: #555;
    font-size: 1rem;
    margin-bottom: 0.7rem;
  }
  .business-card .learn-more {
    color: #3fd80b;
    font-weight: 500;
    text-decoration: none;
    transition: color 0.2s;
  }
  .business-card .learn-more:hover {
    color: #1a2236;
    text-decoration: underline;
  }
  @media (max-width: 767px) {
    .business-card {
      padding: 1.2rem 0.7rem;
    }
  }
</style>
  </head>
  <body>
    <div class="body-inner">
      <!-- Navbar Component Container -->
      <div id="navbar-container">
        <!-- Navbar will be loaded here via JavaScript -->
      </div>
      <div
        id="banner-area"
        class="banner-area"
        style="background-image: url(images/banner/banner1.jpg)"
      >
        <div class="banner-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Lini Bisnis</h1>
                </div>
              </div>
              <!-- Col end -->
            </div>
            <!-- Row end -->
          </div>
          <!-- Container end -->
        </div>
        <!-- Banner text end -->
      </div>
      <!-- Banner area end -->

      <section id="main-container" class="main-container pb-2">
        <div class="container">
          <!-- Intro Section -->
          <div class="row">
            <div class="col-12">
              <div class="text-center m-2">
                <p class="section-description">
                  PT. Karya Mandiri Cakra Buana berfokus pada dua lini utama
                  yaitu konstruksi dan pertambangan. Dengan pengalaman
                  bertahun-tahun, kami menghadirkan solusi terintegrasi yang
                  mencakup penyiraman tambang, revegetasi tambang, supporting
                  tambang.
                </p>
              </div>
            </div>
          </div>

          <!-- Business Lines -->
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-2">
              <div class="business-card ts-service-box">
                <div class="ts-service-image-wrapper">
                  <img loading="lazy" class="w-100" src="images/services/service1.jpg" alt="service-image" />
                </div>
                <div class="d-flex">
                  <div class="ts-service-box-img">
                    <i class="fas fa-shower" style="font-size: 48px; color: #3fd80b; margin-top: 10px"></i>
                  </div>
                  <div class="ts-service-info">
                    <h3 class="service-box-title"><a href="#">Penyiraman Tambang</a></h3>
                    <p>Layanan penyiraman profesional untuk area tambang guna mengurangi debu dan menjaga kelembaban lingkungan kerja dengan teknologi dan peralatan terdepan.</p>
                    <a class="learn-more d-inline-block" href="portofolio.php?kategori=penyiraman_tambang" aria-label="service-details"><i class="fa fa-caret-right"></i> Lihat Portofolio</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
              <div class="business-card ts-service-box">
                <div class="ts-service-image-wrapper">
                  <img loading="lazy" class="w-100" src="images/services/service2.jpg" alt="service-image" />
                </div>
                <div class="d-flex">
                  <div class="ts-service-box-img">
                    <i class="fas fa-seedling" style="font-size: 48px; color: #3fd80b; margin-top: 10px"></i>
                  </div>
                  <div class="ts-service-info">
                    <h3 class="service-box-title"><a href="#">Revegetasi Tambang</a></h3>
                    <p>Penanaman kembali vegetasi pada area tambang untuk mengembalikan keseimbangan ekosistem dan memulihkan kondisi lingkungan pasca penambangan.</p>
                    <a class="learn-more d-inline-block" href="portofolio.php?kategori=revegetasi_tambang" aria-label="service-details"><i class="fa fa-caret-right"></i> Lihat Portofolio</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
              <div class="business-card ts-service-box">
                <div class="ts-service-image-wrapper">
                  <img loading="lazy" class="w-100" src="images/services/service3.jpg" alt="service-image" />
                </div>
                <div class="d-flex">
                  <div class="ts-service-box-img">
                    <i class="fas fa-cogs" style="font-size: 48px; color: #3fd80b; margin-top: 10px"></i>
                  </div>
                  <div class="ts-service-info">
                    <h3 class="service-box-title"><a href="#">Supporting Tambang</a></h3>
                    <p>Layanan pendukung operasional tambang termasuk maintenance peralatan, infrastruktur, dan berbagai kebutuhan operasional lainnya.</p>
                    <a class="learn-more d-inline-block" href="portofolio.php?kategori=supporting_tambang" aria-label="service-details"><i class="fa fa-caret-right"></i> Lihat Portofolio</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Main row end -->
        </div>
        <!-- Container end -->
      </section>
      <!-- Main container end -->

      <!-- Footer Component Container -->
      <div id="footer-container">
        <!-- Footer will be loaded here via JavaScript -->
      </div>

      <!-- Javascript Files
  ================================================== -->

      <!-- initialize jQuery Library -->
      <script src="plugins/jQuery/jquery.min.js"></script>
      <!-- Bootstrap jQuery -->
      <script src="plugins/bootstrap/bootstrap.min.js" defer></script>
      <!-- Slick Carousel -->
      <script src="plugins/slick/slick.min.js"></script>
      <script src="plugins/slick/slick-animation.min.js"></script>
      <!-- Color box -->
      <script src="plugins/colorbox/jquery.colorbox.js"></script>
      <!-- shuffle -->
      <script src="plugins/shuffle/shuffle.min.js" defer></script>

      <!-- Google Map API Key-->
      <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU"
        defer
      ></script>
      <!-- Google Map Plugin-->
      <script src="plugins/google-map/map.js" defer></script>

      <!-- Template custom -->
      <script src="js/script.js"></script>

      <!-- Initialize components -->
      <script src="components/component-loader.js"></script>
    </div>
    <!-- Body inner end -->
  </body>
</html>

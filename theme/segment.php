<?php require_once 'config/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8" />
    <title>Segmen Industri</title>

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
  </head>
  <body>
    <div class="body-inner">
      <!-- Navbar Component Container -->
      <div id="navbar-container">
        <!-- Navbar will be loaded here via JavaScript -->
      </div>
        <div id="banner-area" class="banner-area" style="background-image:url(images/banner/banner1.jpg)">

        <div class="banner-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Segmen Industri</h1>
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
      <!-- Modern Segmen Industri Content Section -->
      <section class="segment-section-modern">
        <h2 class="segment-title"><i class="fas fa-industry"></i> Segmen Industri</h2>
        <p class="segment-desc">PT. Karya Mandiri Cakra Buana melayani berbagai segmen industri dengan pendekatan yang fleksibel dan profesional. Segmentasi pasar kami meliputi:</p>
        <div class="segment-cards">
          <div class="segment-card">
            <div class="segment-card-icon mining"><i class="fas fa-hard-hat"></i></div>
            <div class="segment-card-content">
              <h3 class="segment-card-title">Industri Pertambangan</h3>
              <p class="segment-card-text">Menyediakan layanan operasional dan pemeliharaan area tambang yang mengedepankan keselamatan, efisiensi, dan keberlanjutan lingkungan.</p>
            </div>
          </div>
          <div class="segment-card">
            <div class="segment-card-icon government"><i class="fas fa-landmark"></i></div>
            <div class="segment-card-content">
              <h3 class="segment-card-title">Sektor Pemerintahan & Proyek Infrastruktur Publik</h3>
              <p class="segment-card-text">Terlibat dalam pembangunan fasilitas umum dan proyek strategis daerah yang membutuhkan standar mutu tinggi dan ketepatan waktu.</p>
            </div>
          </div>
          <div class="segment-card">
            <div class="segment-card-icon private"><i class="fas fa-industry"></i></div>
            <div class="segment-card-content">
              <h3 class="segment-card-title">Perusahaan Swasta & Industri Manufaktur</h3>
              <p class="segment-card-text">Menjadi mitra pembangunan untuk fasilitas industri seperti gudang, pabrik, serta akses dan utilitas pendukung lainnya.</p>
            </div>
          </div>
          <div class="segment-card">
            <div class="segment-card-icon bumn"><i class="fas fa-building"></i></div>
            <div class="segment-card-content">
              <h3 class="segment-card-title">Badan Usaha Milik Negara (BUMN)</h3>
              <p class="segment-card-text">Bekerja sama dalam pelaksanaan proyek berskala besar yang memerlukan tenaga ahli dan pengalaman profesional di bidang konstruksi dan lingkungan.</p>
            </div>
          </div>
        </div>
      </section>

        <!-- Footer Component Container -->
            <div id="footer-container">
        <!-- Footer will be loaded here via JavaScript -->
      </div>
      <style>
        .segment-section-modern {
          max-width: 1100px;
          margin: 40px auto 30px auto;
          background: #fff;
          border-radius: 18px;
          box-shadow: 0 6px 32px rgba(44,62,80,0.10);
          padding: 40px 30px 30px 30px;
        }
        .segment-title {
          text-align: center;
          font-size: 2.2rem;
          color: #2c3e50;
          font-weight: 800;
          margin-bottom: 10px;
        }
        .segment-title i {
          color: #2980b9;
          margin-right: 10px;
        }
        .segment-desc {
          text-align: center;
          color: #555;
          font-size: 1.13rem;
          margin-bottom: 38px;
        }
        .segment-cards {
          display: flex;
          flex-wrap: wrap;
          gap: 28px;
          justify-content: center;
        }
        .segment-card {
          background: linear-gradient(135deg, #f8f9fa 0%, #f1f2f6 100%);
          border-radius: 16px;
          box-shadow: 0 2px 12px rgba(44,62,80,0.07);
          padding: 32px 28px 24px 28px;
          flex: 1 1 270px;
          min-width: 270px;
          max-width: 340px;
          display: flex;
          flex-direction: column;
          align-items: center;
          transition: box-shadow 0.2s, transform 0.2s;
          border: 1px solid #f0f0f0;
        }
        .segment-card:hover {
          box-shadow: 0 8px 32px rgba(44,62,80,0.16);
          transform: translateY(-4px) scale(1.03);
        }
        .segment-card-icon {
          width: 64px;
          height: 64px;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 2.1rem;
          margin-bottom: 18px;
          background: linear-gradient(135deg, #2980b9 0%, #6dd5fa 100%);
          color: #fff;
          box-shadow: 0 2px 8px rgba(41, 128, 185, 0.13);
        }
        .segment-card-icon.mining { background: linear-gradient(135deg, #e67e22 0%, #f1c40f 100%); }
        .segment-card-icon.government { background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%); }
        .segment-card-icon.private { background: linear-gradient(135deg, #8e44ad 0%, #6dd5fa 100%); }
        .segment-card-icon.bumn { background: linear-gradient(135deg, #e74c3c 0%, #f39c12 100%); }
        .segment-card-title {
          font-size: 1.18rem;
          font-weight: 700;
          color: #2c3e50;
          margin-bottom: 12px;
          text-align: center;
        }
        .segment-card-text {
          color: #444;
          font-size: 1.04rem;
          text-align: center;
        }
        @media (max-width: 900px) {
          .segment-cards {
            flex-direction: column;
            gap: 22px;
          }
          .segment-section-modern {
            padding: 25px 6px 18px 6px;
          }
        }
      </style>

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

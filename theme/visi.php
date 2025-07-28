<?php require_once 'config/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8" />
    <title>Visi & Misi</title>

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
    
    <!-- Custom styles for redesigned visi-misi page -->
    <style>
      :root {
        --primary-color: #2c3e50;
        --secondary-color: #e74c3c;
        --accent-color: #f39c12;
        --success-color: #27ae60;
        --info-color: #3498db;
        --warning-color: #f1c40f;
        --text-dark: #2c3e50;
        --text-light: #7f8c8d;
        --bg-light: #ecf0f1;
        --white: #ffffff;
        --shadow: 0 10px 30px rgba(0,0,0,0.1);
        --shadow-hover: 0 15px 40px rgba(0,0,0,0.15);
      }

      .vision-mission-section {
        padding: 40px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      }

      .section-header {
        text-align: center;
        margin-bottom: 60px;
      }

      .section-title {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
        position: relative;
        display: inline-block;
      }

      .section-title::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
        left: 50%;
        transform: translateX(-50%);
        bottom: -15px;
        border-radius: 2px;
      }

      .section-subtitle {
        color: var(--text-light);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
      }

      .vision-mission-card {
        background: var(--white);
        border-radius: 20px;
        padding: 50px;
        box-shadow: var(--shadow);
        margin-bottom: 40px;
        transition: all 0.3s ease;
        border: 1px solid rgba(231, 76, 60, 0.1);
        position: relative;
        overflow: hidden;
      }

      .vision-mission-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(180deg, var(--secondary-color), var(--accent-color));
      }

      .vision-mission-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
      }

      .card-header {
        text-align: center;
        margin-bottom: 20px;
        position: relative;
      }

      .card-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--accent-color), #f1c40f);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: var(--white);
        font-size: 2rem;
        transition: all 0.3s ease;
      }

      .vision-mission-card:hover .card-icon {
        transform: scale(1.1);
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
      }

      .card-title {
        font-size: 2.2rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
        font-weight: 600;
        position: relative;
      }

      .card-title::after {
        content: '';
        position: absolute;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, var(--accent-color), #f1c40f);
        left: 50%;
        transform: translateX(-50%);
        bottom: -10px;
        border-radius: 2px;
      }

      .vision-content {
        text-align: center;
        padding: 30px;
        background: linear-gradient(135deg, #e8f5e8 0%, #d4edda 100%);
        border-radius: 15px;
        border: 2px solid rgba(39, 174, 96, 0.2);
        position: relative;
      }

      .vision-text {
        font-size: 1rem;
        line-height: 1.8;
        color: var(--text-dark);
        font-weight: 500;
        margin: 0;
        text-align: justify;
      }

      .mission-content {
        padding: 30px;
        background: linear-gradient(135deg, #f0f8ff 0%, #e6f3ff 100%);
        border-radius: 15px;
        border: 2px solid rgba(52, 152, 219, 0.2);
      }

      .mission-list {
        counter-reset: mission-counter;
        list-style: none;
        padding: 0;
        margin: 0;
      }

      .mission-list li {
        counter-increment: mission-counter;
        padding: 20px 0;
        margin-bottom: 15px;
        position: relative;
        padding-left: 60px;
        background: var(--white);
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
      }

      .mission-list li:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      }

      .mission-list li::before {
        content: counter(mission-counter);
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        width: 35px;
        height: 35px;
        background: linear-gradient(135deg, var(--info-color), #5dade2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-weight: bold;
        font-size: 1.1rem;
      }

      .mission-list li {
        font-size: 1.05rem;
        line-height: 1.6;
        color: var(--text-dark);
      }

      .values-section {
        background: linear-gradient(135deg, var(--primary-color), #34495e);
        color: var(--white);
        padding: 60px 0;
        margin: 60px 0;
        border-radius: 20px;
        text-align: center;
      }

      .values-title {
        font-size: 2rem;
        margin-bottom: 20px;
        color: var(--white);
      }

      .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 30px;
        padding: 40px;
      }

      .value-item {
        background: rgba(255, 255, 255, 0.1);
        padding: 30px;
        border-radius: 15px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
      }

      .value-item:hover {
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.15);
      }

      .value-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--accent-color), #f1c40f);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        color: var(--white);
        font-size: 1.5rem;
      }

      .value-title {
        font-size: 1.2rem;
        margin-bottom: 10px;
        color: var(--white);
        font-weight: 600;
      }

      .value-description {
        font-size: 0.95rem;
        opacity: 0.9;
        line-height: 1.6;
      }

      @media (max-width: 768px) {
        .section-title {
          font-size: 2rem;
        }
        
        .vision-mission-card {
          padding: 30px;
        }
        
        .card-title {
          font-size: 1.8rem;
        }
        
        .vision-text {
          font-size: 1rem;
        }
        
        .mission-list li {
          font-size: 1rem;
          padding-left: 50px;
        }
        
        .values-grid {
          grid-template-columns: 1fr;
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
                  <h1 class="banner-title">Visi & Misi</h1>
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

      <section id="main-container" class="main-container vision-mission-section">
        <div class="container">
          <!-- Section Header -->
          <!-- <div class="section-header">
            <h2 class="section-title">Visi & Misi Perusahaan</h2>
            <p class="section-subtitle">Panduan dan komitmen kami dalam memberikan layanan terbaik untuk kemajuan industri pertambangan Indonesia</p>
          </div> -->

          <!-- Visi Section -->
          <div class="vision-mission-card">
            <div class="card-header">
              <!-- <div class="card-icon">
                <i class="fas fa-eye"></i>
              </div> -->
              <h3 class="card-title">Visi</h3>
            </div>
            <div class="vision-content">
              <p class="vision-text">
                MENJADI PERUSAHAAN TERKEMUKA DI BIDANG JASA PERTAMBANGAN,
                KONSTRUKSI, DAN PERDAGANGAN TERKEMUKA YANG MAMPU MENCIPTAKAN
                NILAI OPTIMAL BAGI PARA PEMANGKU KEPENTINGAN.
              </p>
            </div>
          </div>

          <!-- Misi Section -->
          <div class="vision-mission-card">
            <div class="card-header">
              <!-- <div class="card-icon">
                <i class="fas fa-bullseye"></i>
              </div> -->
              <h3 class="card-title">Misi</h3>
            </div>
            <div class="mission-content">
              <ol class="mission-list">
                <li>
                  Menyediakan Jasa Pertambangan, Konstruksi, Dan Perdagangan
                  Yang Berkomitmen Dan Terpercaya.
                </li>
                <li>
                  Mengutamakan Mutu Dan Pelayanan Demi Kepuasan Pelanggan.
                </li>
                <li>
                  Memberikan Nilai Tambah Kepada Pelanggan Melalui Kemitraan
                  Strategis Dan Jangka Panjang.
                </li>
                <li>
                  Menjadi Tempat Untuk Berprestasi Dan Mengembangkan Sumber
                  Daya Manusia Yang Kompeten Dan Bertanggung Jawab.
                </li>
                <li>
                  Berkomitmen Dan Bertanggung Jawab Pada Dampak Lingkungan
                  Dan Komunitas Yang Berkelanjutan.
                </li>
                <li>
                  Menjadi Aset Yang Berharga Dan Membanggakan Bagi
                  Masyarakat, Bangsa, Dan Negara.
                </li>
              </ol>
            </div>
          </div>

          <!-- Values Section -->
          <div class="values-section">
            <h3 class="values-title">
              <i class="fas fa-star mr-2"></i>Nilai-Nilai Perusahaan
            </h3>
            <p class="p-2">Prinsip-prinsip yang menjadi fondasi dalam menjalankan setiap aktivitas perusahaan</p>
            
            <div class="values-grid">
              <div class="value-item">
                <div class="value-icon">
                  <i class="fas fa-handshake"></i>
                </div>
                <h5 class="value-title">Integritas</h5>
                <p class="value-description">Menjunjung tinggi kejujuran, transparansi, dan tanggung jawab dalam setiap tindakan</p>
              </div>
              
              <div class="value-item">
                <div class="value-icon">
                  <i class="fas fa-award"></i>
                </div>
                <h5 class="value-title">Kualitas</h5>
                <p class="value-description">Berkomitmen untuk memberikan hasil terbaik dengan standar kualitas tinggi</p>
              </div>
              
              <div class="value-item">
                <div class="value-icon">
                  <i class="fas fa-users"></i>
                </div>
                <h5 class="value-title">Kolaborasi</h5>
                <p class="value-description">Membangun kerjasama yang harmonis dengan semua pemangku kepentingan</p>
              </div>
              
              <div class="value-item">
                <div class="value-icon">
                  <i class="fas fa-leaf"></i>
                </div>
                <h5 class="value-title">Keberlanjutan</h5>
                <p class="value-description">Mengutamakan kelestarian lingkungan dan pembangunan berkelanjutan</p>
              </div>
            </div>
          </div>
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
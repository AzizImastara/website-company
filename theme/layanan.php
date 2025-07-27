<?php require_once 'config/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8" />
    <title>Layanan</title>

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
    
    <!-- Custom styles for redesigned layanan page -->
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

      .services-section {
        padding: 80px 0;
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

      .service-category {
        background: var(--white);
        border-radius: 20px;
        padding: 40px;
        box-shadow: var(--shadow);
        margin-bottom: 40px;
        transition: all 0.3s ease;
        border: 1px solid rgba(231, 76, 60, 0.1);
        position: relative;
        overflow: hidden;
      }

      .service-category::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(180deg, var(--secondary-color), var(--accent-color));
      }

      .service-category:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
      }

      .category-header {
        text-align: center;
        margin-bottom: 40px;
      }

      .category-title {
        font-size: 2rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
        font-weight: 600;
      }

      .category-description {
        color: var(--text-light);
        font-size: 1.05rem;
        line-height: 1.6;
      }

      .service-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
      }

      .service-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border-radius: 15px;
        padding: 30px;
        box-shadow: var(--shadow);
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.05);
        position: relative;
        overflow: hidden;
      }

      .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--accent-color);
        transform: scaleY(0);
        transition: transform 0.3s ease;
      }

      .service-card:hover::before {
        transform: scaleY(1);
      }

      .service-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hover);
      }

      .service-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--accent-color), #f1c40f);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        color: var(--white);
        font-size: 1.8rem;
        transition: all 0.3s ease;
      }

      .service-card:hover .service-icon {
        transform: scale(1.1);
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
      }

      .service-title {
        font-size: 1.3rem;
        color: var(--primary-color);
        margin-bottom: 15px;
        font-weight: 600;
      }

      .service-description {
        color: var(--text-light);
        line-height: 1.6;
        margin-bottom: 20px;
      }

      .service-features {
        list-style: none;
        padding: 0;
        margin: 0;
      }

      .service-features li {
        padding: 8px 0;
        color: var(--text-dark);
        position: relative;
        padding-left: 25px;
      }

      .service-features li::before {
        content: '✓';
        position: absolute;
        left: 0;
        color: var(--success-color);
        font-weight: bold;
      }

      .service-cta {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid rgba(0,0,0,0.1);
      }

      .service-cta .btn {
        background: linear-gradient(135deg, var(--accent-color), #f1c40f);
        border: none;
        color: var(--white);
        padding: 10px 25px;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
      }

      .service-cta .btn:hover {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
      }

      .contact-section {
        background: linear-gradient(135deg, var(--primary-color), #34495e);
        color: var(--white);
        padding: 60px 0;
        margin: 60px 0;
        border-radius: 20px;
        text-align: center;
      }

      .contact-title {
        font-size: 2rem;
        margin-bottom: 20px;
        color: var(--white);
      }

      .contact-text {
        font-size: 1.1rem;
        line-height: 1.8;
        max-width: 600px;
        margin: 0 auto 30px;
      }

      .contact-btn {
        background: linear-gradient(135deg, var(--accent-color), #f1c40f);
        border: none;
        color: var(--white);
        padding: 15px 40px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
      }

      .contact-btn:hover {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(231, 76, 60, 0.4);
        color: var(--white);
        text-decoration: none;
      }

      @media (max-width: 768px) {
        .section-title {
          font-size: 2rem;
        }
        
        .service-category {
          padding: 25px;
        }
        
        .service-grid {
          grid-template-columns: 1fr;
        }
        
        .service-card {
          padding: 20px;
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
                  <h1 class="banner-title">Layanan</h1>
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

      <section id="main-container" class="main-container services-section">
        <div class="container">
          <!-- Section Header -->
          <div class="section-header">
            <h2 class="section-title">Layanan Kami</h2>
            <p class="section-subtitle">Solusi lengkap untuk kebutuhan pertambangan, konstruksi, dan infrastruktur dengan standar kualitas terbaik</p>
          </div>

          <!-- Layanan Utama Section -->
          <div class="service-category">
            <div class="category-header">
              <h3 class="category-title">Layanan Utama</h3>
              <p class="category-description">Layanan inti yang menjadi spesialisasi dan keunggulan perusahaan kami dalam bidang pertambangan dan konstruksi</p>
            </div>
            
            <div class="service-grid">
              <div class="service-card">
                <div class="service-icon">
                  <i class="fas fa-shower"></i>
                </div>
                <h4 class="service-title">PENYIRAMAN TAMBANG</h4>
                <p class="service-description">
                  Layanan penyiraman tambang yang komprehensif untuk mengontrol debu dan memastikan lingkungan kerja yang aman dan nyaman.
                </p>
                <ul class="service-features">
                  <li>Sistem penyiraman otomatis</li>
                  <li>Penggunaan air yang efisien</li>
                  <li>Pemantauan kualitas udara</li>
                  <li>Pemeliharaan rutin sistem</li>
                </ul>
                <div class="service-cta">
                  <a href="contact.php" class="btn">Konsultasi Sekarang</a>
                </div>
              </div>

              <div class="service-card">
                <div class="service-icon">
                  <i class="fas fa-hard-hat"></i>
                </div>
                <h4 class="service-title">REKLAMASI TAMBANG</h4>
                <p class="service-description">
                  Layanan reklamasi tambang yang bertanggung jawab untuk mengembalikan lahan bekas tambang menjadi produktif dan ramah lingkungan.
                </p>
                <ul class="service-features">
                  <li>Perencanaan reklamasi terpadu</li>
                  <li>Penanganan tanah dan air</li>
                  <li>Penanaman vegetasi lokal</li>
                  <li>Monitoring jangka panjang</li>
                </ul>
                <div class="service-cta">
                  <a href="contact.php" class="btn">Konsultasi Sekarang</a>
                </div>
              </div>

              <div class="service-card">
                <div class="service-icon">
                  <i class="fas fa-seedling"></i>
                </div>
                <h4 class="service-title">REVEGETASI TAMBANG</h4>
                <p class="service-description">
                  Program revegetasi yang menyeluruh untuk memulihkan ekosistem dan meningkatkan keanekaragaman hayati di area tambang.
                </p>
                <ul class="service-features">
                  <li>Pemilihan spesies tanaman</li>
                  <li>Teknik penanaman modern</li>
                  <li>Pemeliharaan tanaman</li>
                  <li>Evaluasi keberhasilan</li>
                </ul>
                <div class="service-cta">
                  <a href="contact.php" class="btn">Konsultasi Sekarang</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Layanan Pendukung Section -->
          <div class="service-category">
            <div class="category-header">
              <h3 class="category-title">Layanan Pendukung & Permintaan Khusus</h3>
              <p class="category-description">Layanan tambahan yang mendukung operasional tambang dan memenuhi kebutuhan khusus klien</p>
            </div>
            
            <div class="service-grid">
              <div class="service-card">
                <div class="service-icon">
                  <i class="fas fa-broadcast-tower"></i>
                </div>
                <h4 class="service-title">PERBAIKAN TOWERLINE</h4>
                <p class="service-description">
                  Layanan perbaikan dan pemeliharaan towerline untuk memastikan kelancaran komunikasi dan distribusi listrik di area tambang.
                </p>
                <ul class="service-features">
                  <li>Inspeksi tower berkala</li>
                  <li>Perbaikan komponen</li>
                  <li>Penguatan struktur</li>
                  <li>Pengujian keamanan</li>
                </ul>
                <div class="service-cta">
                  <a href="contact.php" class="btn">Konsultasi Sekarang</a>
                </div>
              </div>

              <div class="service-card">
                <div class="service-icon">
                  <i class="fas fa-video"></i>
                </div>
                <h4 class="service-title">INSTALASI & PERBAIKAN CCTV</h4>
                <p class="service-description">
                  Layanan instalasi dan perbaikan sistem CCTV untuk monitoring keamanan dan operasional di area tambang.
                </p>
                <ul class="service-features">
                  <li>Instalasi sistem CCTV</li>
                  <li>Perbaikan kamera</li>
                  <li>Pemeliharaan sistem</li>
                  <li>Upgrade teknologi</li>
                </ul>
                <div class="service-cta">
                  <a href="contact.php" class="btn">Konsultasi Sekarang</a>
                </div>
              </div>

              <div class="service-card">
                <div class="service-icon">
                  <i class="fas fa-sign"></i>
                </div>
                <h4 class="service-title">PEMASANGAN RAMBU-RAMBU TAMBANG</h4>
                <p class="service-description">
                  Pemasangan rambu-rambu keselamatan dan petunjuk yang sesuai standar untuk memastikan keamanan di area tambang.
                </p>
                <ul class="service-features">
                  <li>Rambu keselamatan</li>
                  <li>Petunjuk arah</li>
                  <li>Peringatan bahaya</li>
                  <li>Pemeliharaan rutin</li>
                </ul>
                <div class="service-cta">
                  <a href="contact.php" class="btn">Konsultasi Sekarang</a>
                </div>
              </div>

              <div class="service-card">
                <div class="service-icon">
                  <i class="fas fa-water"></i>
                </div>
                <h4 class="service-title">PEMBERSIHAN DRAINASE TAMBANG</h4>
                <p class="service-description">
                  Layanan pembersihan dan pemeliharaan sistem drainase untuk mencegah banjir dan menjaga kelancaran aliran air.
                </p>
                <ul class="service-features">
                  <li>Pembersihan saluran</li>
                  <li>Perbaikan drainase</li>
                  <li>Pemantauan aliran</li>
                  <li>Pencegahan penyumbatan</li>
                </ul>
                <div class="service-cta">
                  <a href="contact.php" class="btn">Konsultasi Sekarang</a>
                </div>
              </div>

              <div class="service-card">
                <div class="service-icon">
                  <i class="fas fa-building"></i>
                </div>
                <h4 class="service-title">KONSTRUKSI & PEMBANGUNAN GEDUNG</h4>
                <p class="service-description">
                  Layanan konstruksi dan pembangunan gedung dengan standar kualitas tinggi untuk berbagai kebutuhan industri.
                </p>
                <ul class="service-features">
                  <li>Perencanaan arsitektur</li>
                  <li>Konstruksi struktur</li>
                  <li>Finishing berkualitas</li>
                  <li>Quality control</li>
                </ul>
                <div class="service-cta">
                  <a href="contact.php" class="btn">Konsultasi Sekarang</a>
                </div>
              </div>

              <div class="service-card">
                <div class="service-icon">
                  <i class="fas fa-tree"></i>
                </div>
                <h4 class="service-title">PEMBANGUNAN TAMAN ECOPARK</h4>
                <p class="service-description">
                  Pembangunan taman ecopark yang ramah lingkungan untuk area rekreasi dan edukasi di sekitar tambang.
                </p>
                <ul class="service-features">
                  <li>Desain taman modern</li>
                  <li>Penanaman pohon</li>
                  <li>Fasilitas rekreasi</li>
                  <li>Pemeliharaan rutin</li>
                </ul>
                <div class="service-cta">
                  <a href="contact.php" class="btn">Konsultasi Sekarang</a>
                </div>
              </div>

              <div class="service-card">
                <div class="service-icon">
                  <i class="fas fa-tools"></i>
                </div>
                <h4 class="service-title">PEMBUATAN & PERBAIKAN DRAINASE</h4>
                <p class="service-description">
                  Layanan pembuatan dan perbaikan sistem drainase yang efektif untuk mengelola air hujan dan limbah.
                </p>
                <ul class="service-features">
                  <li>Desain sistem drainase</li>
                  <li>Konstruksi saluran</li>
                  <li>Perbaikan kerusakan</li>
                  <li>Pemeliharaan sistem</li>
                </ul>
                <div class="service-cta">
                  <a href="contact.php" class="btn">Konsultasi Sekarang</a>
                </div>
              </div>

              <div class="service-card">
                <div class="service-icon">
                  <i class="fas fa-cut"></i>
                </div>
                <h4 class="service-title">PEMBERSIHAN SEMAK & VEGETASI LIAR</h4>
                <p class="service-description">
                  Layanan pembersihan semak dan vegetasi liar untuk menjaga kebersihan dan keamanan area tambang.
                </p>
                <ul class="service-features">
                  <li>Pemotongan vegetasi</li>
                  <li>Pembersihan area</li>
                  <li>Pengangkutan sampah</li>
                  <li>Pemeliharaan rutin</li>
                </ul>
                <div class="service-cta">
                  <a href="contact.php" class="btn">Konsultasi Sekarang</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Contact Section -->
          <div class="contact-section">
            <h3 class="contact-title">Butuh Layanan Khusus?</h3>
            <p class="contact-text">
              Kami siap membantu Anda dengan layanan yang disesuaikan dengan kebutuhan spesifik proyek Anda. Hubungi kami untuk konsultasi lebih lanjut.
            </p>
            <a href="contact.php" class="contact-btn">
              <i class="fas fa-phone mr-2"></i>Hubungi Kami Sekarang
            </a>
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

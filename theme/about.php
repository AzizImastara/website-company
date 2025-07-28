<?php require_once 'config/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8" />
    <title>Brief Summary-KMCB</title>

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
    
    <!-- Custom styles for redesigned about page -->
    <style>
      :root {
        --primary-color: #2c3e50;
        --secondary-color: #e74c3c;
        --accent-color: #f39c12;
        --text-dark: #2c3e50;
        --text-light: #7f8c8d;
        --bg-light: #ecf0f1;
        --white: #ffffff;
        --shadow: 0 10px 30px rgba(0,0,0,0.1);
        --shadow-hover: 0 15px 40px rgba(0,0,0,0.15);
      }

      .hero-section {
        background: linear-gradient(135deg, rgba(44, 62, 80, 0.9) 0%, rgba(231, 76, 60, 0.8) 100%), 
                    url('img/proyek.jpg') center/cover;
        min-height: 60vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
      }

      .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('img/proyek.jpg') center/cover;
        z-index: -1;
        filter: blur(2px);
      }

      .hero-content {
        text-align: center;
        color: var(--white);
        z-index: 2;
      }

      .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        animation: fadeInUp 1s ease-out;
      }

      .hero-subtitle {
        font-size: 1.3rem;
        margin-bottom: 2rem;
        opacity: 0.9;
        animation: fadeInUp 1s ease-out 0.3s both;
      }

      .about-section {
        padding: 40px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      }

      .section-header {
        text-align: center;
        margin-bottom: 40px;
        position: relative;
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
        font-size: 1rem;
        max-width: 600px;
        margin: 0 auto;
      }

      .company-card {
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

      .company-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(180deg, var(--secondary-color), var(--accent-color));
      }

      .company-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-hover);
      }

      .card-header1 {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
      }

      .card-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        color: var(--white);
        font-size: 1.5rem;
      }

      .card-title {
        font-size: 1.8rem;
        color: var(--primary-color);
        margin: 0;
        font-weight: 600;
      }

      .content-text {
        color: var(--text-dark);
        line-height: 1.8;
        margin-bottom: 20px;
      }

      .content-text p {
        margin-bottom: 12px;
        font-size: 1rem;
        text-align: justify;
      }

      .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin: 40px 0;
      }

      .feature-item {
        background: var(--white);
        padding: 30px;
        border-radius: 15px;
        box-shadow: var(--shadow);
        transition: all 0.3s ease;
        border-left: 4px solid var(--accent-color);
      }

      .feature-item:hover {
        transform: translateX(10px);
        box-shadow: var(--shadow-hover);
      }

      .feature-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--accent-color), #f1c40f);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 1.2rem;
        margin-bottom: 20px;
      } 

      .feature-title {
        font-size: 1.3rem;
        color: var(--primary-color);
        margin-bottom: 15px;
        font-weight: 600;
      }

      .feature-description {
        color: var(--text-light);
        line-height: 1.6;
      }

      .commitment-section {
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: var(--white);
        padding: 60px 0;
        margin: 60px 0;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
      }

      .commitment-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('img/penghijauan.jpg') center/cover;
        opacity: 0.1;
        z-index: 0;
      }

      .commitment-content {
        position: relative;
        z-index: 1;
        text-align: center;
      }

      .commitment-title {
        font-size: 2rem;
        margin-bottom: 20px;
        color: var(--white);
      }

      .commitment-text {
        font-size: 1.1rem;
        line-height: 1.8;
        max-width: 800px;
        margin: 0 auto;
      }

      .contact-section {
        background: linear-gradient(135deg, #f39c12, #e67e22);
        color: var(--white);
        padding: 50px;
        border-radius: 20px;
        margin: 40px 0;
        position: relative;
        overflow: hidden;
      }

      .contact-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('img/kontraktor.jpg') center/cover;
        opacity: 0.1;
        z-index: 0;
      }

      .contact-content {
        position: relative;
        z-index: 1;
      }

      .contact-title {
        font-size: 1.8rem;
        margin-bottom: 30px;
        color: var(--white);
        text-align: center;
      }

      .contact-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
      }

      .contact-item {
        display: flex;
        align-items: center;
        padding: 15px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        backdrop-filter: blur(10px);
      }

      .contact-icon {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        color: var(--white);
      }

      .contact-details {
        color: var(--white);
      }

      .contact-label {
        font-weight: 600;
        margin-bottom: 5px;
      }

      .contact-value {
        opacity: 0.9;
      }

      .company-gallery {
        margin: 60px 0;
      }

      .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 30px;
      }

      .gallery-item {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: all 0.3s ease;
      }

      .gallery-item:hover {
        transform: scale(1.05);
        box-shadow: var(--shadow-hover);
      }

      .gallery-item img {
        width: 100%;
        height: 250px;
        object-fit: cover;
      }

      .stats-section {
        background: linear-gradient(135deg, var(--primary-color), #34495e);
        color: var(--white);
        padding: 60px 0;
        margin: 60px 0;
        border-radius: 20px;
      }

      .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        text-align: center;
      }

      .stat-item {
        padding: 20px;
      }

      .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--accent-color);
        margin-bottom: 10px;
      }

      .stat-label {
        font-size: 1.1rem;
        opacity: 0.9;
      }

      @keyframes fadeInUp {
        from {
          opacity: 0;
          transform: translateY(30px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      @media (max-width: 768px) {
        .hero-title {
          font-size: 2.5rem;
        }
        
        .section-title {
          font-size: 2rem;
        }
        
        .company-card {
          padding: 25px;
        }
        
        .features-grid {
          grid-template-columns: 1fr;
        }
        
        .contact-info {
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

      <div id="banner-area" class="banner-area" style="background-image:url(images/banner/banner1.jpg)">
        <div class="banner-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Brief Summary</h1>
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

      <section id="main-container" class="main-container about-section">
        <div class="container">
          <!-- Section Header -->
          <div class="section-header">
            <!-- <h2 class="section-title">Tentang PT. KARYA MANDIRI CAKRA BUANA</h2> -->
            <p class="section-subtitle">Perusahaan konstruksi terpercaya dengan pengalaman luas dalam pembangunan infrastruktur Indonesia</p>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <!-- Sejarah Card -->
              <div class="company-card">
                <div class="card-header1">
                  <div class="card-icon">
                    <i class="fas fa-history"></i>
                  </div>
                  <h3 class="card-title">Sejarah</h3>
                </div>
                <div class="content-text">
                  <p>
                    PT. KARYA MANDIRI CAKRA BUANA didirikan pada tahun 2014 sebagai perusahaan berbadan hukum Perseroan Terbatas (PT) dengan Akta Notaris No. Anti-41560.40.10.2014. Perusahaan ini berdomisili di Desa Socorejo, Kecamatan Jenu, Kabupaten Tuban, Jawa Timur.
                  </p>
                  <p>
                    Sejak awal berdirinya, PT. KARYA MANDIRI CAKRA BUANA telah berkomitmen untuk memberikan solusi terbaik dalam bidang konstruksi dan pertambangan. Sebagai anggota Asosiasi Kontraktor Nasional (ASKONAS), perusahaan ini menjunjung tinggi standar profesionalisme dan kualitas dalam setiap proyek yang dijalankan.
                  </p>
                  <p>
                    Dengan pengalaman dan reputasi yang solid di industri, PT. KARYA MANDIRI CAKRA BUANA telah dipercaya dalam berbagai proyek strategis, baik di sektor swasta maupun pemerintahan. Didukung oleh tim profesional dan penggunaan teknologi konstruksi terkini, perusahaan ini terus berinovasi untuk memenuhi kebutuhan klien dengan hasil yang maksimal.
                  </p>
                  <p>
                    Komitmen terhadap kualitas, integritas, serta kepuasan pelanggan menjadi prinsip utama dalam menjalankan setiap proyek. PT. KARYA MANDIRI CAKRA BUANA percaya bahwa konstruksi bukan hanya tentang membangun fisik, tetapi juga menciptakan nilai jangka panjang bagi masyarakat dan lingkungan.
                  </p>
                </div>
              </div>

              <!-- Company Gallery -->
              <div class="company-gallery">
                <!-- <h4 class="text-center mb-4" style="color: var(--primary-color);">
                  <i class="fas fa-images mr-2"></i>Galeri Perusahaan
                </h4> -->
                <div class="gallery-grid">
                  <div class="gallery-item">
                    <img src="img/proyek.jpg" alt="Proyek Konstruksi" />
                  </div>
                  <div class="gallery-item">
                    <img src="img/penghijauan.jpg" alt="Penghijauan" />
                  </div>
                  <div class="gallery-item">
                    <img src="img/kontraktor.jpg" alt="Tim Kontraktor" />
                  </div>
                </div>
              </div>

              <!-- Profil Perusahaan Card -->
              <div class="company-card">
                <div class="card-header1">
                  <div class="card-icon">
                    <i class="fas fa-building"></i>
                  </div>
                  <h3 class="card-title">Profil Perusahaan</h3>
                </div>
                <div class="content-text">
                  <p>
                    PT. KARYA MANDIRI CAKRA BUANA adalah perusahaan konstruksi yang berbasis di Kabupaten Tuban, Jawa Timur. Sebagai anggota dari Asosiasi Kontraktor Nasional (ASKONAS), kami berkomitmen untuk memberikan solusi terbaik bagi kebutuhan konstruksi dan pertambangan dengan standar mutu tinggi, profesionalisme, juga integritas.
                  </p>
                  <p>
                    Website ini dirancang untuk menampilkan profil lengkap perusahaan, informasi layanan, portofolio proyek, serta kontak resmi untuk kebutuhan kemitraan. Melalui platform ini, pengunjung dapat mengenal lebih dalam tentang sejarah perusahaan, budaya kerja, spesialisasi proyek (seperti konstruksi gedung industri, saluran air, jalan raya, dan infrastruktur besar lainnya), serta keunggulan kompetitif kami dalam bidang konstruksi nasional.
                  </p>
                  <p>
                    Dengan mengusung tagline "Memberikan solusi terbaik untuk kebutuhan pertambangan Anda," website ini juga menjadi sarana komunikasi antara PT. KARYA MANDIRI CAKRA BUANA dan klien potensial dari berbagai sektor industri maupun pemerintah, sekaligus memperkuat posisi kami sebagai mitra terpercaya dalam pembangunan infrastruktur Indonesia.
                  </p>
                </div>
              </div>

              <!-- Mengapa Memilih Kami -->
              <div class="company-card">
                <div class="card-header1">
                  <div class="card-icon">
                    <i class="fas fa-star"></i>
                  </div>
                  <h3 class="card-title">Mengapa Memilih Kami?</h3>
                </div>
                
                <div class="features-grid">
                  <div class="feature-item">
                    <div class="feature-icon">
                      <i class="fas fa-check-circle"></i>
                    </div>
                    <h5 class="feature-title">Pengalaman Luas & Teruji</h5>
                    <p class="feature-description">Telah dipercaya dalam berbagai proyek strategis di berbagai daerah, termasuk kerja sama dengan pemerintah dan sektor swasta.</p>
                  </div>

                  <div class="feature-item">
                    <div class="feature-icon">
                      <i class="fas fa-users"></i>
                    </div>
                    <h5 class="feature-title">Tim Profesional & Teknologi Mutakhir</h5>
                    <p class="feature-description">Didukung oleh tenaga ahli dan penggunaan teknologi konstruksi terkini untuk hasil yang maksimal.</p>
                  </div>

                  <div class="feature-item">
                    <div class="feature-icon">
                      <i class="fas fa-shield-alt"></i>
                    </div>
                    <h5 class="feature-title">Kualitas, Keamanan, & Keberlanjutan</h5>
                    <p class="feature-description">Tiga prinsip utama kami dalam menjalankan setiap proyek dengan penuh tanggung jawab.</p>
                  </div>
                </div>
              </div>

              <!-- Komitmen Section -->
              <div class="commitment-section">
                <div class="commitment-content">
                  <h4 class="commitment-title">
                    <i class="fas fa-heart mr-2"></i>Komitmen Kami
                  </h4>
                  <p class="commitment-text">
                    Kami percaya bahwa konstruksi bukan hanya soal membangun fisik, tapi juga tentang menciptakan nilai jangka panjang. Karena itu, kami selalu mengedepankan kualitas, integritas, serta kepuasan pelanggan dalam setiap langkah pekerjaan kami.
                  </p>
                </div>
              </div>

              <!-- Contact Section -->
              <div class="contact-section">
                <div class="contact-content">
                  <h4 class="contact-title">
                    <i class="fas fa-phone-alt mr-2"></i>Hubungi Kami
                  </h4>
                  <p class="text-center mb-4">Tertarik bekerja sama atau ingin mengetahui lebih lanjut tentang layanan kami?</p>
                  
                  <div class="contact-info">
                    <div class="contact-item">
                      <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                      </div>
                      <div class="contact-details">
                        <div class="contact-label">Email</div>
                        <div class="contact-value">aminthohari32@yahoo.co.id</div>
                      </div>
                    </div>
                    
                    <div class="contact-item">
                      <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                      </div>
                      <div class="contact-details">
                        <div class="contact-label">Telepon</div>
                        <div class="contact-value">(+62) 822-6300-2000</div>
                      </div>
                    </div>
                    
                    <div class="contact-item">
                      <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                      </div>
                      <div class="contact-details">
                        <div class="contact-label">Alamat</div>
                        <div class="contact-value">Socorejo RT.01 RW.03 Kec. Jenu, Kabupaten Tuban, Jawa Timur</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Footer Component Container -->
      <div id="footer-container">
        <!-- Footer will be loaded here via JavaScript -->
      </div>

      <!-- Javascript Files
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

      <!-- Component Loader -->
      <script src="components/component-loader.js"></script>
    </div>
    <!-- Body inner end -->
  </body>
</html>

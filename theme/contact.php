<?php require_once 'config/database.php'; ?>
<?php
$success = $error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama_depan = trim($_POST['nama_depan'] ?? '');
  $nama_belakang = trim($_POST['nama_belakang'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $telepon = trim($_POST['telepon'] ?? '');
  $pesan = trim($_POST['pesan'] ?? '');
  if ($nama_depan && $nama_belakang && $email && $telepon && $pesan) {
    $stmt = $pdo->prepare('INSERT INTO kontak_masuk (nama_depan, nama_belakang, email, telepon, pesan) VALUES (?, ?, ?, ?, ?)');
    if ($stmt->execute([$nama_depan, $nama_belakang, $email, $telepon, $pesan])) {
      $success = 'Pesan Anda berhasil dikirim!';
    } else {
      $error = 'Gagal mengirim pesan. Silakan coba lagi.';
    }
  } else {
    $error = 'Semua field wajib diisi.';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8" />
    <title>Kontak</title>

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
      .contact-hero {
        background-image: linear-gradient(rgba(30,42,73,0.6),rgba(30,42,73,0.6)), url('images/banner/banner1.jpg');
        background-size: cover;
        background-position: center;
        min-height: 280px;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .contact-hero .banner-title {
        color: #fff;
        font-size: 2.5rem;
        font-weight: 700;
        text-shadow: 1px 2px 8px rgba(0,0,0,0.2);
      }
      .contact-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        padding: 2.5rem 2rem;
        margin-bottom: 2rem;
      }
      .contact-info-box {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 1.5rem 1rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 12px rgba(0,0,0,0.04);
      }
      .contact-info-box i {
        color: #007bff;
        font-size: 1.5rem;
        margin-right: 0.7rem;
      }
      .form-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #007bff;
        font-size: 1.1rem;
      }
      .form-group {
        position: relative;
      }
      .form-control {
        padding-left: 2.2rem;
      }
      @media (max-width: 767px) {
        .contact-card {
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
      <div id="banner-area" class="banner-area" style="background-image: url(images/banner/banner1.jpg)">
        <div class="banner-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="banner-heading">
                  <h1 class="banner-title">Kontak</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section id="main-container" class="main-container">
        <div class="container">
          <div class="row justify-content-center align-items-start" style="min-height: 60vh;">
            <div class="col-lg-5 col-md-12 mb-4">
              <div class="contact-info-box mb-4">
                <div class="d-flex align-items-center mb-2">
                  <i class="fas fa-map-marker-alt"></i>
                  <div>
                    <strong>Alamat:</strong><br />PT. KARYA MANDIRI CAKRA BUANA<br />Tuban, Jawa Timur
                  </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                  <i class="fa fa-envelope"></i>
                  <div>
                    <strong>Email:</strong><br />office@Constra.com
                  </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                  <i class="fa fa-phone-square"></i>
                  <div>
                    <strong>Telepon:</strong><br />(+9) 847-291-4353
                  </div>
                </div>
              </div>
              <div class="google-map mb-4">
                <div class="map-container" style="position: relative; height: 220px; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d988.4842486041447!2d111.90679857292708!3d-6.792438899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77a700f50b741f%3A0x840f39a030eda902!2sPT.%20KARYA%20MANDIRI%20CAKRA%20BUANA!5e0!3m2!1sen!2sid!4v1640995200000!5m2!1sen!2sid" width="100%" height="220" style="border: 0; border-radius: 10px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-12">
              <div class="contact-card">
                <h3 class="mb-4 text-center">Kirim Pesan</h3>
                <?php if ($success): ?>
                  <div class="alert alert-success text-center"><?php echo $success; ?></div>
                <?php elseif ($error): ?>
                  <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                <?php endif; ?>
                <form id="contact-form" action="#" method="post" role="form">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <span class="form-icon"><i class="fa fa-user"></i></span>
                        <input class="form-control" name="nama_depan" id="nama_depan" type="text" placeholder="Nama Depan" required />
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <span class="form-icon"><i class="fa fa-user"></i></span>
                        <input class="form-control" name="nama_belakang" id="nama_belakang" type="text" placeholder="Nama Belakang" required />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <span class="form-icon"><i class="fa fa-envelope"></i></span>
                        <input class="form-control" name="email" id="email" type="email" placeholder="Email" required />
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <span class="form-icon"><i class="fa fa-phone"></i></span>
                        <input class="form-control" name="telepon" id="telepon" type="text" placeholder="Telepon" required />
                      </div>
                    </div>
                  </div>
                  <div class="form-group mb-3">
                    <span class="form-icon" style="top: 1.2rem;"><i class="fa fa-comment"></i></span>
                    <textarea class="form-control" name="pesan" id="pesan" rows="6" placeholder="Pesan" required></textarea>
                  </div>
                  <div class="text-center mt-3">
                    <button class="btn btn-primary px-4 py-2" type="submit">Kirim Pesan</button>
                  </div>
                </form>
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

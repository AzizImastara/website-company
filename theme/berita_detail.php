<?php 
require_once 'config/database.php';

// Ambil ID dari URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];
$berita = getBeritaById($id);

if (!$berita) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($berita['judul']); ?> - Website Company</title>
    <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" type="image/png" href="images/favicon.png" />
</head>
<body>
    <div class="body-inner">
        <!-- Navbar Component Container -->
        <div id="navbar-container">
            <!-- Navbar will be loaded here via JavaScript -->
        </div>

        <!-- Page Header -->
        <div id="banner-area" class="banner-area" style="background-image:url(images/banner/banner1.jpg)">
            <div class="banner-text">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="banner-heading">
                                <h1 class="banner-title">Detail Berita</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- News Detail -->
        <section id="main-container" class="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="post-content post-single">
                            <div class="post-media">
                                <?php if ($berita['gambar']): ?>
                                    <img loading="lazy" src="../admin/assets/uploads/berita/<?php echo $berita['gambar']; ?>" 
                                         class="img-fluid" alt="<?php echo htmlspecialchars($berita['judul']); ?>">
                                <?php endif; ?>
                            </div>

                            <div class="post-body">
                                <div class="entry-header">
                                    <div class="post-meta">
                                        <span class="post-date">
                                            <i class="far fa-calendar"></i>
                                            <?php echo formatTanggalIndonesia($berita['tanggal']); ?>
                                        </span>
                                    </div>
                                    <h2 class="entry-title"><?php echo htmlspecialchars($berita['judul']); ?></h2>
                                </div>

                                <div class="entry-content">
                                    <?php echo nl2br(htmlspecialchars($berita['isi'])); ?>
                                </div>

                                <div class="post-footer">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="berita.php" class="btn btn-primary">
                                                <i class="fas fa-arrow-left"></i> Kembali ke Berita
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar sidebar-right">
                            <div class="widget recent-posts">
                                <h3 class="widget-title">Berita Terbaru</h3>
                                <ul class="list-unstyled">
                                    <?php
                                    // Ambil berita terbaru lainnya (selain yang sedang dibaca)
                                    $stmt = $pdo->prepare("SELECT * FROM berita WHERE id != :current_id ORDER BY tanggal DESC LIMIT 5");
                                    $stmt->bindParam(':current_id', $id);
                                    $stmt->execute();
                                    $berita_lain = $stmt->fetchAll();
                                    
                                    foreach ($berita_lain as $item):
                                    ?>
                                        <li class="d-flex">
                                            <?php if ($item['gambar']): ?>
                                                <img src="../admin/assets/uploads/berita/<?php echo $item['gambar']; ?>" 
                                                     alt="<?php echo htmlspecialchars($item['judul']); ?>" 
                                                     class="me-3" style="width: 80px; height: 60px; object-fit: cover;">
                                            <?php endif; ?>
                                            <div>
                                                <h6><a href="berita_detail.php?id=<?php echo $item['id']; ?>"><?php echo htmlspecialchars($item['judul']); ?></a></h6>
                                                <small class="text-muted"><?php echo formatTanggalIndonesia($item['tanggal']); ?></small>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
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

        <!-- JavaScript Files -->
        <script src="plugins/jQuery/jquery.min.js"></script>
        <script src="plugins/bootstrap/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
        <script src="components/component-loader.js"></script>
    </div>
</body>
</html>

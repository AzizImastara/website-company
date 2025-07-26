<?php 
require_once 'config/database.php';

// Ambil ID dari URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];
$portofolio = getPortofolioById($id);

if (!$portofolio) {
    header('Location: index.php');
    exit();
}

$kategoriList = getKategoriPortofolio();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($portofolio['judul']); ?> - Website Company</title>
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
                                <h1 class="banner-title">Detail Portfolio</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Detail -->
        <section id="main-container" class="main-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="project-detail">
                            <div class="project-image">
                                <?php if ($portofolio['gambar']): ?>
                                    <img loading="lazy" src="../admin/assets/uploads/portofolio/<?php echo $portofolio['gambar']; ?>" 
                                         class="img-fluid" alt="<?php echo htmlspecialchars($portofolio['judul']); ?>">
                                <?php endif; ?>
                            </div>

                            <div class="project-body">
                                <div class="project-header">
                                    <h2 class="project-title"><?php echo htmlspecialchars($portofolio['judul']); ?></h2>
                                    <p class="project-category">
                                        <span class="badge p-2" style="background-color: #3fd80b; color: #ffffff;"><?php echo $kategoriList[$portofolio['kategori']] ?? $portofolio['kategori']; ?></span>
                                    </p>
                                </div>

                                <div class="project-content">
                                    <?php echo nl2br(htmlspecialchars($portofolio['deskripsi'])); ?>
                                </div>

                                <div class="project-footer mt-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="portofolio.php" class="btn btn-primary">
                                                <i class="fas fa-arrow-left"></i> Kembali ke Portfolio
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar sidebar-right">
                            <div class="widget project-info">
                                <h3 class="widget-title">Informasi Proyek</h3>
                                <ul class="list-unstyled project-info-list">
                                    <li>
                                        <strong>Kategori:</strong> 
                                        <?php echo $kategoriList[$portofolio['kategori']] ?? $portofolio['kategori']; ?>
                                    </li>
                                    <li>
                                        <strong>Tanggal:</strong> 
                                        <?php echo formatTanggalIndonesia($portofolio['tanggal']); ?>
                                    </li>
                                </ul>
                            </div>

                            <div class="widget related-projects">
                                <h3 class="widget-title">Proyek Terkait</h3>
                                <div class="row">
                                    <?php
                                    // Ambil portfolio lainnya dengan kategori yang sama (selain yang sedang dibaca)
                                    $stmt = $pdo->prepare("SELECT * FROM portofolio WHERE kategori = :kategori AND id != :current_id ORDER BY tanggal DESC LIMIT 4");
                                    $stmt->bindParam(':kategori', $portofolio['kategori']);
                                    $stmt->bindParam(':current_id', $id);
                                    $stmt->execute();
                                    $portfolio_terkait = $stmt->fetchAll();
                                    
                                    foreach ($portfolio_terkait as $item):
                                    ?>
                                        <div class="col-md-6 mb-3">
                                            <div class="card">
                                                <?php if ($item['gambar']): ?>
                                                    <img src="../admin/assets/uploads/portofolio/<?php echo $item['gambar']; ?>" 
                                                         class="card-img-top" alt="<?php echo htmlspecialchars($item['judul']); ?>"
                                                         style="height: 120px; object-fit: cover;">
                                                <?php endif; ?>
                                                <div class="card-body p-2">
                                                    <h6 class="card-title">
                                                        <a href="portofolio_detail.php?id=<?php echo $item['id']; ?>" 
                                                           class="text-decoration-none">
                                                           <?php echo truncateText($item['judul'], 50); ?>
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
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

        <!-- JavaScript Files -->
        <script src="plugins/jQuery/jquery.min.js"></script>
        <script src="plugins/bootstrap/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
        <script src="components/component-loader.js"></script>
    </div>

    <style>
    .project-category .badge {
        background-color: #3fd80b !important;
        color: #ffffff !important;
        font-size: 0.75rem;
        padding: 0.5rem 0.75rem !important;
        border-radius: 0.375rem;
        font-weight: 500;
    }
    </style>
</body>
</html>

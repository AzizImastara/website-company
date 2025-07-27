<?php 
require_once 'config/database.php';

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 6;
$offset = ($page - 1) * $limit;

// Search functionality
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Query untuk mengambil berita dengan pagination dan search
$whereClause = '';
$params = [];

if (!empty($search)) {
    $whereClause = "WHERE judul LIKE :search OR isi LIKE :search";
    $params[':search'] = "%$search%";
}

// Total records untuk pagination
$countSql = "SELECT COUNT(*) as total FROM berita $whereClause";
$countStmt = $pdo->prepare($countSql);
foreach ($params as $key => $value) {
    $countStmt->bindValue($key, $value);
}
$countStmt->execute();
$totalRecords = $countStmt->fetch()['total'];
$totalPages = ceil($totalRecords / $limit);

// Ambil data berita
$sql = "SELECT * FROM berita $whereClause ORDER BY tanggal DESC LIMIT $limit OFFSET $offset";
$stmt = $pdo->prepare($sql);
foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
}
$stmt->execute();
$berita_list = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita PT Karya Mandiri Cakra Buana</title>
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
                                <h1 class="banner-title">Berita Terkini</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- News List -->
        <section id="main-container" class="main-container">
            <div class="container">
                <!-- Search Form -->
                <div class="row mb-4">
                    <div class="col-lg-6 mx-auto">
                        <form method="GET" action="" class="search-form">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" 
                                       placeholder="Cari berita..." value="<?php echo htmlspecialchars($search); ?>">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- News Grid -->
                <div class="row">
                    <?php if (count($berita_list) > 0): ?>
                        <?php foreach ($berita_list as $berita): ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <?php if ($berita['gambar']): ?>
                                        <img src="../admin/assets/uploads/berita/<?php echo $berita['gambar']; ?>" 
                                             class="card-img-top" alt="<?php echo htmlspecialchars($berita['judul']); ?>"
                                             style="height: 200px; object-fit: cover;">
                                    <?php endif; ?>
                                    <div class="card-body d-flex flex-column">
                                        <div class="post-meta mb-2">
                                            <small class="text-muted">
                                                <i class="far fa-calendar"></i>
                                                <?php echo formatTanggalIndonesia($berita['tanggal']); ?>
                                            </small>
                                        </div>
                                        <h5 class="card-title">
                                            <a href="berita_detail.php?id=<?php echo $berita['id']; ?>" 
                                               class="text-decoration-none">
                                               <?php echo htmlspecialchars($berita['judul']); ?>
                                            </a>
                                        </h5>
                                        <p class="card-text flex-grow-1">
                                            <?php echo truncateText($berita['isi'], 120); ?>
                                        </p>
                                        <div class="mt-auto">
                                            <a href="berita_detail.php?id=<?php echo $berita['id']; ?>" 
                                               class="btn btn-primary btn-sm">
                                               Baca Selengkapnya
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-info text-center" role="alert">
                                <h4>Tidak ada berita ditemukan</h4>
                                <p>
                                    <?php if (!empty($search)): ?>
                                        Tidak ada berita yang sesuai dengan pencarian "<?php echo htmlspecialchars($search); ?>".
                                        <br><a href="berita.php" class="btn btn-primary mt-2">Tampilkan Semua Berita</a>
                                    <?php else: ?>
                                        Belum ada berita yang dipublikasikan.
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <?php if ($totalPages > 1): ?>
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="News pagination">
                                <ul class="pagination justify-content-center">
                                    <!-- First Page -->
                                    <?php if ($page > 3): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=1<?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>">
                                                <i class="fas fa-angle-double-left"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <!-- Previous Page -->
                                    <?php if ($page > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo ($page - 1); ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>">
                                                <i class="fas fa-chevron-left"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <!-- Page Numbers -->
                                    <?php
                                    // Logic untuk menampilkan pagination yang smart
                                    if ($totalPages <= 7) {
                                        // Jika total halaman <= 7, tampilkan semua
                                        $start = 1;
                                        $end = $totalPages;
                                    } else {
                                        // Jika total halaman > 7, tampilkan dengan logic
                                        if ($page <= 4) {
                                            $start = 1;
                                            $end = 5;
                                        } elseif ($page >= $totalPages - 3) {
                                            $start = $totalPages - 4;
                                            $end = $totalPages;
                                        } else {
                                            $start = $page - 2;
                                            $end = $page + 2;
                                        }
                                    }
                                    
                                    for ($i = $start; $i <= $end; $i++):
                                    ?>
                                        <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                            <a class="page-link" href="?page=<?php echo $i; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>">
                                                <?php echo $i; ?>
                                            </a>
                                        </li>
                                    <?php endfor; ?>

                                    <!-- Ellipsis and jump to end if needed -->
                                    <?php if ($totalPages > 7 && $end < $totalPages - 1): ?>
                                        <li class="page-item disabled">
                                            <span class="page-link">...</span>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $totalPages; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>">
                                                <?php echo $totalPages; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <!-- Next Page -->
                                    <?php if ($page < $totalPages): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo ($page + 1); ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <!-- Last Page -->
                                    <?php if ($page < $totalPages - 2): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $totalPages; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>">
                                                <i class="fas fa-angle-double-right"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <!-- Pagination Info -->
                    <div class="row">
                        <div class="col-12 text-center">
                            <small class="text-muted">
                                Menampilkan <?php echo (($page - 1) * $limit + 1); ?> - <?php echo min($page * $limit, $totalRecords); ?> 
                                dari <?php echo $totalRecords; ?> berita
                            </small>
                        </div>
                    </div>
                <?php endif; ?>
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
    /* Pagination improvements */
    .pagination {
        margin-top: 30px;
    }

    .pagination .page-link {
        border-radius: 50px;
        margin: 0 2px;
        min-width: 40px;
        text-align: center;
        border: 1px solid #ddd;
        color: #333;
    }

    .pagination .page-item.active .page-link {
        background-color: #3fd80b;
        border-color: #3fd80b;
        color: #212121;
    }

    .pagination .page-link:hover {
        background-color: #f8f9fa;
        border-color: #3fd80b;
        color: #212121;
    }

    .search-form .input-group {
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        border-radius: 25px;
        overflow: hidden;
    }

    .search-form .form-control {
        border: none;
        padding: 12px 20px;
    }

    .search-form .btn {
        border: none;
        padding: 12px 20px;
    }
    </style>
</body>
</html>

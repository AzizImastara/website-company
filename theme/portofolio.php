<?php 
require_once 'config/database.php';

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 6;
$offset = ($page - 1) * $limit;

// Filter kategori
$kategori_filter = isset($_GET['kategori']) ? trim($_GET['kategori']) : '';
$kategoriList = getKategoriPortofolio();

// Query untuk mengambil portfolio dengan pagination dan filter
$whereClause = '';
$params = [];

if (!empty($kategori_filter)) {
    $whereClause = "WHERE kategori = :kategori";
    $params[':kategori'] = $kategori_filter;
}

// Total records untuk pagination
$countSql = "SELECT COUNT(*) as total FROM portofolio $whereClause";
$countStmt = $pdo->prepare($countSql);
foreach ($params as $key => $value) {
    $countStmt->bindValue($key, $value);
}
$countStmt->execute();
$totalRecords = $countStmt->fetch()['total'];
$totalPages = ceil($totalRecords / $limit);

// Ambil data portfolio
$sql = "SELECT * FROM portofolio $whereClause ORDER BY tanggal DESC LIMIT $limit OFFSET $offset";
$stmt = $pdo->prepare($sql);
foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
}
$stmt->execute();
$portfolio_list = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio PT Karya Mandiri Cakra Buana</title>
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
                                <h1 class="banner-title">Portfolio Kami</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio List -->
        <section id="main-container" class="main-container">
            <div class="container">
                <!-- Filter Categories -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="shuffle-btn-group">
                            <label class="<?php echo empty($kategori_filter) ? 'active' : ''; ?>" for="all">
                                <input type="radio" name="portfolio-filter" id="all" value="all" 
                                       <?php echo empty($kategori_filter) ? 'checked="checked"' : ''; ?> />
                                Lihat Semua
                            </label>
                            <?php foreach ($kategoriList as $key => $nama): ?>
                                <label class="<?php echo ($kategori_filter == $key) ? 'active' : ''; ?>" for="<?php echo $key; ?>">
                                    <input type="radio" name="portfolio-filter" id="<?php echo $key; ?>" value="<?php echo $key; ?>"
                                           <?php echo ($kategori_filter == $key) ? 'checked="checked"' : ''; ?> />
                                    <?php echo $nama; ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <!-- project filter end -->
                    </div>
                </div>

                <!-- Current Filter Info -->
                <?php if (!empty($kategori_filter)): ?>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="alert alert-info" role="alert">
                                <i class="fas fa-filter"></i>
                                Menampilkan portfolio untuk kategori: <strong><?php echo $kategoriList[$kategori_filter]; ?></strong>
                                <!-- <a href="portofolio.php" class="btn btn-sm btn-outline-primary ms-2">Hapus Filter</a> -->
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Portfolio Grid -->
                <div class="row">
                    <?php if (count($portfolio_list) > 0): ?>
                        <?php foreach ($portfolio_list as $portfolio): ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100 portfolio-item">
                                    <div class="portfolio-img">
                                        <?php if ($portfolio['gambar']): ?>
                                            <img src="../admin/assets/uploads/portofolio/<?php echo $portfolio['gambar']; ?>" 
                                                 class="card-img-top" alt="<?php echo htmlspecialchars($portfolio['judul']); ?>"
                                                 style="height: 250px; object-fit: cover;">
                                        <?php endif; ?>
                                        <div class="portfolio-overlay">
                                            <div class="portfolio-overlay-content">
                                                <a href="portofolio_detail.php?id=<?php echo $portfolio['id']; ?>" 
                                                   class="btn btn-primary btn-sm">
                                                   <i class="fas fa-eye"></i> Lihat Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="portfolio-meta mb-2">
                                            <span class="badge p-2" style="background-color: #3fd80b; color: #ffffff;">
                                                <?php echo $kategoriList[$portfolio['kategori']] ?? $portfolio['kategori']; ?>
                                            </span>
                                            <small class="text-muted float-end">
                                                <?php echo formatTanggalIndonesia($portfolio['tanggal']); ?>
                                            </small>
                                        </div>
                                        <h5 class="card-title">
                                            <a href="portofolio_detail.php?id=<?php echo $portfolio['id']; ?>" 
                                               class="text-decoration-none">
                                               <?php echo htmlspecialchars($portfolio['judul']); ?>
                                            </a>
                                        </h5>
                                        <p class="card-text">
                                            <?php echo truncateText($portfolio['deskripsi'], 100); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <div class="alert alert-info text-center" role="alert">
                                <h4>Tidak ada portfolio ditemukan</h4>
                                <p>
                                    <?php if (!empty($kategori_filter)): ?>
                                        Tidak ada portfolio untuk kategori "<?php echo $kategoriList[$kategori_filter]; ?>".
                                        <br><a href="portofolio.php" class="btn btn-primary mt-2">Tampilkan Semua Portfolio</a>
                                    <?php else: ?>
                                        Belum ada portfolio yang dipublikasikan.
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
                            <nav aria-label="Portfolio pagination">
                                <ul class="pagination justify-content-center">
                                    <!-- First Page -->
                                    <?php if ($page > 3): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=1<?php echo !empty($kategori_filter) ? '&kategori=' . urlencode($kategori_filter) : ''; ?>">
                                                <i class="fas fa-angle-double-left"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <!-- Previous Page -->
                                    <?php if ($page > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo ($page - 1); ?><?php echo !empty($kategori_filter) ? '&kategori=' . urlencode($kategori_filter) : ''; ?>">
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
                                            <a class="page-link" href="?page=<?php echo $i; ?><?php echo !empty($kategori_filter) ? '&kategori=' . urlencode($kategori_filter) : ''; ?>">
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
                                            <a class="page-link" href="?page=<?php echo $totalPages; ?><?php echo !empty($kategori_filter) ? '&kategori=' . urlencode($kategori_filter) : ''; ?>">
                                                <?php echo $totalPages; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <!-- Next Page -->
                                    <?php if ($page < $totalPages): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo ($page + 1); ?><?php echo !empty($kategori_filter) ? '&kategori=' . urlencode($kategori_filter) : ''; ?>">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <!-- Last Page -->
                                    <?php if ($page < $totalPages - 2): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?page=<?php echo $totalPages; ?><?php echo !empty($kategori_filter) ? '&kategori=' . urlencode($kategori_filter) : ''; ?>">
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
                                dari <?php echo $totalRecords; ?> portfolio
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
        
        <!-- Portfolio Filter JavaScript -->
        <script>
        $(document).ready(function() {
            // Handle filter button clicks
            $('.shuffle-btn-group label').click(function() {
                var filterValue = $(this).find('input').val();
                
                // Remove active class from all labels
                $('.shuffle-btn-group label').removeClass('active');
                
                // Add active class to clicked label
                $(this).addClass('active');
                
                // Redirect based on filter
                if (filterValue === 'all') {
                    window.location.href = 'portofolio.php';
                } else {
                    window.location.href = 'portofolio.php?kategori=' + filterValue;
                }
            });
        });
        </script>
    </div>

    <style>
    .portfolio-item {
        transition: transform 0.3s ease;
    }
    
    .portfolio-item:hover {
        transform: translateY(-5px);
    }
    
    .portfolio-img {
        position: relative;
        overflow: hidden;
    }
    
    .portfolio-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .portfolio-item:hover .portfolio-overlay {
        opacity: 1;
    }

    .portfolio-meta .badge {
        background-color: #3fd80b !important;
        color: #ffffff !important;
        font-size: 0.75rem;
        padding: 0.5rem 0.75rem !important;
        border-radius: 0.375rem;
        font-weight: 500;
    }
    
    .shuffle-btn-group {
        display: inline-block;
        margin: 20px 0;
        width: 100%;
        border-bottom: 3px solid #3fd80b;
        text-align: center;
    }
    
    .shuffle-btn-group label {
        display: inline-block;
        color: #212121;
        font-size: 14px;
        padding: 6px 25px;
        padding-top: 10px;
        font-weight: 700;
        text-transform: uppercase;
        transition: all 0.3s;
        cursor: pointer;
        margin: 0;
    }
    
    .shuffle-btn-group label.active {
        color: #212121;
        background: #3fd80b;
    }
    
    .shuffle-btn-group label input {
        display: none;
    }

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
    </style>
</body>
</html>

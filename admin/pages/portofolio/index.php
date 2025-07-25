<?php
require_once '../../config/database.php';
checkLogin();

$page_title = 'Kelola Portofolio';

// Handle delete
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];
    
    try {
        // Ambil data portofolio untuk hapus gambar
        $stmt = $pdo->prepare("SELECT gambar FROM portofolio WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $portofolio = $stmt->fetch();
        
        if ($portofolio) {
            // Hapus gambar jika ada
            if ($portofolio['gambar']) {
                deleteFile($portofolio['gambar'], 'portofolio');
            }
            
            // Hapus data dari database
            $stmt = $pdo->prepare("DELETE FROM portofolio WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $success_message = 'Portofolio berhasil dihapus!';
        }
    } catch(PDOException $e) {
        $error_message = 'Terjadi kesalahan saat menghapus portofolio.';
    }
}

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 12;
$offset = ($page - 1) * $limit;

// Filter dan Search
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$kategori_filter = isset($_GET['kategori']) ? $_GET['kategori'] : '';

$where_conditions = [];
$params = [];

if (!empty($search)) {
    $where_conditions[] = "(judul LIKE :search OR deskripsi LIKE :search)";
    $params[':search'] = "%$search%";
}

if (!empty($kategori_filter)) {
    $where_conditions[] = "kategori = :kategori";
    $params[':kategori'] = $kategori_filter;
}

$where_clause = !empty($where_conditions) ? "WHERE " . implode(" AND ", $where_conditions) : "";

try {
    // Count total records
    $count_sql = "SELECT COUNT(*) as total FROM portofolio $where_clause";
    $count_stmt = $pdo->prepare($count_sql);
    foreach ($params as $key => $value) {
        $count_stmt->bindValue($key, $value);
    }
    $count_stmt->execute();
    $total_records = $count_stmt->fetch()['total'];
    $total_pages = ceil($total_records / $limit);
    
    // Get portofolio data
    $sql = "SELECT * FROM portofolio $where_clause ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $portofolio_list = $stmt->fetchAll();
    
} catch(PDOException $e) {
    $error_message = 'Terjadi kesalahan saat mengambil data portofolio.';
}

// Kategori options
$kategori_options = [
    'penyiraman_tambang' => 'Penyiraman Tambang',
    'revegetasi_tambang' => 'Revegetasi Tambang',
    'supporting_tambang' => 'Supporting Tambang'
];

include '../../includes/header.php';
?>

<?php if (isset($success_message)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> <?php echo $success_message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (isset($error_message)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> <?php echo $error_message; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">
            <i class="fas fa-briefcase me-2"></i>Daftar Portofolio
        </h5>
        <a href="create.php" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>Tambah Portofolio
        </a>
    </div>
    <div class="card-body">
        <!-- Filter and Search Form -->
        <form method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($kategori_options as $value => $label): ?>
                            <option value="<?php echo $value; ?>" <?php echo ($kategori_filter == $value) ? 'selected' : ''; ?>>
                                <?php echo $label; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Cari portofolio berdasarkan judul atau deskripsi..." 
                           value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-outline-primary me-2">
                        <i class="fas fa-search"></i> Cari
                    </button>
                    <?php if (!empty($search) || !empty($kategori_filter)): ?>
                        <a href="index.php" class="btn btn-outline-secondary">
                            <i class="fas fa-times"></i> Reset
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </form>

        <?php if (empty($portofolio_list)): ?>
            <div class="text-center py-5">
                <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">
                    <?php echo (!empty($search) || !empty($kategori_filter)) ? 'Tidak ada portofolio yang sesuai dengan filter.' : 'Belum ada portofolio yang ditambahkan.'; ?>
                </h5>
                <a href="create.php" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>Tambah Portofolio Pertama
                </a>
            </div>
        <?php else: ?>
            <!-- Grid View -->
            <div class="row">
                <?php foreach ($portofolio_list as $portofolio): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="position-relative">
                                <?php if ($portofolio['gambar']): ?>
                                    <img src="../../assets/uploads/portofolio/<?php echo $portofolio['gambar']; ?>" 
                                         class="card-img-top" alt="<?php echo htmlspecialchars($portofolio['judul']); ?>"
                                         style="height: 200px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="bg-light d-flex align-items-center justify-content-center card-img-top"
                                         style="height: 200px;">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                    </div>
                                <?php endif; ?>
                                
                                <span class="badge bg-primary position-absolute top-0 start-0 m-2">
                                    <?php echo $kategori_options[$portofolio['kategori']]; ?>
                                </span>
                            </div>
                            
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title"><?php echo htmlspecialchars($portofolio['judul']); ?></h6>
                                <p class="card-text text-muted small flex-grow-1">
                                    <?php echo substr(strip_tags($portofolio['deskripsi']), 0, 120) . '...'; ?>
                                </p>
                                <div class="mt-auto">
                                    <small class="text-muted d-block mb-2">
                                        <i class="fas fa-calendar me-1"></i>
                                        <?php echo formatTanggalIndonesia($portofolio['tanggal']); ?>
                                    </small>
                                    <div class="btn-group w-100" role="group">
                                        <a href="view.php?id=<?php echo $portofolio['id']; ?>" 
                                           class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="edit.php?id=<?php echo $portofolio['id']; ?>" 
                                           class="btn btn-sm btn-outline-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?delete=<?php echo $portofolio['id']; ?>" 
                                           class="btn btn-sm btn-outline-danger"
                                           onclick="return confirmDelete('Apakah Anda yakin ingin menghapus portofolio ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page-1; ?><?php echo !empty($search) ? '&search='.urlencode($search) : ''; ?><?php echo !empty($kategori_filter) ? '&kategori='.urlencode($kategori_filter) : ''; ?>">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?><?php echo !empty($search) ? '&search='.urlencode($search) : ''; ?><?php echo !empty($kategori_filter) ? '&kategori='.urlencode($kategori_filter) : ''; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                        
                        <?php if ($page < $total_pages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page+1; ?><?php echo !empty($search) ? '&search='.urlencode($search) : ''; ?><?php echo !empty($kategori_filter) ? '&kategori='.urlencode($kategori_filter) : ''; ?>">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            <?php endif; ?>

            <div class="text-muted text-center mt-3">
                <small>
                    Menampilkan <?php echo $offset + 1; ?> - <?php echo min($offset + $limit, $total_records); ?> 
                    dari <?php echo $total_records; ?> portofolio
                </small>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>

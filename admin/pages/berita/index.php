<?php
require_once '../../config/database.php';
checkLogin();

$page_title = 'Kelola Berita';

// Handle delete
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];
    
    try {
        // Ambil data berita untuk hapus gambar
        $stmt = $pdo->prepare("SELECT gambar FROM berita WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $berita = $stmt->fetch();
        
        if ($berita) {
            // Hapus gambar jika ada
            if ($berita['gambar']) {
                deleteFile($berita['gambar'], 'berita');
            }
            
            // Hapus data dari database
            $stmt = $pdo->prepare("DELETE FROM berita WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $success_message = 'Berita berhasil dihapus!';
        }
    } catch(PDOException $e) {
        $error_message = 'Terjadi kesalahan saat menghapus berita.';
    }
}

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// Search
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$where_clause = '';
$params = [];

if (!empty($search)) {
    $where_clause = "WHERE judul LIKE :search OR isi LIKE :search";
    $params[':search'] = "%$search%";
}

try {
    // Count total records
    $count_sql = "SELECT COUNT(*) as total FROM berita $where_clause";
    $count_stmt = $pdo->prepare($count_sql);
    foreach ($params as $key => $value) {
        $count_stmt->bindValue($key, $value);
    }
    $count_stmt->execute();
    $total_records = $count_stmt->fetch()['total'];
    $total_pages = ceil($total_records / $limit);
    
    // Get berita data
    $sql = "SELECT * FROM berita $where_clause ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $berita_list = $stmt->fetchAll();
    
} catch(PDOException $e) {
    $error_message = 'Terjadi kesalahan saat mengambil data berita.';
}

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
            <i class="fas fa-newspaper me-2"></i>Daftar Berita
        </h5>
        <a href="create.php" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i>Tambah Berita
        </a>
    </div>
    <div class="card-body">
        <!-- Search Form -->
        <form method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" 
                           placeholder="Cari berita berdasarkan judul atau isi..." 
                           value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary me-2">
                        <i class="fas fa-search"></i> Cari
                    </button>
                    <?php if (!empty($search)): ?>
                        <a href="index.php" class="btn btn-outline-secondary">
                            <i class="fas fa-times"></i> Reset
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </form>

        <?php if (empty($berita_list)): ?>
            <div class="text-center py-5">
                <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">
                    <?php echo !empty($search) ? 'Tidak ada berita yang sesuai dengan pencarian.' : 'Belum ada berita yang ditambahkan.'; ?>
                </h5>
                <a href="create.php" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>Tambah Berita Pertama
                </a>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 15%">Gambar</th>
                            <th style="width: 30%">Judul</th>
                            <th style="width: 15%">Tanggal</th>
                            <th style="width: 15%">Dibuat</th>
                            <th style="width: 20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($berita_list as $index => $berita): ?>
                            <tr>
                                <td><?php echo $offset + $index + 1; ?></td>
                                <td>
                                    <?php if ($berita['gambar']): ?>
                                        <img src="../../assets/uploads/berita/<?php echo $berita['gambar']; ?>" 
                                             class="img-thumbnail" alt="Berita">
                                    <?php else: ?>
                                        <div class="bg-light d-flex align-items-center justify-content-center img-thumbnail">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <h6 class="mb-1"><?php echo htmlspecialchars($berita['judul']); ?></h6>
                                    <small class="text-muted">
                                        <?php echo substr(strip_tags($berita['isi']), 0, 100) . '...'; ?>
                                    </small>
                                </td>
                                <td>
                                    <small><?php echo formatTanggalIndonesia($berita['tanggal']); ?></small>
                                </td>
                                <td>
                                    <small class="text-muted">
                                        <?php echo date('d/m/Y H:i', strtotime($berita['created_at'])); ?>
                                    </small>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="view.php?id=<?php echo $berita['id']; ?>" 
                                           class="btn btn-sm btn-outline-info btn-action">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="edit.php?id=<?php echo $berita['id']; ?>" 
                                           class="btn btn-sm btn-outline-warning btn-action">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="?delete=<?php echo $berita['id']; ?>" 
                                           class="btn btn-sm btn-outline-danger btn-action"
                                           onclick="return confirmDelete('Apakah Anda yakin ingin menghapus berita ini?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page-1; ?><?php echo !empty($search) ? '&search='.urlencode($search) : ''; ?>">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?><?php echo !empty($search) ? '&search='.urlencode($search) : ''; ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                        <?php endfor; ?>
                        
                        <?php if ($page < $total_pages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page+1; ?><?php echo !empty($search) ? '&search='.urlencode($search) : ''; ?>">
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
                    dari <?php echo $total_records; ?> berita
                </small>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>

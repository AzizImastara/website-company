<?php
// Konfigurasi Database untuk Frontend
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'website_company');

// Koneksi ke database
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// Fungsi untuk format tanggal Indonesia
function formatTanggalIndonesia($tanggal) {
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

// Fungsi untuk truncate text
function truncateText($text, $length = 150) {
    if (strlen($text) <= $length) {
        return $text;
    }
    return substr($text, 0, $length) . '...';
}

// Fungsi untuk get berita
function getBerita($limit = null) {
    global $pdo;
    
    $sql = "SELECT * FROM berita ORDER BY tanggal DESC";
    if ($limit) {
        $sql .= " LIMIT $limit";
    }
    
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

// Fungsi untuk get berita by ID
function getBeritaById($id) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM berita WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch();
}

// Fungsi untuk get portofolio
function getPortofolio($kategori = null, $limit = null) {
    global $pdo;
    
    $sql = "SELECT * FROM portofolio";
    if ($kategori) {
        $sql .= " WHERE kategori = :kategori";
    }
    $sql .= " ORDER BY tanggal DESC";
    
    if ($limit) {
        $sql .= " LIMIT $limit";
    }
    
    $stmt = $pdo->prepare($sql);
    if ($kategori) {
        $stmt->bindParam(':kategori', $kategori);
    }
    $stmt->execute();
    return $stmt->fetchAll();
}

// Fungsi untuk get portofolio by ID
function getPortofolioById($id) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM portofolio WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch();
}

// Kategori portofolio
function getKategoriPortofolio() {
    return [
        'penyiraman_tambang' => 'Penyiraman Tambang',
        'revegetasi_tambang' => 'Revegetasi Tambang',
        'supporting_tambang' => 'Supporting Tambang'
    ];
}
?>

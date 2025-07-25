<?php
// Konfigurasi Database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');  // Sesuaikan dengan username MySQL Anda
define('DB_PASS', '');      // Sesuaikan dengan password MySQL Anda
define('DB_NAME', 'website_company');

// Define base path untuk admin
$admin_base_path = str_replace('\\', '/', dirname(__DIR__));
$web_root = str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']);
$admin_url_path = str_replace($web_root, '', $admin_base_path);
define('ADMIN_URL', $admin_url_path);

// Fungsi untuk generate URL admin
function admin_url($path = '') {
    $base_url = 'http://' . $_SERVER['HTTP_HOST'] . ADMIN_URL;
    return $base_url . '/' . ltrim($path, '/');
}

// Fungsi untuk generate relative path berdasarkan lokasi file
function get_admin_path($target_path) {
    $current_dir = dirname($_SERVER['PHP_SELF']);
    $admin_dir = ADMIN_URL;
    
    // Hitung berapa level naik untuk mencapai admin root
    $current_parts = explode('/', trim(str_replace($admin_dir, '', $current_dir), '/'));
    $level_up = count(array_filter($current_parts));
    
    $relative_prefix = str_repeat('../', $level_up);
    return $relative_prefix . ltrim($target_path, '/');
}

// Koneksi ke database
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// Fungsi untuk upload file
function uploadFile($file, $folder, $allowed_types = ['jpg', 'jpeg', 'png', 'gif']) {
    if (!isset($file['name']) || empty($file['name'])) {
        return false;
    }
    
    $target_dir = __DIR__ . "/../assets/uploads/$folder/";
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $file_name = uniqid() . '.' . $file_extension;
    $target_file = $target_dir . $file_name;
    
    // Cek apakah file adalah gambar
    if (!in_array($file_extension, $allowed_types)) {
        return false;
    }
    
    // Cek ukuran file (maksimal 5MB)
    if ($file['size'] > 5000000) {
        return false;
    }
    
    // Upload file
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        return $file_name;
    }
    
    return false;
}

// Fungsi untuk hapus file
function deleteFile($filename, $folder) {
    if (empty($filename)) return true;
    
    $file_path = __DIR__ . "/../assets/uploads/$folder/" . $filename;
    if (file_exists($file_path)) {
        return unlink($file_path);
    }
    return true;
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

// Fungsi untuk cek session login
function checkLogin() {
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header('Location: login.php');
        exit();
    }
}

// Start session jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

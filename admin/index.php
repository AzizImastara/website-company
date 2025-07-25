<?php
session_start();

// Cek apakah sudah login
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    // Jika sudah login, redirect ke dashboard
    header('Location: dashboard.php');
} else {
    // Jika belum login, redirect ke halaman login
    header('Location: login.php');
}
exit();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - Admin Panel' : 'Admin Panel'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #343a40;
        }
        .sidebar .nav-link {
            color: #adb5bd;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background: #495057;
        }
        .sidebar .nav-link.active {
            color: #fff;
            background: #007bff;
        }
        .main-content {
            min-height: 100vh;
            background: #f8f9fa;
        }
        .card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .navbar-brand {
            font-weight: bold;
        }
        .table th {
            border-top: none;
            font-weight: 600;
            color: #495057;
        }
        .btn-action {
            margin: 0 2px;
        }
        .img-thumbnail {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="text-center mb-4">
                        <h5 class="text-white">Admin Panel</h5>
                        <small class="text-light">Website Company</small>
                    </div>
                    
                    <ul class="nav flex-column">
                        <?php
                        // Tentukan base path berdasarkan lokasi file saat ini
                        $current_path = $_SERVER['PHP_SELF'];
                        $is_in_pages = strpos($current_path, '/pages/') !== false;
                        $base_path = $is_in_pages ? '../../' : '';
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>" href="<?php echo $base_path; ?>dashboard.php">
                                <i class="fas fa-tachometer-alt me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo (strpos($_SERVER['PHP_SELF'], 'berita') !== false) ? 'active' : ''; ?>" href="<?php echo $base_path; ?>pages/berita/index.php">
                                <i class="fas fa-newspaper me-2"></i>
                                Berita
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo (strpos($_SERVER['PHP_SELF'], 'portofolio') !== false) ? 'active' : ''; ?>" href="<?php echo $base_path; ?>pages/portofolio/index.php">
                                <i class="fas fa-briefcase me-2"></i>
                                Portofolio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $base_path; ?>pages/pesan/kontak_masuk.php"><i class="fa fa-envelope me-2"></i> Pesan Kontak</a>
                        </li>
                        <li class="nav-item mt-3">
                            <a class="nav-link text-danger" href="<?php echo $base_path; ?>logout.php" onclick="return confirm('Yakin ingin logout?')">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2"><?php echo isset($page_title) ? $page_title : 'Dashboard'; ?></h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <span class="text-muted">
                            <i class="fas fa-user me-1"></i>
                            <?php echo isset($_SESSION['admin_nama']) ? $_SESSION['admin_nama'] : 'Admin'; ?>
                        </span>
                    </div>
                </div>

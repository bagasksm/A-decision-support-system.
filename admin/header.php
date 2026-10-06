<?php
session_start();
error_reporting(0);
include '../assets/conn/config.php';
include '../assets/conn/cek.php';
?>
<html>
    <link rel="icon" type="image/png" href="../assets/logo.jpeg">
    <head>
        <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="0">
        <title>PENERAPAN METODE SAW</title>
        <link rel="icon" type="image/jpeg" href="../assets/logo.jpeg">
        <link rel="stylesheet" type="text/css" href="../assets/css/cosmo.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

            <style>
                    .navbar-custom {
                    background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
                    padding: 15px 0;
                    color: white;
                    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
                    }

                    .nav-container {
                    max-width: 1200px;
                    margin: auto;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    }

                    /* Bagian Kiri */
                    .nav-left {
                    display: flex;
                    align-items: center;
                    gap: 12px;
                    }

                    .logo {
                    width: 45px;
                    height: 45px;
                    }

                    .title-box h1 {
                    font-size: 16px;
                    margin: 0;
                    font-weight: bold;
                    }

                    .title-box span {
                    font-size: 13px;
                    opacity: 0.8;
                    }

                    /* Menu */
                    .nav-menu {
                        display: flex;
                        align-items: center;
                        gap: 18px;
                    }

                    .nav-menu a {
                        color: white;
                        text-decoration: none;
                        font-weight: 500;
                        transition: 0.3s;
                    }

                    .nav-menu a:hover {
                        color: #ffd700;
                    }

                    .btn-logout {
                        background: #e74c3c;
                        padding: 6px 12px;
                        border-radius: 6px;
                        color: white;
                    }

                    .btn-logout:hover {
                        background: #c0392b;
                    }

                    @media(max-width: 768px) {
                        .nav-container {
                            flex-direction: column;
                            gap: 10px;
                        }

                        .nav-menu {
                            flex-wrap: wrap;
                            justify-content: center;
                        }
                    }

            </style>
    </head>
    <body>
        <nav class="navbar-custom">
            <div class="nav-container">

                <div class="nav-left">
                    <img src="../assets/logo.jpeg" class="logo">
                    <div class="title-box">
                        <h1>SPK PEMILIHAN SANTRI</h1>
                        <span>Metode Simple Additive Weighting (SAW)</span>
                    </div>
                </div>

                <div class="nav-menu">
                    <a href="index.php">Home</a>
                    <a href="alternatif.php">Data Santri</a>
                    <a href="kriteria.php">Kriteria</a>
                    <a href="nilai.php">Nilai</a>
                    <a href="metode.php">Metode SAW</a>
                    <a href="hasil.php">Hasil Analisis</a>
                    <a href="logout.php" class="btn-logout" onclick="return confirm('Apakah Anda yakin ingin keluar?');">Logout</a>
                </div>

            </div>
        </nav>
        <div style="margin-top:80px;"></div>
    </body>
</html>
<?php include 'header.php'; ?>

<style>
body {
    background: #f4f6f9;
    font-family: 'Segoe UI', sans-serif;
}
/* HERO */
.hero {
    background: linear-gradient(135deg, #1f3c88, #2f6cf6);
    color: white;
    border-radius: 25px;
    padding: 40px 25px;
    margin-top: 30px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}

.hero h4 {
    font-weight: 700;
}

.hero h5 {
    font-weight: 600;
    margin-top: 8px;
}

.hero hr {
    width: 60%;
    margin: 20px auto;
    opacity: 0.5;
}


/* MENU CARD */
.menu-card {
    display: block;
    background: linear-gradient(135deg, #1f3c88, #2f6cf6);
    color: white;
    border-radius: 20px;
    padding: 25px 15px;
    text-align: center;
    min-height: 170px;
    text-decoration: none;

    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    transition: 0.3s ease;
}

.menu-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 35px rgba(0,0,0,0.25);
    color: white;
}

.menu-icon {
    font-size: 32px;
    margin-bottom: 10px;
}

.menu-card h6 {
    font-weight: 600;
    margin-bottom: 5px;
}

.menu-card p {
    font-size: 13px;
    opacity: 0.85;
    margin-bottom: 0;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .hero h4 {
        font-size: 18px;
    }

    .hero h5 {
        font-size: 15px;
    }
}
  
</style>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard SAW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <!-- HERO -->
    <div class="hero text-center">
        <img src="../assets/logo.jpeg" alt="Logo" style="width:100px; margin-bottom:15px;">
        <h2>SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN SANTRI BERKUALITAS</h2>
        <h4>Metode Simple Additive Weighting (SAW)</h4>
        <p class="mt-3">
            Pondok Pesantren Al Qur'an Nur Medina
        </p>
        <hr>
        <small>
            Aplikasi ini digunakan untuk membantu pondok pesantren dalam menentukan santri berkualitas
            berdasarkan kriteria dan metode SAW secara objektif.
        </small>
    </div>

    <!-- MENU -->
    <div class="row g-4 mt-4">

        <div class="col-md-4">
            <a href="alternatif.php" class="menu-card">
                <div class="menu-icon">👤</div>
                <h4>Data Santri</h4>
                <p>Kelola data santri</p>
            </a>
        </div>

        <div class="col-md-4">
            <a href="kriteria.php" class="menu-card">
                <div class="menu-icon">📊</div>
                <h4>Kriteria</h4>
                <p>Kelola kriteria & bobot</p>
            </a>
        </div>

        <div class="col-md-4">
            <a href="nilai.php" class="menu-card">
                <div class="menu-icon">📝</div>
                <h4>Nilai</h4>
                <p>Input nilai santri</p>
            </a>
        </div>

    </div>

    <div class="row g-4 justify-content-center mt-1">

        <div class="col-md-4">
            <a href="metode.php" class="menu-card">
                <div class="menu-icon">⚙️</div>
                <h4>Metode SAW</h4>
                <p>Proses perhitungan SAW</p>
            </a>
        </div>

        <div class="col-md-4">
            <a href="hasil.php" class="menu-card">
                <div class="menu-icon">🏆</div>
                <h4>Hasil Analisis</h4>
                <p>Ranking santri terbaik</p>
            </a>
        </div>

    </div>

</div>

</body>
</html>

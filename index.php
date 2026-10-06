<?php
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'login') {
        session_start();
        include 'assets/conn/config.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($koneksi, "SELECT * FROM tbl_akun WHERE username='$username' AND password='$password'");

        if (!$query) {
            die("Query gagal: " . mysqli_error($koneksi));
        }

        $cek = mysqli_num_rows($query);

        if ($cek > 0) {
            $data = mysqli_fetch_assoc($query);

            if ($data['level'] == 'Admin') {
                $_SESSION['username'] = $username;
                $_SESSION['level'] = 'Admin';
                header("location:admin/index.php");
            } else {
                header("location:index.php?pesan=gagal");
            }
        } else {
            header("location:index.php?pesan=gagal");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/logo.jpeg">   
    <title>Login | SPK Metode SAW</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #2d6cdf, #6aa3ff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
            width: 400px;
            padding: 30px;
            border-radius: 15px;
            background: white;
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        .login-title {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .logo {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #2d6cdf;
        }

        .btn-custom {
            background-color: #2d6cdf;
            color: white;
        }

        .btn-custom:hover {
            background-color: #204aab;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 15px;
        }
        .logo-container img {
            width: 90px;      /* ukuran logo */
            height: auto;
       }
    </style>
</head>
<body>

<div class="login-card">
    <div class="logo-container">
        <img src="assets/logo.jpeg" alt="Logo Pesantren">
    </div>
    <div class="logo">SISTEM PENDUKUNG KEPUTUSAN</div>
    <div class="logo">PONDOK PESANTREN AL QUR'AN NUR MEDINA</div>
    <div class="login-title">Login Admin</div>

    <?php
    if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal") {
        echo "<div class='alert alert-danger text-center'>
                Username atau Password salah!
              </div>";
    }
    ?>

    <form action="index.php?aksi=login" method="POST">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
        </div>

        <button type="submit" class="btn btn-custom w-100 mt-2">Login</button>
    </form>

    <div class="text-center mt-3 text-muted" style="font-size: 14px;">
        Sistem Pendukung Keputusan Metode SAW
    </div>
</div>

</body>
</html>

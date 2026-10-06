<?php
include 'header.php';
include '../assets/conn/config.php';
if (isset($_GET['proses'])) { 
    if ($_GET['proses'] == 'prosestambah') {
        $nama_alternatif = $_POST['nama_alternatif'];
        
        // Validasi Kosong
        if (empty(trim($nama_alternatif))) {
            echo "<script>alert('Nama santri tidak boleh kosong!'); window.location='alternatifaksi.php?aksi=tambah';</script>";
            exit;
        }

        // Validasi Duplikat
        $cek = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif WHERE nama_alternatif='$nama_alternatif'");
        if (mysqli_num_rows($cek) > 0) {
            echo "<script>alert('Data santri sudah ada!'); window.location='alternatifaksi.php?aksi=tambah';</script>";
            exit;
        }

        mysqli_query($koneksi, "INSERT INTO tbl_alternatif(nama_alternatif,nilai_saw,ranking) VALUES('$nama_alternatif','0','0')");
        header("location: alternatif.php");
    } else if ($_GET['proses'] == 'prosesubah') {
        $id_alternatif = $_POST['id_alternatif'];
        $nama_alternatif = $_POST['nama_alternatif'];

        // Validasi Kosong
        if (empty(trim($nama_alternatif))) {
            echo "<script>alert('Nama santri tidak boleh kosong!'); window.location='alternatifaksi.php?id_alternatif=$id_alternatif&aksi=ubah';</script>";
            exit;
        }

        // Validasi Duplikat (Kecuali diri sendiri)
        $cek = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif WHERE nama_alternatif='$nama_alternatif' AND id_alternatif!='$id_alternatif'");
        if (mysqli_num_rows($cek) > 0) {
            echo "<script>alert('Data santri sudah ada!'); window.location='alternatifaksi.php?id_alternatif=$id_alternatif&aksi=ubah';</script>";
            exit;
        }

        mysqli_query($koneksi, "UPDATE tbl_alternatif SET nama_alternatif='$nama_alternatif' WHERE id_alternatif='$id_alternatif'");
        header("location: alternatif.php");
    } else if ($_GET['proses'] == 'proseshapus') {
        $id_alternatif = $_GET['id_alternatif'];
        mysqli_query($koneksi, "DELETE FROM tbl_alternatif WHERE id_alternatif='$id_alternatif'");
        header("location: alternatif.php");
    }
}
?>
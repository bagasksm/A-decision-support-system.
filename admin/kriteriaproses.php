<?php
include 'header.php';
include '../assets/conn/config.php';
if (isset($_GET['proses'])) { 
    if ($_GET['proses'] == 'prosestambah') {
        $nama_kriteria = $_POST['nama_kriteria'];
        $bobot_kriteria = $_POST['bobot_kriteria'];
        $tipe_kriteria = $_POST['tipe_kriteria'];

        // Validasi Kosong
        if (empty(trim($nama_kriteria)) || empty($bobot_kriteria) || empty($tipe_kriteria)) {
            echo "<script>alert('Semua field harus diisi!'); window.location='kriteriaaksi.php?aksi=tambah';</script>";
            exit;
        }

        // Validasi Duplikat
        $cek = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria WHERE nama_kriteria='$nama_kriteria'");
        if (mysqli_num_rows($cek) > 0) {
            echo "<script>alert('Nama kriteria sudah ada!'); window.location='kriteriaaksi.php?aksi=tambah';</script>";
            exit;
        }

        mysqli_query($koneksi, "INSERT INTO tbl_kriteria (nama_kriteria,bobot_kriteria,tipe_kriteria) VALUES('$nama_kriteria','$bobot_kriteria','$tipe_kriteria')");
        header("location: kriteria.php");
    } else if ($_GET['proses'] == 'prosesubah') {
        $id_kriteria = $_POST['id_kriteria'];
        $nama_kriteria = $_POST['nama_kriteria'];
        $bobot_kriteria = $_POST['bobot_kriteria'];
        $tipe_kriteria = $_POST['tipe_kriteria'];

        // Validasi Kosong
        if (empty(trim($nama_kriteria)) || empty($bobot_kriteria) || empty($tipe_kriteria)) {
            echo "<script>alert('Semua field harus diisi!'); window.location='kriteriaaksi.php?id_kriteria=$id_kriteria&aksi=ubah';</script>";
            exit;
        }

        // Validasi Duplikat (Kecuali diri sendiri)
        $cek = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria WHERE nama_kriteria='$nama_kriteria' AND id_kriteria!='$id_kriteria'");
        if (mysqli_num_rows($cek) > 0) {
            echo "<script>alert('Nama kriteria sudah ada!'); window.location='kriteriaaksi.php?id_kriteria=$id_kriteria&aksi=ubah';</script>";
            exit;
        }

        mysqli_query($koneksi, "UPDATE tbl_kriteria SET nama_kriteria='$nama_kriteria', bobot_kriteria='$bobot_kriteria', tipe_kriteria='$tipe_kriteria' WHERE id_kriteria='$id_kriteria'");
        header("location: kriteria.php");
    } else if ($_GET['proses'] == 'proseshapus') {
        $id_kriteria = $_GET['id_kriteria'];
        mysqli_query($koneksi, "DELETE FROM tbl_kriteria WHERE id_kriteria='$id_kriteria'");
        mysqli_query($koneksi, "DELETE FROM tbl_subkriteria WHERE id_kriteria='$id_kriteria'");
        header("location: kriteria.php");
    }
}
?>
<?php
include 'header.php';
include '../assets/conn/config.php';
if (isset($_GET['proses'])) { 
    if ($_GET['proses'] == 'prosestambah') {
        $id_kriteria = $_POST['id_kriteria'];
        $nama_subkriteria = $_POST['nama_subkriteria'];
        $nilai_subkriteria = $_POST['nilai_subkriteria'];

        // Validasi Kosong
        if (empty(trim($nama_subkriteria)) || empty($nilai_subkriteria)) {
            echo "<script>alert('Nama subkriteria dan nilai tidak boleh kosong!'); window.location='subkriteriaaksi.php?id_kriteria=$id_kriteria&aksi=tambah';</script>";
            exit;
        }

        // Validasi Duplikat (dalam satu kriteria)
        $cek = mysqli_query($koneksi, "SELECT * FROM tbl_subkriteria WHERE nama_subkriteria='$nama_subkriteria' AND id_kriteria='$id_kriteria'");
        if (mysqli_num_rows($cek) > 0) {
            echo "<script>alert('Nama subkriteria sudah ada dalam kriteria ini!'); window.location='subkriteriaaksi.php?id_kriteria=$id_kriteria&aksi=tambah';</script>";
            exit;
        }

        mysqli_query($koneksi, "INSERT INTO tbl_subkriteria (id_kriteria,nama_subkriteria,nilai_subkriteria) VALUES('$id_kriteria','$nama_subkriteria','$nilai_subkriteria')");
        header("location: subkriteria.php?id_kriteria=$_POST[id_kriteria]");
    } else if ($_GET['proses'] == 'prosesubah') {
        $id_subkriteria = $_POST['id_subkriteria'];
        $id_kriteria = $_POST['id_kriteria'];
        $nama_subkriteria = $_POST['nama_subkriteria'];
        $nilai_subkriteria = $_POST['nilai_subkriteria'];

        // Validasi Kosong
        if (empty(trim($nama_subkriteria)) || empty($nilai_subkriteria)) {
            echo "<script>alert('Nama subkriteria dan nilai tidak boleh kosong!'); window.location='subkriteriaaksi.php?id_kriteria=$id_kriteria&id_subkriteria=$id_subkriteria&aksi=ubah';</script>";
            exit;
        }

        // Validasi Duplikat (dalam satu kriteria, kecuali diri sendiri)
        $cek = mysqli_query($koneksi, "SELECT * FROM tbl_subkriteria WHERE nama_subkriteria='$nama_subkriteria' AND id_kriteria='$id_kriteria' AND id_subkriteria!='$id_subkriteria'");
        if (mysqli_num_rows($cek) > 0) {
            echo "<script>alert('Nama subkriteria sudah ada dalam kriteria ini!'); window.location='subkriteriaaksi.php?id_kriteria=$id_kriteria&id_subkriteria=$id_subkriteria&aksi=ubah';</script>";
            exit;
        }

        mysqli_query($koneksi, "UPDATE tbl_subkriteria SET id_kriteria='$id_kriteria', nama_subkriteria='$nama_subkriteria', nilai_subkriteria='$nilai_subkriteria' WHERE id_subkriteria='$id_subkriteria'");
        header("location: subkriteria.php?id_kriteria=$_POST[id_kriteria]");
    } else if ($_GET['proses'] == 'proseshapus') {
        $id_subkriteria = $_GET['id_subkriteria'];
        $id_kriteria = $_GET['id_kriteria'];
        mysqli_query($koneksi, "DELETE FROM tbl_subkriteria WHERE id_subkriteria='$id_subkriteria'");
        header("location: subkriteria.php?id_kriteria=$_GET[id_kriteria]");
    }
}
?>
<?php
include '../assets/conn/config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<link rel="icon" href="../assets/logo.jpeg" type="image/x-icon">
<title>Cetak Data Santri</title>

<style>
body{
    font-family: "Times New Roman", serif;
    margin: 40px;
    font-size: 12pt;
}

.kop-container{
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.logo{
    width: 100px;
    text-align: center;
}

.logo img{
    width: 80px;
}

.kop-text{
    flex: 1;
    text-align: center;
}

.kop-text h5{
    font-style: italic;
    font-weight: lighter;
    margin: 5px 0;
}

.garis{
    border-top: 3px solid black;
    margin: 10px 0 25px;
}

table{
    width: 100%;
    border-collapse: collapse;
}

th, td{
    border: 1px solid black;
    padding: 8px;
    text-align: center;
}

th{
    background-color: #f2f2f2;
}
</style>
</head>

<body onload="window.print()">

<!-- KOP SURAT -->
<div class="kop-container">
    <div class="logo">
        <img src="../assets/logo.jpeg" alt="Logo Pesantren">
    </div>

    <div class="kop-text">
        <h3>PONDOK PESANTREN AL-QUR'AN NUR MEDINA</h3>
        <h5>
            JL. Cabe III No.79 RT.04/RW.09, Kelurahan Pondok Cabe Ilir,  
            Kecamatan Pamulang, Kota Tangerang Selatan 15418
        </h5>
    </div>

    <div class="logo"></div>
</div>

<div class="garis"></div>

<!-- JUDUL -->
<h3 style="text-align:center; margin-bottom:20px;">
    Data Santri Pondok Pesantren Al-Qur'an Nur Medina
</h3>

<!-- TABEL HASIL -->
<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama Santri</th>
            <th>Nilai SAW</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query(
            $koneksi,
            "SELECT nama_alternatif, nilai_saw, ranking 
             FROM tbl_alternatif 
             ORDER BY id_alternatif ASC"
        );
        while ($data = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td style="text-align:left"><?= $data['nama_alternatif']; ?></td>
            <td><?= number_format($data['nilai_saw'], 2); ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<br><br>

<!-- TANDA TANGAN -->
<table style="width:100%; border:none;">
    <tr>
        <td style="border:none; width:60%;"></td>
        <td style="border:none; text-align:center;">
            Pamulang, <?php
$hari = [
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu'
];

$bulan = [
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'November',
    'December' => 'Desember'
];

$hari_ini  = $hari[date('l')];
$tanggal   = date('d');
$bulan_ini = $bulan[date('F')];
$tahun     = date('Y');

echo "$hari_ini $tanggal $bulan_ini $tahun";
?>
<br>
            Kepala Pondok Pesantren<br><br><br><br><br>
            
            KH. Endang Husna Hadiawan, MA<br>
        </td>
    </tr>
</table>

</body>
</html>

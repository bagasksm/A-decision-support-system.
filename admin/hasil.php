<?php include 'header.php'; ?>
<div class="container">
    <div class="row">
        <ol class="breadcrumb"><h4>HASIL ANALISIS METODE SAW</h4></ol>
    </div>
    <a href="cetak_hasil.php" target="_blank" class="btn btn-modern">
                    🖨 Cetak Semua Hasil Analisis
                </a>
    <div class="panel panel-container ">
        <div class="bootstrap-table-responsive card shadow-sm border-0 rounded-4">
            <div class="mb-3 text-end card-body">

            <div class="table-responsive ">
                <table class="table table-hover align-middle text-center">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">Nama Santri</th>
                            <th class="text-center">NILAI SAW</th>
                            <th class="text-center">RANKING</th>
                            <th class="text-center">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif ORDER BY ranking");
                        $no = 1;
                        while ($a = mysqli_fetch_array($data)) {
                            if ($a['ranking'] <= 1) {
                                $status = '<span class="label label-success">Santri Berkualitas</span>';
                            } else {
                                $status = '<span class="label label-default">Belum Terpilih</span>';
                            }
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $a['nama_alternatif']; ?></td>
                            <td class="text-center"><?php echo number_format($a['nilai_saw'], 2); ?></td>
                            <td class="text-center"><?php echo $a['ranking']; ?></td>
                            <td class="text-center"><?php echo $status; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
    body {
        background: #f5f7fa;
    }

    .card {
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    }

    table th {
        font-size: 15px;
        font-weight: 600;
    }

    table td {
        font-size: 14px;
    }
    .btn-modern {
        background: linear-gradient(135deg, #1f3c88, #2f6cf6);
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        font-weight: 500;
    }
</style>
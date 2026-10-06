<?php include 'header.php'; ?>

<style>
    body {
        background-color: #f5f7fa;
    }

    .page-container {
        margin-top: 40px;
        margin-bottom: 50px;
    }

    .custom-card {
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        padding: 25px;
    }

    .custom-title {
        font-weight: 600;
        color: #1f3c88;
        margin-bottom: 20px;
    }

    .btn-modern {
        background: linear-gradient(135deg, #1f3c88, #2f6cf6);
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        font-weight: 500;
    }

    .btn-modern:hover {
        background: linear-gradient(135deg, #142b63, #1f59d4);
        color: #fff;
    }

    .table th {
        background-color: #1f3c88;
        color: white;
        vertical-align: middle;
    }

    .table td {
        vertical-align: middle;
        background: #fdfdfd;
    }

    .badge-title {
        background: #1f3c88;
        padding: 9px 18px;
        border-radius: 8px;
        color: white;
        font-size: 16px;
    }

    .action-btn a {
        margin: 2px;
    }
</style>

<div class="container page-container">
    <div>
        <h3 class="fw-bold">Data Nilai Santri</h3>
        <h5 class="text-muted">Kelola nilai santri penilaian metode SAW</h5>
    </div>
    <div class="custom-card">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="nilaiaksi.php?aksi=tambah" class="btn btn-modern">
                + Tambah Data
            </a>
            <a href="cetak_nilai.php" target="_blank" class="btn btn-modern">
                🖨 Cetak Semua Nilai Santri
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Santri</th>
                        
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria");
                        $no = 1;
                        while ($b = mysqli_fetch_array($query)) {
                            echo "<th>$b[nama_kriteria]</th>";
                        }
                        ?>

                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif ORDER BY id_alternatif");
                $no = 1;

                while($a = mysqli_fetch_array($data)){
                ?>

                    <tr>
                        <?php
                        $nomor = $no++;
                        $kode = $a['id_alternatif'];
                        $nama = $a['nama_alternatif'];
                        
                        echo "<td class='text-center'>$nomor</td>
                        <td class='text-center'>$nama</td>
                        ";
        
                        $query1 = mysqli_query(
                            $koneksi,
                            "SELECT a.nilai_subkriteria as sub 
                             FROM tbl_subkriteria a, tbl_nilai b 
                             WHERE b.id_alternatif='".$kode."' 
                             AND a.id_subkriteria = b.id_subkriteria 
                             ORDER BY b.id_kriteria");

                        while ($result = mysqli_fetch_array($query1)) {
                            echo "<td class='text-center'>$result[sub]</td>";
                        }
                        ?>

                        <td class="action-btn">
                            <a href="nilaiaksi.php?id_alternatif=<?php echo $a['id_alternatif']; ?>&aksi=ubah" 
                               class="btn btn-success btn-sm">
                                Ubah
                            </a>

                            <a href="nilaiproses.php?id_alternatif=<?php echo $a['id_alternatif']; ?>&proses=proseshapus" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>

                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

</div>

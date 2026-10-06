<?php include 'header.php';?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Data Santri</h3>
            <small class="text-muted">Daftar santri beserta nilai dan ranking metode SAW</small>
        </div>
        <a href="alternatifaksi.php?aksi=tambah" class="btn btn-modern">
            + Tambah Santri
        </a>
        <a href="cetak_alternatif.php" target="_blank" class="btn btn-modern">
            🖨 Cetak Semua Data
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-primary">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Santri</th>
                        <th class="text-center">Nilai SAW</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($koneksi, "SELECT * FROM tbl_alternatif ORDER BY id_alternatif");
                        $no = 1;
                        while ($a = mysqli_fetch_array($data)) {
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td class="fw-semibold text-center"><?php echo $a['nama_alternatif']; ?></td>
                            <td class="text-center">
                                <span class="badge bg-success px-3 py-2">
                                    <?php echo number_format($a['nilai_saw'], 3); ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="alternatifaksi.php?id_alternatif=<?php echo $a['id_alternatif']; ?>&aksi=ubah" 
                                   class="btn btn-warning btn-sm rounded-pill px-3">
                                    Edit
                                </a>

                                <a href="alternatifproses.php?id_alternatif=<?php echo $a['id_alternatif']; ?>&proses=proseshapus" 
                                   class="btn btn-danger btn-sm rounded-pill px-3"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <?php if(mysqli_num_rows($data) == 0){ ?>
                    <div class="text-center py-4 text-muted">
                        <i>Belum ada data santri.</i>
                    </div>
                <?php } ?>

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

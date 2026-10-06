<?php include 'header.php'; ?>

<div class="container mt-4">
    <!-- Header Halaman -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold">Data Kriteria</h3>
            <h5 class="text-muted">Kelola kriteria penilaian metode SAW</h5>
        </div>
        <br>
        <a href="kriteriaaksi.php?aksi=tambah" class="btn btn-modern">
            + Tambah Kriteria
        </a>
        <a href="cetak_kriteria.php" target="_blank" class="btn btn-modern">
            🖨 Cetak Semua Data
        </a>
    </div>

    <!-- Card -->
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Kriteria</th>
                            <th class="text-center">Bobot</th>
                            <th class="text-center">Tipe</th>
                            <th class="text-center">Subkriteria</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
                        $no = 1;
                        while($a = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td class="fw-semibold"><?= $a['nama_kriteria']; ?></td>
                            <td class="fw-semibold"><?= $a['bobot_kriteria']; ?></td>
                            <td>
                                <?php if($a['tipe_kriteria'] == 'benefit'){ ?>
                                    <span class="badge bg-info px-3 py-2">Benefit</span>
                                <?php } else { ?>
                                    <span class="badge bg-warning text-dark px-3 py-2">Cost</span>
                                <?php } ?>
                            </td>

                            <td>
                                <a href="subkriteria.php?id_kriteria=<?= $a['id_kriteria']; ?>" 
                                   class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                    Lihat Subkriteria
                                </a>
                            </td>

                            <td>
                                <a href="kriteriaaksi.php?id_kriteria=<?= $a['id_kriteria']; ?>&aksi=ubah" 
                                   class="btn btn-warning btn-sm rounded-pill px-3">
                                    Edit
                                </a>

                                <a href="kriteriaproses.php?id_kriteria=<?= $a['id_kriteria']; ?>&proses=proseshapus" 
                                   class="btn btn-danger btn-sm rounded-pill px-3"
                                   onclick="return confirm('Yakin ingin menghapus kriteria ini?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                        <?php } ?>

                        <?php if(mysqli_num_rows($data) == 0){ ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                Belum ada data kriteria.
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!-- Style tambahan -->
<style>
    body {
        background-color: #f5f7fa;
    }

    .card {
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    }

    table th {
        font-size: 15px;
        font-weight: 600;
    }

    table td {
        font-size: 14px;
    }

    .btn {
        transition: all 0.3s ease;
    }

    .btn-modern {
        background: linear-gradient(135deg, #1f3c88, #2f6cf6);
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        font-weight: 500;
    }
    .btn:hover {
        transform: scale(1.05);
    }
</style>

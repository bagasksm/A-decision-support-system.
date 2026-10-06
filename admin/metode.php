<?php include 'header.php'; ?>
<div class="container">
    <div class="row">
        <ol class="breadcrumb"><h4>PROSES PERHITUNGAN METODE SAW</h4></ol>
    </div>
    <div class="card mb-3">
    <div class="card-body">
        <button class="btn btn-modern"><a href="#nilaiKeputusan">Nilai Keputusan</a></button>
        <button class="btn btn-modern"><a href="#konversiNilai">Konversi Nilai</a></button>
        <button class="btn btn-modern"><a href="#normalisasiMatriks">Normalisasi</a></button>
        <button class="btn btn-modern"><a href="#normalisasiBobot">Preferensi</a></button>
        <button class="btn btn-modern"><a href="#peringkat">Perangkingan</a></button>
        
    </div>
</div>
    <div class="panel panel-container">
        <div class="bootstrap-table-responsive">
            <h4 id="nilaiKeputusan">NILAI KEPUTUSAN</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Santri</th>
                            <?php
                                $query = mysqli_query ($koneksi, "SELECT * FROM tbl_kriteria");
                                while ($b=mysqli_fetch_array($query)) {
                                    echo "<th class='text-center'>$b[nama_kriteria]</th>";
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data=mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by id_alternatif");
                        $no=1;
                        while($a=mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <?php
                                $nomor = $no++;
                                $kode = $a['id_alternatif'];
                                $nama = $a['nama_alternatif'];
                                echo "
                                <td class='text-center'>$nomor</td>
                                <td class='text-center'>$nama</td>
                                ";
                                $query1 = mysqli_query ($koneksi, "SELECT a.nama_subkriteria as sub FROM tbl_subkriteria a, tbl_nilai b WHERE b.id_alternatif='".$kode."' AND a.id_subkriteria = b.id_subkriteria ORDER BY b.id_kriteria");
                                while ($result = mysqli_fetch_array($query1)) {
                                    echo "<td class='text-center'>$result[sub]</td>";
                                }
                            ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <h4 id="konversiNilai">KONVERSI NILAI KEPUTUSAN</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Santri</th>
                            <?php
                                $query = mysqli_query ($koneksi, "SELECT * FROM tbl_kriteria");
                                while ($b=mysqli_fetch_array($query)) {
                                    echo "<th class='text-center'>$b[nama_kriteria]</th>";
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data=mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by id_alternatif");
                        $no=1;
                        while($a=mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <?php
                                $nomor = $no++;
                                $kode = $a['id_alternatif'];
                                $nama = $a['nama_alternatif'];
                                echo "
                                <td class='text-center'>$nomor</td>
                                <td class='text-center'>$nama</td>
                                ";
                                $query1 = mysqli_query ($koneksi, "SELECT a.nilai_subkriteria as sub FROM tbl_subkriteria a, tbl_nilai b WHERE b.id_alternatif='".$kode."' AND a.id_subkriteria = b.id_subkriteria ORDER BY b.id_kriteria");
                                while ($result = mysqli_fetch_array($query1)) {
                                    echo "<td class='text-center'>$result[sub]</td>";
                                }
                            ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tr>
                        <td colspan="2">Nilai Max</td>
                        <?php 
                            $query = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
                            while($b = mysqli_fetch_array($query)){
                                $query1 = mysqli_query($koneksi, "SELECT MAX(s.nilai_subkriteria) as nmax FROM tbl_subkriteria s, tbl_nilai kp WHERE kp.id_kriteria='".$b['id_kriteria']."' AND s.id_subkriteria = kp.id_subkriteria");
                                $result1 = mysqli_fetch_array($query1);

                                echo "<td class='text-center'><b>$result1[nmax]</b></td>";
                            }
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2">Nilai Min</td>
                        <?php 
                            $query = mysqli_query($koneksi, "SELECT * FROM tbl_kriteria ORDER BY id_kriteria");
                            while($b = mysqli_fetch_array($query)){
                                $query1 = mysqli_query($koneksi, "SELECT MIN(s.nilai_subkriteria) as nmin FROM tbl_subkriteria s, tbl_nilai kp WHERE kp.id_kriteria='".$b['id_kriteria']."' AND s.id_subkriteria = kp.id_subkriteria");
                                $result1 = mysqli_fetch_array($query1);

                                echo "<td class='text-center'><b>$result1[nmin]</b></td>";
                            }
                        ?>
                    </tr>
                </table>
            </div>

            <h4 id="normalisasiMatriks">NORMALISASI MATRIKS</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Santri</th>
                            <?php
                                $query = mysqli_query ($koneksi, "SELECT * FROM tbl_kriteria");
                                while ($b=mysqli_fetch_array($query)) {
                                    echo "<th class='text-center'>$b[nama_kriteria]</th>";
                                }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data=mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by id_alternatif");
                        $no=1;
                        while($a=mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <?php
                                $nomor = $no++;
                                $kode = $a['id_alternatif'];
                                $nama = $a['nama_alternatif'];
                                echo "
                                <td class='text-center'>$nomor</td>
                                <td class='text-center'>$nama</td>
                                ";
                                $query1 = mysqli_query ($koneksi, "SELECT s.nilai_subkriteria as sub, kp.id_kriteria as id_kriteria, k.tipe_kriteria as atribut FROM tbl_subkriteria s, tbl_nilai kp, tbl_kriteria k WHERE kp.id_alternatif='".$kode."' AND s.id_subkriteria=kp.id_subkriteria AND k.id_kriteria=kp.id_kriteria ORDER BY kp.id_kriteria");
                                while ($result = mysqli_fetch_array($query1)) {
                                    //untuk memanggil nilai Max
                                    $query2 = mysqli_query($koneksi, "SELECT MAX(s.nilai_subkriteria) as nmax FROM tbl_subkriteria s, tbl_nilai kp WHERE kp.id_kriteria='".$result['id_kriteria']."' AND s.id_subkriteria=kp.id_subkriteria");
                                    $result2 = mysqli_fetch_array($query2);
                                    $tmax = $result2['nmax'];

                                    //untuk memanggil nilai Min
                                    $query3 = mysqli_query($koneksi, "SELECT MIN(s.nilai_subkriteria) as nmin FROM tbl_subkriteria s, tbl_nilai kp WHERE kp.id_kriteria='".$result['id_kriteria']."' AND s.id_subkriteria=kp.id_subkriteria");
                                    $result3 = mysqli_fetch_array($query3);
                                    $tmin = $result3['nmin'];

                                    //membuat keputusan berdasarkan tipe kriterianya
                                    if ($result['atribut'] == 'benefit') {
                                        $val = $result['sub'] / $tmax;
                                    } else {
                                        $val = $tmin / $result['sub'];
                                    }

                                    $val = round($val, 2);

                                    echo "<td class='text-center'>".$val."</td>";
                                }
                            ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

             <h4 id="normalisasiBobot">NORMALISASI BOBOT</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Santri</th>
                            <?php
                                $query = mysqli_query ($koneksi, "SELECT * FROM tbl_kriteria");
                                while ($b=mysqli_fetch_array($query)) {
                                    echo "<th class='text-center'>$b[nama_kriteria]</th>";

                                }
                            ?>
                            <th class="text-center">Nilai Vi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data=mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by id_alternatif");
                        $no=1;
                        while($a=mysqli_fetch_array($data)){
                            $vi = 0;
                        ?>
                        <tr>
                            <?php
                                $nomor = $no++;
                                $kode = $a['id_alternatif'];
                                $nama = $a['nama_alternatif'];
                                echo "
                                <td class='text-center'>$nomor</td>
                                <td class='text-center'>$nama</td>
                                ";
                                $query1 = mysqli_query ($koneksi, "SELECT s.nilai_subkriteria as sub, kp.id_kriteria as id_kriteria, k.tipe_kriteria as atribut FROM tbl_subkriteria s, tbl_nilai kp, tbl_kriteria k WHERE kp.id_alternatif='".$kode."' AND s.id_subkriteria=kp.id_subkriteria AND k.id_kriteria=kp.id_kriteria ORDER BY kp.id_kriteria");
                                while ($result = mysqli_fetch_array($query1)) {
                                    //untuk memanggil nilai Max
                                    $query2 = mysqli_query($koneksi, "SELECT MAX(s.nilai_subkriteria) as nmax FROM tbl_subkriteria s, tbl_nilai kp WHERE kp.id_kriteria='".$result['id_kriteria']."' AND s.id_subkriteria=kp.id_subkriteria");
                                    $result2 = mysqli_fetch_array($query2);
                                    $tmax = $result2['nmax'];

                                    //untuk memanggil nilai Min
                                    $query3 = mysqli_query($koneksi, "SELECT MIN(s.nilai_subkriteria) as nmin FROM tbl_subkriteria s, tbl_nilai kp WHERE kp.id_kriteria='".$result['id_kriteria']."' AND s.id_subkriteria=kp.id_subkriteria");
                                    $result3 = mysqli_fetch_array($query3);
                                    $tmin = $result3['nmin'];

                                    //membuat keputusan berdasarkan tipe kriterianya
                                    if ($result['atribut'] == 'benefit') {
                                        $val = $result['sub']/$tmax;
                                    } else {
                                        $val = $tmin/$result['sub'];
                                    }

                                    $val = round($val, 2);

                                    //memanggil bobot kriteria
                                    $query4 = mysqli_query($koneksi, "SELECT bobot_kriteria FROM tbl_kriteria WHERE id_kriteria='".$result['id_kriteria']."'");
                                    $result4 = mysqli_fetch_array($query4);

                                    //normalisasi bobot
                                    $bobot_k= $result4['bobot_kriteria']/100;
                                    //perkalian nilai dengan bobot
                                    $valbobot = ($val * $bobot_k);
                                    $nbobot = round ($valbobot, 2);

                                    $vi += $valbobot;
                                    $nvi = number_format($vi, 2);


                                    echo "<td class='text-center'>".$nbobot."</td>";
                                }
                                    echo "<td class='text-center'>".$vi."</td>";

                                    mysqli_query($koneksi, "UPDATE tbl_alternatif SET nilai_saw='$vi' WHERE id_alternatif='".$a['id_alternatif']."'");
                            ?>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <?php
                $data=mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by nilai_saw DESC");
                $rank=1;
                while($b=mysqli_fetch_array($data)){
                    mysqli_query($koneksi, "UPDATE tbl_alternatif SET ranking='$rank' WHERE id_alternatif='".$b['id_alternatif']."'");
                    $rank++;
                }
            ?>

        <h4 id="peringkat">PERANGKINGAN</h4>    
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">Nama Santri</th>
                            <th class="text-center">NILAI SAW</th>
                            <th class="text-center">RANKING</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data=mysqli_query($koneksi, "SELECT * FROM tbl_alternatif order by ranking");
                        $no=1;
                        while($a=mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $a['nama_alternatif']; ?></td>
                            <td class="text-center"><?php echo number_format($a['nilai_saw'],2); ?></td>
                            <td class="text-center"><?php echo $a['ranking']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<script>
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>
<style>
    .btn-modern {
        background: linear-gradient(135deg, #010101ff, #101f42ff);
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        font-weight: 500;
    }
</style>
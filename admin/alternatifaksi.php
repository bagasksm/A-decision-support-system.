<?php
include 'header.php';
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) { 
    if ($_GET['aksi'] == 'tambah') { ?>
        <div class="container">
            <div class="row"> 
                <ol class="breadcrumb"><h4>Data Santri / TAMBAH DATA</h4></ol>
            </div>
            <div class="panel panel-container">
                <div class="bootstrap-table">
                    <form action="alternatifproses.php?proses=prosestambah" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Santri</label>
                            <input type="text" name="nama_alternatif" class="form-control" placeholder="nama alternatif" required>
                        </div>
                        <div class="modal-footer">
                            <a href="alternatif.php" class="btn btn-primary">KEMBALI</a>
                            <input type="submit" class="btn btn-success" value="SIMPAN"></input>

                        </div>
                </div>
            </div>
        </div>
    <?php }else if ($_GET['aksi'] == 'ubah') { ?>
        <div class="container">
            <div class="row"> 
                <ol class="breadcrumb"><h4>Data Santri / UBAH DATA</h4></ol>
            </div>
            <div class="panel panel-container">
                <div class="bootstrap-table">
                    <?php
                        $data=mysqli_query($koneksi, "SELECT * FROM tbl_alternatif where id_alternatif='$_GET[id_alternatif]'");
                        while($a=mysqli_fetch_array($data)){
                        ?>
                    <form action="alternatifproses.php?proses=prosesubah" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_alternatif" value="<?php echo $a['id_alternatif']; ?>">
                        <div class="form-group">
                            <label>Nama Santri</label>
                            <input type="text" name="nama_alternatif" class="form-control" placeholder="nama alternatif" value="<?php echo $a['nama_alternatif']; ?>" required>
                        </div>
                        <div class="modal-footer">
                            <a href="alternatif.php" class="btn btn-primary">KEMBALI</a>
                            <input type="submit" class="btn btn-success" value="UBAH"></input>
                        </div>
                    </form>
                <?php }  ?>    
                </div>
            </div>
        </div>
<?php } } ?>
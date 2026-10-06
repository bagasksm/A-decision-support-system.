<?php
include 'header.php';
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) { 
    if ($_GET['aksi'] == 'tambah') { ?>
        <div class="container">
            <div class="row"> 
                <ol class="breadcrumb"><h4>KRITERIA/ TAMBAH DATA</h4></ol>
            </div>
            <div class="panel panel-container">
                <div class="bootstrap-table">
                    <form action="kriteriaproses.php?proses=prosestambah" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nama Kriteria</label>
                            <input type="text" name="nama_kriteria" class="form-control" placeholder="nama kriteria" required>
                        </div>
                        <div class="form-group">
                            <label>Bobot Kriteria</label>
                            <input type="number" name="bobot_kriteria" class="form-control" placeholder="0" required>
                        </div>
                        <div class="form-group">
                            <label>Tipe Kriteria</label>
                            <select name="tipe_kriteria" class="form-control" required>
                                <option></option>
                                <option value="benefit">Benefit</option>
                                <option value="cost">Cost</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <a href="kriteria.php" class="btn btn-primary">KEMBALI</a>
                            <input type="submit" class="btn btn-success" value="SIMPAN"></input>

                        </div>
                </div>
            </div>
        </div>
    <?php }else if ($_GET['aksi'] == 'ubah') { ?>
        <div class="container">
            <div class="row"> 
                <ol class="breadcrumb"><h4>KRITERIA/ UBAH DATA</h4></ol>
            </div>
            <div class="panel panel-container">
                <div class="bootstrap-table">
                    <?php
                        $data=mysqli_query($koneksi, "SELECT * FROM tbl_kriteria where id_kriteria='$_GET[id_kriteria]'");
                        while($a=mysqli_fetch_array($data)){
                        ?>
                    <form action="kriteriaproses.php?proses=prosesubah" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_kriteria" value="<?php echo $a['id_kriteria']; ?>">
                        <div class="form-group">
                            <label>Nama Kriteria</label>
                            <input type="text" name="nama_kriteria" class="form-control" placeholder="nama kriteria" value="<?php echo $a['nama_kriteria']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Bobot Kriteria</label>
                            <input type="number" name="bobot_kriteria" class="form-control" placeholder="0" value="<?php echo $a['bobot_kriteria']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tipe Kriteria</label>
                            <select name="tipe_kriteria" class="form-control" required>
                                <option selected><?php echo $a['tipe_kriteria']; ?></option>
                                <option value="benefit">Benefit</option>
                                <option value="cost">Cost</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <a href="kriteria.php" class="btn btn-primary">KEMBALI</a>
                            <input type="submit" class="btn btn-success" value="UBAH"></input>
                        </div>
                    </form>
                <?php }  ?>    
                </div>
            </div>
        </div>
<?php } } ?>
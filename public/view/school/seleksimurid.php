<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
?>

<?php 
$kdmurid = $kon->real_escape_string($_GET["kd_murid"]);
$result = $kon->query("SELECT * FROM daftarmurid WHERE kd_murid='$kdmurid'");
while($sd = $result->fetch_array()){
    ?>
    <div class="col-md-4 col-md-offset-4 pt-5 mt-5">
        <div class="card" style="width:27rem;">
            <h5 class="card-header text-center text-medium">Data Seleksi Murid</h5>
            <span class="card-header text-small-3 text-center" style="background: rgb(150, 150, 150); color:white;"><?php echo $sd["namalengkap"] ?></span>
            <div class="card-body text-small-3">
                <p class="card-text">Full Name : <span><?php echo $sd["namalengkap"] ?></span></p>
                <p class="card-text">Nick Name : <span><?php echo $sd["namapanggilan"] ?></span></p>
                <p class="card-text">Date Birth : <span><?php echo $sd["tanggal_lahir"] ?>, <?php echo $sd["tempat_lahir"] ?></span></p>
                <p class="card-text">Jenis Kelamin : <span><?php echo $sd["jeniskelamin"] ?></span></p>
                <p class="card-text">Umur People : <span><?php echo $sd["umur"] ?> tahun</span></p>
            </div>
            <div class="card-footer text-end">
                <button type='button' data-bs-toggle='modal' data-bs-target='#seleksi' class='btn fa fa-check'></button>
                <a href="./register.php" class="btn fa fa-arrow-left"> Kembali</a>
            </div>
        </div>
    </div>
    <div class="modal mt-5 pt-5 col-md-offset-5" id="seleksi" style="width: 37rem;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Seleksi Murid Baru</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="../../action/school/act_seleksi.php" method="post">
                            <div class="mb-1">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="fa fa-user"></span></span>
                                    <input type="text" name="nama" id="inputNama" class="form-control input" value="<?php echo $sd["namalengkap"]?>" readonly>
                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="fa fa-school"></span></span>
                                    <select name="kd_kelas" class="form-control select" type="submit">
                                        <option>Pilih Kelas</option>
                                        <?php 
                                            $query = "SELECT * FROM kelas";
                                            $results = $kon->query($query);
                                            while($sr = $results->fetch_array()){
                                                ?>
                                                    <option value="<?php echo $sr["kd_kelas"]?>"><?php echo $sr["nama_kelas"] ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><span class="fa fa-check"></span></span>
                                    <select name="kd_seleksi" class="form-control select" type="submit">
                                        <option>Pilih Seleksi</option>
                                        <?php 
                                            $querys = "SELECT * FROM seleksi";
                                            $resultx = $kon->query($querys);
                                            while($sk = $resultx->fetch_array()){
                                                ?>
                                                    <option value="<?php echo $sk["kd_seleksi"]?>"><?php echo $sk["seleksi"] ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="data">Simpan Data</button>
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-hidden="true">Close</button>                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php 
include "footer.php";
?>
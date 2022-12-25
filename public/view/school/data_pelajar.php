<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
?>

<?php 
$id = $kon->real_escape_string($_GET["kd_murid"]);
$result = $kon->query("SELECT * FROM daftarmurid WHERE kd_murid='$id'");
while($rpd = $result->fetch_array()){
    ?>
        <div class="col-md-4 col-md-offset-3 mt-5 pt-5">
            <div class="card mt-2" style="width:29rem;">
                <h5 class="card-header text-center">Detail Pelajar</h5>
                <div class="card-body">
                    <p class="card-text">Full Name : <?php echo $rpd["namalengkap"]; ?></p>
                    <p class="card-text">Nick Name : <?php echo $rpd["namapanggilan"]; ?></p>
                    <p class="card-text">Date Birth : <?php echo $rpd["tanggal_lahir"]; ?></p>
                    <p class="card-text">Residence : <?php echo $rpd["tempat_lahir"]; ?></p>
                    <p class="card-text">Sex People : <?php echo $rpd["jeniskelamin"]; ?></p>
                    <p class="card-text">Age People : <?php echo $rpd["umur"]; ?> age</p>
                    <p class="card-text">Religion : <?php echo $rpd["agama"]; ?></p>
                    <p class="card-text">Phone Number : <?php echo $rpd["telephone"]; ?></p>
                </div>
                <div class="card-footer text-center">
                    <a href="./register.php" class="glyphicon glyphicon-folder-close" style="color:inherit; text-decoration:none;"> Kembali</a>
                </div>
            </div>
        </div>
    <?php
}
?>

<?php 
include "footer.php";
?>
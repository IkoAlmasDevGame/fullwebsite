<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";

function namakelas($kd_kelas){
    if($kd_kelas == "12"){
        echo "Kelas 1";
    }else if($kd_kelas == "13"){
        echo "Kelas 2";
    }else if($kd_kelas == "14"){
        echo "Kelas 3";
    }else if($kd_kelas == "15"){
        echo "Kelas 4";
    }else if($kd_kelas == "16"){
        echo "Kelas 5";
    }else if($kd_kelas == "17"){
        echo "Kelas 6";
    }
}

function selection($kd_seleksi){
    if($kd_seleksi == "1"){
        echo "LOLOS SELEKSI";
    }else{
        echo "TIDAK LOLOS SELEKSI";
    }
}
?>

<?php 
$kd_murid = $kon->real_escape_string($_GET["kd_murid"]);
$result = $kon->query("SELECT * FROM siswa WHERE kd_murid='$kd_murid'");
$no = 1;
while($rs = $result->fetch_array()){
    ?>
    <div class="col-md-4 col-md-offset-4 pt-5 mt-5">
        <div class="card" style="width:27rem;">
            <h5 class="card-header text-center text-medium">Data Seleksi Murid</h5>
            <div class="card-body text-small-3">
                <p class="card-text">Nama Siwa : <span><?php echo $rs["nama"]; ?></span></p>
                <p class="card-text">Kelas Siwa : <span><?php echo namakelas($rs["kd_kelas"]); ?></span></p>
                <p class="card-text">Seleksi Siwa : <span><?php echo selection($rs["kd_seleksi"]); ?></span></p>
            </div>
            <div class="card-footer text-end">
                <a href="./register.php" class="btn fa fa-arrow-left"> Kembali</a>
            </div>
        </div>
    </div>
    <?php
}
?>

<?php 
include "footer.php";
?>
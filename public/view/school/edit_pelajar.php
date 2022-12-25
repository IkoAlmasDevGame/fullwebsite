<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
?>

<?php 
$id = $kon->real_escape_string($_GET["kd_murid"]);
$result = $kon->query("SELECT * FROM daftarmurid WHERE kd_murid='$id'");
while($rpd = $result->fetch_array()){
    ?>
    <style type="text/css">
        #start {
            display: flex;
            flex-direction: row-reverse;
            justify-content:center;
            flex-wrap: wrap;
            margin-top: 10px;
        }
        
        #begin{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }
    </style>
        <div class="col-md-6 col-md-offset-2">
            <div class="card mt-1" style="width: 63rem;">
                <h5 class="card-header text-center">Edit Data Pelajar</h5>
                <div class="card-body">
                    <div class="card-header text-end">
                        <script src="../../../script/src/student.js"></script>
                        <input type="checkbox" onclick="uncheckAll()"> Check All / Uncheck All
                        <script>
                            $(function(){
                                $("#datepicker").datepicker();
	                        });
                        </script>
                    </div>
                    <form action="../../action/school/act_edit_register.php" method="post" class="form-group">
                        <div id="start">
                            <p class="card-text">ID Card Student : <input type="text" name="kd_murid" class="form-control input" value="<?php echo $rpd["kd_murid"]?>" readonly></p>
                        </div>
                        <div id="begin">
                            <p class="card-text">Full Name : <input type="text" name="namalengkap" id="inputNama" class="form-control input" value="<?php echo $rpd["namalengkap"]?>" readonly></p>
                            <p class="card-text">Nick Name : <input type="text" name="namapanggilan" id="inputPanggilan" class="form-control input" value="<?php echo $rpd["namapanggilan"]?>" readonly></p>
                            <p class="card-text">Date Birth : <input type="text" name="tanggal_lahir" id="datepicker" class="form-control date"></p>
                            <p class="card-text">Sex People : 
                                <select name="jeniskelamin" class="form-control input-sm select">
                                <?php
                                    $jkelamin = mysqli_query($kon, "SELECT * FROM jeniskelamin");
                                    while($jk = mysqli_fetch_array($jkelamin)){
                                        ?>
                                        <option value="<?php echo $jk["jeniskelamin"]?>" <?php if($jk["jeniskelamin"] == $rpd["jeniskelamin"]){?>selected="" <?php }?>><?php echo $jk['jeniskelamin'];?></option>
                                        <?php
                                    }
                                ?>
                                </select>
                            </p>
                            <p class="card-text">Residence : 
                                <select name="tempat_lahir" class="form-control input-sm select">
                                <?php
                                $provinsi = mysqli_query($kon, "SELECT * FROM tempat_lahir_db");
                                while($prov = mysqli_fetch_array($provinsi)){
                                    ?>
                                    <option value="<?php echo $prov["provinsi"]?>" <?php if($prov["provinsi"] == $rpd["tempat_lahir"]){?>selected="" <?php }?>><?php echo $prov['provinsi'];?></option>
                                    <?php
                                }
                                ?>
                                </select>
                            </p>
                            <p class="card-text">Age People : <input type="text" name="umur" id="inputUsia" class="form-control input" value="<?php echo $rpd["umur"]?>" readonly></p>
                            <p class="card-text">Religion : <input type="text" name="agama" id="inputAgama" class="form-control input" value="<?php echo $rpd["agama"]?>" readonly></p>
                            <p class="card-text">Phone Number : <input type="text" name="telephone" id="inputTelephone" class="form-control input" value="<?php echo $rpd["telephone"]?>" readonly></p>
                        </div>
                        <div class="card-footer text-center">
                            <button name="data" class="btn glyphicon glyphicon-save"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
}
?>

<?php 
include "footer.php";
?>
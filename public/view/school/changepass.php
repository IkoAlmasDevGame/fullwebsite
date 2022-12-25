<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
?>

<?php 
$id = mysqli_real_escape_string($kon, $_GET["id_pegawai"]);
$sql = "SELECT * FROM pegawai WHERE id_pegawai=".$id;
$result = mysqli_query($kon, $sql);
while($bio = mysqli_fetch_assoc($result)){
    $b = $bio["userEmail"];
    $bi = $bio["password"];
    $boi = $bio["nama"];
    ?>
        <div class="col-md-4 col-md-offset-3">
            <h1 class="text-def">Data Pribadi</h1>
                <div class="card">
                    <div class="card-header">
                        <div class="col-xs-8">
                            <a class="img-thumbnail">
                                <img src="../../../image/profile/profile.jpeg" class="img-responsive" style="width:80px; border-radius:3px;">
                            </a>
                        </div>
                            <div class="text-small-3 text-center"><?php echo $boi;?></div>
                        </div>
                        <div class="card-body">
                        <form action="../../action/school/act_update.php" method="post">
                        <div class="mb-1">
                            <label for="inputUserID" class="text-medium">ID Admin : </label>
                            <input type="text" name="id_pegawai" class="form-control input" value="<?php echo $bio["id_pegawai"];?>" readonly>                        
                        </div>
                        <div class="mb-1">
                            <label for="inputUserEmail" class="text-medium">UserEmail : </label>
                            <label class="text-small-3 mb-0"><input type="checkbox" onclick="myFunctEmail()"></label>
                            <input type="email" name="userEmail" id="inputEmail" class="form-control input" value="<?php echo $b;?>" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="inputPassword" class="text-medium">Password : </label>
                            <label class="text-small-3 mb-0"><input type="checkbox" onclick="myFunctPassword()"></label>
                            <input type="password" name="password" id="inputPass" class="form-control input" value="<?php echo $bi;?>" readonly>
                        </div>
                        <div class="mb-1">
                            <label for="inputNama" class="text-medium">Nama Lengkap : </label>
                            <label class="text-small-3 mb-0"><input type="checkbox" onclick="myFunctNama()"></label>
                            <input type="text" name="nama" id="inputnama" class="form-control input" value="<?php echo $boi;?>" readonly>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" name="data" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span></button>
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
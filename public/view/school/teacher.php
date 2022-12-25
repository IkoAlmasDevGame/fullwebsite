<?php 
include "./header.php";
include "../../../database/Migrations/koneksi.php";
?>

<style>
    #guru {
        color: rgba(254, 254, 255, 0.75);
        transition: 4s all, 4s color, 4s text-shadow, 4s text-decoration, 4s animation-fill-mode, 4s animation-direction, 4s animation-play-state;
    }
    #guru:hover{
        animation-fill-mode: both;
        animation-direction: normal;
        animation-play-state: running;
        text-decoration: none;
        color: inherit;
        text-shadow: 0.2px 1px 0.2px rgba(125, 100, 98, 0.11);
    }
</style>

<h5 class="text-center text-large"><a href="./teacher.php" id="guru">Daftar Guru SD</a></h5>
<br>

<form action="./teacher.php" method="get" class="mb-2">
    <div class="input-group col-md-4 col-md-offset-0 mt-1">
        <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
        <select name="cari" type="submit" class="form-control select">
            <option>Pilih Nama Guru</option>
            <?php 
                $result = "SELECT * FROM guru";
                $resguru = $kon->query($result);
                while($rg = mysqli_fetch_assoc($resguru)){
                    $_SESSION["nama_guru"] = $rg["nama_guru"];
                    ?>
                    <option><?php echo $_SESSION["nama_guru"];?></option>
                    <?php
                }
            ?>
        </select>
    </div>
    <button class="mt-2 btn btn-info" type="submit" onchange="this.form.submit()">Tampilkan</button>
    <button type='button' data-bs-toggle='modal' data-bs-target='#kepalasekolah' class='btn btn-info mt-2'>Information</button>
</form>

<table class="table table-bordered text-small-3">
    <tr>
        <th>No Urut</th>
        <th>Nama Guru</th>
        <th>Mata Pelajaran</th>
    </tr>
<?php 
if(isset($_GET["cari"])){
    $cariguru = mysqli_real_escape_string($kon, $_GET["cari"]);
    $guru = $kon->query("SELECT * FROM guru WHERE nama_guru='$cariguru'");
}else{
    $guru = $kon->query("SELECT * FROM guru");
}    
    $no = 1;
    while($gr = mysqli_fetch_array($guru)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $gr["nama_guru"]; ?></td>
            <td><?php echo $gr["mapel_guru"]; ?></td>
        </tr>
        <?php
}
?>
</table>

<div class="modal" id="kepalasekolah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Struktur Sekolah Dasar</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-small-3">
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Jabatan Pegawai</th>
                    </tr>
                    <?php 
                        $strukSD = $kon->query("SELECT * FROM struktursd");
                        $no=1;
                        while($rsd = $strukSD->fetch_array()){
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $rsd["nama"]; ?></td>
                            <td><?php echo $rsd["jabatan"]; ?></td>
                        </tr>
                    </table>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php 
include "footer.php";
?>
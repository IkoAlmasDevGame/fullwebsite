<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";

$per_hal=10;
$jumlah_record=mysqli_query($kon,"SELECT * from daftarmurid");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

<style>
    .bar-center {
        color: inherit; 
        text-decoration:none;

        transition: 3s all color;
    }
    .bar-center:hover{
        color: blue;
        text-decoration:none;
    }
    #wrap {
        display: flex;
        flex-wrap: wrap;
        flex-flow: row;
        position: relative;
        justify-content: space-around;
    }
    #icon {
        color : white;
        transition: 3s all, 3s background-color, 3s text-shadow, 3s color, 3s text-decoration;
    }
    #icon:hover {
        color: rgb(125, 88, 110);
        background-color: transparent;
        text-shadow: 0px 1px 0px rgba(250, 100, 100, 0.12);
        text-decoration: none;
    }
</style>


<a href="./register.php" class="bar-center"><h5 class="d-flex justify-content-center align-items-center"> 
    <span class="fas fa-user"> Register Murid Baru <span class="fa fa-registered"></span></span></h5></a>
<button type='button' data-bs-toggle='modal' data-bs-target='#MyModal' class='btn btn-info col-md-offset-4 mb-2'><span class="fa fa-plus"></span> Daftar Murid Baru</button>
<button type='button' data-bs-toggle='modal' data-bs-target='#info' class='btn btn-info col-md-offset-1'><span class="fa fa-info"></span> Info Murid Baru</button>

<div class="modal" id="info">
	<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pemasukan Data Murid Baru</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
            <span id="wrap">
		        <span>Jumlah Record :</span>		
		        <span><?php echo $jum; ?></span>
		        <span>Jumlah Halaman :</span>	
		        <span><?php echo $halaman; ?></span>
            </span>
            </div>
        </div>
    </div>
</div>

<form method="GET">
    <div class="input-group col-md-4 col-md-offset-0 mt-1">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari nama murid baru ..." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>

<form method="GET">
    <div class="input-group col-md-4 col-md-offset-0 mt-1">
        <span class="input-group-addon" id="basic-addon1"><span class="fa fa-list"></span></span>
        <select type="submit" name="cari" class="form-control select" onchange="this.form.submit()">
            <option>Pilih Jenis kelamin [Daftar Murid]</option>
            <?php 
                $query = "SELECT * FROM jeniskelamin";
                $result = $kon->query($query);
                while($searching = $result->fetch_assoc()){
                    $_SESSION["jeniskelamin"] = $searching["jeniskelamin"];
                    ?>
                    <option><?php echo $_SESSION["jeniskelamin"] ?></option>
                    <?php
                }
            ?>
        </select>
    </div>
</form>

<ul class="pagination mt-1 mb-1">			
	<?php 
	    for($x=1;$x<=$halaman;$x++){
	?>
	<li><a href="?page=<?php echo $x ?>" style="margin-right: 2px;"><?php echo $x ?></a></li>
	<?php
		}
	?>						
</ul>

<table class="table table-bordered text-small-3">
    <tr>
        <th class="text-start">No</th>
        <th class="text-center">Nama Lengkap</th>
        <th class="text-center">Nama Panggilan</th>
        <th class="text-center">Tanggal Lahir</th>
        <th class="text-center">Tempat Lahir</th>
        <th class="text-center">Jenis Kelamin</th>
        <th class="text-center">Umur</th>
        <th class="text-center">Agama</th>
        <th class="text-center">No Telephone</th>
        <th class="text-center">Opsional</th>
    </tr>
    <?php
    if(isset($_GET['cari'])){
        $cari = $kon->real_escape_string($_GET['cari']);
        $sNama = mysqli_query($kon, "SELECT * FROM daftarmurid WHERE namalengkap like '$cari' or jeniskelamin like '$cari'");
    }else{
        $sNama = mysqli_query($kon, "SELECT * FROM daftarmurid limit $start, $per_hal");
    }
    $no = 1;
    while($s = mysqli_fetch_array($sNama)){
        ?>
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $s['namalengkap'];?></td>
            <td><?php echo $s['namapanggilan'];?></td>
            <td><?php echo $s['tanggal_lahir'];?></td>
            <td><?php echo $s['tempat_lahir'];?></td>
            <td><?php echo $s['jeniskelamin'];?></td>
            <td><?php echo $s['umur'];?> tahun</td>
            <td><?php echo $s['agama'];?></td>
            <td><?php echo $s['telephone'];?></td>
            <td id="wrap">
                <a onclick="if(confirm('')){location.href='./data_pelajar.php?kd_murid=<?php echo $s['kd_murid']?>'}" class="glyphicon glyphicon-folder-open" id="icon"></a>
                <a onclick="if(confirm('')){location.href='./edit_pelajar.php?kd_murid=<?php echo $s['kd_murid']?>'}" class="glyphicon glyphicon-edit" id="icon"></a>
                <a onclick="if(confirm('')){location.href='../../action/school/act_hapus_pelajar.php?kd_murid=<?php echo $s['kd_murid']?>'}" class="glyphicon glyphicon-trash" id="icon"></a>
                <a onclick="if(confirm('Apakah murid ini mau di seleksi ?')){location.href='./seleksimurid.php?kd_murid=<?php echo $s['kd_murid']?>'}" class="glyphicon glyphicon-check" id="icon"></a>
                <a onclick="if(confirm('')){location.href='./pelajar.php?kd_murid=<?php echo $s['kd_murid']?>'}" class="glyphicon glyphicon-user" id="icon"></a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<div class="modal" id="MyModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Daftar Murid Baru</h3>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="../../action/school/act_daftar.php">
                    <div class="form-group col-md-offset-1">
                        <div class="input-group mb-1 col-md-9">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="namalengkap" class="form-control input" aria-describedby="basic-addon1" placeholder="ketik nama lengkap anda">
                        </div>
                        <div class="input-group mb-1 col-md-9">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="namapanggilan" class="form-control input" aria-describedby="basic-addon1" placeholder="ketik nama panggilan anda">
                        </div>
                        <div class="input-group mb-1 col-md-9">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            <input type="date" name="tanggal_lahir" class="form-control input" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-1 col-md-9">
                            <span class="input-group-addon"><span class="fa fa-venus-double"></span></span>
                            <select name="jeniskelamin" class="form-control input select">
                                <?php
                                $jkelamin = mysqli_query($kon, "SELECT * FROM jeniskelamin");
                                while($jk = mysqli_fetch_array($jkelamin)){
                                    ?>
                                    <option value="<?php echo $jk['jeniskelamin'];?>"><?php echo $jk['jeniskelamin'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group mb-1 col-md-9">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                            <select name="tempat_lahir" class="form-control select input">
                                <?php
                                $provinsi = mysqli_query($kon, "SELECT * FROM tempat_lahir_db");
                                while($prov = mysqli_fetch_array($provinsi)){
                                    ?>
                                    <option value="<?php echo $prov['provinsi'];?>"><?php echo $prov['provinsi'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group mb-1 col-md-9">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="umur" class="form-control input" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-1 col-md-9">
                            <span class="input-group-addon"><span class="fa fa-home"></span></span>
                            <select name="agama" class="form-control select input">
                                <?php
                                    $agama_me = mysqli_query($kon, "SELECT * FROM agama_db");
                                    while($agama = mysqli_fetch_array($agama_me)){
                                        ?>
                                        <option value="<?php echo $agama['agama']?>"><?php echo $agama['agama']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="input-group mb-1 col-md-9">
                            <span class="input-group-addon"><span class="fas fa-phone"></span></span>
                            <input type="tel" name="telephone" class="form-control input" aria-describedby="basic-addon1" placeholder="masukkan number telephon">
                        </div>
                        <div class="modal-footer">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary" name="simpan">Simpan Data</button>
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-hidden="true">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
include "footer.php";
?>
<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";

$per_hal=6;
$jumlah_record=mysqli_query($kon,"SELECT * from databarang");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>

<style type="text/css">
    #databarang {
        color : black;
        transition: 4s all, 4s color, 4s text-decoration, 4s text-shadow, 4s font-size;
    }
    #databarang:hover {
        font-size: 17px;
        color : #ffebfc;
        text-decoration: none;
        text-shadow: 0px 1px 1px rgb(125, 58, 101);
    }
    #wrap{
        display: flex;
        justify-content: space-around;
        align-items: center;
        text-decoration: none;
    }
    .btn-active{
        color: #fff;
        background-color: #428bca;
        border-color: #357ebd;
    }
    #wrapping{
        position:static;
        display: block;
        transition: 5s all, 3s color, 5s display, 5s justify-content, 5s align-items, 5s position;
    }
    #wrapping:hover {
        color: white;
        display: flex;
        justify-content: space-around;
        align-items: center;
        position: sticky;
    }
</style>

<h5 class="text-center"><a href="./barang.php" id="databarang">  Data Barang</a></h5>
<button type='button' data-bs-toggle='modal' data-bs-target='#tambahbarang' class='col-md-offset-4 btn btn-info'><span class="fa fa-plus"></span> Tambah Barang</button>
<button type='button' data-bs-toggle='modal' data-bs-target='#infobarang' class='col-md-offset-1 btn btn-info'><span class="fa fa-info"></span> Informasi Barang</button>
<div class="mb-1"></div>

<div class="modal" id="infobarang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informasi Barang</h5>
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

<div class="modal" id="tambahbarang">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Barang Product</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form action="../../action/koperasi/act_barang.php" method="post" class="form-group">
                    <div class="mb-2">
                        <div class="input-group col-md-offset-2 col-md-8">
                            <span class="input-group-addon"><span class="fa fa-briefcase"></span></span>
                            <input type="text" name="namabarang" class="form-control input" placeholder="masukkan nama barang ...">
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="input-group col-md-offset-2 col-md-8">
                            <span class="input-group-addon"><span class="fa fa-list"></span></span>
                            <select name="jenisbarang" class="form-control select">
                                <option>Pilih Jenis Barang</option>
                                <?php 
                                    $result = $kon->query("SELECT * FROM datajenis");
                                    while($x = $result->fetch_assoc()){
                                    ?>
                                        <option type="submit" onchange="this.form.submit()"><?php echo $x["jenis"]; ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="input-group col-md-offset-2 col-md-8">
                            <span class="input-group-addon"><span class="fa fa-cash-register"></span></span>
                            <input type="text" name="hargabarang" class="form-control input" placeholder="masukkan harga barang ...">
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="input-group col-md-offset-2 col-md-8">
                            <span class="input-group-addon"><span class="fa fa-briefcase"></span></span>
                            <input type="text" name="jumlahbarang" id="jumlah" class="form-control input" placeholder="masukkan jumlah barang ...">
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan Data</button>
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-hidden="true">Close</button>
                    </div>
                </form>
                <div class="card-footer text-center">
                    <button id="plus" onclick="plus()" class="btn btn-primary">+</button>
                    <button id="minus" onclick="minus()" class="btn btn-primary">-</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../script/src/jumbel.js"></script>
</div>


<ul class="pagination mb-0">			
	<?php 
	    for($x=1;$x<=$halaman;$x++){
	?>
	<li><a href="?page=<?php echo $x ?>" style="margin-right: 2px;"><?php echo $x ?></a></li>
	<?php
		}
	?>						
</ul>
 
<form action="./barang.php" method="get">
    <div class="input-group col-md-4 col-md-offset-0 mb-1">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang ..." aria-describedby="basic-addon1" name="cari">
        <select type="submit" name="cari" class="form-control" onchange="this.form.submit()">
            <option>Pilih Jenis Barang</option>
            <?php 
                $queryPs = $kon->query("SELECT * FROM datajenis");
                while($ps = $queryPs->fetch_assoc()){
                    ?>
                        <option><?php echo $ps["jenis"];?></option>
                    <?php
                }
            ?>
        </select>	
	</div>
</form>

<table class="table table-bordered text-small-3">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama Barang</th>
        <th class="text-center">Jenis Barang</th>
        <th class="text-center">Harga Barang</th>
        <th class="text-center">Jumlah Barang</th>
        <th class="text-center">Optional</th>
    </tr>
    <?php 
        if(isset($_GET["cari"])){
            $caribarang = mysqli_real_escape_string($kon, $_GET["cari"]);
            $scaribarang = mysqli_query($kon, "SELECT * FROM databarang WHERE namabarang like '$caribarang' or jenisbarang like '$caribarang'");
        }else{
            $scaribarang = mysqli_query($kon, "SELECT * FROM databarang limit $start, $per_hal"); 
        }
        $no=1;
        while($sx = $scaribarang->fetch_array()){
            ?>
            <tr>
                <td class="text-center"><?php echo $no++; ?></td>
                <td class="text-center"><?php echo $sx["namabarang"]; ?></td>
                <td class="text-center"><?php echo $sx["jenisbarang"]; ?></td>
                <td class="text-center"><?php echo "Rp. ".number_format($sx["hargabarang"]); ?></td>
                <td class="text-center"><?php echo $sx["jumlahbarang"]; ?></td>
                <td id="wrapping">
                    <a onclick="location.href='lihatbarang.php?id_barang=<?php echo $sx['id_barang']?>'" class="btn text-small-3"><span class="fa fa-folder-open"></span></a>
                    <a onclick="location.href='act_hapus.php?id_barang=<?php echo $sx['id_barang']?>'" class="btn text-small-3"><span class="fa fa-trash"></span></a>
                    <a onclick="location.href='edit_barang.php?id_barang=<?php echo $sx['id_barang']?>>'" class="btn text-small-3"><span class="fa fa-edit"></span></a>
                    <a onclick="location.href='buy_barang.php?id_barang=<?php echo $sx['id_barang']?>'" class="btn text-small-3"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                </td>
            </tr>
            <?php
        }
    ?>
</table>

<?php 
include "footer.php";
?>
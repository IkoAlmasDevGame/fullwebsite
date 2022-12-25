<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
?>

<a href="barang_beli.php"><h3 class="text-medium text-center"><span class="glyphicon glyphicon-book">  Data Pembelian Product</span></h3></a>

<style type="text/css">
#wrap {
    position: relative;
    flex-flow: nowrap ;
    flex-direction: row;
    justify-content: space-around;
    display: flex;
    right: 2.5%;
}

.btn {
    color: inherit;
    text-decoration: none;
}

.btn::before .btn::after {
    color: inherit;    
    text-decoration: none;
}
</style>

<?php 
$per_hal=4;
$jumlah_record=mysqli_query($kon, "SELECT * from barang_laku");
$jum=mysqli_num_rows($jumlah_record);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>


<form method="GET">
    <div class="input-group col-md-4 col-md-offset-0">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang yang sudah dibeli di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<div class="mb-3"></div>

<a href="rekap_buku.php" class="btn btn-default"><span class="glyphicon glyphicon-book"></span>  Rekapitulasi Buku Online</a>
<div class="mb-1"></div>

<ul class="pagination">			
	<?php 
	    for($x=1;$x<=$halaman;$x++){
	?>
	<li><a href="?page=<?php echo $x ?>" style="margin-right: 2px;"><?php echo $x ?></a></li>
	<?php
		}
	?>						
</ul>
<div class="mb-2"></div>

<?php
if(isset($_GET['cari'])){
    $carinamabarang = mysqli_real_escape_string($kon, $_GET["cari"]);
    $periksa = mysqli_query($kon, "SELECT * FROM barang_laku where namabarang like '$carinamabarang'");
}else{
    $periksa = mysqli_query($kon, "SELECT * FROM barang_laku limit $start, $per_hal");
}
while($p = mysqli_fetch_array($periksa)){
?>
<div class="col-md-3" id="wrap">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-4 text-medium text-center">Product Pembelian</h3>
            <p class="card-text">Tanggal Pembelian : <?php echo $p['tanggal']?></p>
        </div>
            <div class="card-body">
                <p class="card-text">Nama Barang : <?php echo $p['namabarang'];?></p>
                <p class="card-text">Harga Barang : <?php echo "Rp. ".number_format($p['harga']);?></p>
                <p class="card-text">Total Harga : <?php echo "Rp. ".number_format($p['total_harga']);?></p>
            </div>
        <div class="card-footer">
            <a href="detail_barang_laku.php?id_laku=<?php echo $p["id_laku"];?>" class="btn glyphicon glyphicon-info-sign"> Detail</a>
            <a href="../../action/koperasi/act_hapus_laku.php?id_buy=<?php echo $p["id_laku"];?>" class="btn glyphicon glyphicon-trash"> Hapus</a>
        </div>
    </div>
</div>
<?php
}
?>
<div class="mb-2"></div>

<?php 
include "footer.php";
?>
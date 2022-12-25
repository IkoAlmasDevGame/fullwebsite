<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
?>

<?php 
$id_barang = mysqli_real_escape_string($kon, $_GET["id_barang"]);
$sql = mysqli_query($kon, "SELECT * FROM databarang WHERE id_barang='$id_barang'");
while($sq = mysqli_fetch_array($sql)){
?>
<div class="col-md-4 col-md-offset-3 mt-5 pt-5">
    <div class="card mt-2">
            <div class="card-header">
                <h5 class="mb-4 text-medium text-center">Lihat Barang Koperasi</h5>
            </div>
                <div class="card-body">
                    <p class="card-text">Nama Barang : <?php echo $sq['namabarang'];?></p>
                    <p class="card-text">Jenis Kaset : <?php echo $sq["jenisbarang"]; ?></p>
                    <p class="card-text">Harga Barang : <?php echo "Rp. ".number_format($sq['hargabarang']);?></p>
                    <p class="card-text">Jumlah Barang : <?php echo $sq["jumlahbarang"]; ?></p>
                </div>
            <div class="card-footer text-center">
                <a href="barang.php" class="glyphicon glyphicon-folder-close" style="color:inherit; text-decoration:none;"> Kembali</a>
         </div>
    </div>
</div>
<?php
}
?>


<?php 
include "footer.php";
?>
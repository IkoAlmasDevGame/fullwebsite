<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
?>

<h3><span class="fas fa-book"></span>  Rekapitulasi Buku Online</h3>
<a href="barang_beli.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<div class="mb-4"></div>

<form method="get">
	<div class="input-group col-md-5 col-md-offset-0">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
		<select type="submit" name="tanggal" class="form-control" onchange="this.form.submit()">
			<option>Pilih tanggal ..</option>
			<?php
			$pil=mysqli_query($kon,"SELECT * FROM barang_laku");
			if($p=mysqli_fetch_array($pil)){
					$date = $p['tanggal'];
				?>
				<option><?=$date;?></option>
				<?php
			}
			?>			
		</select>
	</div>
</form>
<div class="mb-2"></div>

<?php
if(isset($_GET['tanggal'])){
    $date = $_GET['tanggal'];
    $tg="lap_barang_laku.php?tanggal='$date'";
?>
    <a style="margin-bottom:10px" href="<?php echo $tg ?>" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a><?php
}else{
    $tg="lap_barang_laku.php";
}
?>

<?php 
if(isset($_GET['tanggal'])){
	echo "<h4> Data Penjualan Tanggal  <a style='color:blue'> ". $_GET['tanggal']."</a></h4>";
}
?>

<table class="table table-bordered">
    <tr>
        <th class="text-1 text-center">No</th>
        <th class="text-1 text-center">Tanggal</th>
        <th class="text-1 text-center">Nama Product</th>
        <th class="text-1 text-center">Harga Product</th>
        <th class="text-1 text-center">Jumlah Beli</th>
        <th class="text-1 text-center">Laba</th>
        <th class="text-1 text-center">Total Harga</th>
    </tr>
    <?php 
    if(isset($_GET['tanggal'])){
        $tanggal = $_GET['tanggal'];
        $bsale = mysqli_query($kon, "SELECT * FROM barang_laku where tanggal like '$tanggal' order by tanggal desc");
    }else{
        $bsale = mysqli_query($kon, "select * from barang_laku order by tanggal desc");
    }
    $no = 1;
    while($s = mysqli_fetch_array($bsale)){
        ?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $s['tanggal'];?></td>
            <td><?php echo $s['namabarang'];?></td>
            <td><?php echo "Rp.".number_format($s['harga']);?></td>
            <td><?php echo $s['jumlahbeli'];?></td>
            <td><?php echo "Rp. ".number_format($s['laba']);?></td>
            <td><?php echo "Rp. ".number_format($s['total_harga']);?></td>
        </tr>
        <?php
        }
    ?>
    <tr>
		<td colspan="6">Total Pemasukan</td>
		<?php 
		if(isset($_GET['tanggal'])){
			$tanggal = $_GET['tanggal'];
			$x=mysqli_query($kon,"SELECT sum(total_harga) as total from barang_laku where tanggal='$tanggal'");				
			if($xx=mysqli_fetch_array($x)){
				echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
			}
		}else{}
		?>
	</tr>
	<tr>
		<td colspan="6">Total Laba</td>
		<?php 
		if(isset($_GET['tanggal'])){
			$tanggal = $_GET['tanggal'];
			$x=mysqli_query($kon,"SELECT sum(laba) as total from barang_laku where tanggal='$tanggal'");			
			if($xx=mysqli_fetch_array($x)){
				echo "<td><b> Rp.". number_format($xx['total']).",-</b></td>";
			}else{}
		}
		?>
	</tr>
</table>

<?php 
include "footer.php";
?>
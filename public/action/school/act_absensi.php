<?php 
$kd_kelas=$_POST['kd_kelas'];
$tanggal=$_POST['tanggal'];
include "../../../database/Migrations/koneksi.php";

if(isset($_POST['selesai'])){
	if(!empty($_POST['hadir'])){
		//parameter
		$kd_murid=$_POST['hadir'];
		$jumlah = $kd_kelas;

		for($i=0;$i<$jumlah[$i];$i++){
			mysqli_query($kon,"insert into absensi (kd_murid,kd_kelas,keterangan,tanggal,selesai) values('$kd_murid[$i]','$kd_kelas','h','$tanggal','yes')");
		}
		
		?>
        <script type="text/javascript">
            document.location.href="../../view/school/absensi.php?kd_kelas=<?php echo $kd_kelas;?>?tanggal=<?php echo $tanggal;?>";
        </script>
		<?php 
	}
	
	if(!empty($_POST['sakit'])){
		//parameter
		$kd_murid=$_POST['sakit'];
		$jumlah = $kd_kelas;

		for($i=0;$i<$jumlah[$i];$i++){
			mysqli_query($kon,"insert into absensi (kd_murid,kd_kelas,keterangan,tanggal,selesai) values('$kd_murid[$i]','$kd_kelas','s','$tanggal','yes')");
		}
		
		?>
        <script type="text/javascript">
            document.location.href="../../view/school/absensi.php?kd_kelas=<?php echo $kd_kelas;?>?tanggal=<?php echo $tanggal;?>";
       </script>
		<?php 
	}
	
	if(!empty($_POST['ijin'])){
		//parameter
		$kd_murid=$_POST['ijin'];
		$jumlah = $kd_kelas;

		for($i=0;$i<$jumlah[$i];$i++){
			mysqli_query($kon,"insert into absensi (kd_murid,kd_kelas,keterangan,tanggal,selesai) values('$kd_murid[$i]','$kd_kelas','i','$tanggal','yes')");
		}
		
		?>
        <script type="text/javascript">
            document.location.href="../../view/school/absensi.php?kd_kelas=<?php echo $kd_kelas;?>?tanggal=<?php echo $tanggal;?>";
        </script>
		<?php 
	}
	
	if(!empty($_POST['alfa'])){
		//parameter
		$kd_murid=$_POST['alfa'];
		$jumlah = $kd_kelas;

		for($i=0;$i<$jumlah[$i];$i++){
			mysqli_query($kon,"insert into absensi (kd_murid,kd_kelas,keterangan,tanggal,selesai) values('$kd_murid[$i]','$kd_kelas','a','$tanggal','yes')");
		}
		
		?>
        <script type="text/javascript">
            document.location.href="../../view/school/absensi.php?kd_kelas=<?php echo $kd_kelas;?>?tanggal=<?php echo $tanggal;?>";
        </script>
		<?php 
	}
}else{
	unset($_POST['selesai']);
	?>
    <script type="text/javascript">
        document.location.href="../../view/school/absensi.php?kd_kelas=<?php echo $kd_kelas;?>?tanggal=<?php echo $tanggal;?>";
    </script>
    <?php
}
?>
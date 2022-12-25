<?php
include "header.php";
include "../../../database/Migrations/koneksi.php";

$kd_kelas=$_GET['kd_kelas'];
$query=mysqli_fetch_array(mysqli_query($kon,"select * from kelas where kd_kelas='$kd_kelas'"));
?>

<script type="text/javascript">
	$(function(){
        $("#datepicker").datepicker();
	});
</script>

<form action="../../action/school/act_absensi.php" method="post" name="postform">
	<h2 class="modal-title"><a class="d-flex justify-content-center">ABSENSI KELAS <?php echo $query['nama_kelas'];?></a></h2>
	<div class="form-group">
		<input type="hidden" value="<?php echo $query['kd_kelas'];?>" name="kd_kelas"/>
		<table class="table table-bordered">
			<tr>
				<td colspan="6">
					Tanggal :<input type="text" name="tanggal" class="form-control" id="datepicker" autocomplete="off">
				</td>
			</tr>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Hadir (H)</th>
				<th>Sakit (S)</th>
				<th>Ijin (I)</th>
				<th>Alfa (A)</th>
			</tr>
			<?php
			$no = 0;
            $c=1;
			$query = mysqli_query($kon, "select * from siswa where kd_kelas='$kd_kelas'");
			while($row = mysqli_fetch_array($query)){
				?>
				<tr>
                <td><?php echo $c++;?></td><td><?php echo $row['nama'];?></td>
                <td align="center">
				<?php
				echo "<input type=checkbox name=hadir value=$row[kd_murid] id='$no'>";
				$no++;
				?>
			</td>
			<td align="center">
				<?php
				echo "<input type=checkbox name=sakit value=$row[kd_murid] id=$no>";
				$no++;
				?>
			</td>
			<td align="center">
				<?php
				echo "<input type=checkbox name=ijin value=$row[kd_murid] id=$no>";
				$no++;
				?>
			</td>
			<td align="center">
				<?php
				echo "<input type=checkbox name=alfa value=$row[kd_murid] id=$no>";
				$no++;
				?>
			</td>
            </tr>
			<?php	
			}
			?>
		</table>
	</div>
	<br />
	<input type="checkbox" name="selesai" value="yes" />Tandai Kelas Selesai
	<br /><br />
	<input type="submit" value="Submit" />
</form>

<?php
include "footer.php";
?>
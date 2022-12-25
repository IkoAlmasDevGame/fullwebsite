<?php
include "header.php";
include "../../../database/Migrations/koneksi.php";

function namakelas($kd_kelas){
    if($kd_kelas == "12"){
        echo "Kelas 1";
    }else if($kd_kelas == "13"){
        echo "Kelas 2";
    }else if($kd_kelas == "14"){
        echo "Kelas 3";
    }else if($kd_kelas == "15"){
        echo "Kelas 4";
    }else if($kd_kelas == "16"){
        echo "Kelas 5";
    }else if($kd_kelas == "17"){
        echo "Kelas 6";
    }
}
?>

<h2 class="text-medium text-center"><a onclick="location.href='./rekap_buku.php'">REKAP ABSENSI KELAS <?php mysqli_query($kon, "SELECT nama_kelas FROM kelas");?></a></h2>
<a class="btn" href="absensi.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<form action="rekap_buku.php" method="GET">	
<table class="table table-bordered" width="99%">
<tr>
    <td width="6%" align="left"> <div align="left">Tanggal</div></td>
    <td>
        <select name="tgl" class="form-control select">
            <option type="submit" selected="selected" onchange="this.form.submit()">Pilih tanggal murid masuk atau tidak</option>
            <?php 
			
		    $query=mysqli_query($kon,"select * from absensi order by tanggal asc");
		    if($row=mysqli_fetch_array($query))
			{
				?><option><?php  echo $row['tanggal']; ?></option><?php 
			}
			?>
        </select>
    </td>
</tr>
    <tr>
        <td><select name="kelas">
		<option type="submit" selected="selected" onchange="this.form.submit()">Pilih Kelas</option>
		<?php 
			
		$query=mysqli_query($kon,"select * from kelas order by nama_kelas asc");
		while($row=mysqli_fetch_array($query))
			{
				?><option value="<?php echo $row['kd_kelas'];?>"><?php echo namakelas($row['kd_kelas']);?></option><?php 
			}
			?>
		</select></td>
        <td colspan="5" align="left"><input type="submit" value="Tampilkan"></td>
    </tr>
</table>
</form>	

<br /><br />
<table class="table table-bordered">
    <tr>
	    <th>No</th>
	    <th>Nama</th>
	    <th>Hadir (H)</th>
	    <th>Sakit (S)</th>
	    <th>Ijin (I)</th>
	    <th>Alfa (A)</th>
    </tr>
    <?php
    if(isset($_GET['kelas'])){
        if(isset($_GET['tgl'])){
	
        $kelas=$_GET['kelas'];
        $tanggal=$_GET['tgl'];
    
    $query=mysqli_query($kon,"SELECT distinct kd_murid FROM absensi where kd_kelas='$kelas' and tanggal='$tanggal' order by tanggal desc");
    $c = 1;
    while($row=mysqli_fetch_array($query)){
        $siswa=mysqli_fetch_array(mysqli_query($kon,"select * from siswa where kd_murid='$row[kd_murid]'"));
        ?>
        <tr>
				<td><?php echo $c++;?></td>
				<td><?php echo $siswa['nama'];?></td>
				<td align="center">
				<?php
					$hadir=mysqli_query($kon,"select * from absensi where kd_murid='$row[kd_murid]' and keterangan='h' and tanggal='$tanggal' order by tanggal desc");
					
					$jumlah=mysqli_num_rows($hadir);
					echo $jumlah;
				?>
				</td>
				<td align="center">
				<?php
					$hadir=mysqli_query($kon,"select * from absensi where kd_murid='$row[kd_murid]' and keterangan='s' and tanggal='$tanggal' order by tanggal desc");
					
					$jumlah=mysqli_num_rows($hadir);
					echo $jumlah;
				?>
				</td>
				
				<td align="center">
				<?php
					$hadir=mysqli_query($kon,"select * from absensi where kd_murid='$row[kd_murid]' and keterangan='i' and tanggal='$tanggal' order by tanggal desc");
					
					$jumlah=mysqli_num_rows($hadir);
					echo $jumlah;
				?>
				</td>
				
				<td align="center">
				<?php
					$hadir=mysqli_query($kon,"select * from absensi where kd_murid='$row[kd_murid]' and keterangan='a' and tanggal='$tanggal' order by tanggal desc");
					
					$jumlah=mysqli_num_rows($hadir);
					echo $jumlah;
				?>
				</td>
				
				
			</tr>
			<?php
                }
            }
		}
		?>
</table>

<?php
include "footer.php";
?>
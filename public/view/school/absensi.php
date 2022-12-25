<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
?>

<h3 class="text-small-3"><span class="glyphicon glyphicon-user"></span>  Absensi Murid</h3>
<a href="rekap_buku.php" class="btn btn-info"><span class="glyphicon glyphicon-book"></span> Absensi Rekap</a>
<br>

<table class="table table-bordered">
    <tr>
		<th>No</th>
        <th>Nama Kelas</th>
        <th>Jumlah Siswa</th>
        <th>Aksi</th>
	</tr>
    <?php
    $kelas = mysqli_query($kon, "select * from kelas order by nama_kelas asc");
    echo "Jumlah Kelas : ".$jumlah_kelas=mysqli_num_rows($kelas);
    echo "<br>";
	echo "Jumlah Siswa : ".$jumlah_siswa=mysqli_num_rows(mysqli_query($kon,"select * from siswa"));
	echo "<br><br>";
    $no = 1;
    while($row = mysqli_fetch_array($kelas)){
        $siswa=mysqli_query($kon, "select * from siswa where kd_kelas='$row[kd_kelas]'");
        $jumlah=mysqli_num_rows($siswa);
        ?>
        <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $row['nama_kelas']; ?></td>
            <td><?php echo $jumlah;?> Orang</td>
            <td><a href="input_absensi.php?kd_kelas=<?php echo $row['kd_kelas'];?>">Absensi</a></td>
        </tr>
        <?php
    }
    ?>
</table>

<?php 
include "footer.php";
?>
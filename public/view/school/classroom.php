<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
?>

<style>
    .bar {
        color: inherit; 
        text-decoration:none;

        transition: 3s all color;
    }
    .bar:hover {
        color: blue;
        text-decoration:none;
    }
    #wrapicon {
        color: inherit; 
        text-decoration:none;

        transition: 3s all, 3s color, 3s text-shadow, 3s box-shadow, 3s text-decoration;
    }
    #wrapicon:hover {
        color: white;
        text-shadow: 0.1px 0px 0.1px rgb(125, 72, 99);
        box-shadow: 0.1px 0.1px 0px rgb(100, 100, 50);
        text-decoration: none;
    }
</style>

<a href="./classroom.php" class="bar"><h5 class="d-flex justify-content-center align-items-center">
    <span class="fa fa-school">  Ruang Kelas</span></h5></a>

<table class="table table-bordered text-small-3">
    <tr>
        <th>No</th>
        <th>Nama Kelas</th>
        <th>Jumlah Siswa Kelas</th>
    </tr>
    <?php 
        $kelas = mysqli_query($kon, "select * from kelas order by nama_kelas asc");
        $no = 1;
        while($row = mysqli_fetch_array($kelas)){
                $siswa=mysqli_query($kon, "select * from siswa where kd_kelas='$row[kd_kelas]'");
                $jumlah=mysqli_num_rows($siswa);
            ?>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $row['nama_kelas']; ?></td>
                <td><?php echo $jumlah;?> Orang</td>
            </tr>
            <?php
        }
    ?>
</table>

<?php 
include "footer.php";
?>
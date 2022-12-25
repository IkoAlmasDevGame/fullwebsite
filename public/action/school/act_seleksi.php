<?php 
include "../../../database/Migrations/koneksi.php";
session_start();
if(isset($_POST["data"])){
    $nama = htmlentities(trim($_POST["nama"]));
    $kd_kelas = htmlentities(trim($_POST["kd_kelas"]));
    $kd_seleksi = htmlentities(trim($_POST["kd_seleksi"]));

    $query = "INSERT INTO siswa VALUES ('', '$nama', '$kd_kelas', '$kd_seleksi')";
    $kon->query($query);
    header("location:../../view/school/register.php");
}
?>
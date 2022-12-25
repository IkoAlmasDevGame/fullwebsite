<?php 
include "../../../database/Migrations/koneksi.php";
if(isset($_POST["data"])){
    $namalengkap = trim($_POST["namalengkap"]);
    $namapanggilan = trim($_POST["namapanggilan"]);
    $date = trim($_POST["tanggal_lahir"]);
    $jk = trim($_POST["jeniskelamin"]);
    $provinsi = trim($_POST["tempat_lahir"]);
    $umur = trim($_POST["umur"]);
    $agama = trim($_POST["agama"]);
    $telephone = trim($_POST["telephone"]);
    $kd_murid = $_POST["kd_murid"];

    $queryResult = "UPDATE daftarmurid SET namalengkap='$namalengkap', namapanggilan='$namapanggilan', tempat_lahir='$date', jeniskelamin='$jk', 
    tempat_lahir='$provinsi', umur='$umur', agama='$agama', telephone='$telephone' WHERE kd_murid='$kd_murid'";
    mysqli_query($kon,$queryResult);

    header("location:../../view/school/register.php");
}
?>
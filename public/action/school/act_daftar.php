<?php 
include "../../../database/Migrations/koneksi.php";
if(isset($_POST["simpan"])){
    $namalengkap = trim($_POST["namalengkap"]);
    $namapanggilan = trim($_POST["namapanggilan"]);
    $date = trim($_POST["tanggal_lahir"]);
    $jk = trim($_POST["jeniskelamin"]);
    $provinsi = trim($_POST["tempat_lahir"]);
    $umur = trim($_POST["umur"]);
    $agama = trim($_POST["agama"]);
    $telephone = trim($_POST["telephone"]);

    $queryResult = "INSERT INTO daftarmurid VALUES ('', '$namalengkap', '$namapanggilan', '$date', '$jk', '$provinsi', '$umur', '$agama', '$telephone')";
    mysqli_query($kon,$queryResult);

    header("location:../../view/school/register.php");
}
?>
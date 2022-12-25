<?php 
include "../../../database/Migrations/koneksi.php";
if(isset($_POST["data"])){
    $id = $_POST["id_pegawai"];
    $email = $_POST["userEmail"];
    $pass = $_POST["password"];
    $nama = $_POST["nama"];

    $sql = "UPDATE pegawai SET userEmail='$email', password='$pass', nama='$nama' where id_pegawai=".$id;
    mysqli_query($kon, $sql);
    header("location:../../view/school/index.php");
}
?>
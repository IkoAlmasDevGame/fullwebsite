<?php 
include "../../../database/Migrations/koneksi.php";
$idbrg = $_POST["id_laku"];
$kon->query("DELETE FROM barang_laku where id_barang='$idbrg'");
header("../../view/koperasi/barang_beli.php");
?>
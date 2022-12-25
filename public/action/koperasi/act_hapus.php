<?php 
include "../../../database/Migrations/koneksi.php";
$idbrg = $_POST["id_barang"];
$kon->query("DELETE FROM databarang where id_barang='$idbrg'");
header("../../view/koperasi/barang.php?pesan=penghapus");
?>
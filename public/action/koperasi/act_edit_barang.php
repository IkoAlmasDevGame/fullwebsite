<?php 
include "../../../database/Migrations/koneksi.php";
if(isset($_POST["edit"])){
    $id = trim($_POST["id_barang"]);
    $nmbrg = trim($_POST["namabarang"]);
    $jenis = trim($_POST["jenisbarang"]);
    $harga = trim($_POST["hargabarang"]); // harga barang yang ingin di masukkan
    $jumlah = trim($_POST["jumlahbarang"]); // data barang yang ingin di masukkan

    $result = "UPDATE databarang SET namabarang='$nmbrg', jenisbarang='$jenis', hargabarang'$harga', jumlahbarang'$jumlah' where id_barang='$id'";
    $kon->query($result);
    header("location:../../view/koperasi/barang.php");

}
?>
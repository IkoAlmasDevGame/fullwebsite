<?php 
include "../../../database/Migrations/koneksi.php";
if(isset($_POST["simpan"])){
    $nmbrg = trim($_POST["namabarang"]);
    $jenis = trim($_POST["jenisbarang"]);
    $harga = trim($_POST["hargabarang"]); // harga barang yang ingin di masukkan
    $jumlah = trim($_POST["jumlahbarang"]); // data barang yang ingin di masukkan

    $result = "INSERT INTO databarang VALUES ('', '$nmbrg', '$jenis', '$harga', '$jumlah')";
    $kon->query($result);
    header("location:../../view/koperasi/barang.php?pesan=penambahan");

}
?>
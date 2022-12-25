<?php 
include "../../../database/Migrations/koneksi.php";
if(isset($_POST["buy"])){
    $tgl=$_POST['tanggal'];
    $nama=$_POST['namabarang'];
    $harga=$_POST['harga'];
    $jumbel=$_POST['jumlahbeli'];
                            
    $dt=mysqli_query($kon,"select * from databarang where namabarang='$nama'");
    $data=mysqli_fetch_array($dt);
    $sisaa=$data['jumlahbarang']-$jumbel;
    mysqli_query($kon, "UPDATE databarang SET jumlahbarang='$sisaa' WHERE namabarang='$nama'");
                            
    $laba=$harga;
    $labaa=$laba*$jumbel;
    $total_harga=$harga*$jumbel;
    mysqli_query($kon,"insert into barang_laku values('','$tgl','$nama','$harga','$jumbel','$labaa','$total_harga')");
    header("location:../../view/koperasi/barang_beli.php");
}
?>
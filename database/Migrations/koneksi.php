<?php 
$serverName = "127.0.0.1";
$userName = "root";
$passName = "";
$dbName = "sekolah-sd";
$dbPort = "3306";

$kon = new mysqli($serverName, $userName, $passName, $dbName, $dbPort);

if($kon -> connect_errno){
    echo "<p hidden> Koneksi database berhasil </p>";
}else{
    echo "<p hidden> Koneksi database tidak berhasil </p>";
}
?>
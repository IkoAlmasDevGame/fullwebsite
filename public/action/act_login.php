<?php 
include "../../database/Migrations/koneksi.php";
session_start();
if(isset($_POST["log-in"])){
    $email = trim($_POST["userEmail"]);
    $pass = trim($_POST["password"]);
    md5($pass, true);

    if($email == "" || $pass == ""){
        header("location:../view/index.php?pesan=kosong");
        exit();
    }

    $query = "SELECT * FROM pegawai WHERE userEmail='$email' and password='$pass'";
    $squery = $kon->query($query);

    if(mysqli_num_rows($squery) > 0){
        session_start();
        $_SESSION["status"] = "login berhasil";
        if($row = $squery->fetch_assoc()){
            $_SESSION["id_pegawai"] = $row["id_pegawai"];
            $_SESSION["nama"] = $row["nama"];
        }
        header("location:../view/school/index.php");
        exit();
    }else{
        header("location:../view/index.php?pesan=gagal");
        exit();
    }
}
?>
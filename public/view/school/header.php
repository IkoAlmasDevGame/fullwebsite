<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolah Dasar</title>

    <link rel="icon" href="../../../image/logo/sd.jfif" type="jpeg">

    <link rel="stylesheet" href="../../../bootstraps/css/bootstrapv5221.css">
    <link rel="stylesheet" href="../../../bootstraps/css/card-bootstrap.css">
    <link rel="stylesheet" href="../../../bootstraps/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../bootstraps/css/glyphicon.css">
    <link rel="stylesheet" href="../../../bootstraps/css/text-bootstrap.css">
    <link rel="stylesheet" href="../../../bootstraps/css/all.min.css">
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <script src="../../../bootstraps/js/bootstrap.min.js"></script>
    <script src="../../../script/src/change.js"></script>

    <style type="text/css">
    body{
        background-color: rgba(125, 81, 105, 0.41);
    }
    #box {
        border: 1px solid black;
        border-radius: 3px;
        border-spacing: 1px;
    
        height: 100%;
        left: 1px;
    }

    #home, #registered, #classroom, #teacher, #absensi, #visi_misi, #change, #koperasi, #logout {
        color:white;
        background-color: #428bca;
        border-color: #357ebd;
        transition: 3s all, 3s box-shadow, 3s text-shadow, 3s background-color, 3s color;

        width: 85%;
        left: 15px;
    }

    #registered:hover, #home:hover, #classroom:hover, #teacher:hover, 
    #absensi:hover, #visi_misi:hover, #change:hover, #logout:hover, 
    #koperasi:hover{
        color: black;
        background-color: rgba(85, 120, 5, 0.3);
        box-shadow: 0px 1px 0px rgb(100, 105, 98);
        text-shadow: 0px 0px 1px rgb(100, 100, 100);
    }
    </style>
    <?php 
        session_start();
        include "../../../database/Migrations/koneksi.php";
        include "../../log/log.php";

        if(isset($_GET['aksi'])){
            $aksi = $_GET['aksi'];
            if($aksi == "logout"){
                if(isset($_SESSION['status'])){
                    unset($_SESSION['status']);
                    session_unset();
                    session_destroy();
                    $_SESSION = array();
                }
                header("location:../index.php?pesan=logout");
                exit;
            }
        }
    ?>
</head>
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                            <a href="index.php" class="navbar-brand">Sekolah Dasar</a>
                                <button type="button" class="navbar-toggle collapsed" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                    <span class="sr-only">Toggle Navigation</span>
                                    <span class="icon-bar"></span>
					                <span class="icon-bar"></span>
					                <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button">Hi, 
                                    <?php echo $_SESSION['nama']; ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" id="box">
                        <div class="row">
                            <div class="col-xs-8">
                                <a class="img-thumbnail">
                                    <img src="../../../image/profile/profile.jpeg" alt="<?php echo $_SESSION["nama"]?>" class="img-responsive">
                                </a>
                            </div>
                            <div class="row"></div>
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="index.php" class="text-small-3 text-start" id="home">
                                    <span class="fa fa-home"></span>  Dashboard Home</a></li>
                                <li class="active"><a href="../koperasi/index.php" class="text-start tex" id="koperasi">
                                    <span class="fa fa-shopping-bag"></span>  Kopersi sekolah</a></li>
                                <li class="active"><a href="register.php" class="text-start text-small-3" id="registered">
                                    <span class="fa fa-registered"></span>  Register Murid Baru</a></li>
                                <li class="active"><a href="classroom.php" class="text-start text-small-3" id="classroom">
                                    <span class="fas fa-school"></span>  Ruang Kelas</a></li>
                                <li class="active"><a href="teacher.php" class="text-start text-small-3" id="teacher">
                                    <span class="fas fa-user"></span>  Ruang Guru/ Wali Kelas</a></li>
                                <li class="active"><a href="absensi.php" class="text-start text-small-3" id="absensi">
                                    <span class="fas fa-user"></span>  Absensi Murid</a></li>
                                <li class="active"><a href="visimisi.php" class="text-start text-small-3" id="visi_misi">
                                    <span class="fas fa-file"></span>  File Visi / Misi</a></li>
                                <li class="active"><a href="changepass.php?id_pegawai=<?php echo $_SESSION["id_pegawai"]?>" class="text-start text-small-3" id="change">
                                    <span class="fas fa-lock"></span>  Change Password</a></li>
                                <li class="active"><a href="header.php?aksi=logout" class="text-start text-small-3" id="logout">
                                    <span class="glyphicon glyphicon-log-out"></span>  Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    <div class="col-md-10">
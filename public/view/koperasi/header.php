<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Sekolah Dasar</title>

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

    <style type="text/css">
    body{
        background-color: rgba(125, 122, 105, 0.77);
    }
    #kotak{
        border: solid;
        border-radius: 1px;
        border-spacing: 1px;
    
        height: 99%;
        left: 1px;
        transition: 3s all, 3s border-color;
    }
    #kotak:hover{
        border-color: rgb(100, 77, 100);
    }
    #home, #koperasi, #barang, #rekap {
        color:white;
        background-color: #428bca;
        border-color: #357ebd;
        transition: 3s all, 3s box-shadow, 3s text-shadow, 3s background-color, 3s color, 3s border-radius;

        width: 80%;
        left: 15px;
    }

    #home:hover, #koperasi:hover, #barang:hover, #rekap:hover{
        color: black;
        background-color: rgba(255, 250, 250, 0.31);
        box-shadow: 0px 0px 1px rgb(100, 105, 98);
        text-shadow: 0px 0px 1px rgb(100, 100, 100);
        border-radius: 5px;
    }
    </style>

    <?php 
    session_start();
    include "../../../database/Migrations/koneksi.php";
    include "../../log/koperasi_log.php";
    ?>
</head>
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                            <a href="./index.php" class="navbar-brand">Sekolah Dasar Koperasi</a>
                                <button type="button" class="navbar-toggle collapsed" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                                    <span class="sr-only">Toggle Navigation</span>
                                    <span class="icon-bar"></span>
					                <span class="icon-bar"></span>
					                <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                <li><a href="#" id="pesan_sedia" data-bs-toggle="modal" data-bs-target="#modalpesan">
                                        <span class='glyphicon glyphicon-comment'></span>  Pesan</a></li>
                                <li><a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button">Hi, 
                                    <?php echo $_SESSION['nama']; ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="modalpesan">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Pesan Notification</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    $periksa = mysqli_query($kon, "SELECT * FROM databarang WHERE jumlahbarang <= 0");
                                    if($x = mysqli_fetch_array($periksa)){
                                        if($x['jumlahbarang']<=0){
                                            echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  
                                            <a style='color:red'>". $x['namabarang']."</a> sudah habis. silahkan di isi kembali product !!</div>";	
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="modal-footer">
					                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Batal</button>						
				                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" id="kotak">
                        <div class="row">
                            <div class="col-xs-8">
                            <a class="img-thumbnail">
                                    <img src="../../../image/profile/profile.jpeg" class="img-responsive">
                                </a>
                            </div>
                            <div class="row"></div>
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="../school/index.php" class="text-start tex" id="home">
                                    <span class="fa fa-shopping-bag"></span>  Dashboard SD</a></li>
                                <li class="active"><a href="index.php" class="text-small-3 text-start" id="koperasi">
                                    <span class="fa fa-home"></span>  Dashboard Koperasi</a></li>
                                <li class="active"><a href="barang.php" class="text-small-3 text-start" id="barang">
                                    <span class="fa fa-briefcase"></span>  Data Barang</a></li>
                                <li class="active"><a href="barang_beli.php" class="text-small-3 text-start" id="rekap">
                                    <span class="fa fa-book"></span>  Rekapitulasi Penjualan</a></li>
                            </ul>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    <div class="col-md-10">
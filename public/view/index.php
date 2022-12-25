<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolah Dasar</title>
    <link rel="icon" href="../../image/logo/sd.jfif" type="jpeg">

    <link rel="stylesheet" href="../../bootstraps/css/bootstrapv5221.css">
    <link rel="stylesheet" href="../../bootstraps/css/font-awesome4.min.css">
    <link rel="stylesheet" href="../../bootstraps/css/glyphicon.css">
    <link rel="stylesheet" href="../../bootstraps/css/text-bootstrap.css">
    <link rel="stylesheet" href="../../bootstraps/css/all.css">

    <script src="../../bootstraps/js/bootstrap.min.js"></script>

    <style>
        body {
            background: linear-gradient(120deg, rgba(92, 80, 115, 0.8), rgba(121, 100, 144, 0.5));
        }
        .form-group{
            width: 100%;
        }
        .kotak {
            margin-top: 150px;
        }
        .kotak .input-group {
            margin-bottom: 20px;
        }

        .btn{
            transition: 3s background-color, 3s box-shadow, 3s text-shadow;
        }
        .btn:hover{
            background-color: rgba(50, 50, 50, 0.8);
            box-shadow: 0px 0px 1px rgb(100, 88, 89);
            text-shadow: 1px 0px 0px rgb(200, 200, 200);
        }

        .footer {
            width: 100%; 
            height: 50px; 
            padding-left: 10px; 
            line-height: 50px; 
            background: #333; 
            color: #fff; 
            position: absolute; 
            bottom: 0px;

            transition: 3s all color;
        }

        .footer:hover {
            color: rgba(250, 250, 250, 0.50)
        }

        .icon-bar {
            float: right; 
            margin-right: 10px;
        }

        .icon {
            color: black;
            transition: 3s all color, 3s box-shadow, 3s text-shadow;
        }

        .icon:hover {
            color: white;
            box-shadow: 0px 1px 0px rgb(100, 105, 98);
            text-shadow: 0px 0px 1px rgb(100, 100, 100);
        }
    </style>
</head>
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-fluid">
                        <?php 
                            if(isset($_GET["pesan"])){
                                if($_GET["pesan"] == "gagal"){
                                    echo "<div class='text-small-3 d-flex justify-content-center align-items-center'>Anda Gagal masukkan userEmail dan Password !!!</div>";
                                }else if($_GET["pesan"] == "kosong"){
                                    echo "<div class='text-small-3 d-flex justify-content-center align-items-center'>Anda Telah kosongkan form login !!!</div>";
                                }else if($_GET["pesan"] == "logout"){
                                    echo "<div class='text-small-3 d-flex justify-content-center align-items-center'>Anda telah Logout</div>";
                                }
                                echo "<script>window.setTimeout(()=> {location.href='index.php'}, 3000);</script>";
                            }
                        ?>
                    </div>
                    <div class="kotak d-flex justify-content-center align-items-center">
                        <div class="panel panel-default col-md-3">
                            <form action="../action/act_login.php" method="post" class="form-group">
                                <div class="text-center">
                                    <h5 class="text-medium">Login Website Sekolah dasar</h5>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                        <input type="text" name="userEmail" id="userEmailInput" class="form-control input" placeholder="masukkan userEmail anda ...">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                        <input type="password" name="password" id="passwordlInput" class="form-control input" placeholder="masukkan password anda ...">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="log-in" class="btn btn-primary">Log In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <footer class="text-small-3 footer"> @CopyRight Developer IkoAlmasDev
            <a href="#" class="icon-bar"><span class="fab fa-github text-medium icon"></span></a>
            <a href="#" class="icon-bar"><span class="fab fa-instagram text-medium icon"></span></a>
            <a href="#" class="icon-bar"><span class="fab fa-facebook text-medium icon"></span></a>
        </footer>
    </body>
</html>
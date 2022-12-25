<div class='container-fluid'> 
    <?php 
        if(isset($_GET["pesan"])){
            if($_GET["pesan"] == "penambahan"){
                echo "<p class='text-center text-small-3 fw-normal'><span class='glyphicon glyphicon-check'></span> Berhasil nambah data</p>";
            }else if($_GET["pesan"] == "pengeditan"){
                echo "<p class='text-center text-small-3 fw-normal'><span class='glyphicon glyphicon-edit'></span> Berhasil Edit Data</p>";
            }else if($_GET["pesan"] == "penghapus"){
                echo "<p class='text-center text-small-3 fw-normal'><span class='glyphicon glyphicon-trash'></span> Berhasil Delete Data</p>";
            }else if($_GET["pesan"] == "failed"){
                echo "<p class='text-center text-small-3 fw-normal'><span class='far fa-window-close'></span> Uploud Gagal Ke Database</p>";
            }            
            echo "<script type='text/javascript'>window.setTimeout(() => {location.href='barang.php'}, 3000);</script>";
        }
    ?>
</div>
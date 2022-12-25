<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
?>

<?php 
# barang id
$id = $kon->real_escape_string($_GET["id_barang"]);
$query = "SELECT * FROM databarang WHERE id_barang=".$id;
$result = $kon->query($query);
while($buy = $result->fetch_array()){
    ?>
    <style>
        .bd {
            float:right;
            margin-left: 1px;
        }
    </style>
    <div class="col-md-4 col-md-offset-3 mt-5 pt 5">
        <div class="card" style="width:29rem;">
            <h5 class="card-header text-center">Product Card Buy</h5>
            <h5 class="card-title text-center"><?php echo $buy["namabarang"] ?></h5>
                <div class="card-body">
                    <form action="../../action/koperasi/act_buying.php" method="post">
                        <p class="card-text">Tanggal : <input type="text" name="tanggal" id="datepicker" class="form-control date"></p>
                        <p class="card-text">Nama Barang : <input type="text" name="namabarang" class="form-control input" value="<?php echo $buy["namabarang"]?>" readonly></p>
                        <p class="card-text">Harga Barang : <input type="text" name="harga" class="form-control input" value="<?php echo $buy["hargabarang"]; ?>" readonly></p>
                        <p class="card-text">Jumlah Barang : <input type="text" name="jumlahbeli" class="form-control input" value="1" id="jumlah" require readonly></p>
                        <div class="card-footer">
                            <button class="btn btn-primary" name="buy">Beli</button>
                        </div>
                    </form>
                    <div class="card-footer">
                        <a href="./barang.php" class="text-medium"><span class="glyphicon glyphicon-arrow-left"></span></a>
                        <button id="plus" onclick="plus()" class="btn btn-primary bd">+</button>
                        <button id="minus" onclick="minus()" class="btn btn-primary bd">-</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../../script/src/jumbel.js"></script>
        <script>
        $(function(){
            $("#datepicker").datepicker();
	    });
    </script>
    <?php
}
?>

<?php 
include "footer.php";
?>
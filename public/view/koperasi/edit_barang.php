<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
?>

<?php 
# barang id
$id = $kon->real_escape_string($_GET["id_barang"]);
$result = $kon->query("SELECT * FROM databarang WHERE id_barang='$id'");
while($buy = $result->fetch_array()){
    ?>
    <style>
        .bd {
            float:right;
            margin-left: 1px;
        }
        .chack {
            width: 50%;
            color: white;
            float: none;
        }
        .uncheck {
            width: 50%;
            color: white;
            float: none;
        }
    </style>
    <div class="col-md-4 col-md-offset-3 mt-5 pt 5">
        <div class="card" style="width:29rem;">
            <h5 class="card-header text-center">Edit Product</h5>
            <h5 class="card-title text-center"><?php echo $buy["namabarang"] ?></h5>
                <div class="card-body">
                    <form action="../../action/koperasi/act_edit_barang.php" method="post">
                        <p class="card-text">ID Product Kopeasi : <input type="text" name="id_barang" class="form-control input" value="<?php echo $buy["id_barang"]?>" readonly></p>
                        <p class="card-text">Nama Barang : <input type="text" name="namabarang" id="inputbarang" class="form-control input" value="<?php echo $buy["namabarang"]?>" readonly></p>
                        <p class="card-text">Jenis Barang :
                            <select name="jenisbarang" class="form-control select">
                                <option>Pilih Jenis barang</option>
                                <?php 
                                    $result = $kon->query("SELECT * FROM datajenis");
                                    while($x = $result->fetch_assoc()){
                                    ?>
                                        <option type="submit" onchange="this.form.submit()"><?php echo $x["jenis"]; ?></option>
                                    <?php
                                    }
                                ?>
                            </select>
                        </p>
                        <p class="card-text">Harga Barang : <input type="text" name="hargabarang" id="inputharga" class="form-control input" value="<?php echo $buy["hargabarang"]; ?>" readonly></p>
                        <p class="card-text">Jumlah Barang : <input type="text" name="jumlahbarang" class="form-control input" class="form-control input" id="jumlah" readonly></p>
                        <div class="card-footer">
                            <button class="btn btn-primary" name="edit">Selesai</button>
                        </div>
                    </form>
                    <div class="card-footer">
                        <a href="./barang.php" class="text-medium"><span class="glyphicon glyphicon-arrow-left"></span></a>
                        <button id="plus" onclick="plus()" class="btn btn-primary bd">+</button>
                        <button id="minus" onclick="minus()" class="btn btn-primary bd">-</button>
                        <input type="checkbox" onclick="uncheckAll()">
                    </div>
                </div>
            </div>
        </div>
        <script src="../../../script/src/check.js" crossorigin="anonymous" type="text/javascript"></script>
        <script src="../../../script/src/jumbel.js"></script>
    <?php
}
?>

<?php 
include "footer.php";
?>
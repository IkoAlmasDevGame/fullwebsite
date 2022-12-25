<?php 
include "header.php";
include "../../../database/Migrations/koneksi.php";
?>

<style type="text/css">
    #text-id{
        color : white;
        transition: 3s all, 3s text-shadow, 3s color, 3s text-decoration;
    }
    #text-id:hover{
        text-shadow: 0px 0px 1px gray;
        color: inherit;
        text-decoration: none;
    }
</style>

<h5 class="text-large"><a href="./visimisi.php" id="text-id" class="d-flex justify-content-center">File Visi Misi</a></h5>
<br>

<table class="table table-bordered">
    <tr>
        <th class="text-center">VISI SEKOLAH</th>
        <th class="text-center">MISI SEKOLAH</th>
    </tr>
    <?php 
    $result = $kon->query("SELECT visi, misi FROM file");
    while($sv = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><pre><?php echo $sv["visi"];?></pre></td>
            <td><pre><?php echo $sv["misi"];?></pre></td>
        </tr>
        <?php
    }
    ?>
</table>

<?php 
include "footer.php";
?>
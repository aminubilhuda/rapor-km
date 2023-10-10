<?php
include "../config/koneksi.php";
$tp = mysqli_query($mysqli,"SELECT * FROM tp WHERE id_cp='".$_POST["idcp"]."'");
    while ($rowelemen = mysqli_fetch_array($tp)) { ?>
    <option value="<?php echo $rowelemen['id_tp'] ?>"><?php echo $rowelemen['tp'] ?></option><br>
    <?php
    }
    ?>
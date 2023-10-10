<?php  
session_start();
if (empty($_SESSION['kode_guru']) or empty($_SESSION['password']) or empty($_SESSION['tugas'])) {
	?>
	<script type="text/javascript">
	alert('Anda Harus Login Terlebih Dahulu!');
	window.location.href="login.php";
	</script>
	<?php
}else{
	include "../config/koneksi.php";

	$guru = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM guru WHERE kode_guru='$_SESSION[kode_guru]' AND password='$_SESSION[password]'"));
  	
  	$mapelkelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel_kelas 
  	WHERE id_mapel_kelas='$_GET[ml]' AND kode_sekolah='$_GET[s]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'"));
  	$kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_kelas='$mapelkelas[id_kelas]' AND kode_sekolah='$_GET[s]'"));
  	$mapel = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel WHERE id_mapel='$mapelkelas[id_mapel]' "));
?>
<p>
    <a href="" class="btn btn-danger btn-sm"
    data-toggle="modal" data-target="#myModal"
    > Tambah TP</a>
</p>
<table class="table table-striped table-bordered" style="font-size:12px;">
    <tr>
        <td rowspan="2">No</td>
        <td style="width:30%;" rowspan="2">CP</td>
        <td style="width:30%;" rowspan="2">TP</td>
        <td  rowspan="2">Panjang <br>Interval</td>
        <td colspan="4" style="text-align: center;">Kriteria</td>
        <td colspan="4" style="text-align: center;">Intervensi</td>
        <td rowspan="2" style="width:10%;">Aksi</td>
    </tr>
    <tr>
      <td>Belum Mencapai Tujuan</td>
      <td>Belum Mencapai Tujuan</td>
      <td>Sudah Mencapai Tujuan</td>
      <td>Sudah Mencapai Tujuan</td>

      <td>Remidial Diseruluh Bagian</td>
      <td>Remidial Dibagian Tertentu</td>
      <td>Tidak Perlu Remidial</td>
      <td>Perlu Pengayaan</td>
    </tr>
    <?php
    $nomor=1;
    $capaian = mysqli_query($mysqli,"SELECT * FROM tp WHERE kode_sekolah='$_GET[s]' AND id_tingkat='$kelas[id_tingkat]' AND id_jenjang='$sekolah[jenjang]' AND id_mapel='$mapel[id_mapel]'");
    while($rowcapaian = mysqli_fetch_array($capaian)){
        $cp = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM cp WHERE id_cp='$rowcapaian[id_cp]'"));
        $interval = round((100-$rowcapaian['panjang_interval'])/3);
        $intervalA = $rowcapaian['panjang_interval'];

        $intervalB = $intervalA+$interval;
        $intervalC = $intervalB+$interval;

    ?>
    <tr>
        <td><?php echo $nomor++?></td>
        <td><?php echo $cp['cp']?></td>
        <td><?php echo $rowcapaian['tp']?></td>
        <td>
          <a class="btn btn-warning btn-sm">
            <?php echo $interval?></a>
        </td>
        <td>0 - <?php echo  $intervalA ?></td>
        <td><?php echo $intervalA+1 ?> - <?php echo $intervalB ?></td>
        <td><?php echo $intervalB+1 ?> - <?php echo $intervalC ?></td>
        <td><?php echo $intervalC+1 ?> - 100</td>
        <td>0 - <?php echo  $intervalA ?></td>
        <td><?php echo $intervalA+1 ?> - <?php echo $intervalB ?></td>
        <td><?php echo $intervalB+1 ?> - <?php echo $intervalC ?></td>
        <td><?php echo $intervalC+1 ?> - 100</td>
        <td>
            <a href="" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#EditTP<?php echo $rowcapaian['id_tp']?>"><i class="fa fa-pencil"></i></a>
            <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapusTP<?php echo $rowcapaian['id_tp']?>"><i class="fa fa-trash"></i></a>
        </td>
            <div class="modal fade" id="EditTP<?php echo $rowcapaian['id_tp']?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Edit Tujuan Pembelajaran</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="id_tp" value="<?php echo $rowcapaian['id_tp']?>">
                    	<div class="form-group">
                          <label>Tujuan Pembelajaran</label>
                          <textarea class="form-control input-sm" rows="5" required="" name="tp"><?php echo $rowcapaian['tp']?></textarea>
                        </div>
                        <div class="form-group">
                          <label>Panjang Interval KKTP</label>
                          <input type="number" name="intervalkktp" class="form-control input-sm" required="" value="<?php echo $rowcapaian['panjang_interval'] ?>">
                        </div>
                        <div class="modal-footer">  
                          <button type="submit" name="editdata" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> 

                      </form>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="modal fade" id="hapusTP<?php echo $rowcapaian['id_tp']?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-red">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Konfirmasi Hapus Tujuan Pembelajaran</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="id_tp" value="<?php echo $rowcapaian['id_tp']?>">
                    	<div class="form-group">
                          <label>Yakin akan menghapus Tujuan Pembelajaran ini ?</label>
                        </div>
                        <div class="modal-footer">  
                          <button type="submit" name="hapusdata" class="btn btn-success">Ya, Hapus</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> 

                      </form>
                  </div>
                </div>
              </div>
            </div>
    </tr>
    <?php } ?>
</table>
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Tujuan Pembelajaran</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                          <label>Capaian Pembelajaran</label>
                          <select name="id_cp" class="form-control input-sm" required="">
                              <option value="" required="">Pilih CP</option>
                              <?php
                              $n=1;
                              $cp = mysqli_query($mysqli,"SELECT * FROM cp WHERE kode_sekolah='$_GET[s]' AND id_tingkat='$kelas[id_tingkat]' AND id_jenjang='$sekolah[jenjang]' AND id_mapel='$mapel[id_mapel]'");
                              while($rowcp = mysqli_fetch_array($cp)){
                              ?>
                              <option value="<?php echo $rowcp['id_cp']?>"><?php echo $n++ ?>. <?php echo $rowcp['cp']?></option>
                              <?php } ?>
                          </select>
                        </div>
                    	   <div class="form-group">
                          <label>Tujuan Pembelajaran</label>
                          <textarea class="form-control input-sm" rows="5" required="" name="tp"></textarea>
                        </div>
                         <hr>
                         <div class="form-group text-center">
                          <label>Aplikasi ini menggunakan Perhitungan KKTP Menggunakan Interval Nilai, Silahkan Isi Interval Terbawah KKTP</label>
                        </div>

                        <div class="form-group">
                          <label>Interval Terkecil KKTP</label>
                          <input type="number" name="intervalkktp" class="form-control input-sm" required="">
                        </div>
                        <div class="modal-footer">  
                          <button type="submit" name="simpandata" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> 

                      </form>
                  </div>
                </div>
              </div>
            </div>
            
            <?php
            if(isset($_POST['simpandata'])){
                $tp = $_POST['tp'];
                $idcp = $_POST['id_cp'];
                $interval = $_POST['intervalkktp'];
                
                $insert = mysqli_query($mysqli,"INSERT INTO tp (id_cp, kode_sekolah, id_jenjang, id_tingkat, id_mapel, tp, panjang_interval)VALUES('$idcp','$_GET[s]', '$sekolah[jenjang]', '$kelas[id_tingkat]', '$mapel[id_mapel]', '$tp', '$interval')");
                
                if($insert){
                    ?><script>
                    alert('Berhasil');
                    window.location.href="?page=mapel&data=tp&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>";
                    </script><?php
                }
                
            }
            ?>
            
            <?php
            if(isset($_POST['editdata'])){
                $tp = $_POST['tp'];
                $id_tp = $_POST['id_tp'];
                $interval = $_POST['intervalkktp'];
                
                $insert = mysqli_query($mysqli,"UPDATE tp SET tp='$tp', panjang_interval='$interval' WHERE id_tp='$id_tp' ");
                
                if($insert){
                    ?><script>
                    alert('Berhasil');
                    window.location.href="?page=mapel&data=tp&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>";
                    </script><?php
                }
                
            }
            ?>
            
            
            <?php
            if(isset($_POST['hapusdata'])){
                $tp = $_POST['tp'];
                $id_tp = $_POST['id_tp'];
                
                $insert = mysqli_query($mysqli,"DELETE FROM tp WHERE id_tp='$id_tp'");
                $insert2 = mysqli_query($mysqli,"DELETE FROM tp_pembelajaran WHERE id_tp='$id_tp'");
                $insert3 = mysqli_query($mysqli,"DELETE FROM n_formatif WHERE id_tp='$id_tp'");
                $insert4 = mysqli_query($mysqli,"DELETE FROM n_sas WHERE id_tp='$id_tp'");
                $insert5 = mysqli_query($mysqli,"DELETE FROM n_sumatif WHERE id_tp='$id_tp'");
                
                if($insert || $insert2 || $insert3 || $insert4 || $insert5){
                    ?><script>
                    alert('Berhasil');
                    window.location.href="?page=mapel&data=tp&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>";
                    </script><?php
                }
                
            }
            ?>

<?php } ?>
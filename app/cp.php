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
    <a href="" class="btn btn-warning btn-sm"
    data-toggle="modal" data-target="#myModal"
    > Tambah CP</a>
</p>
<table class="table table-striped" style="font-size:12px;">
    <tr>
        <td>No</td>
        <td>Elemen</td>
        <td>Capaian Pembelajaran</td>
        <td style="width:15%;">Aksi</td>
    </tr>
    <?php
    $nomor=1;
    $capaian = mysqli_query($mysqli,"SELECT * FROM cp WHERE kode_sekolah='$_GET[s]' AND id_tingkat='$kelas[id_tingkat]' AND id_jenjang='$sekolah[jenjang]' AND id_mapel='$mapel[id_mapel]'");
    while($rowcapaian = mysqli_fetch_array($capaian)){
    ?>
    <tr>
        <td><?php echo $nomor++?></td>
        <td><?php echo $rowcapaian['elemen']?></td>
        <td><?php echo $rowcapaian['cp']?></td>
        <td>
            <a href="" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editCP<?php echo $rowcapaian['id_cp']?>"><i class="fa fa-pencil"></i></a>
            <a href="" class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#hapusCP<?php echo $rowcapaian['id_cp']?>"><i class="fa fa-trash"></i></a>
        </td>
        
        <div class="modal fade" id="editCP<?php echo $rowcapaian['id_cp']?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Edit Capaian Pembelajaran</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="id_cp" value="<?php echo $rowcapaian['id_cp']?>">
                    	<div class="form-group">
                          <label>Capaian Pembelajaran</label>
                          <textarea class="form-control input-sm" rows="5" required="" name="cp"><?php echo $rowcapaian['cp']?></textarea>
                        </div>
                        <div class="form-group">
                          <label>Elemen</label>
                          <textarea class="form-control input-sm" rows="5" required="" name="elemen"><?php echo $rowcapaian['elemen']?></textarea>
                        </div>
                        <div class="modal-footer">  
                          <button type="submit" name="updatedata" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> 

                      </form>
                  </div>
                </div>
              </div>
            </div>
        
        
        <div class="modal fade" id="hapusCP<?php echo $rowcapaian['id_cp']?>" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-red">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Konfirmasi Hapus CP</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="id_cp" value="<?php echo $rowcapaian['id_cp']?>">
                    	<div class="form-group">
                          <label>Yakin akan menghapus CP ini ?</label>
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
                    <h4 class="modal-title">Form Capaian Pembelajaran</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                    	<div class="form-group">
                          <label>Capaian Pembelajaran</label>
                          <textarea class="form-control input-sm" rows="5" required="" name="cp"></textarea>
                        </div>
                        <div class="form-group">
                          <label>Elemen</label>
                          <textarea class="form-control input-sm" rows="5" required="" name="elemen"></textarea>
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
                $cp = $_POST['cp'];
                $elemen = $_POST['elemen'];
                
                $insert = mysqli_query($mysqli,"INSERT INTO cp (kode_sekolah, id_jenjang, id_tingkat, id_mapel, elemen, cp)VALUES('$_GET[s]', '$sekolah[jenjang]', '$kelas[id_tingkat]', '$mapel[id_mapel]', '$elemen', '$cp')");
                
                if($insert){
                    ?><script>
                    alert('Berhasil');
                    window.location.href="?page=mapel&data=cp&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>";
                    </script><?php
                }
                
            }
            ?>
            
            <?php
            if(isset($_POST['updatedata'])){
                $cp = $_POST['cp'];
                $elemen = $_POST['elemen'];
                $idcp = $_POST['id_cp'];
                
                $insert = mysqli_query($mysqli,"UPDATE cp SET cp='$cp', elemen='$elemen' WHERE id_cp='$idcp'");
                
                if($insert){
                    ?><script>
                    alert('Berhasil');
                    window.location.href="?page=mapel&data=cp&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>";
                    </script><?php
                }
                
            }
            ?>
            
            <?php
            if(isset($_POST['hapusdata'])){
                $idcp = $_POST['id_cp'];
                $hapusdatacp = mysqli_query($mysqli,"DELETE FROM cp WHERE id_cp='$idcp'");
                $hapusdatatp = mysqli_query($mysqli,"DELETE FROM tp WHERE id_cp='$idcp'");
                if($hapusdatacp || $hapusdatatp){
                    ?><script>
                    alert('Berhasil');
                    window.location.href="?page=mapel&data=cp&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>";
                    </script><?php
                }
            }
            ?>

<?php } ?>
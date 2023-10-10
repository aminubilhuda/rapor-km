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
    <a href="" class="btn btn-success btn-sm"
    data-toggle="modal" data-target="#myModal"
    > Tambah Pembelajaran</a>
</p>

                <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <?php
                    $nomor=1;
                    $capaian = mysqli_query($mysqli,"SELECT * FROM pembelajaran WHERE kode_sekolah='$_GET[s]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' AND id_mapel='$mapel[id_mapel]' AND id_kelas='$kelas[id_kelas]' AND id_mapel_kelas='$_GET[ml]'");
                    while($rowcapaian = mysqli_fetch_array($capaian)){
                    ?>
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $rowcapaian['id_pembelajaran']?>">
                            <?php echo $rowcapaian['pembelajaran']?>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne<?php echo $rowcapaian['id_pembelajaran']?>" class="panel-collapse collapse in">
                        <div class="box-body">
                          <p>
                              <a href="" data-toggle="modal" data-target="#myModalTambahTP<?php echo $rowcapaian['id_pembelajaran']?>">Tambah TP</a> || 
                              <a href="" data-toggle="modal" data-target="#myModalHapusPembelajaran<?php echo $rowcapaian['id_pembelajaran']?>">Hapus Pembelajaran</a> || 
                              
                          </p>
                          <table class="table table-striped table-bordered" style="font-size:12px;">
                              <tr>
                                  <td>No</td>
                                  <td>Capaian Pembelajaran</td>
                                  <td>Tujuan Pembelajaran</td>
                                  <td>Aksi</td>
                              </tr>
                              <?php
                              $nmr = 1;
                              $tpp = mysqli_query($mysqli,"SELECT * FROM tp_pembelajaran WHERE id_pembelajaran='$rowcapaian[id_pembelajaran]' AND id_mapel_kelas='$_GET[ml]' ORDER BY id_tp ASC");
                              while($rowtpp = mysqli_fetch_array($tpp)){
                                  $cp = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM cp WHERE id_cp='$rowtpp[id_cp]'"));
                                  $tp = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM tp WHERE id_tp='$rowtpp[id_tp]'"));
                              ?>
                              <tr>
                                  <td><?php echo $nmr++?></td>
                                  <td><?php echo $cp['cp']?></td>
                                  <td><?php echo $tp['tp']?></td>
                                  <td>
                                      <a href="" class="btn btn-danger btn-xs"
                                      data-toggle="modal" data-target="#myModalHapustpp<?php echo $rowtpp['id_tp_pembelajaran']?>"
                                      >Hapus TP</a>
                                  </td>
                                  <div class="modal fade" id="myModalHapustpp<?php echo $rowtpp['id_tp_pembelajaran']?>" role="dialog">
                                      <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header bg-green">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Konfirmasi Hapus Tujuan Pembelajaran</h4>
                                          </div>
                                          <div class="modal-body">
                                            <form method="POST">
                                                <input type="hidden" name="id_tp_pembelajaran" value="<?php echo $rowtpp['id_tp_pembelajaran']?>">
                                            	<div class="form-group">
                                                  <label>Yakin Akan Menghapus Tujuan Pembelajaran Pebelajaran ini ??</label>
                                                  
                                                </div>
                                                <div class="modal-footer">  
                                                  <button type="submit" name="hapustpp" class="btn btn-success">Ya, Hapus</button>
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
                          
                          <div class="modal fade" id="myModalHapusPembelajaran<?php echo $rowcapaian['id_pembelajaran']?>" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header bg-green">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Konfirmasi Hapus Pembelajaran</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form method="POST">
                                        <input type="hidden" name="id_pembelajaran" value="<?php echo $rowcapaian['id_pembelajaran']?>">
                                    	<div class="form-group">
                                          <label>Yakin Akan Menghapus Pembelajaran ini ?</label>
                                          
                                        </div>
                                        <div class="modal-footer">  
                                          <button type="submit" name="hapuspembelajaran" class="btn btn-success">Ya, Hapus</button>
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div> 
                
                                      </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            
                            
                            <div class="modal fade" id="myModalTambahTP<?php echo $rowcapaian['id_pembelajaran']?>" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header bg-green">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Form Tambah Tujuan Pembelajaran (TP)</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form method="POST">
                                        <input type="hidden" name="id_pembelajaran" value="<?php echo $rowcapaian['id_pembelajaran']?>">
                                        
                                    	<div class="form-group">
                                          <label>Pilih Capaian Pembelajaran</label>
                                          <select name="id_cp" id="datacp" class="form-control input-sm" required="">
                                              <option value="" required="">Pilih CP</option>
                                              <?php
                                              $ndata = 1;
                                              $datacpp = mysqli_query($mysqli,"SELECT * FROM cp WHERE kode_sekolah='$_GET[s]' AND id_tingkat='$kelas[id_tingkat]' AND id_mapel='$mapel[id_mapel]'");
                                              while($rowdatacpp = mysqli_fetch_array($datacpp)){
                                              ?>
                                              <option value="<?php echo $rowdatacpp['id_cp']?>"><?php echo $ndata++ ?>. <?php echo $rowdatacpp['cp']?></option>
                                              <?php } ?>
                                          </select>
                                          </div>
                                          <div class="form-group">
                                          <label>Pilih Capaian Pembelajaran</label>
                                          <select name="id_tp" id="datatp" class="form-control input-sm" required="">
                                              
                                          </select>
                                          </div>
                                          
                                        <div class="modal-footer">  
                                          <button type="submit" name="tambahtpp" class="btn btn-success">Update</button>
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div> 
                
                                      </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          
                          
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>

            <?php
            if(isset($_POST['hapuspembelajaran'])){
                $id = $_POST['id_pembelajaran'];
                
                $hapuspembelajaran = mysqli_query($mysqli,"DELETE FROM pembelajaran WHERE id_pembelajaran='$id'");
                if($hapuspembelajaran){
                    ?>
                    <script>
                        alert('Berhasil');
                    window.location.href="?page=mapel&data=pembelajaran&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>";
                    </script>
                    <?php
                }
            }
            ?>
            
            
            <?php
            if(isset($_POST['hapustpp'])){
                $id_tp_pembelajaran = $_POST['id_tp_pembelajaran'];
                
                $hapustppembelajaran = mysqli_query($mysqli,"DELETE FROM tp_pembelajaran WHERE id_tp_pembelajaran='$id_tp_pembelajaran'");
                
                if($hapustppembelajaran){
                    ?>
                    <script>
                        alert('Berhasil');
                    window.location.href="?page=mapel&data=pembelajaran&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>";
                    </script>
                    <?php
                }
            }
            ?>
            
            
            <?php
            if(isset($_POST['tambahtpp'])){
                $idpembelajaran = $_POST['id_pembelajaran'];
                $idcp = $_POST['id_cp'];
                $idtp = $_POST['id_tp'];
                
                $cekdata = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM tp_pembelajaran WHERE id_pembelajaran='$idpembelajaran' AND id_cp='$idcp' AND idtp='$idtp' "));
                if($cekdata > 0){
                    ?>
                    <script>alert('TP ini sudah Ada'); window.location.href="?page=mapel&data=pembelajaran&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>";</script>
                    <?php
                }else{
                    $insert = mysqli_query($mysqli,"INSERT INTO tp_pembelajaran (id_pembelajaran, id_cp, id_tp, id_mapel, id_kelas, id_mapel_kelas)VALUES('$idpembelajaran', '$idcp', '$idtp', '$mapel[id_mapel]', '$kelas[id_kelas]', '$_GET[ml]')");
                    if($insert){
                        ?>
                        <script>alert('Berhasil'); window.location.href="?page=mapel&data=pembelajaran&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>";</script>
                    <?php
                    }
                }
            }
            ?>


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
                          <label>Pembelajaran</label>
                          <textarea class="form-control input-sm" rows="5" required="" name="pembelajaran"></textarea>
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
                $pembelajaran = $_POST['pembelajaran'];
                
                $insert = mysqli_query($mysqli,"INSERT INTO pembelajaran (kode_sekolah, tahun, semester, id_mapel, id_kelas, id_mapel_kelas, pembelajaran)VALUES('$_GET[s]', '$sekolah[tahun]', '$sekolah[semester]', '$mapel[id_mapel]', '$kelas[id_kelas]', '$_GET[ml]', '$pembelajaran')");
                
                if($insert){
                    ?><script>
                    alert('Berhasil');
                    window.location.href="?page=mapel&data=pembelajaran&s=<?php echo $_GET['s']?>&ml=<?php echo $_GET['ml']?>";
                    </script><?php
                }
                
            }
            ?>

<?php } ?>
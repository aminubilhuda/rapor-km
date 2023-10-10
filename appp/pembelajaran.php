<?php  
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['password']) ) {
	?>
	<script type="text/javascript">
	alert('Anda Harus Login Terlebih Dahulu!');
	window.location.href="login.php";
	</script>
	<?php
}else{
	include "../config/koneksi.php";

	$lembaga = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sekolah WHERE username='$_SESSION[username]' AND password='$_SESSION[password]'"));
	$kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_kelas='$_GET[kl]'"));
?>
<script type="text/javascript">
 function checkAll(ele) {
      var checkboxes = document.getElementsByTagName('input');
      if (ele.checked) {
          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i].type == 'checkbox' ) {
                  checkboxes[i].checked = true;
              }
          }
      } else {
          for (var i = 0; i < checkboxes.length; i++) {
              if (checkboxes[i].type == 'checkbox') {
                  checkboxes[i].checked = false;
              }
          }
      }
  }
</script>

		<section class="content-header">
          <h1>
            Pembelajaran Kelas <?php echo $kelas['nama_kelas'] ?>
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="?page=kelas&s=<?php echo $_GET[s] ?>"><i class="fa fa-university"></i> Kelas</a></li>
            <li class="active">Siswa Kelas</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Daftar Mata Pelajaran Kelas</h3>
                  <div class="box-tools">
                      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Tambah Mapel </button>
                      <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModalImport">Import Mapel </button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered" style="font-size: 10px;" data-page-length="100">
                    <thead>
                    <tr style="background-color: orange;">
                      <td style="text-align: center; color: white;">No</td>
                      <td style="text-align: center; color: white;">Mata Pelajaran</td>
                      <td style="text-align: center; color: white;">Guru Pengampuh</td>
                      <td style="text-align: center; color: white;">Aksi</td>
                    </tr>
                    </thead>
                    <?php  
                    $nmapel = 1;
                    $siswa = mysqli_query($mysqli,"SELECT * FROM mapel_kelas 
                    WHERE kode_sekolah='$_GET[s]' AND id_kelas='$kelas[id_kelas]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]'
                    ORDER BY id_mapel ASC");
                    while ($rowsiswa = mysqli_fetch_array($siswa)) {
                    	$mapel = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel WHERE id_mapel='$rowsiswa[id_mapel]'"));
                    	$guru = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM guru WHERE id_guru='$rowsiswa[id_guru]'"));
                    ?>
                    <tr>
                    	<td style="text-align: center;"><?php echo $nmapel++ ?></td>
                    	<td style="text-align: left;"><?php echo $mapel['nama_mapel'] ?></td>
                    	<td style="text-align: center;">
                    	    <a href="" data-toggle="modal" data-target="#modalpilihguru<?php echo $rowsiswa['id_mapel_kelas']?>">
                    	        <?php if(empty($rowsiswa['id_guru'])){ ?>
                    	        Silahkan Pilih Guru Mapel
                    	        <?php }else { ?>
                    	        <?php echo $guru['nama_guru'] ?>
                    	        <?php } ?>
                    	    </a>
                    	</td>
                    	<div class="modal fade" id="modalpilihguru<?php echo $rowsiswa['id_mapel_kelas']?>" role="dialog">
                          <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header bg-green">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Pilih Guru Pengampuh</h4>
                              </div>
                              <div class="modal-body">
                                <form method="POST">
                                    <div class="form-group">
                                        
                                     <input name="id_mapel_kelas" type="hidden" value="<?php echo $rowsiswa['id_mapel_kelas']?>">    
                                        
                                      <label>Pilih Guru Mata Pelajaran</label>
                                      <select name="id_guru" class="form-control input-sm" required="">
			                          	<option value="" required="">Pilih Guru Pengampuh</option>
			                          	<?php  
			                          	$nomor =1;
			                          	$guru = mysqli_query($mysqli,"SELECT * FROM guru WHERE kode_sekolah='$_GET[s]' ORDER BY id_guru ASC");
			                          	while ($rowguru = mysqli_fetch_array($guru)) {
			                          		if ($rowsiswa['id_guru']==$rowguru['id_guru']) {
			                          			$sele = "selected";
			                          		}else{
			                          			$sele = "";
			                          		}
			                          	?>
			                          	<option value="<?php echo $rowguru['id_guru'] ?>" <?php echo $sele ?>><?php echo $nomor++ ?> - <?php echo $rowguru['nama_guru'] ?></option>
			                          	<?php } ?>
			                          </select>
                                    </div>
                                    <div class="modal-footer">  
                                      <button type="submit" name="importguru" class="btn btn-success">Update</button>
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div> 
            
                                  </form>
                              </div>
                            </div>
                          </div>
                        </div>
                    	
                    	
                    	
                    	
                    	
                    	
                    	
                    	
                    	
                    	<td style="text-align: center;">
                    		<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $rowsiswa['id_mapel_kelas']?>">Edit</button>
                    		<a href="?page=hapus-pembelajaran&s=<?php echo $_GET['s'] ?>&i=<?php echo $rowsiswa['id_mapel_kelas'] ?>&kl=<?php echo $_GET['kl'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menhapus Pembelajaran ini?')"> Delt</a>
                    	</td>
                    	<div class="modal fade" id="myModal<?php echo $rowsiswa['id_mapel_kelas']?>" role="dialog">
			              <div class="modal-dialog">
			                <!-- Modal content-->
			                <div class="modal-content">
			                  <div class="modal-header bg-blue">
			                    <button type="button" class="close" data-dismiss="modal">&times;</button>
			                    <h4 class="modal-title">Form Edit Pembelajaran Kelas</h4>
			                  </div>
			                  <div class="modal-body">
			                    <form method="POST">
			                    	<?php  
			                    	$mapelkelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel_kelas WHERE id_mapel_kelas='$rowsiswa[id_mapel_kelas]'"));
			                    	?>
			                    	<input type="hidden" name="id_mapel_kelas" value="<?php echo $rowsiswa[id_mapel_kelas] ?>">
			                        <div class="form-group">
			                          <label>Mata Pelajaran</label>
			                          <select name="id_mapel" class="form-control input-sm" required="" readonly="">
			                          	<option value="" required="" readonly="">Pilih Mata Pelajaran</option>
			                          	<?php  
			                          	$mapel = mysqli_query($mysqli,"SELECT * FROM mapel WHERE kode_sekolah='$lembaga[kode_sekolah]' ORDER BY id_mapel ASC");
			                          	while ($rowmapel = mysqli_fetch_array($mapel)) {
			                          		if ($mapelkelas['id_mapel']==$rowmapel['id_mapel']) {
			                          			$sel = "selected";
			                          		}else{
			                          			$sel = "";
			                          		}
			                          	?>
			                          	<option readonly="" value="<?php echo $rowmapel[id_mapel] ?>" <?php echo $sel ?> ><?php echo $rowmapel['nama_mapel'] ?></option>
			                          	<?php } ?>
			                          </select>
			                        </div>
			                        <div class="form-group">
			                          <label>Guru Pengampuh</label>
			                          <select name="id_guru" class="form-control input-sm" required="">
			                          	<option value="" required="">Pilih Guru Pengampuh</option>
			                          	<?php  
			                          	$nomor =1;
			                          	$guru = mysqli_query($mysqli,"SELECT * FROM guru WHERE kode_sekolah='$_GET[s]' ORDER BY id_guru ASC");
			                          	while ($rowguru = mysqli_fetch_array($guru)) {
			                          		if ($mapelkelas['id_guru']==$rowguru['id_guru']) {
			                          			$sele = "selected";
			                          		}else{
			                          			$sele = "";
			                          		}
			                          	?>
			                          	<option value="<?php echo $rowguru[id_guru] ?>" <?php echo $sele ?>><?php echo $nomor++ ?> - <?php echo $rowguru['nama_guru'] ?></option>
			                          	<?php } ?>
			                          </select>
			                        </div>
			                        
			                        <div class="modal-footer">  
			                          <button type="submit" name="simpandataedit" class="btn btn-success">Update</button>
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
               	</div>
               	</form>
               </div>
           </div>
       	  </div>
        </section><!-- /.content -->
        
        <?php
        if(isset($_POST['importguru'])){
            $guru = $_POST['id_guru'];
            $mapelkelas = $_POST['id_mapel_kelas'];
            $update = mysqli_query($mysqli,"UPDATE mapel_kelas SET id_guru='$guru' WHERE id_mapel_kelas='$mapelkelas'");
            if($update){
                ?><script>alert('Berhasil'); window.location.href="?page=pembelajaran&s=<?php echo $_GET['s']?>&kl=<?php echo $_GET['kl']?>";</script><?php
            }
        }
        ?>
        
        
        
        <div class="modal fade" id="myModalImport" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Konfirmasi Import Mata Pelajaran</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                        
                        <div class="form-group">
                          
                          <label>Pilih Mata Pelajaran Yang akan diimport</label>
                          
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" onchange="checkAll(this)" name="chk[]"> 
                                <b>Pilih Semua Mapel</b>
                              </label>
                            </div>
                          
                          
                            <?php
                            $mapel = mysqli_query($mysqli,"SELECT * FROM mapel WHERE kode_sekolah='$lembaga[kode_sekolah]' ORDER BY id_mapel ASC");
                            while ($rowmapel = mysqli_fetch_array($mapel)){
                            ?>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="mapel[]" value="<?php echo $rowmapel['id_mapel']?>"> <?php echo $rowmapel['nama_mapel']?>
                              </label>
                            </div>
                            <?php } ?>
                        </div>
                        

                        <div class="modal-footer">  
                          <button type="submit" name="importmapel" class="btn btn-success">Update</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div> 

                      </form>
                  </div>
                </div>
              </div>
            </div>
            <?php
            if(isset($_POST['importmapel'])){
                $mapel = $_POST['mapel'];
                
                $jumlahmapel = count($mapel);
                
                for ($i=0; $i <$jumlahmapel ; $i++) { 
                    $cekdata = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM mapel_kelas WHERE kode_sekolah='$_GET[s]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]' AND id_mapel='$mapel[$i]' AND id_kelas='$_GET[kl]'"));
                    
                    if($cekdata > 0){
                        
                    }else{
                        $insert = mysqli_query($mysqli,"INSERT INTO mapel_kelas (kode_sekolah, tahun, semester, id_mapel, id_kelas)VALUES('$_GET[s]', '$lembaga[tahun]', '$lembaga[semester]', '$mapel[$i]', '$_GET[kl]')");
                    }
                    if($insert){
                        ?>
                        <script>
                            alert('Berhasil menambahkan <?php echo $jumlahmapel ?> Kedalam Kelas ini.');
                            window.location.href="?page=pembelajaran&s=<?php echo $_GET['s']?>&kl=<?php echo $_GET['kl']?>";
                        </script>
                        <?php
                    }else{
                        ?>
                        <script>
                            alert('Gagal menambahkan <?php echo $jumlahmapel ?> Kedalam Kelas ini.');
                            window.location.href="?page=pembelajaran&s=<?php echo $_GET['s']?>&kl=<?php echo $_GET['kl']?>";
                        </script>
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
                    <h4 class="modal-title">Form Tambah Mata Pelajaran Kelas</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">

                        <div class="form-group">
                          <label>Mata Pelajaran</label>
                          <select name="id_mapel" class="form-control input-sm" required="">
                          	<option value="" required="">Pilih Mata Pelajaran</option>
                          	<?php  
                          	$mapel = mysqli_query($mysqli,"SELECT * FROM mapel WHERE kode_sekolah='$lembaga[kode_sekolah]' ORDER BY id_mapel ASC");
                          	while ($rowmapel = mysqli_fetch_array($mapel)) {
                          	?>
                          	<option value="<?php echo $rowmapel[id_mapel] ?>"><?php echo $rowmapel['nama_mapel'] ?></option>
                          	<?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Guru Pengampuh</label>
                          <select name="id_guru" class="form-control input-sm" required="">
                          	<option value="" required="">Pilih Guru Pengampuh</option>
                          	<?php  
                          	$nomor =1;
                          	$guru = mysqli_query($mysqli,"SELECT * FROM guru WHERE kode_sekolah='$_GET[s]' ORDER BY id_guru ASC");
                          	while ($rowguru = mysqli_fetch_array($guru)) {
                          	?>
                          	<option value="<?php echo $rowguru[id_guru] ?>"><?php echo $nomor++ ?> - <?php echo $rowguru['nama_guru'] ?></option>
                          	<?php } ?>
                          </select>
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
            if (isset($_POST['simpandata'])) {
            	$mapel = $_POST['id_mapel'];
            	$guru = $_POST['id_guru'];
            	$kkm = $_POST['kkm_mapel'];

            	$cekdata = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM mapel_kelas WHERE kode_sekolah='$_GET[s]' AND id_mapel='$mapel' AND id_kelas='$_GET[kl]' AND id_guru='$guru' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]' "));

            	if ($cekdata > 0 ) {
            		?>
	            		<script type="text/javascript">
	            			alert('Maaf, Mapel ini sudah ada!');
	            			window.location.href="?page=pembelajaran&s=<?php echo $_GET[s] ?>&kl=<?php echo $_GET[kl] ?>";
	            		</script>
	            		<?php
            	}else{

            		$insert = mysqli_query($mysqli,"INSERT INTO mapel_kelas (tahun, semester, kode_sekolah,id_mapel,id_kelas,id_guru)VALUES('$lembaga[tahun]', '$lembaga[semester]','$_GET[s]','$mapel','$_GET[kl]','$guru')");
            	
            	if ($insert) {
            			?>
	            		<script type="text/javascript">
	            			alert('Berhasil Menambahkan Mata Pelajaran');
	            			window.location.href="?page=pembelajaran&s=<?php echo $_GET[s] ?>&kl=<?php echo $_GET[kl] ?>";
	            		</script>
	            		<?php
            		}else{
            			?>
	            		<script type="text/javascript">
	            			alert('Gagal Menambahkan Mata Pelajaran');
	            			window.location.href="?page=pembelajaran&s=<?php echo $_GET[s] ?>&kl=<?php echo $_GET[kl] ?>";
	            		</script>
	            		<?php
            		}
            	}

            }
            ?>

            <?php  
            if (isset($_POST['simpandataedit'])) {
            	$mapel = $_POST['id_mapel'];
            	$guru = $_POST['id_guru'];
            	$kkm = $_POST['kkm_mapel'];
            		
                $insert = mysqli_query($mysqli,"UPDATE mapel_kelas SET id_guru='$guru' WHERE id_mapel_kelas='$_POST[id_mapel_kelas]'");
            	
            	if ($insert) {
            			?>
	            		<script type="text/javascript">
	            			alert('Berhasil Memperbaharui data pembelajaran');
	            			window.location.href="?page=pembelajaran&s=<?php echo $_GET[s] ?>&kl=<?php echo $_GET[kl] ?>";
	            		</script>
	            		<?php
            		}else{
            			?>
	            		<script type="text/javascript">
	            			alert('Gagal memperbaharui data pembelajaran');
	            			window.location.href="?page=pembelajaran&s=<?php echo $_GET[s] ?>&kl=<?php echo $_GET[kl] ?>";
	            		</script>
	            		<?php
            		}

            }
            ?>


<?php } ?>
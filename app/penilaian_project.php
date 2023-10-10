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
  	
  
  	$kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_guru='$guru[id_guru]' AND kode_sekolah='$_GET[s]'"));

  	$project = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM project WHERE id_project='$_GET[p]'"));
  

  	
?>
		<section class="content-header">
          <h1>
            Penilaian Project - <?php echo $project['nama_project'] ?> - Kelas <?php echo $kelas['nama_kelas'] ?>
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Penilaian Formatif</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Format Penilaian Project</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                	<table class="table table-striped table-bordered" style="font-size: 11px;">
                		<tr>
                			<td style="text-align: center;" rowspan="2">No</td>
                			<td style="text-align: center;" rowspan="2">Peserta Didik</td>
                			<td style="text-align: center;" rowspan="2">Catatan Proses</td>
                			<?php  
                			$dimensi = mysqli_query($mysqli,"SELECT * FROM dimensi_project 
                			WHERE id_project='$_GET[p]' ORDER BY id_dimensi_project ASC");
                			while ($rdimensi = mysqli_fetch_array($dimensi)) {

                				$profile = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM dimensi WHERE id_dimensi='$rdimensi[id_dimensi]' "));
                				$jumlahsubelemen = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM elemen_project WHERE id_project='$_GET[p]' AND id_dimensi='$rdimensi[id_dimensi]'"));
                				$jumlahcol = $jumlahsubelemen;
                			?>
                			<td style="text-align: center; background-color: yellow;" colspan="<?php echo $jumlahcol ?>">
                				<p style="color: red;"><b><?php echo $profile['sdimensi'] ?></b></p>
                			</td>
                			<?php } ?>
                			<?php  
                			$dimensi = mysqli_query($mysqli,"SELECT * FROM dimensi_project 
                			WHERE id_project='$_GET[p]' ORDER BY id_dimensi_project ASC");
                			while ($rdimensi = mysqli_fetch_array($dimensi)) {

                				$profile = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM dimensi WHERE id_dimensi='$rdimensi[id_dimensi]'"));

                				$jumlahsubelemen = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM elemen_project WHERE id_project='$_GET[p]' AND id_dimensi='$rdimensi[id_dimensi]'"));
                				$jumlahcol = $jumlahsubelemen;
                			?>
                			<td style="text-align: center; background-color: aqua;" rowspan="2">
                				<p ><b><?php echo $profile['sdimensi'] ?></b></p>
                			</td>
                			<?php } ?>
                		</tr>
                		<tr>

                			<?php  
                			$dimensi = mysqli_query($mysqli,"SELECT * FROM dimensi_project 
                			WHERE id_project='$_GET[p]' ORDER BY id_dimensi_project ASC");
                			while ($rdimensi = mysqli_fetch_array($dimensi)) {
                				
                                $elemen = mysqli_query($mysqli,"SELECT * FROM elemen_project 
                                WHERE id_project='$_GET[p]' AND id_dimensi='$rdimensi[id_dimensi]'");
                				
                                while($rowdata = mysqli_fetch_array($elemen)){

                                    $dataelemen = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM elemen WHERE id_elemen='$rowdata[id_elemen]'"));
                					$subelemen = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sub_elemen WHERE id_sub_elemen='$rowdata[id_sub_elemen]'"));
                			?>
                			<td style="text-align: center;">
                				<a href="" data-toggle="modal" data-target="#myModal<?php echo $rdimensi[id_dimensi]?><?php echo $rowdata[id_sub_elemen]?><?php echo $rowdata[id_elemen_project]?>">
                				<p style="color: red;">
                                    <u><?php echo $dataelemen['selemen'] ?>-<?php echo $subelemen['ssubelemen'] ?> </u>
                                </p>
                				<p style="color:green;"></p>

                				</a>
                			</td>
                			<div class="modal fade" id="myModal<?php echo $rdimensi[id_dimensi]?><?php echo $rowdata[id_sub_elemen]?><?php echo $rowdata[id_elemen_project]?>" role="dialog">
				              <div class="modal-dialog">
				                <!-- Modal content-->
				                <div class="modal-content">
				                  <div class="modal-header bg-green">
				                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				                    <h4 class="modal-title">Form Pengisian Nilai Project</h4>
				                  </div>
				                  <div class="modal-body" style="font-size: 11px;">
				                    <form method="POST">
				                    	<input type="hidden" name="dimensi" value="<?php echo $rdimensi[id_dimensi] ?>">
				                    	<input type="hidden" name="subelemen" value="<?php echo $rowdata[id_sub_elemen] ?>">
				                    	<input type="hidden" name="elemen" value="<?php echo $rowdata[id_elemen] ?>">
				                    	<input type="hidden" name="idelemenproject" value="<?php echo $rowdata[id_elemen_project] ?>">
				                    	<?php  
				                    	$no=1;
				                    	$siswa = mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
				                    	JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
				                    	WHERE id_kelas='$kelas[id_kelas]' ORDER BY nama_siswa ASC");
				                    	while ($rowsiswa = mysqli_fetch_array($siswa)) { 
				                    		$penilaian = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM penilaian_project WHERE id_project='$_GET[p]' AND id_dimensi='$rdimensi[id_dimensi]'AND id_elemen='$rowdata[id_elemen]' AND id_sub_elemen='$rowdata[id_sub_elemen]' AND id_siswa='$rowsiswa[id_siswa]'"));
				                    	?>
				                    	<div class="col-md-12">
				                    		<div class="form-group">
				                    			<label><?php echo $rowsiswa['nama_siswa'] ?></label>
				                    			<select name="nilai[]" class="form-control input-sm" required="">
				                    				<option value="" required="">Pilih Nilai</option>
				                    				<option value="1" <?php if($penilaian['nilai']==1){ echo "selected";}?>>BB</option>
				                    				<option value="2" <?php if($penilaian['nilai']==2){ echo "selected";}?>>MB</option>
				                    				<option value="3" <?php if($penilaian['nilai']==3){ echo "selected";}?>>BSH</option>
				                    				<option value="4" <?php if($penilaian['nilai']==4){ echo "selected";}?>>SB</option>
				                    			</select>
				                    		</div>
				                    		<input type="hidden" name="siswa[]" value="<?php echo $rowsiswa[id_siswa] ?>">
				                    	</div>


				                    	<?php } ?>

				                        <div class="modal-footer">  
				                          <button type="submit" name="simpannilaitujuan" class="btn btn-success">Update</button>
				                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                        </div> 

				                      </form>
				                  </div>
				                </div>
				              </div>
				          </div>
                			<?php } } ?>
                		</tr>
                		<?php  
                		$no = 1;
                		$siswa = mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                		JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                		WHERE id_kelas='$kelas[id_kelas]' ORDER BY nama_siswa ASC");
                		while ($row = mysqli_fetch_array($siswa)) {
                		    $catatanp = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM catatan_proses WHERE id_project='$_GET[p]' AND id_siswa='$row[id_siswa]'"));
                		?>
                		<tr>
                			<td style="text-align: center;"><?php echo $no++ ?></td>
                			<td style="text-align: left;"><?php echo $row['nama_siswa'] ?></td>
                			<td style="text-align: left;">
                			    <a href=""
                			    data-toggle="modal" data-target="#catatanproses<?php echo $row['id_siswa']?>" 
                			    >
                			    <?php
                			    $sbm = mysqli_query($mysqli,"SELECT * FROM penilaian_project WHERE id_project='$_GET[p]' AND id_siswa='$row[id_siswa]' ORDER BY  nilai DESC");
                			    while($rowsbm = mysqli_fetch_array($sbm)){
                			        $subelemen = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sub_elemen WHERE id_sub_elemen='$rowsbm[id_sub_elemen]'"));
                			        if($rowsbm['nilai']==4){
                			            echo $des1 = $subelemen['sub_elemen'].", ";
                			        }elseif($rowsbm['nilai']==3){
                			            $des2 = $subelemen['sub_elemen'].", ";
                			        }elseif($rowsbm['nilai']==2){
                			            $des3 = $subelemen['sub_elemen'].", ";
                			        }elseif($rowsbm['nilai']==1){
                			            $des4 = $subelemen['sub_elemen'].", ";
                			        }
                			        
                			    }
                			    
                			    ?>
                			    
                			    </a>
                			</td>
                			<div class="modal fade" id="catatanproses<?php echo $row['id_siswa']?>" role="dialog">
				              <div class="modal-dialog">
				                <!-- Modal content-->
				                <div class="modal-content">
				                  <div class="modal-header bg-green">
				                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				                    <h4 class="modal-title">Form Catatan Proses</h4>
				                  </div>
				                  <div class="modal-body" style="font-size: 11px;">
				                    <form method="POST">
				                    	<input type="hidden" name="id_siswa" value="<?php echo $row['id_siswa'] ?>">
				                        <div class="form-group">
				                            <label>Isikan Catatn Proses Sesuai dengan pencapaian</label>
				                            <textarea name="catatan" class="form-control" rows="8" required=""></textarea>
				                        </div>
				                    	

				                        <div class="modal-footer">  
				                          <button type="submit" name="simpancatatan" class="btn btn-success">Update</button>
				                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                        </div> 

				                      </form>
				                  </div>
				                </div>
				              </div>
				          </div>
                			
                			
                			
                			<?php  
                			$dimensi = mysqli_query($mysqli,"SELECT * FROM dimensi_project 
                			WHERE id_project='$_GET[p]' ORDER BY id_dimensi ASC");
                			while ($rdimensi = mysqli_fetch_array($dimensi)) {
                				$elemen = mysqli_query($mysqli,"SELECT * FROM elemen_project WHERE id_project='$_GET[p]' AND id_dimensi='$rdimensi[id_dimensi]'");

                				while($rowdata = mysqli_fetch_array($elemen)){
                                    $dataelemen = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM elemen WHERE id_elemen='$rowdata[id_elemen]'"));
                			?>
                			<td style="text-align: center; ">
                				<?php  
                				$penilaian = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM penilaian_project WHERE id_project='$_GET[p]' AND id_dimensi='$rdimensi[id_dimensi]'AND id_elemen='$rowdata[id_elemen]' AND id_sub_elemen='$rowdata[id_sub_elemen]' AND id_siswa='$row[id_siswa]'"));

                    				$datanilai = $penilaian['nilai'];
                    				if ($datanilai == 1) {
                    					echo "BB";
                    				}elseif($datanilai == 2){
                    					echo "MB";
                    				}elseif($datanilai == 3){
                    					echo "BSH";
                    				}
                    				elseif($datanilai == 4){
                    					echo "SB";
                    				}else{
                    					echo "";
                    				}
                				?>
                			</td>
                			<?php } } ?>
                			<?php  
                			$dimensi = mysqli_query($mysqli,"SELECT * FROM dimensi_project 
                			WHERE id_project='$_GET[p]' ORDER BY id_dimensi ASC");
                			while ($rdimensi = mysqli_fetch_array($dimensi)) {
                			
                			?>
                			<td style="text-align: center;">
                				<?php  

                				$jumlahpenilaian = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM elemen_project WHERE id_dimensi='$rdimensi[id_dimensi]' AND id_project='$_GET[p]'"));

                				$jumlahnilai = mysqli_fetch_array(mysqli_query($mysqli,"SELECT SUM(nilai) AS jumlahnilai FROM penilaian_project WHERE id_project='$_GET[p]' AND id_dimensi='$rdimensi[id_dimensi]' AND id_siswa='$row[id_siswa]'"));

                				$rerata = round($jumlahnilai['jumlahnilai'] / $jumlahpenilaian);

                				if ($rerata <= 1 && $rerata < 2 ) {
                					echo "BB";
                				}elseif($rerata >= 2 && $rerata < 3){
                					echo "MB";
                				}elseif($rerata >=3 && $rerata < 4){
                					echo "BSH";
                				}
                				elseif($rerata >= 4 ){
                					echo "SB";
                				}
                				
                				?>
                			</td>
                			<?php }  ?>
                		</tr>
                		<?php } ?>
                		
                	</table>
               </div>
           </div>
       	  </div>
        </section><!-- /.content -->

        <?php  
        if (isset($_POST['simpannilaitujuan'])) {
        	$dimensi = $_POST['dimensi'];
        	$subelemen = $_POST['subelemen'];
        	$siswa = $_POST['siswa'];
        	$nilai = $_POST['nilai'];
        	$idelemenproject = $_POST['idelemenproject'];

        	$ambilelemen = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sub_elemen WHERE id_sub_elemen='$subelemen'"));
        	$test = $ambilelemen['id_elemen'];
        	
        	$jumlahdata = count($nilai);
        	for ($i=0; $i <$jumlahdata ; $i++) { 

        		$cekdata = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM penilaian_project WHERE id_project='$_GET[p]' AND id_dimensi='$dimensi' AND id_elemen='$test' AND id_sub_elemen='$subelemen' AND id_siswa='$siswa[$i]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'"));

        		if ($cekdata > 0) {
        			$simpan = mysqli_query($mysqli,"UPDATE penilaian_project SET nilai='$nilai[$i]' WHERE id_project='$_GET[p]' AND id_dimensi='$dimensi' AND id_elemen='$test' AND id_sub_elemen='$subelemen' AND id_siswa='$siswa[$i]'");
        		}else{
        		
        			$simpan = mysqli_query($mysqli,"INSERT INTO penilaian_project (tahun, semester, id_project, id_dimensi, id_elemen, id_sub_elemen, id_siswa, nilai)VALUES('$sekolah[tahun]', '$sekolah[semester]', '$_GET[p]', '$dimensi', '$test', '$subelemen', '$siswa[$i]', '$nilai[$i]')");
        		}

        	}
        	if ($simpan) {
        		?>
        		<script type="text/javascript">
        		alert('Berhasil');
        		window.location.href="?page=penilaian-project&s=<?php echo $_GET[s] ?>&p=<?php echo $_GET[p] ?>";
        		</script>
        		<?php
        	}
        }
        ?>
        
        <?php
        if(isset($_POST['simpancatatan'])){
            $catatan = $_POST['catatan'];
            $siswa = $_POST['id_siswa'];
            
            $jumlah = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM catatan_proses WHERE id_siswa='$siswa' AND id_project='$_GET[p]'"));
            if($jumlah > 0){
                $update = mysqli_query($mysqli,"UPDATE catatan_proses SET catatan='$catatan' WHERE id_siswa='$siswa' AND id_project='$_GET[p]'");
                if($update){
                    ?>
            		<script type="text/javascript">
            		alert('Berhasil');
            		window.location.href="?page=penilaian-project&s=<?php echo $_GET['s'] ?>&p=<?php echo $_GET['p'] ?>";
            		</script>
            		<?php
                }
            }else{
                $update = mysqli_query($mysqli,"INSERT INTO catatan_proses (id_project, id_siswa, catatan)VALUES('$_GET[p]', '$siswa', '$catatan')");
                if($update){
                    ?>
            		<script type="text/javascript">
            		alert('Berhasil');
            		window.location.href="?page=penilaian-project&s=<?php echo $_GET['s'] ?>&p=<?php echo $_GET['p'] ?>";
            		</script>
            		<?php
                }
            }
        }
        ?>
        	

<?php } ?>
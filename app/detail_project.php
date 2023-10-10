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

	$kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_guru='$guru[id_guru]' "));

	$project = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM project WHERE id_project='$_GET[p]' "));
  	


  	
?>
		<section class="content-header">
          <h1>
            Project Kelas <?php echo $kelas['nama_kelas'] ?> [<?php echo $project['nama_project'] ?>]
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="?page=project&kode_sekolah=<?php echo $_GET[s] ?>"><i class="fa fa-home"></i> Project</a></li>
            <li class="active"><?php echo $project['nama_project'] ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Daftar Elemen dan Sub Elemen</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	<p>
                		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tambah Dimensi</button>
                	</p>
                	<div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    
                    <?php  
                    $nomor=1;
                    $dimensi = mysqli_query($mysqli,"SELECT * FROM dimensi_project 
                    WHERE id_project='$_GET[p]' ORDER BY id_dimensi ASC");
                    while ($rowdimensi = mysqli_fetch_array($dimensi)) {
                    	$datadimensi = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM dimensi WHERE id_dimensi='$rowdimensi[id_dimensi]'"));
                    ?>

                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $rowdimensi[id_dimensi]?>">
                            <?php echo $datadimensi['dimensi'] ?>
                          </a>

                        </h4>
                      </div>
                      <div id="collapseOne<?php echo $rowdimensi[id_dimensi]?>" class="panel-collapse collapse in">
                        <div class="box-body">
                          <p>
                          	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?php echo $rowdimensi[id_dimensi]?>">Tambah Elemen dan Sub Elemen</button>
                          	
                          	<a href="?page=hapus-dimensi-project&s=<?php echo $_GET[s] ?>&p=<?php echo $_GET[p] ?>&d=<?php echo $rowdimensi[id_dimensi] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus Dimensi ini?')"> Hapus Dimensi</a>
                          </p>
                          <table class="table table-striped table-bordered" style="font-size: 11px;">
                          	<tr style="background-color: orange; color: white;">
                          		<td style="text-align: center;">No</td>
                          		<td style="text-align: center;">Elemen</td>
                          		<td style="text-align: center;">Sub Elemen</td>
                          		<td style="text-align: center;">Capaian Diakhir Fase</td>
                          		<td style="text-align: center;">Aksi</td>
                          	</tr>
                          	<?php  
                          	$n = 1;
                          	$elemenp = mysqli_query($mysqli,"SELECT * FROM elemen_project WHERE id_project='$_GET[p]' AND id_dimensi='$rowdimensi[id_dimensi]' ORDER BY id_dimensi ASC");

                          	while ($rowelemenp = mysqli_fetch_array($elemenp)) {
                          		$elemen = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM elemen WHERE id_elemen='$rowelemenp[id_elemen]'"));
                          		$subelemen = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sub_elemen WHERE id_sub_elemen='$rowelemenp[id_sub_elemen]'"));
                          		$capaian = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM capaian WHERE id_sub_elemen='$rowelemenp[id_sub_elemen]' AND id_elemen='$rowelemenp[id_elemen]' AND id_materi='$rowelemenp[id_dimensi]'"));
                          	?>
                          	<tr>
                          		<td style="text-align: center;"><?php echo $n++ ?></td>
                          		<td style="text-align: left;"><?php echo $elemen['elemen'] ?></td>
                          		<td style="text-align: left;"><?php echo $subelemen['sub_elemen'] ?></td>

                          		<td style="text-align: left;"><?php echo $capaian['capaian'] ?></td>

                          		<td style="text-align: center;">
                          			<a href="?page=hapus-elemen&s=<?php echo $_GET[s] ?>&p=<?php echo $_GET[p] ?>&ep=<?php echo $rowelemenp[id_elemen_project] ?>" class="btn btn-primary btn-xs" onclick="return confirm('Yakin akan menghapus Sub Elemen ini?')"> Hapus</a>
                          		</td>
                          	</tr>
                          	<?php } ?>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="myModal<?php echo $rowdimensi[id_dimensi]?>" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
								    <div class="modal-header bg-green">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Form Tambah Elemen dan Subelemen</h4>
								    </div>
								<form method="POST">
								<div class="modal-body" style="font-size: 11px;">
									<input type="hidden" name="id_dimensi" value="<?php echo $rowdimensi[id_dimensi] ?>">

									<select name="id_sub_elemen" class="form-control input-sm" required="">
									<option value="" required="">Pilih Sub Elemen</option>	
									<?php  
									$sbelemen = mysqli_query($mysqli,"SELECT * FROM sub_elemen 
									WHERE id_dimensi='$rowdimensi[id_dimensi]' ORDER BY id_sub_elemen ASC");
									while ($rowsb = mysqli_fetch_array($sbelemen)) {
										$elemen = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM elemen WHERE id_elemen='$rowsb[id_elemen]'"));
									?>
									<option value="<?php echo $rowsb[id_sub_elemen] ?>">Elemen : <?php echo $elemen['elemen'] ?> - Subelemen : <?php echo $rowsb['sub_elemen'] ?></option>
									<?php } ?>
									</select>

								<div class="modal-footer">  
								    <button type="submit" name="simpansubelemen" class="btn btn-success">Update</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
								</form>
							</div>
						  </div>
						</div>
						</div>
                    <?php } ?>
                  </div>
               </div>
           </div>
       	  </div>
        </section><!-- /.content -->
        <div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
				    <div class="modal-header bg-green">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Form Tambah Project</h4>
				    </div>
				<form method="POST">
				<div class="modal-body" style="font-size: 11px;">
				<div class="form-group">
					<label>Pilih Dimensi</label>
					<select name="id_dimensi" class="form-control input-sm" required="">
						<option value="" required="">Pilih Dimensi</option>
						<?php  
						$no=1;
						$dimensi = mysqli_query($mysqli,"SELECT * FROM dimensi ORDER BY id_dimensi ASC");
						while ($rdimensi = mysqli_fetch_array($dimensi)) {
						?>
						<option value="<?php echo $rdimensi['id_dimensi'] ?>"><?php echo $no++ ?>. <?php echo $rdimensi['dimensi'] ?></option>
						<?php } ?>
					</select>
				</div>
				

				<div class="modal-footer">  
				    <button type="submit" name="simpandimensi" class="btn btn-success">Update</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
				</form>
			</div>
		  </div>
		</div>
		</div>

		<?php  
		if (isset($_POST['simpandimensi'])) {
			$dimensi = $_POST['id_dimensi'];

			$simpandata = mysqli_query($mysqli,"INSERT INTO dimensi_project (id_project, id_dimensi)VALUES('$_GET[p]', '$dimensi')");

			if ($simpandata) {
				?>
				<script type="text/javascript">
					alert('Berhasil menambahkan Dimensi Project <?php echo $project[nama_project] ?>');
					window.location.href="?page=detail-project&s=<?php echo $_GET['s'] ?>&p=<?php echo $_GET['p'] ?>";
				</script>
				<?php
			}
		}
		?>

		<?php  
		if (isset($_POST['simpansubelemen'])) {
			$subelemen = $_POST['id_sub_elemen'];
			$dimensi = $_POST['id_dimensi'];

			$ambildata = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sub_elemen WHERE id_sub_elemen='$subelemen'"));

			$simpandata = mysqli_query($mysqli,"INSERT INTO elemen_project (id_project, id_dimensi, id_elemen, id_sub_elemen)VALUES('$_GET[p]', '$dimensi','$ambildata[id_elemen]','$subelemen')");

			if ($simpandata) {
				?>
				<script type="text/javascript">
					alert('Berhasil menambahkan Sub Elemen Project <?php echo $project[nama_project] ?>');
					window.location.href="?page=detail-project&s=<?php echo $_GET['s'] ?>&p=<?php echo $_GET['p'] ?>";
				</script>
				<?php
			}
		}
		?>


<?php } ?>
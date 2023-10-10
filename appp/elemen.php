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
	$dimensi = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM dimensi WHERE id_dimensi='$_GET[p]'"));
?>


		<section class="content-header">
          <h1>
            <?php echo $dimensi['dimensi'] ?>
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="?page=profil-pancasila&s=<?php echo $_GET['s'] ?>"><i class="fa fa-home"></i> Dimensi</a></li>
            <li class="active">Elemen</li>
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

                	<div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->

                    <?php  
                    $no = 1;
                    $elemen = mysqli_query($mysqli,"SELECT * FROM elemen WHERE id_dimensi='$_GET[p]' ORDER BY id_elemen ASC");
                    while ($rowelemen = mysqli_fetch_array($elemen)) {
                    ?>
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $rowelemen['id_elemen']?>">
                            <?php echo $no++ ?>. <?php echo $rowelemen['elemen'] ?>
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne<?php echo $rowelemen['id_elemen']?>" class="panel-collapse collapse in">
                        <div class="box-body">
                          <table class="table table-striped table-bordered" style="font-size: 10px;">
                          	<tr>
                          		<td style="text-align: center;">No</td>
                          		<td style="text-align: center;">Sub Elemen</td>
                          		<?php  
                          		$fase = mysqli_query($mysqli,"SELECT * FROM fase WHERE id_jenjang='$lembaga[jenjang]' ORDER BY id_fase ASC");
                          		while ($rowfase = mysqli_fetch_array($fase)) {
                          		?>
                          		<td style="text-align: center;"><?php echo $rowfase['fase'] ?></td>
                          		<?php } ?>
                          	</tr>
                          	<?php  
                          	$nomor=1;
                          	$subelemen = mysqli_query($mysqli,"SELECT * FROM sub_elemen WHERE id_elemen='$rowelemen[id_elemen]' ORDER BY id_sub_elemen ASC");
                          	while ($rowsubelemen = mysqli_fetch_array($subelemen)) {
                          	?>
                          	<tr>
                          		<td style="text-align: center;"><?php echo $nomor++ ?></td>
                          		<td><?php echo $rowsubelemen['sub_elemen'] ?></td>
                          		<?php  
                          		$fase = mysqli_query($mysqli,"SELECT * FROM fase WHERE id_jenjang='$lembaga[jenjang]' ORDER BY id_fase ASC");
                          		while ($rowfase = mysqli_fetch_array($fase)) {
                          			$capaian = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM capaian WHERE id_fase='$rowfase[id_fase]' AND id_sub_elemen='$rowsubelemen[id_sub_elemen]' AND id_elemen='$rowelemen[id_elemen]' AND id_materi='$_GET[p]'"));
                          		?>
                          		<td style="text-align: left;"><?php echo $capaian['capaian'] ?></td>
                          		<?php } ?>
                          	</tr>
                          	<?php } ?>
                          </table>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>

               	</div>
               </div>
           </div>
       	  </div>
        </section><!-- /.content -->
        	<div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header bg-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Tambah Guru</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST">
                    <input type="hidden" name="kode" value="<?php echo $kode ?>">
                    <input type="hidden" name="kodeguru" value="<?php echo $lembaga[npsn]?><?php echo $kodeguru ?>">
                    	<div class="form-group">
                          <label>Nama Guru</label>
                          <input type="text" name="nama_guru" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan Nama Guru">
                        </div>
                        <div class="form-group">
                          <label>NIP</label>
                          <input type="text" name="nip" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan Nama Guru">
                        </div>


                        <div class="form-group">
                          <label>Penugasan</label>
                          <select name="penugasan" class="form-control input-sm" required="">
                          	<option value="" required="">Pilih Penugasan</option>
                          	<option value="1">Guru Kelas</option>
                          	<option value="2">Guru Mata Pelajaran</option>
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
            	$nama = $_POST['nama_guru'];
            	$nip = $_POST['nip'];
            	$kelas = $_POST['id_kelas'];
            	$tugas = $_POST['penugasan'];
            	$username = $_POST['kode'];
            	$pass = $_POST['kode'];
            	$password = password_hash($pass, PASSWORD_DEFAULT);

            	$query = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM guru WHERE nama_guru='$nama' AND nip='$nip'"));
            	if ($query > 0) {
            		?>
            		<script type="text/javascript">
            			alert('Guru ini sudah ada!');
            			window.location.href="?page=pendidik&s=<?php echo $_GET['s'] ?>";
            		</script>
            		<?php
            	}else{
            		$insert = mysqli_query($mysqli,"INSERT INTO guru (kode_guru, kode_sekolah, nama_guru, nip, username, pass, password, penugasan)VALUES('$_POST[kodeguru]', '$_GET[s]', '$nama', '$nip', '$username', '$pass', '$password', '$tugas')");
            		if ($insert) {
            			?>
	            		<script type="text/javascript">
	            			alert('<?php echo $nama ?> Berhasil ditambahkan');
	            			window.location.href="?page=pendidik&s=<?php echo $_GET['s'] ?>";
	            		</script>
	            		<?php
            		}else{
            			?>
	            		<script type="text/javascript">
	            			alert('<?php echo $nama ?> Gagal ditambahkan');
	            			window.location.href="?page=pendidik&s=<?php echo $_GET['s'] ?>";
	            		</script>
	            		<?php
            		}
            	}
            }
            ?>

            <?php  
            if (isset($_POST['simpandataedit'])) {
            	$nama = $_POST['nama_guru'];
            	$nip = $_POST['nip']; 	           	
            	$tugas = $_POST['penugasan'];

            		$insert = mysqli_query($mysqli,"UPDATE guru SET nama_guru='$nama', nip='$nip', penugasan='$tugas' WHERE id_guru='$_POST[id_guru]' AND kode_sekolah='$_GET[s]'");
            		if ($insert) {
            			?>
	            		<script type="text/javascript">
	            			alert('<?php echo $nama ?> Berhasil diperbaharui');
	            			window.location.href="?page=pendidik&s=<?php echo $_GET['s'] ?>";
	            		</script>
	            		<?php
            		}else{
            			?>
	            		<script type="text/javascript">
	            			alert('<?php echo $nama ?> Gagal diperbaharui');
	            			window.location.href="?page=pendidik&s=<?php echo $_GET['s'] ?>";
	            		</script>
	            		<?php
            		}
            }
            ?>


<?php } ?>
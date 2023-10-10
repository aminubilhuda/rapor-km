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
?>
		<section class="content-header">
          <h1>
            Ketenagaan
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Pendidik</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Daftar Pendidik</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <p>
                  	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Tambah Pendidik</button>
                  </p>
                  <table class="table table-bordered" style="font-size: 11px;">
                    <tr style="background-color: orange;">
                      <td style="text-align: center; color: white;">No</td>
                      <td style="text-align: center; color: white;">Nama Guru</td>
                      <td style="text-align: center; color: white;">NIP</td>
                      <td style="text-align: center; color: white;">Username</td>
                      <td style="text-align: center; color: white;">Password</td>
                      <td style="text-align: center; color: white;">Penugasan</td>
                      <td style="text-align: center; color: white;">Aksi</td>
                    </tr>
                    <?php  
                    $nomor = 1;
                    $guru = mysqli_query($mysqli,"SELECT * FROM guru 
                    WHERE kode_sekolah='$_GET[s]'
                    ORDER BY id_guru ASC");
                    while ($rowguru = mysqli_fetch_array($guru)) {
                    	if ($rowguru['penugasan']==1) {
                    		$tugas = "Guru Kelas";
                    	}else{
                    		$tugas = "Guru Mata Pelajaran";
                    	}
                    ?>
                    <tr>
                    	<td style="text-align: center;"><?php echo $nomor++ ?></td>
                    	<td style="text-align: left;"><?php echo $rowguru['nama_guru'] ?></td>
                    	<td style="text-align: center;"><?php echo $rowguru['nip'] ?></td>
                    	<td style="text-align: center;"><?php echo $rowguru['kode_guru'] ?></td>
                    	<td style="text-align: center;"><?php echo $rowguru['pass'] ?></td>
                    	<td style="text-align: center;"><?php echo $tugas ?></td>
                    	<td style="text-align: center;">
                    		<a href="../assets/app/doc/akun_pendidik.php?s=<?php echo $_GET[s] ?>&i=<?php echo $rowguru[id_guru] ?>" target="_blank" class="btn btn-primary btn-xs"> Cetak Akun</a>
                    		<a href="" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal<?php echo $rowguru[id_guru]?>"> Edit Akun</a>
                        <a href="?page=hapus-guru&s=<?php echo $_GET['s'] ?>&i=<?php echo $rowguru['id_guru'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan menghapus guru ini?')"> Hapus</a>
                    	</td>
                   <div class="modal fade" id="myModal<?php echo $rowguru[id_guru]?>" role="dialog">
			              <div class="modal-dialog">
			                <!-- Modal content-->
			                <div class="modal-content">
			                  <div class="modal-header bg-green">
			                    <button type="button" class="close" data-dismiss="modal">&times;</button>
			                    <h4 class="modal-title">Form Edit Guru</h4>
			                  </div>
			                  <div class="modal-body">
			                    <form method="POST">
			                    <input type="hidden" name="id_guru" value="<?php echo $rowguru[id_guru] ?>">
			                    	<div class="form-group">
			                          <label>Nama Guru</label>
			                          <input type="text" name="nama_guru" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan Nama Guru" value="<?php echo $rowguru['nama_guru'] ?>">
			                        </div>
			                        <div class="form-group">
			                          <label>NIP</label>
			                          <input type="text" name="nip" class="form-control input-sm" required="" autocomplete="off" placeholder="Isikan NIP Guru" value="<?php echo $rowguru['nip'] ?>">
			                        </div>


			                        <div class="form-group">
			                          <label>Penugasan</label>
			                          <select name="penugasan" class="form-control input-sm" required="">
			                          	<option value="" required="">Pilih Penugasan</option>
			                          	<option value="1" <?php if($rowguru['penugasan']==1){echo "selected";}?>>Guru Kelas</option>
			                          	<option value="2" <?php if($rowguru['penugasan']==2){echo "selected";}?>>Guru Mata Pelajaran</option>
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
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

  	$kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_guru='$guru[id_guru]'"));
?>
		<section class="content-header">
          <h1>
            Profille Ku
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-hode"></i> Home</a></li>
            <li class="active">Profile Ku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Identitas Merdeka Belajar</h3>
                </div><!-- /.box-header -->
                <form method="POST">
                <div class="box-body">
                  
                  <div class="form-group">
                  	<label>Nama Pendidik</label>
                  	<input type="text" name="nama_guru" class="form-control input-sm" required="" autocomplete="off" value="<?php echo $guru['nama_guru'] ?>" readonly="">
                  </div>
                  <div class="form-group">
                  	<label>NIP Pendidik</label>
                  	<input type="text" name="nip" class="form-control input-sm" required="" autocomplete="off" value="<?php echo $guru['nip'] ?>">
                  </div>
                  <div class="form-group">
                  	<label>Password</label>
                  	<input type="text" name="pass" class="form-control input-sm" required="" autocomplete="off" value="<?php echo $guru['pass'] ?>">
                  </div>
                  <div class="box-footer">
                  	<button type="submit" name="changepassword" class="btn btn-warning btn-sm">Simpan Perubahan</button>
                  </div>
               	</div>
               	</form>
               </div>
           </div>
       	  </div>
        </section><!-- /.content -->
        	
            <?php  
            if (isset($_POST['changepassword'])) {
            	$nip = $_POST['nip'];
            	$pass = $_POST['pass'];
            	$password = password_hash($pass, PASSWORD_DEFAULT);
            		$insert = mysqli_query($mysqli,"UPDATE guru SET nip='$nip', pass='$pass', password='$password' WHERE kode_sekolah='$guru[kode_sekolah]' AND id_guru='$guru[id_guru]'");
            		if ($insert) {
            			?>
	            		<script type="text/javascript">
	            			alert('Password Berhasil diperbaharui, Silahkan Login Kembali dengan password yang baru');
	            			window.location.href="logout.php";
	            		</script>
	            		<?php
            		}else{
            			?>
	            		<script type="text/javascript">
	            			alert('Password gagal diperbaharui. Ulangi lagi');
	            			window.location.href="?page=profile&s=<?php echo $_GET['s'] ?>&p=<?php echo md5($guru[id_guru]) ?>";
	            		</script>
	            		<?php
            		}
            	
            }
            ?>

<?php } ?>
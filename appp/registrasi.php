<?php  
	include "../config/function_antiinjection.php";
	include "../config/koneksi.php";
	include "../config/kode.php";
	$username = $kode;

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>REGISTRASI SEKOLAH MERDEKA BELAJAR</title>
    <link rel="icon" type="img/png" href="../assets/app/dist/img/logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.4 -->
    <link href="../assets/app/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../assets/app/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../assets/app/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
      	<p><img src="../assets/app/dist/img/logo.png" style="width: 22%;"></p>
        <a href="#"><b>REGISTRASI</b> SEKOLAH</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register Sekolah Merdeka Belajar</p>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="text" name="npsn" class="form-control" placeholder="NPSN" />
            <span class="glyphicon glyphicon-cog form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah" />
            <span class="glyphicon glyphicon-book form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email Aktif Sekolah" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          
          <div class="form-group has-feedback">
            <input type="text" name="no_telepon" class="form-control" placeholder="Kontak" />
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>
          
          <div class="row">
            
            <div class="col-xs-12">
              <button type="submit" name="registrasi" class="btn btn-primary btn-block btn-flat">Registrasi</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="login.php" class="text-center">I already have a membership</a>
        </div>

        <?php  
        if (isset($_POST['registrasi'])) {
        	$npsn = $_POST['npsn'];
        	$sekolah = $_POST['nama_sekolah'];
        	$email = $_POST['email'];
        	$telepon = $_POST['no_telepon'];
        	$pass = $_POST['npsn'];
        	$password = password_hash($pass, PASSWORD_DEFAULT);
        	$kodesekolah = md5($npsn);

        	$query = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM sekolah WHERE npsn='$npsn' or nama_sekolah='$sekolah' or email='$email'"));
        	if ($query > 0) {
        		?>
        		<script type="text/javascript">
        		alert('NPSN atau Nama Sekolah, atau Email yang anda masukkan sudah terdaftar!');
        		window.location.href="login.php";
        		</script>
        		<?php
        	}else{
        		$reg = mysqli_query($mysqli,"INSERT INTO sekolah (kode_sekolah, npsn, nama_sekolah, email, no_telepon, username, pass, password, aktif)VALUES('$kodesekolah', '$npsn', '$sekolah', '$email', '$telepon', '$npsn', '$pass', '$password','1')");
        		if ($reg) { 
        			?>
        			<script type="text/javascript">
        				alert('Registrasi Berhasil, Silahkan Login dengan Menggunakan NPSN yang anda daftarkan!');
        				window.location.href="login.php";
        			</script>
        			<?php
        		}else{
        			?>
        			<script type="text/javascript">
        				alert('Registrasi Gagal, Silahkan Cek kembali isian anda. Lakukan Sekali lagi.');
        				window.location.href="registrasi.php";
        			</script>
        			<?php
        		}
        	}

        }
        ?>

        
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../assets/app/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../assets/app/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../assets/app/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    
  </body>
</html>

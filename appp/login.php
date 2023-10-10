<?php  
	include "../config/function_antiinjection.php";
	include "../config/koneksi.php";
	include "../config/kode.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>LOGIN APLIKASI RAPOR MERDEKA BELAJAR</title>
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
  <body class="login-page" style="
  font-family: 'Inter', sans-serif;
            /* background-color: #f1f1f1; */
            background-image: url('https://cdn.siap.id/s3/UI-UX/bg-login-kemendikbud-white2.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top;
            background-attachment: fixed;

  ">
    <div class="login-box">
      <div class="login-logo">
      	<p><img src="../assets/app/dist/img/DINAS.png" style="width: 22%;"></p>
        <a href="#"><b>Merdeka</b> Belajar</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Login Operator Sekolah</p>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="username" name="username" required="" class="form-control" placeholder="Username" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            
            <div class="col-xs-12">
              <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Login Aplikasi</button>
            </div><!-- /.col -->
          </div>
        </form>
        <div class="social-auth-links text-center">
          <p style="font-size: 11px;"> Atau Registrasi jika sekolah anda belum terdaftar!</p>
          
          <a href="/RaportSDSMPSMA" class="btn btn-warning btn-block btn-flat">Kembali</a>
        </div><!-- /.social-auth-links -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <?php  
    if (isset($_POST['login'])) {
    	$username = $_POST['username'];
    	$password = $_POST['password'];

    	$query = mysqli_query($mysqli,"SELECT * FROM sekolah WHERE username='$username' AND aktif='1'");
    	if (mysqli_num_rows($query)) {
    		$datalogin = mysqli_fetch_array($query);
    		if (password_verify($password, $datalogin['password'])) {
    			session_start();
    			$_SESSION['username'] = $datalogin['username'];
    			$_SESSION['password'] = $datalogin['password'];

    			?>
    			<script type="text/javascript">
    				alert('Login Berhasil');
    				window.location.href="index.php";
    			</script>
    			<?php
    		}else{
    		?>
    		<script type="text/javascript">
    			alert('Password yang anda masukkan tidak Cocok, Lakukan Registrasi Terlebih dahulu! atau Silahkan Hubungi Admin Web untuk dilakukan Aprove Sekolah Anda');

    		</script>
    		<?php	
    		}
    	}else{
    		?>
    		<script type="text/javascript">
    			alert('Username yang anda masukkan tidak terdaftar, Lakukan Registrasi Terlebih dahulu!, atau Silahkan Hubungi Admin Web untuk dilakukan Aprove Sekolah Anda');

    		</script>
    		<?php
    	}

    }
    ?>

    <!-- jQuery 2.1.4 -->
    <script src="../assets/app/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../assets/app/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../assets/app/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    
  </body>
</html>

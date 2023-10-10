<?php  
session_start();
ob_start();
error_reporting(0);

if (empty($_SESSION['username']) or empty($_SESSION['password']) ) {
	?>
<script type="text/javascript">
alert('Anda Harus Login Terlebih Dahulu!');
window.location.href = "login.php";
</script>
<?php
}else{
	include "../config/function_antiinjection.php";
	include "../config/koneksi.php";
  include "../config/kode.php";
  include "../config/function_date.php";

	$lembaga = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sekolah WHERE username='$_SESSION[username]' AND password='$_SESSION[password]'"));

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>APLIKASI RAPOR MERDEKA BELAJAR</title>
    <link rel="icon" href="../assets/app/dist/img/logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="../assets/app/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../assets/app/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../assets/app/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="../assets/app/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-yellow sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>MA</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>MERDEKA</b> Belajar</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../assets/app/dist/img/logo.png" class="user-image" alt="User Image" />
                                <span class=""><?php echo $lembaga['nama_sekolah'] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../assets/app/dist/img/logo.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $lembaga['nama_sekolah'] ?> - Operator Sekolah <br>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="text-center">
                        <img src="../assets/app/dist/img/logo.png" class="img-circle" alt="User Image"
                            style="width: 40%;" /> <br>
                        <p style="color: white;"><?php echo $lembaga['nama_sekolah'] ?></p>
                    </div>

                </div>

                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview">
                        <a href="index.php">
                            <i class="fa fa-home"></i> <span>Dashboard</span>
                        </a>

                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Data Induk</span>
                            <span class="label label-primary pull-right">5</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="?page=sekolah&s=<?php echo $lembaga['kode_sekolah'] ?>"><i
                                        class="fa fa-circle-o"></i> Data Sekolah</a></li>
                            <li><a href="?page=pendidik&s=<?php echo $lembaga['kode_sekolah'] ?>"><i
                                        class="fa fa-circle-o"></i> Data Pendidik</a></li>
                            <li><a href="?page=siswa&s=<?php echo $lembaga['kode_sekolah'] ?>"><i
                                        class="fa fa-circle-o"></i> Data Siswa</a></li>
                            <li><a href="?page=kelas&s=<?php echo $lembaga['kode_sekolah'] ?>"><i
                                        class="fa fa-circle-o"></i> Data Kelas</a></li>
                            <li><a href="?page=mapel&s=<?php echo $lembaga['kode_sekolah'] ?>"><i
                                        class="fa fa-circle-o"></i> Data Mata Pelajaran</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=profil-pancasila&s=<?php echo $lembaga['kode_sekolah'] ?>">
                            <i class="fa fa-th"></i> <span>Profil Pancasila</span> <small
                                class="label pull-right bg-green">Hot</small>
                        </a>
                    </li>
                    <li>
                        <a href="?page=mutasi-keluar&s=<?php echo $lembaga['kode_sekolah'] ?>">
                            <i class="fa fa-sign-out"></i> <span>Mutasi Siswa</span>
                        </a>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="
      font-family: 'Inter', sans-serif;
            /* background-color: #f1f1f1; */
            background-image: url('https://cdn.siap.id/s3/UI-UX/bg-login-kemendikbud-white2.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top;
            background-attachment: fixed;

      ">
            <!-- Content Header (Page header) -->
            <?php  

        $page = $_GET['page'];

        if ($page=="") {
        	include "beranda.php";
        }
        if ($page=="kelas") {
        	include "kelas.php";
        }
        if ($page=="siswa") {
          include "siswa.php";
        }
        if ($page=="edit-siswa") {
          include "edit_siswa.php";
        }
        if ($page=="siswa-kelas") {
          include "siswa_kelas.php";
        }
        if ($page=="pendidik") {
          include "pendidik.php";
        }
        if ($page=="mapel") {
          include "mapel.php";
        }
        if ($page=="delete-mapel") {
          include "delete_mapel.php";
        }
        if ($page=="pembelajaran") {
          include "pembelajaran.php";
        }
        if ($page=="hapus-pembelajaran") {
          include "hapus_pembelajaran.php";
        }
        if ($page=="profil-pancasila") {
          include "profil_pancasila.php";
        }
        if ($page=="elemen") {
          include "elemen.php";
        }
        if ($page=="sekolah") {
          include "sekolah.php";
        }
        if ($page=="hapus-guru") {
          include "hapus_guru.php";
        }
        if ($page=="mutasi-keluar") {
          include "mutasi_keluar.php";
        }

        ?>
        </div><!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.2.0
            </div>
            <strong>Copyright &copy; 2022-2023 <a href="#">Ama Molan Bahy</a>.</strong> All rights reserved.
        </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->

    <script src="../assets/app/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../assets/app/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../assets/app/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../assets/app/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../assets/app/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/app/dist/js/demo.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="../assets/app/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../assets/app/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="../assets/app/plugins/select2/select2.full.min.js" type="text/javascript"></script>


    <script type="text/javascript">
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });


    $('#ceksemua').change(function() {
        $(this).parents('#tablereset:eq(0)').
        find(':checkbox').attr('checked', this.checked);
    });

    $('#select-all').click(function(event) {
        $(this).parents('#reset:eq(0)').
        find(':checkbox').attr('checked', this.checked);
    });
    </script>
</body>

</html>



<?php } ?>
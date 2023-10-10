<?php  
session_start();
ob_start();
error_reporting(0);

if (empty($_SESSION['kode_guru']) or empty($_SESSION['password']) or empty($_SESSION['tugas'])) {
	?>
	<script type="text/javascript">
	alert('Anda Harus Login Terlebih Dahulu!');
	window.location.href="login.php";
	</script>
	<?php
}else{
	include "../config/function_antiinjection.php";
	include "../config/koneksi.php";

  $guru = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM guru WHERE kode_guru='$_SESSION[kode_guru]' AND password='$_SESSION[password]'"));

  $sekolah = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sekolah WHERE kode_sekolah='$guru[kode_sekolah]'"));

  $jumlahmapelkelas = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM mapel_kelas 
                WHERE id_guru='$guru[id_guru]' "));

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>APLIKASI RAPOR MERDEKA BELAJAR</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" type="img/png" href="../assets/app/dist/img/logo.png">
    <!-- Bootstrap 3.3.4 -->
    <link href="../assets/app/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../assets/app/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="../assets/app/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
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
                <a href="logout.php" class="dropdown-toggle" >
                  <img src="../assets/app/dist/img/logo.png" class="user-image" alt="User Image" />
                  <span class=""><?php echo $guru['nama_guru'] ?></span>
                </a>
                
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
              <img src="../assets/app/dist/img/logo.png" style="width: 25%;" alt="User Image" />
              <br>
              <a href="?page=profile&s=<?php echo $guru[kode_sekolah] ?>&p=<?php echo md5($guru[id_guru]) ?>">
              <p style="color: white;"><?php echo $guru['nama_guru'] ?> <br> [
                <?php  if($guru['penugasan']==1){ 
                  $kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE kode_sekolah='$guru[kode_sekolah]' AND id_guru='$guru[id_guru]'"));
                  echo "Guru Kelas : ".$kelas['nama_kelas'];
                }else{
                  echo "Guru Mata Pelajaran";
                }?>


              ]</p>
              </a>
            </div>
            
          </div>
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="index.php">
                <i class="fa fa-home"></i> <span>Dashboard</span> 
              </a>
            </li>
            <?php if($_SESSION['tugas']==1){ ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Data Kelas</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="?page=siswa-kelas&kode_sekolah=<?php echo $guru[kode_sekolah] ?>"><i class="fa fa-circle-o"></i> Siswa Kelas</a></li>
                <li><a href="?page=absensi-ekstra&s=<?php echo $guru[kode_sekolah] ?>"><i class="fa fa-circle-o"></i> Absensi + Ekstra </a></li>
                <li><a href="?page=project&kode_sekolah=<?php echo $guru[kode_sekolah] ?>"><i class="fa fa-circle-o"></i> Project</a></li>
              </ul>
            </li>
            <?php } ?>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Mapel Ampuhku</span>
                <span class="label label-primary pull-right"><?php echo $jumlahmapelkelas ?></span>
              </a>
              <ul class="treeview-menu">
                <?php
                $mapelkelas = mysqli_query($mysqli,"SELECT * FROM mapel_kelas 
                JOIN mapel ON mapel_kelas.id_mapel = mapel.id_mapel
                WHERE id_guru='$guru[id_guru]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' ORDER BY id_kelas ASC");
                while ($rowmapelkelas = mysqli_fetch_array($mapelkelas)) {
                  $kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_kelas='$rowmapelkelas[id_kelas]'"));
                ?>
                <li><a href="?page=mapel&s=<?php echo $guru[kode_sekolah] ?>&ml=<?php echo $rowmapelkelas[id_mapel_kelas] ?>"><i class="fa fa-circle-o"></i> <?php echo $rowmapelkelas['smapel'] ?> - Kelas <?php echo $kelas['nama_kelas'] ?></a></li>
                <?php } ?>
                
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-database"></i> <span>Penilaian</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Formatif [PH] <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <?php
                    $mapelkelas = mysqli_query($mysqli,"SELECT * FROM mapel_kelas 
                    JOIN mapel ON mapel_kelas.id_mapel = mapel.id_mapel
                    WHERE id_guru='$guru[id_guru]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' ORDER BY id_kelas ASC");
                    while ($rowmapelkelas = mysqli_fetch_array($mapelkelas)) {
                      $kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_kelas='$rowmapelkelas[id_kelas]'"));
                    ?>
                    <li><a href="?page=formatif&s=<?php echo $guru[kode_sekolah] ?>&ml=<?php echo $rowmapelkelas[id_mapel_kelas] ?>"><i class="fa fa-circle-o"></i> <?php echo $rowmapelkelas['smapel'] ?> - Kelas <?php echo $kelas['nama_kelas'] ?></a></li>
                    <?php } ?>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Sumatif MID <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <?php
                      $mapelkelas = mysqli_query($mysqli,"SELECT * FROM mapel_kelas 
                      JOIN mapel ON mapel_kelas.id_mapel = mapel.id_mapel
                      WHERE id_guru='$guru[id_guru]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' ORDER BY id_kelas ASC");
                      while ($rowmapelkelas = mysqli_fetch_array($mapelkelas)) {
                        $kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_kelas='$rowmapelkelas[id_kelas]'"));
                      ?>
                      <li><a href="?page=sumatif&s=<?php echo $guru[kode_sekolah] ?>&ml=<?php echo $rowmapelkelas[id_mapel_kelas] ?>"><i class="fa fa-circle-o"></i> <?php echo $rowmapelkelas['smapel'] ?> - Kelas <?php echo $kelas['nama_kelas'] ?></a></li>
                      <?php } ?>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Sumatif [Semester] <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <?php
                    $mapelkelas = mysqli_query($mysqli,"SELECT * FROM mapel_kelas 
                    JOIN mapel ON mapel_kelas.id_mapel = mapel.id_mapel
                    WHERE id_guru='$guru[id_guru]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' ORDER BY id_kelas ASC");
                    while ($rowmapelkelas = mysqli_fetch_array($mapelkelas)) {
                      $kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_kelas='$rowmapelkelas[id_kelas]'"));
                    ?>
                    <li><a href="?page=psas&s=<?php echo $guru[kode_sekolah] ?>&ml=<?php echo $rowmapelkelas[id_mapel_kelas] ?>"><i class="fa fa-circle-o"></i> <?php echo $rowmapelkelas['smapel'] ?> - Kelas <?php echo $kelas['nama_kelas'] ?></a></li>
                    <?php } ?>
                  </ul>
                </li>
                
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-key"></i> <span>Lager Nilai</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php
                $mapelkelas = mysqli_query($mysqli,"SELECT * FROM mapel_kelas 
                JOIN mapel ON mapel_kelas.id_mapel = mapel.id_mapel
                WHERE id_guru='$guru[id_guru]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' ORDER BY id_kelas ASC");
                while ($rowmapelkelas = mysqli_fetch_array($mapelkelas)) {
                  $kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_kelas='$rowmapelkelas[id_kelas]'"));
                ?>
                <li><a href="?page=lager-mapel&s=<?php echo $guru[kode_sekolah] ?>&ml=<?php echo $rowmapelkelas[id_mapel_kelas] ?>"><i class="fa fa-circle-o"></i> <?php echo $rowmapelkelas['smapel'] ?> - Kelas <?php echo $kelas['nama_kelas'] ?></a></li>
                <?php } ?>
                <?php if($guru['penugasan']==1){ ?>
                <li><a href="?page=lager-kelas&s=<?php echo $guru[kode_sekolah] ?>"><i class="fa fa-circle-o"></i> Lager Nilai Kelas</a></li>
                <?php } ?>
              </ul>
              <?php if($guru['penugasan']==1){ ?>
              <li><a href="?page=laporan_pendidikan&s=<?php echo $guru[kode_sekolah] ?>"><i class="fa fa-book"></i> <span>Laporan Pendidikan</span></a></li>
              <?php } ?>

            </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php  
        $page = $_GET['page'];
        if ($page == "") {
          include "beranda.php";
        }
        if ($page == "profile") {
          include "profile.php";
        }
        if ($page == "siswa-kelas") {
          include "siswa_kelas.php";
        }
        if ($page == "detail_siswa") {
          include "detail_siswa.php";
        }
        if ($page == "mapel") {
          include "mapel_ampuhku.php";
        }
        if ($page == "absensi-ekstra") {
          include "absensi_ekstra.php";
        }
        if ($page == "formatif") {
          include "formatif.php";
        }
        if ($page == "sumatif") {
          include "sumatif.php";
        }
        if ($page == "psas") {
          include "sumatif_akhir_semester.php";
        }
        if ($page == "lager-mapel") {
          include "lager_mata_pelajaran.php";
        }
        if ($page == "lager-kelas") {
          include "lager_nilai_kelas.php";
        }
        if ($page == "laporan_pendidikan") {
          include "laporan_pendidikan.php";
        }
        if ($page == "project") {
          include "project.php";
        }
        if ($page == "detail-project") {
          include "detail_project.php";
        }
        if ($page == "penilaian-project") {
          include "penilaian_project.php";
        }
        if ($page == "hapus-dimensi-project") {
          include "hapus_dimensi.php";
        }
        if ($page == "hapus-tujuan") {
          include "hapus_tujuan.php";
        }
        if ($page == "hapus-materi") {
          include "hapus_materi.php";
        }
        if ($page == "delete-project") {
          include "delete_project.php";
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
    
    <script type="text/javascript">
    $("#datacp").change(function(){
        var id_cp = $("#datacp").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "cari_tp.php",
            data: "idcp="+id_cp,
            success: function(msg){
                if(msg == ''){
                    
                }
                else{
                    $("#datatp").html(msg);                                     
                }
            }
        });    
    });
  </script>

  </body>
</html>



<?php } ?>
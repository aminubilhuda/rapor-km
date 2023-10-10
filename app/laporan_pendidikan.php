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
	$kelaswali = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_guru='$guru[id_guru]'"));

?>
		<section class="content-header">
          <h1>
            Laporan Pendidikan <?php echo $kelaswali['nama_kelas'] ?>
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Laporan Pendidikan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Daftar Laporan</h3>
                </div><!-- /.box-header -->
                <form method="POST">
                <div class="box-body">
                	<table class="table table-striped table-bordered" style="font-size: 11px;">
                		<tr>
                			<td style="text-align: center;">No</td>
                			<td style="text-align: center;">Peserta Didik</td>
                			<td style="text-align: center;">Halaman Depan</td>
                			<td style="text-align: center;">Halaman Identitas</td>
                            <td style="text-align: center;">Halaman MID</td>
                			<td style="text-align: center;">Halaman Nilai</td>
                            <td style="text-align: center;">Halaman Project</td>

                			
                			
                		</tr>
                		<?php  
                		$nomor=1;
                		$siswakelas = mysqli_query($mysqli,"SELECT * FROM siswa_kelas
                		JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                		WHERE id_kelas='$kelaswali[id_kelas]' ORDER BY nama_siswa ASC");
                		while ($rowsiswa = mysqli_fetch_array($siswakelas)) {
                		?>
                		<tr>
                			<td style="text-align: center;"><?php echo $nomor++ ?></td>
                			<td style="text-align: left;"><?php echo $rowsiswa['nama_siswa'] ?></td>

                			<td style="text-align: center;">
                                <?php if($rowsiswa['nisn']==0){ ?>
                                <a href="?page=detail_siswa&s=<?php echo $_GET[s] ?>&i=<?php echo $rowsiswa['id_siswa'] ?>" class="btn btn-warning btn-xs"> Lengkapi Data</a>
                                <?php }else{ ?>
                				<a href="../assets/app/doc/halaman_depan.php?s=<?php echo $_GET[s] ?>&i=<?php echo $rowsiswa[id_siswa] ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Cetak</a>
                                <?php } ?>
                			</td>


                			<td style="text-align: center;">
                                <?php if(empty($rowsiswa['nisn'])){ ?>

                                    <a href="?page=detail_siswa&s=<?php echo $_GET['s'] ?>&i=<?php echo $rowsiswa['id_siswa'] ?>" class="btn btn-warning btn-xs"> Lengkapi Data</a>
                            
                                    <?php }else{ ?>
                				    <a href="../assets/app/doc/halaman_identitas.php?s=<?php echo $_GET['s'] ?>&i=<?php echo $rowsiswa['id_siswa'] ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Cetak</a>
                                    <?php } ?>
                			</td>
                            
                            <td style="text-align: center;">
                                <a href="../assets/app/doc/halaman_nilai_mid.php?s=<?php echo $_GET[s] ?>&i=<?php echo $rowsiswa['id_siswa'] ?>" target="_blank" class="btn btn-warning btn-xs"><i class="fa fa-print"></i> Cetak</a>
                            </td>

                			<td style="text-align: center;">
                				<a href="../assets/app/doc/halaman_nilai.php?s=<?php echo $_GET[s] ?>&i=<?php echo $rowsiswa['id_siswa'] ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Cetak</a>
                			</td>
                            <td style="text-align: center;">
                                <a href="../assets/app/doc/halaman_project.php?s=<?php echo $_GET[s] ?>&i=<?php echo $rowsiswa['id_siswa'] ?>" target="_blank" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Cetak</a>
                            </td>
                		</tr>
                		<?php } ?>
                		
                	</table>
               </div>
               </form>
           </div>
       	  </div>
        </section><!-- /.content -->
        	

<?php } ?>
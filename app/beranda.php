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



	$lembaga = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sekolah WHERE kode_sekolah='$guru[kode_sekolah]'"));

    $kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_guru='$guru[id_guru]'"));
?>


		<section class="content-header">
          <h1>
            Beranda Aplikasi
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Beranda Aplikasi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-university"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Jumlah Kelas</span>
                  <span class="info-box-number">
                      <?php  
                      echo 
                      $jumlahkelas = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM kelas WHERE kode_sekolah='$guru[kode_sekolah]'"));
                      ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="fa fa-graduation-cap"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Jumlah Siswa</span>
                  <span class="info-box-number">
                      <?php  
                      echo 
                      $jumlahsiswa = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM siswa_kelas WHERE kode_sekolah='$guru[kode_sekolah]' "));
                      ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Jumlah Pendidik</span>
                  <span class="info-box-number">
                      <?php  
                      echo 
                      $jumlahguru = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM guru WHERE kode_sekolah='$guru[kode_sekolah]'"));
                      ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-database"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Jumlah M. Pelajaran</span>
                  <span class="info-box-number">
                      <?php  
                      echo 
                      $jumlahmapel = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM mapel_kelas WHERE kode_sekolah='$guru[kode_sekolah]' "));
                      ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->


        </div>
        <div class="row">
        	<div class="col-md-6 col-sm-6 col-xs-12">
        		<div class="box">
                	<div class="box-header with-border bg-blue">
                  		<h3 class="box-title">Data Lembaga</h3>
                	</div><!-- /.box-header -->
                <div class="box-body">
        		<table class="table table-striped" style="font-size: 11px;">
        			<tr>
        				<td>NPSN</td>
        				<td>:</td>
        				<td><?php echo $lembaga['npsn'] ?></td>
        			</tr>
        			<tr>
        				<td>Nama Sekolah</td>
        				<td>:</td>
        				<td><?php echo $lembaga['nama_sekolah'] ?></td>
        			</tr>
        			<tr>
        				<td>Kepala Sekolah</td>
        				<td>:</td>
        				<td><?php echo $lembaga['kepala_sekolah'] ?></td>
        			</tr>
        			<tr>
        				<td>NIP Kepala Sekolah</td>
        				<td>:</td>
        				<td><?php echo $lembaga['nip_kepala_sekolah'] ?></td>
        			</tr>
                    <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?php echo $kelas['nama_kelas'] ?></td>
                    </tr>
                    <tr>
                        <td>Guru Kelas</td>
                        <td>:</td>
                        <td><?php echo $guru['nama_guru'] ?></td>
                    </tr>
                    <tr>
                        <td>NIP Guru Kelas</td>
                        <td>:</td>
                        <td><?php echo $guru['nip'] ?></td>
                    </tr>
        		</table>
        		</div>
        	</div>
        	</div>

        	<div class="col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-header with-border bg-blue">
                        <h3 class="box-title">Data Siswa / Kelas</h3>
                    </div><!-- /.box-header -->
                <div class="box-body">
                <table class="table table-striped" style="font-size: 11px;">
                    <tr>
                        <td style="text-align: center;">NO</td>
                        <td style="text-align: center;">KELAS</td>
                        <td style="text-align: center;">L</td>
                        <td style="text-align: center;">P</td>
                        <td style="text-align: center;">TTL</td>
                    </tr>
                    <?php
                    $nomor = 1;
                    $kelas = mysqli_query($mysqli,"SELECT * FROM kelas WHERE kode_sekolah='$lembaga[kode_sekolah]' ORDER BY id_kelas ASC");
                    while ($rowkelas = mysqli_fetch_array($kelas)) {
                        $siswakelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                        JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                        WHERE kode_sekolah='$lembaga[kode_sekolah]' AND id_kelas='$rowkelas[id_kelas]'"));
                    ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $nomor++ ?></td>
                        <td style="text-align: center;"><?php echo $rowkelas['nama_kelas'] ?></td>
                        <td style="text-align: center;">
                        <?php  
                        echo 
                        $jumlahlaki = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                        JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                        WHERE id_kelas='$rowkelas[id_kelas]' AND kelamin='LAKI-LAKI'"));
                        ?>            
                        </td>
                        <td style="text-align: center;">
                        <?php  
                        echo 
                        $jumlahperempuan = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                        JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                        WHERE id_kelas='$rowkelas[id_kelas]' AND kelamin='PEREMPUAN'"));
                        ?>               
                        </td>
                        <td style="text-align: center;">
                        <?php  
                        echo 
                        $jumlah = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                        JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                        WHERE id_kelas='$rowkelas[id_kelas]' "));
                        ?>               
                        </td>
                    </tr>
                    <?php } ?>
                    
                </table>
                </div>
               </div>
            </div>





        </div>

        </section><!-- /.content -->

<?php } ?>
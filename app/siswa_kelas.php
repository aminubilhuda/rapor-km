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
            Siswa Kelasku
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-hode"></i> Home</a></li>
            <li class="active">Siswa Kelasku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Daftar Siswa Kelasku</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                  <table class="table table-bordered" style="font-size: 11px;">
                    <tr style="background-color: orange;">
                      <td style="text-align: center; color: white;">No</td>
                      <td style="text-align: center; color: white;">Nama Siswa</td>
                      <td style="text-align: center; color: white;">NIS</td>
                      <td style="text-align: center; color: white;">NISN</td>
                      <td style="text-align: center; color: white;">Kelamin</td>
                      <td style="text-align: center; color: white;">Agama</td>
                      <td style="text-align: center; color: white;">Tempat Lahir</td>
                      <td style="text-align: center; color: white;">Tanggal Lahir</td>
                      <td style="text-align: center; color: white;">Aksi</td>
                    </tr>
                    <?php  
                    $nomor = 1;
                    $kelas = mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                    JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                    WHERE id_kelas='$kelas[id_kelas]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'
                    ORDER BY nama_siswa ASC");
                    while ($rowkelas = mysqli_fetch_array($kelas)) {
                    ?>
                    <tr>
                    	<td style="text-align: center;"><?php echo $nomor++ ?></td>
                    	<td style="text-align: left;"><?php echo $rowkelas['nama_siswa'] ?></td>
                    	<td style="text-align: center;"><?php echo $rowkelas['nis'] ?></td>
                    	<td style="text-align: center;"><?php echo $rowkelas['nisn'] ?></td>
                    	<td style="text-align: center;"><?php echo $rowkelas['kelamin'] ?></td>
                      <td style="text-align: center;"><?php echo $rowkelas['agama'] ?></td>
                      <td style="text-align: center;"><?php echo $rowkelas['tempat_lahir'] ?></td>

                    	<td style="text-align: center;"><?php echo $rowkelas['tanggal_lahir'] ?></td>
                      <td style="text-align: center;">
                        <a href="?page=detail_siswa&s=<?php echo $_GET[kode_sekolah] ?>&i=<?php echo $rowkelas[id_siswa] ?>" class="btn btn-primary btn-xs"> Detail</a>
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
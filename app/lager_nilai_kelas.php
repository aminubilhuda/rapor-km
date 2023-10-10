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
            Lager Nilai Kelas <?php echo $kelaswali['nama_kelas'] ?>
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-hode"></i> Home</a></li>
            <li class="active">Lager Nilai Kelas</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Lager Nilai Kelas</h3>
                </div><!-- /.box-header -->
                <form method="POST">
                <div class="box-body">
                	<table class="table table-striped table-bordered" style="font-size: 11px;">
                		<tr>
                			<td style="text-align: center;">No</td>
                			<td style="text-align: center;">Peserta Didik</td>
                			<?php  
                			$mapelkelas = mysqli_query($mysqli,"SELECT * FROM mapel_kelas 
                			WHERE id_kelas='$kelaswali[id_kelas]' ORDER BY id_mapel ASC");
                			while ($rowmpk = mysqli_fetch_array($mapelkelas)) {
                				$mapel = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel WHERE id_mapel='$rowmpk[id_mapel]'"));
                			?>
                			<td style="text-align: center;"><?php echo $mapel['smapel'] ?></td>
                			<?php } ?>
                            <td style="text-align: center;">Rerata</td>
                			
                		</tr>
                		<?php  
                		$nomor=1;
                		$siswakelas = mysqli_query($mysqli,"SELECT DISTINCT (id_siswa) FROM nilai_akhir
                		WHERE id_kelas='$kelaswali[id_kelas]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' ORDER BY nilai DESC");
                		while ($rowsiswa = mysqli_fetch_array($siswakelas)) {
                			$siswa = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM siswa WHERE id_siswa='$rowsiswa[id_siswa]'"));
                		?>
                		<tr>
                			<td style="text-align: center;"><?php echo $nomor++ ?></td>
                			<td style="text-align: left;"><?php echo $siswa['nama_siswa'] ?></td>
                			<?php  
                			$mapelkelas = mysqli_query($mysqli,"SELECT * FROM mapel_kelas 
                			WHERE id_kelas='$kelaswali[id_kelas]' ORDER BY id_mapel ASC");
                			while ($rowmpk = mysqli_fetch_array($mapelkelas)) {
                				$nilai = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM nilai_akhir WHERE id_mapel_kelas='$rowmpk[id_mapel_kelas]' AND id_siswa='$rowsiswa[id_siswa]'"));
                                $nilaisiswa[] = $nilai['nilai'];
                			?>
                			<td style="text-align: center;"><?php echo $nilai['nilai'] ?></td>
                			<?php } ?>
                            <td style="text-align: center;">
                                <?php  
                                $jumlaharray = array_sum($nilaisiswa);
                                $jumlahdata = count($nilaisiswa);
                                if ($jumlahdata > 0) {
                                    echo $rata = round($jumlaharray/$jumlahdata);
                                }else{
                                    echo $jumlaharray;
                                }
                                ?>
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
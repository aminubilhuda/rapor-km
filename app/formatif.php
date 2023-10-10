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
  	
  	$mapelkelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel_kelas 
  	WHERE id_mapel_kelas='$_GET[ml]' AND kode_sekolah='$_GET[s]'"));
  	$kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_kelas='$mapelkelas[id_kelas]' AND kode_sekolah='$_GET[s]'"));
  	$mapel = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel WHERE id_mapel='$mapelkelas[id_mapel]' "));

  	
?>
		<section class="content-header">
          <h1>
            <?php echo $mapel['smapel'] ?> - Kelas <?php echo $kelas['nama_kelas'] ?>
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-hode"></i> Home</a></li>
            <li class="active">Penilaian Formatif</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Penilaian Formatif / Penilaian Harian</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	<table class="table table-striped table-bordered" style="font-size: 11px;">
                		<tr>
                			<td style="text-align: center;" rowspan="2">No</td>
                			<td style="text-align: center;" rowspan="2">Peserta Didik</td>
                			<?php  
                			$materi = mysqli_query($mysqli,"SELECT * FROM pembelajaran WHERE id_mapel_kelas='$_GET[ml]'");
                			while ($rowmateri = mysqli_fetch_array($materi)) {
                				$jumlahtujuan = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM tp_pembelajaran WHERE id_pembelajaran='$rowmateri[id_pembelajaran]'"));
                			?>
                			<td style="text-align: center;" colspan="<?php echo $jumlahtujuan ?>"><?php echo $rowmateri['pembelajaran'] ?></td>
                			
                			<td style="text-align: center;" rowspan="2">Rerata</td>
                			<?php } ?>
                		</tr>
                		<tr>
                			<?php  
                			$materi = mysqli_query($mysqli,"SELECT * FROM pembelajaran WHERE id_mapel_kelas='$_GET[ml]'");
                			while ($rowmateri = mysqli_fetch_array($materi)) {
                			$no=1;
                			$tujuan = mysqli_query($mysqli,"SELECT * FROM tp_pembelajaran WHERE id_pembelajaran='$rowmateri[id_pembelajaran]' ORDER BY id_tp_pembelajaran ASC");
                			while ($rowtujuan = mysqli_fetch_array($tujuan)) {
                				
                			?>
                			<td style="text-align: center;" >
                			    <a href="#" data-toggle="modal" data-target="#myModal<?php echo $rowmateri['id_pembelajaran']?><?php echo $rowtujuan['id_tp']?>">TP. <?php echo $no++ ?></a></td>

                			<div class="modal fade" id="myModal<?php echo $rowmateri['id_pembelajaran']?><?php echo $rowtujuan['id_tp']?>" role="dialog">
				              <div class="modal-dialog">
				                <!-- Modal content-->
				                <div class="modal-content">
				                  <div class="modal-header bg-green">
				                    <button type="button" class="close" data-dismiss="modal">&times;</button>
				                    <h4 class="modal-title">Form Pengisian Nilai Formatif</h4>
				                  </div>
				                  <div class="modal-body" style="font-size: 11px;">
				                    <form method="POST">
				                    	<input type="hidden" name="id_pembelajaran" value="<?php echo $rowmateri['id_pembelajaran'] ?>">
				                    	<input type="hidden" name="id_tp" value="<?php echo $rowtujuan['id_tp'] ?>">
				                    	<?php  
				                        	$nomordata = 1;
				                        	$skelas = mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
				                        	JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
				                        	WHERE id_kelas='$mapelkelas[id_kelas]' ORDER BY nama_siswa ASC");
				                        	while ($rskelas = mysqli_fetch_array($skelas)) {
				                        		$nilai = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM n_formatif WHERE id_pembelajaran='$rowmateri[id_pembelajaran]' AND id_tp='$rowtujuan[id_tp]' AND id_siswa='$rskelas[id_siswa]'"));
				                        	?>
    				                        <div class="col-md-6">
    				                    		<div class="form-group">
    				                        		<label><?php echo $rskelas['nama_siswa'] ?></label>
    				                        		<input type="text" name="nilai[]" class="form-control input-sm" required="" value="<?php echo $nilai['nilai'] ?>">
    				                        		<input type="hidden" name="siswa[]" class="form-control input-sm" required="" value="<?php echo $rskelas['id_siswa'] ?>">
    				                        	</div>
    				                        </div>
				                        

				                    	<?php } ?>
				                        <div class="modal-footer">  
				                          <button type="submit" name="simpannilaitujuan" class="btn btn-success">Update</button>
				                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                        </div> 

				                      </form>
				                  </div>
				                </div>
				              </div>
				          </div>
                			<?php } }  ?>
                		</tr>
                		<?php  
                		$nomor = 1;
                		$siswakelas = mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                		JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                		WHERE id_kelas='$mapelkelas[id_kelas]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[tahun]' ORDER BY nama_siswa ASC");
                		while ($rowsiswa = mysqli_fetch_array($siswakelas)) {
                		?>
                		<tr>
                			<td style="text-align: center;"><?php echo $nomor ++ ?></td>
                			<td style="text-align: left;"><?php echo $rowsiswa['nama_siswa'] ?></td>
                			<?php  
                			$materi = mysqli_query($mysqli,"SELECT * FROM pembelajaran WHERE id_mapel_kelas='$_GET[ml]'");
                			while ($rowmateri = mysqli_fetch_array($materi)) {
                			    
                			$tujuan = mysqli_query($mysqli,"SELECT * FROM tp_pembelajaran 
                                JOIN tp ON tp_pembelajaran.id_tp = tp.id_tp
                                WHERE id_pembelajaran='$rowmateri[id_pembelajaran]'");
                			
                			$jumlahtujuan = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM tp_pembelajaran 
                            WHERE id_pembelajaran='$rowmateri[id_pembelajaran]'"));
                			
                			while ($rowtujuan = mysqli_fetch_array($tujuan)) {
                                $rowtujuan['panjang_interval'];
                                $interval = round((100-$rowtujuan['panjang_interval'])/3);
                                
                                $intervalD = $rowtujuan['panjang_interval'];

                                $intervalC = $intervalD+$interval;
                                $intervalB = $intervalC+$interval;
                                $intervalA = $intervalB+$interval;

                                $nilaiformatif = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM n_formatif WHERE id_pembelajaran='$rowmateri[id_pembelajaran]' AND id_tp='$rowtujuan[id_tp]' AND id_siswa='$rowsiswa[id_siswa]'"));
                                $nilaif = $nilaiformatif['nilai'];
                				
                			?>
                			<?php if($nilaif < $intervalD+1 ){ ?>
                            <td style="background-color: red; color: white; text-align: center;"><?php echo $nilaif ?></td>

                            <?php }elseif($nilaif > $intervalD+1 && $nilaif < $intervalC+1){ ?>
                            <td style="background-color: orange; color: white; text-align: center;"><?php echo $nilaif ?></td>

                            <?php }elseif($nilaif > $intervalC+1 && $nilaif < $intervalB+1 ){ ?>
                            <td style="background-color: aqua; color: black; text-align: center;"><?php echo $nilaif ?></td>
                            <?php }else{ ?>
                            <td style="background-color: green; color: white; text-align: center;"><?php echo $nilaif ?></td>
                            <?php } ?>
                			<?php }  ?>

                			<td style="text-align: center;">
                				<?php  
                				$nilairerataformatif = mysqli_fetch_array(mysqli_query($mysqli,"SELECT SUM(nilai) AS jumlahnilaipermateri FROM n_formatif WHERE id_pembelajaran='$rowmateri[id_pembelajaran]' AND id_siswa='$rowsiswa[id_siswa]'"));
                				echo $nilai = $nilairerataformatif['jumlahnilaipermateri']/$jumlahtujuan;
                				?>
                			</td>
                			<?php } ?>
                		</tr>
                		<?php } ?>
                	</table>
               </div>
           </div>
       	  </div>
        </section><!-- /.content -->

        <?php  
        if (isset($_POST['simpannilaitujuan'])) {
        	$siswa = $_POST['siswa'];
        	$nilai = $_POST['nilai'];
        	$materi = $_POST['id_pembelajaran'];
        	$tujuan = $_POST['id_tp'];

        	$jumlahnilai = count($siswa);

        	$jumlahtp = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM tp_pembelajaran WHERE id_mapel_kelas='$_GET[ml]' AND id_pembelajaran='$materi'"));
        	

        	for ($i=0; $i < $jumlahnilai ; $i++) { 

        		$cekdata = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM n_formatif WHERE id_pembelajaran='$materi' AND id_tp='$tujuan' AND id_siswa='$siswa[$i]' "));



        		if ($cekdata > 0) {
        			$update = mysqli_query($mysqli,"UPDATE n_formatif SET nilai='$nilai[$i]' WHERE id_pembelajaran='$materi' AND id_tp='$tujuan' AND id_siswa='$siswa[$i]' ");
        		}else{
        			$update = mysqli_query($mysqli,"INSERT INTO n_formatif (tahun, semester, id_pembelajaran, id_tp, id_mapel_kelas, id_siswa, nilai )VALUES('$sekolah[tahun]', '$sekolah[semester]','$materi', '$tujuan', '$_GET[ml]','$siswa[$i]', '$nilai[$i]')");
        		}

        		$cekdata2 = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM nilai_proses WHERE id_pembelajaran='$materi' AND id_siswa='$siswa[$i]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'"));

        		
        		$ambildatanilai = mysqli_query($mysqli,"SELECT SUM(nilai) AS jumlah_nilai FROM n_formatif WHERE id_pembelajaran='$materi' AND id_siswa='$siswa[$i]' ");
        		while ($rowambilnilai = mysqli_fetch_array($ambildatanilai)) {
        		
                $rata[] = round($rowambilnilai['jumlah_nilai']/$jumlahtp);

        		}
        		if ($cekdata2 > 0) {
        			$update2 = mysqli_query($mysqli,"UPDATE nilai_proses SET n_formatif='$rata[$i]' WHERE id_pembelajaran='$materi' AND id_siswa='$siswa[$i]' ");
        		}else{
        			$update2 = mysqli_query($mysqli,"INSERT INTO nilai_proses (tahun, semester, mapel_kelas, id_pembelajaran, id_siswa, n_formatif)VALUES('$sekolah[tahun]', '$sekolah[semester]','$_GET[ml]', '$materi', '$siswa[$i]', '$rata[$i]') ");
        		}



        		if ($update || $update2) {
        			?>
        			<script type="text/javascript">
        				alert('Berhasil memperbaharui Data Nilai');
        				window.location.href="?page=formatif&s=<?php echo $_GET['s'] ?>&ml=<?php echo $_GET['ml'] ?>";
        			</script>
        			<?php
        		}
        	}
        }
        ?>
        	

<?php } ?>
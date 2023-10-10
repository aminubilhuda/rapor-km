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

  	$julahtpformatif = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM pembelajaran WHERE id_mapel_kelas='$_GET[ml]'"));

  	$jumlahtujuan = mysqli_num_rows(mysqli_query($mysqli,"SELECT DISTINCT(id_pembelajaran) FROM peniaian_sumatif WHERE mapel_kelas='$_GET[ml]'"));
?>
		<section class="content-header">
          <h1>
            <?php echo $mapel['smapel'] ?> - Kelas <?php echo $kelas['nama_kelas'] ?>
            <small>it all starts here</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Lager Nilai Mata Pelajaran</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        	<div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border bg-blue">
                  <h3 class="box-title">Lager Nilai Mata Pelajaran</h3>
                </div><!-- /.box-header -->
                <form method="POST">
                <div class="box-body">
                    <?php if($sekolah['sinc_lager']==1){ ?>
                	<p><button type="submit" name="kirimniai" class="btn btn-warning btn-sm"><i class="fa fa-refresh" ></i> Kirim Nilai</button></p>
                    <?php }else{ ?>
                    <p><button type="button" name="kirimniai" class="btn btn-warning btn-sm" onclick="return confirm('Sincrone nilai hanya bisa dilakukan setelah operator sekolah mengaktifkan sincronisasi')"><i class="fa fa-refresh" ></i> Kirim Nilai</button></p>
                    <?php } ?>
                	<table class="table table-striped table-bordered" style="font-size: 11px;">
                		<tr>
                			<td style="text-align: center;">No</td>
                			<td style="text-align: center;">Peserta Didik</td>
                			<td style="text-align: center;">Formatif</td>
                			<td style="text-align: center;">Sumatif MID</td>
                            <td style="text-align: center;">NA MID</td>
                			<td style="text-align: center;">Sumatif Semester</td>
                			<td style="text-align: center;">NA</td>
                			<td style="text-align: center;">Deskripsi Formatif Tertinggi</td>
                			<td style="text-align: center;">Deskripsi Formatif Terendah</td>
                			
                		</tr>
                		<?php  
                		$nomor =1;
                		$siswakelas = mysqli_query($mysqli,"SELECT * FROM siswa_kelas 
                		JOIN siswa ON siswa_kelas.id_siswa = siswa.id_siswa
                		WHERE id_kelas='$mapelkelas[id_kelas]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' ORDER BY nama_siswa ASC");
                		while ($rowsiswa = mysqli_fetch_array($siswakelas)) {
                		?>
                		<tr>
                			<td style="text-align: center;"><?php echo $nomor++ ?></td>
                			<td style="text-align: left;"><?php echo $rowsiswa['nama_siswa'] ?></td>
                			<td style="text-align: center;">
                				<?php  
                				$jumlahformatif = mysqli_fetch_array(mysqli_query($mysqli,"SELECT SUM(n_formatif) AS jumlah_formatif FROM nilai_proses WHERE mapel_kelas='$_GET[ml]' AND id_siswa='$rowsiswa[id_siswa]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' "));
                				echo $rerataformatif = round($jumlahformatif['jumlah_formatif']/$julahtpformatif);
                				?>
                			</td>
                			<td style="text-align: center;">
                				<?php  
                				$jumlahsumatif = mysqli_fetch_array(mysqli_query($mysqli,"SELECT SUM(n_sumatif) AS jumlah_sumatif FROM nilai_proses WHERE mapel_kelas='$_GET[ml]' AND id_siswa='$rowsiswa[id_siswa]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'"));
                				echo $reratasumatif = round($jumlahsumatif['jumlah_sumatif']/$jumlahtujuan);
                				?>
                			</td>

                            <td style="text-align: center;">
                                <?php  
                                    $nf = $rerataformatif;
                                    $ns = $reratasumatif;

                                    echo $nilaiakhirmid = round(($nf+$ns)/2);
                                ?>
                                <input type="hidden" name="nilaiakhirmid[]" value="<?php echo $nilaiakhirmid ?>">
                                
                            </td>



                			<td style="text-align: center;">
                				<?php  
                				$jumlahsas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT SUM(n_sas) AS jumlah_sas FROM nilai_proses WHERE mapel_kelas='$_GET[ml]' AND id_siswa='$rowsiswa[id_siswa]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'"));
                				echo $reratasas = round($jumlahsas['jumlah_sas']/$julahtpformatif);
                				?>
                			</td>

                			<td style="text-align: center;">
                				<?php  
                					$nf = $rerataformatif;
                					$ns = $reratasumatif;
                					$nsas = $reratasas;

                					echo $nilaiakhir = round(($nf+$ns+$nsas)/3);
                				?>
                				<input type="hidden" name="nilaiakhirpos[]" value="<?php echo $nilaiakhir ?>">
                				<input type="hidden" name="siswa[]" value="<?php echo $rowsiswa[id_siswa] ?>">
                			</td>
                			<td style="text-align: left;">
                				<?php  
                				$nilaimax = mysqli_fetch_array(mysqli_query($mysqli,"SELECT DISTINCT nilai, id_tp FROM n_formatif 
                				WHERE id_mapel_kelas='$_GET[ml]' AND id_siswa='$rowsiswa[id_siswa]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' ORDER BY nilai DESC"));
                				
                				$tujuan = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM tp WHERE id_tp='$nilaimax[id_tp]'"));
                				echo "Mampu ".$tujuan['tp'];
                				?>
                			</td>
                			<td style="text-align: left;">
                				<?php  
                				$nilaimin = mysqli_fetch_array(mysqli_query($mysqli,"SELECT DISTINCT nilai, id_tp FROM n_formatif 
                				WHERE id_mapel_kelas='$_GET[ml]' AND id_siswa='$rowsiswa[id_siswa]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]' ORDER BY nilai ASC"));
                				
                				$tujuanmin = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM tp WHERE id_tp='$nilaimin[id_tp]'"));
                				
                				echo "Perlu Bimbingan ".$tujuanmin['tp'];
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
        <?php  
        if (isset($_POST['kirimniai'])) {
        	$nilai = $_POST['nilaiakhirpos'];
        	$siswa = $_POST['siswa'];
            $nilaimid = $_POST['nilaiakhirmid'];

        	$jumlahsiswa = count($siswa);

        	for ($i=0; $i <$jumlahsiswa ; $i++) { 

                $cekdatamid = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM nilai_akhir_mid WHERE id_mapel_kelas='$_GET[ml]' AND id_siswa='$siswa[$i]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'"));

                if ($cekdatamid > 0) {
                    $updatemid = mysqli_query($mysqli,"UPDATE nilai_akhir_mid SET nilai='$nilaimid[$i]' WHERE id_mapel_kelas='$_GET[ml]' AND id_siswa='$siswa[$i]' ");
                }else{
                    $updatemid = mysqli_query($mysqli,"INSERT INTO nilai_akhir_mid (tahun, semester, id_mapel_kelas, id_kelas, id_siswa, nilai)VALUES('$sekolah[tahun]', '$sekolah[semester]', '$_GET[ml]', '$mapelkelas[id_kelas]','$siswa[$i]', '$nilaimid[$i]')");
                }

                if ($updatemid) {
                    ?>
                    <script type="text/javascript">
                        alert('Nilai Akhir Mata Pelajaran Berhasil dikirim.');
                        window.location.href="?page=lager-mapel&s=<?php echo $_GET[s] ?>&ml=<?php echo $_GET[ml] ?>";
                    </script>
                    <?php
                }




        		for ($j=0; $j <$jumlahsiswa ; $j++) { 
                    $cekdata = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM nilai_akhir WHERE id_mapel_kelas='$_GET[ml]' AND id_siswa='$siswa[$j]' AND tahun='$sekolah[tahun]' AND semester='$sekolah[semester]'"));

                    if ($cekdata > 0) {
                        $update = mysqli_query($mysqli,"UPDATE nilai_akhir SET nilai='$nilai[$j]' WHERE id_mapel_kelas='$_GET[ml]' AND id_siswa='$siswa[$j]' ");
                    }else{
                        $update = mysqli_query($mysqli,"INSERT INTO nilai_akhir (tahun, semester, id_mapel_kelas,id_kelas,id_siswa,nilai)VALUES('$sekolah[tahun]', '$sekolah[semester]', '$_GET[ml]', '$mapelkelas[id_kelas]','$siswa[$j]','$nilai[$j]')");
                    }

                    if ($update) {
                        ?>
                        <script type="text/javascript">
                            alert('Nilai Akhir Mata Pelajaran Berhasil dikirim.');
                            window.location.href="?page=lager-mapel&s=<?php echo $_GET[s] ?>&ml=<?php echo $_GET[ml] ?>";
                        </script>
                        <?php
                    }
                }










        	}
        }
        ?>

        	

<?php } ?>
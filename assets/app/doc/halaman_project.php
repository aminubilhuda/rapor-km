<?php  
session_start();
ob_start();
if (empty($_SESSION['kode_guru']) or empty($_SESSION['password']) ) {
	?>
	<script type="text/javascript">
	alert('Anda Harus Login Terlebih Dahulu!');
	window.location.href="login.php";
	</script>
	<?php
}else{
	include "../../../config/koneksi.php";
	include "../../../config/function_date.php";
	
	$lembaga = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sekolah WHERE kode_sekolah='$_GET[s]'"));

	$siswa = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM siswa WHERE id_siswa='$_GET[i]'"));

	$siswakelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM siswa_kelas
	WHERE id_siswa='$_GET[i]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]'"));

	$kelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_kelas='$siswakelas[id_kelas]'"));
	$fase = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM fase WHERE id_fase='$kelas[id_fase]'"));
	$walikelas = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM guru WHERE id_guru='$kelas[id_guru]'"));


	if ($siswa['agama']=="ISLAM") {
		$mapel = "1";
	}else{
		$mapel = "2";
	}

	if ($kelas['nama_kelas']==1) {
		$datakelas = "(SATU)";
	}elseif($kelas['nama_kelas']==2){
		$datakelas = "(DUA)";
	}elseif($kelas['nama_kelas']==3){
		$datakelas = "(TIGA)";
	}elseif($kelas['nama_kelas']==4){
		$datakelas = "(EMPAT)";
	}elseif($kelas['nama_kelas']==5){
		$datakelas = "(LIMA)";
	}elseif($kelas['nama_kelas']==6){
		$datakelas = "(ENAM)";
	}

?>
<style type="text/css">
table.page_header {width: 780px; border: none; padding: 2mm; margin-top: -30px; font-size: 10px; margin-left: -10px;}
table.page_footer {width: 760px; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm; margin-left: -10px; }
h1 {color: #000033}
h2 {color: #000055}
h3 {color: #000077}
</style>
<page backtop="14mm" backbottom="14mm" backleft="1mm" backright="3mm">
<page_header>
<!-- Setting Header -->
<table class="page_header">
<tr>
<td style="text-align: left; width: 100%"><i></i></td>
</tr>
</table>
</page_header>


<page_footer>
<table class="page_footer">

<tr>
<td style="width: 50%; text-align: left; font-size: 10px;">
<b>Rapor Projek Penguatan Profil Pelajar Pancasila <?php echo $lembaga['nama_sekolah'] ?></b> <br>
| <?php echo $siswa['nisn'] ?> | <?php echo $siswa['nama_siswa'] ?> | Kelas : <?php echo $kelas['nama_kelas'] ?>
</td>
<td style="width: 50%; text-align: right; font-size: 10px;">
Page [[page_cu]] of [[page_nb]] pages
</td>
</tr>
</table>
</page_footer>


<!-- Tabel Halaman Data -->

<!-- Informasi Data sekolah dan siswa -->

<table width="780px" style="border-collapse: collapse; margin-top: -50px;" >
	<tr>
		<td style="width: 20%; padding-left: 5px; height: 20px;">Nama Peserta Didik</td>
		<td style="width: 3%; text-align: center;">:</td>
		<td style="width: 38%; padding-left: 5px;"><?php $kalimat = strtoupper($siswa['nama_siswa']); echo ucwords($kalimat) ?></td>
		<td style="width: 8%; text-align: center;"></td>
		<td style="width: 15%; padding-left: 5px;">Kelas</td>
		<td style="width: 3%; text-align: center;">:</td>
		<td style="width: 20%; padding-left: 5px;"><?php echo $kelas['nama_kelas'] ?> <?php echo $datakelas ?></td>
	</tr>
	<tr>
		<td style="width: 20%; padding-left: 5px;">NIS / NISN</td>
		<td style="width: 3%; text-align: center;">:</td>
		<td style="width: 38%; padding-left: 5px;"><?php echo $siswa['nis'] ?> / <?php echo $siswa['nisn'] ?></td>
		<td style="width: 8%; text-align: center;"></td>
		<td style="width: 15%; padding-left: 5px;">Fase</td>
		<td style="width: 3%; text-align: center;">:</td>
		<td style="width: 20%; padding-left: 5px;"><?php echo strtoupper($fase['fase']) ?></td>
	</tr>
	<tr>
		<td style="width: 20%; padding-left: 5px;">Nama Sekolah</td>
		<td style="width: 3%; text-align: center;">:</td>
		<td style="width: 38%; padding-left: 5px;"><?php $kal = strtoupper($lembaga['nama_sekolah']); echo ucwords($kal) ?></td>
		<td style="width: 8%; text-align: center;"></td>
		<td style="width: 15%; padding-left: 5px;">Semester</td>
		<td style="width: 3%; text-align: center;">:</td>
		<td style="width: 20%; padding-left: 5px;">Ganjil</td>
	</tr>
	<tr>
		<td style="width: 20%; padding-left: 5px;">Alamat Sekolah</td>
		<td style="width: 3%; text-align: center;">:</td>
		<td style="width: 38%; padding-left: 5px;"><?php $kal2 = strtoupper($lembaga['alamat']); echo ucwords($kal2) ?></td>
		<td style="width: 8%; text-align: center;"></td>
		<td style="width: 15%; padding-left: 5px;">T. Pelajaran</td>
		<td style="width: 3%; text-align: center;">:</td>
		<td style="width: 20%; padding-left: 5px;">2022-2023</td>
	</tr>

</table>
<hr>
<br><br>
<?php  
$nomor=1;
$project = mysqli_query($mysqli,"SELECT * FROM project WHERE id_kelas='$kelas[id_kelas]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]' ORDER BY id_project ASC");
while ($row = mysqli_fetch_array($project)) {
?>
<table width="780px" style="border-collapse: collapse; " >
	<tr>
		<td style="width: 100%;"><b>Project <?php echo $nomor++ ?> | <?php echo $row['nama_project'] ?></b></td>
	</tr>
	<tr>
		<td style="width: 100%; padding-top: 5px; padding-left: 5px; padding-right: 5px; line-height: 20px; padding-bottom: 5px;"><?php echo $row['deskripsi_project'] ?></td>
	</tr>
</table>
<hr>
<br>
<?php } ?>
<br><br>
<table width="780px" style="border-collapse: collapse; "  >
	<tr >
		<td style="width: 25%; background-color: red; text-align: center; padding-top: 5px; padding-bottom: 5px; color:white;"><b>BB. Belum Berkembang</b></td>
		<td style="width: 25%; background-color: orange; text-align: center; padding-top: 5px; padding-bottom: 5px; color:white;"><b>MB. Mulai Berkembang</b></td>
		<td style="width: 25%; background-color: blue; text-align: center; padding-top: 5px; padding-bottom: 5px; color:white;"><b>BSH. Berkembang Sesuai Harapan</b></td>
		<td style="width: 25%; background-color: green; text-align: center; padding-top: 5px; padding-bottom: 5px; color:white;"><b>SB. Sangat Berkembang</b></td>
	</tr>
	
	<tr>
		<td style="width: 25%; text-align: left; padding-left: 5px; font-size: 11px; line-height: 15px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px;"> Siswa masih membutuhkan bimbingan dalam mengembangkan kemampuan</td>
		<td style="width: 25%; text-align: left; padding-left: 5px; font-size: 11px; line-height: 15px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px;"> Siswa mulai mengembangkan kemampuan namun belum ajek</td>
		<td style="width: 25%; text-align: left; padding-left: 5px; font-size: 11px; line-height: 15px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px;"> Siswa telah mengembangkan kemampuan hingga berada pada tahap ajek</td>
		<td style="width: 25%; text-align: left; padding-left: 5px; font-size: 11px; line-height: 15px; padding-top: 5px; padding-right: 5px; padding-bottom: 5px;"> Siswa mengembangkan kemampuannya melampaui harapan</td>
	</tr>
</table>
<br><br>
<hr>

<table width="780px" style="border-collapse: collapse; "  >
	<tr>
		<td style="width: 20%;"><b>Project Kelas <?php echo $kelas['nama_kelas'] ?></b></td>
		<td style="width: 13%; font-size: 10px; text-align: center;">Beriman, Bertaqwa kepada Tuhan Yang Maha Esa dan Berakhlak Mulia</td>
		<td style="width: 13%; font-size: 10px; text-align: center;">Berkebhinekaan Global</td>
		<td style="width: 13%; font-size: 10px; text-align: center;">Bergotong-royong</td>
		<td style="width: 13%; font-size: 10px; text-align: center;">Mandiri</td>
		<td style="width: 13%; font-size: 10px; text-align: center;">Bernalar Kritis</td>
		<td style="width: 13%; font-size: 10px; text-align: center;">Kreatif</td>
	</tr>
</table>
<hr>
<?php  
$nomor=1;
$project = mysqli_query($mysqli,"SELECT * FROM project WHERE id_kelas='$siswakelas[id_kelas]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]' ORDER BY id_project ASC");
while ($row = mysqli_fetch_array($project)) {
?>
<table width="780px" style="border-collapse: collapse; ">
	<tr>
		<td style="width: 3%; font-size: 11px; padding-top: 5px; padding-bottom: : 5px; height: 30px;"><?php echo $nomor++ ?>.</td>
		<td style="width: 17%; font-size: 11px; padding-top: 5px; padding-bottom: : 5px; height: 30px;">
		<?php echo $row['nama_project'] ?></td>
		<?php  
		$profil = mysqli_query($mysqli,"SELECT * FROM dimensi ORDER BY id_dimensi ASC");
		while ($rowp = mysqli_fetch_array($profil)) {
			
			$jumlahpenilaian = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM elemen_project WHERE id_project='$row[id_project]' AND id_dimensi='$rowp[id_dimensi]' "));
			$nilai = mysqli_fetch_array(mysqli_query($mysqli,"SELECT SUM(nilai) AS jumlahnilaidimensi FROM penilaian_project WHERE id_project='$row[id_project]' AND id_dimensi='$rowp[id_dimensi]' AND id_siswa='$_GET[i]'"));
			

		?>
			<?php if(empty($nilai['jumlahnilaidimensi'])){ 
			echo '<td style="width:13%; text-align:center;"></td>'
			?>

			<?php }else{ 
			
			$nilaiproject = round($nilai['jumlahnilaidimensi']/$jumlahpenilaian) ;

			if($nilaiproject < 1 && $nilaiproject < 2){
				echo '
				<td style="width:13%; background-color:red; text-align:center;">BB</td>
				';
			}elseif($nilaiproject >= 2 && $nilaiproject < 3){
				echo '
				<td style="width:13%; background-color:orange; text-align:center;">MB</td>
				';
			}elseif($nilaiproject >= 3 && $nilaiproject < 4){
				echo '
				<td style="width:13%; background-color:blue; text-align:center; color:white;">BSH</td>
				';
			}elseif($nilaiproject >=4 ){
				echo '
				<td style="width:13%; background-color:green; text-align:center; color:white;">SB</td>
				';
			}


			} ?>
		
		<?php } ?>
	</tr>
</table>
<?php } ?>
<hr>
<br><br><br><br>
<table width="780px" style="border-collapse: collapse; "  >
	<tr>
		<td style="width: 60%; text-align: center;"></td>
		<td style="width: 40%; text-align: center;"><?php echo $lembaga['desa'] ?>, <?php echo tgl_indonesia(date('Y-m-d')) ?></td>
	</tr>
	<tr>
		<td style="width: 60%; text-align: center;"></td>
		<td style="width: 40%; text-align: center;">Wali Kelas <?php echo $kelas['nama_kelas'] ?></td>
	</tr>
	<tr>
		<td style="width: 60%; text-align: center; height: 70px;"></td>
		<td style="width: 40%; text-align: center; height: 70px;"></td>
	</tr>
	<tr>
		<td style="width: 60%; text-align: center;"></td>
		<td style="width: 40%; text-align: center;"><b><u><?php echo $walikelas['nama_guru'] ?></u></b></td>
	</tr>
	<tr>
		<td style="width: 60%; text-align: center;"></td>
		<td style="width: 40%; text-align: center;">NIP. <?php echo $walikelas['nip'] ?></td>
	</tr>
</table>
</page>
<!-- Halaman 2 -->
<page backtop="5mm" backbottom="14mm" backleft="1mm" backright="3mm">
<page_header>
<!-- Setting Header -->
<table class="page_header">
<tr>
<td style="text-align: left; width: 100%"><i></i></td>
</tr>
</table>
</page_header>


<page_footer>
<table class="page_footer">

<tr>
<td style="width: 50%; text-align: left; font-size: 10px;">
<b>Rapor Projek Penguatan Profil Pelajar Pancasila <?php echo $lembaga['nama_sekolah'] ?></b> <br>
| <?php echo $siswa['nisn'] ?> | <?php echo $siswa['nama_siswa'] ?> | Kelas : <?php echo $kelas['nama_kelas'] ?>
</td>
<td style="width: 50%; text-align: right; font-size: 10px;">
Page [[page_cu]] of [[page_nb]] pages
</td>
</tr>
</table>
</page_footer>
<?php  
$nomor = 1;
$project = mysqli_query($mysqli, "SELECT * FROM project WHERE id_kelas='$kelas[id_kelas]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]' ORDER BY id_project ASC");
while ($row = mysqli_fetch_array($project)) {
?>
<hr>
<table width="780px" style="border-collapse: collapse;" border="1">
	<tr>
		<td style="width: 60%; height: 35px; background-color: #f2f0f1;"><b><?php echo $nomor++ ?>. <?php echo $row['nama_project'] ?></b></td>
		<td style="width: 10%; background-color: red; text-align: center;">BB</td>
		<td style="width: 10%; background-color: orange; text-align: center;">MB</td>
		<td style="width: 10%; background-color: blue; text-align: center; color:white;">BSH</td>
		<td style="width: 10%; background-color: green; text-align: center; color:white;">SB</td>
	</tr>
	<?php  
	$elemenp = mysqli_query($mysqli,"SELECT DISTINCT(id_dimensi) FROM elemen_project WHERE id_project='$row[id_project]' ORDER BY id_dimensi ASC");
	while ($rowelemenp = mysqli_fetch_array($elemenp)) {
		$profil = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM dimensi WHERE id_dimensi='$rowelemenp[id_dimensi]'"));
	?>
	<tr>
		<td style="width: 60%; height: 35px; background-color: #e3dfe0; padding-left: 5px; " colspan="5"><?php echo $profil['dimensi'] ?></td>
	</tr>
	<?php  
	$subelemenp = mysqli_query($mysqli,"SELECT * FROM elemen_project WHERE id_project='$row[id_project]' AND id_dimensi='$rowelemenp[id_dimensi]' ORDER BY id_elemen ASC");
	while ($rowsubelemenp = mysqli_fetch_array($subelemenp)) {

		$elemen = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sub_elemen WHERE id_sub_elemen='$rowsubelemenp[id_sub_elemen]'"));

		$capaian = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM capaian WHERE id_sub_elemen='$rowsubelemenp[id_sub_elemen]' AND id_elemen='$rowsubelemenp[id_elemen]' AND id_materi='$rowsubelemenp[id_dimensi]' AND id_fase='$fase[id_fase]' "));
		
	?>
	<tr>
		<td style="width: 60%; height: 20px; padding-left: 10px; padding-top: 5px; padding-bottom: 5px;"><b><?php echo $elemen['sub_elemen'] ?> </b> <br>
			<label style="font-size: 11px;"><?php echo $capaian['capaian'] ?></label>
		</td>
		<?php  
			$jumlahpenilaian = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM elemen_project WHERE id_project='$row[id_project]' AND id_dimensi='$rowelemenp[id_dimensi]' "));

			$nilai = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM penilaian_project WHERE id_project='$row[id_project]' AND id_dimensi='$rowelemenp[id_dimensi]' AND id_sub_elemen='$rowsubelemenp[id_sub_elemen]' AND id_siswa='$_GET[i]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]'"));
		?>
		<?php if(empty($nilai['nilai'])){ 
			echo '<td style="width:10%; text-align:center; background-color:#ece9ea;"></td>
			<td style="width:10%; text-align:center; background-color:#ece9ea;"></td>
			<td style="width:10%; text-align:center; background-color:#ece9ea;"></td>
			<td style="width:10%; text-align:center; background-color:#ece9ea;"></td>
			'
			?>

			<?php }else{ 
			
			$nilaiproject = $nilai['nilai'];

			if($nilaiproject==1 ){
				echo '
				<td style="width:10%; background-color:red; text-align:center;">BB</td>
				<td style="width:10%;  text-align:center; background-color:#ece9ea;"></td>
				<td style="width:10%;  text-align:center; background-color:#ece9ea;"></td>
				<td style="width:10%;  text-align:center; background-color:#ece9ea;"></td>
				';
			}elseif($nilaiproject==2){
				echo '
				<td style="width:10%;  text-align:center; background-color:#ece9ea;"></td>
				<td style="width:10%; background-color:orange; text-align:center;">MB</td>
				<td style="width:10%;  text-align:center; background-color:#ece9ea;"></td>
				<td style="width:10%;  text-align:center; background-color:#ece9ea;"></td>
				
				';
			}elseif($nilaiproject==3){
				echo '
				<td style="width:10%;  text-align:center; background-color:#ece9ea;"></td>
				<td style="width:10%;  text-align:center; background-color:#ece9ea;"></td>
				<td style="width:10%; background-color:blue; text-align:center; color:white;">BSH</td>
				<td style="width:10%;  text-align:center; background-color:#ece9ea;"></td>
				
				';
			}elseif($nilaiproject==4 ){
				echo '
				<td style="width:10%;  text-align:center; background-color:#ece9ea;"></td>
				<td style="width:10%;  text-align:center; background-color:#ece9ea;"></td>
				<td style="width:10%;  text-align:center; background-color:#ece9ea;"></td>
				<td style="width:10%; background-color:green; text-align:center; color:white;">SB</td>
				';
			}


			} ?>
	</tr>
	<?php } } ?>
	<tr style="border: 1;">
		<td style="width: 100%; padding-top: 5px; padding-left: 5px;" colspan="5"><b>Catatan Proses :</b>
		<br> <label style="font-size: 11px; padding-left: 5px;"><i>
		    <?php
		    $catatan = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM catatan_proses WHERE id_project='$row[id_project]' AND id_siswa='$_GET[i]'"));
		    echo $catatan['catatan'];
		    ?>
		</i></label>
		</td>
	</tr>
</table>

<?php } ?>

<br><br>
<table width="780px" style="border-collapse: collapse; "  >
	<tr>
		<td style="width: 33%; text-align: center;">Mengetahui,</td>
		<td style="width: 33%; text-align: center;"></td>
		<td style="width: 33%; text-align: center;"><?php echo $lembaga['desa'] ?>, <?php echo tgl_indonesia(date('Y-m-d')) ?></td>
	</tr>
	<tr>
		<td style="width: 33%; text-align: center;">Orangtua / Wali,</td>
		<td style="width: 33%; text-align: center;"></td>
		<td style="width: 33%; text-align: center;">Wali Kelas <?php echo $kelas['nama_kelas'] ?>,</td>
	</tr>
	<tr>
		<td style="width: 33%; text-align: center; height: 50px;"></td>
		<td style="width: 33%; text-align: center; height: 50px;"></td>
		<td style="width: 33%; text-align: center; height: 50px;"></td>
	</tr>
	<tr>
		<td style="width: 33%; text-align: center;">...............................................</td>
		<td style="width: 33%; text-align: center;"></td>
		<td style="width: 33%; text-align: center;"><b><u><?php echo $walikelas['nama_guru'] ?></u></b></td>
	</tr>
	<tr>
		<td style="width: 33%; text-align: center;"></td>
		<td style="width: 33%; text-align: center;"></td>
		<td style="width: 33%; text-align: center;">NIP. <?php echo $walikelas['nip'] ?></td>
	</tr>
	<tr>
		<td style="width: 33%; text-align: center; height: 30px;"></td>
		<td style="width: 33%; text-align: center; height: 30px;"></td>
		<td style="width: 33%; text-align: center; height: 30px;"></td>
	</tr>
	<tr>
		<td style="width: 33%; text-align: center;"></td>
		<td style="width: 33%; text-align: center;">Mengesahkan,</td>
		<td style="width: 33%; text-align: center;"></td>
	</tr>
	<tr>
		<td style="width: 33%; text-align: center;"></td>
		<td style="width: 33%; text-align: center;">Kepala <?php echo $lembaga['nama_sekolah'] ?></td>
		<td style="width: 33%; text-align: center;"></td>
	</tr>
	<tr>
		<td style="width: 33%; text-align: center; height: 70px;"></td>
		<td style="width: 33%; text-align: center; height: 70px;"></td>
		<td style="width: 33%; text-align: center; height: 70px;"></td>
	</tr>
	<tr>
		<td style="width: 33%; text-align: center;"></td>
		<td style="width: 33%; text-align: center;"><b><u><?php echo $lembaga['kepala_sekolah'] ?></u></b></td>
		<td style="width: 33%; text-align: center;"></td>
	</tr>
	<tr>
		<td style="width: 33%; text-align: center;"></td>
		<td style="width: 33%; text-align: center;">NIP. <?php echo $lembaga['nip_kepala_sekolah'] ?></td>
		<td style="width: 33%; text-align: center;"></td>
	</tr>

</table>


</page>
<?php 
require_once('../html2pdf/html2pdf.class.php');
$content = ob_get_clean();
$html2pdf = new HTML2PDF('P', 'A4', 'en', false, 'UTF-8', array(5, 10, 4, 5));
$html2pdf->WriteHTML($content);
$html2pdf->Output('kartu.pdf');


} ?>
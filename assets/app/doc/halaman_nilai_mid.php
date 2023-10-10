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


	if ($siswa['agama']=="Islam" or $siswa['agama']=="ISLAM") {
		$getmapel = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel WHERE kelompok='ISLAM'"));
		$mapel = $getmapel['id_mapel'];
	}elseif($siswa['agama']=="KATHOLIK" or $siswa['agama']=="Katholik"){
		$getmapel = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel WHERE kelompok='KATHOLIK'"));
		$mapel = $getmapel['id_mapel'];
	}elseif($siswa['agama']=="KRISTEN" or $siswa['agama']=="Kristen"){
		$getmapel = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel WHERE kelompok='KRISTEN'"));
		$mapel = $getmapel['id_mapel'];
	}elseif($siswa['agama']=="HINDU" or $siswa['agama']=="Hindu"){
		$getmapel = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel WHERE kelompok='HINDU'"));
		$mapel = $getmapel['id_mapel'];
	}elseif($siswa['agama']=="BUDHA" or $siswa['agama']=="Budha"){
		$getmapel = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel WHERE kelompok='BUDHA'"));
		$mapel = $getmapel['id_mapel'];
	}elseif($siswa['agama']=="KONG HU CHU" or $siswa['agama']=="Kong Hu Chu"){
		$getmapel = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel WHERE kelompok='KONG HU CHU'"));
		$mapel = $getmapel['id_mapel'];
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
	
	
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
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
<b>Rapor Kurikulum Merdeka <?php echo $lembaga['nama_sekolah'] ?></b> <br>
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
		<td style="width: 20%; padding-left: 5px;"><?php echo $kelas['nama_kelas'] ?></td>
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
<br>
<table width="780px" style="border-collapse: collapse;" >
	<tr>
		<td style="width: 100%; text-align: center;"><b><u>LAPORAN CAPAIAN AKADEMIK TENGAH SEMESTER</u></b></td>
	</tr>
</table>
<br><br>
<!-- Informasi Data Nilai -->
<table width="780px" style="border-collapse: collapse;" border="1" >
	<tr>
		<td style="width: 5%; text-align: center; height: 20px;">No. </td>
		<td style="width: 35%; text-align: center;">Mata Pelajaran</td>
		<td style="width: 10%; text-align: center;">Nilai</td>
		<td style="width: 50%; text-align: center;">Deskripsi</td>
	</tr>
	<!-- Mata Pelajaran Agama menyesuaikan agama siswa  -->
	<?php  
	$nomor = 1;
	$mapelkelas = mysqli_query($mysqli,"SELECT * FROM mapel_kelas WHERE id_kelas='$siswakelas[id_kelas]' AND id_mapel='$mapel' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]' ");

	while ($rowmapelkelas = mysqli_fetch_array($mapelkelas)) {
		$matapelajaran = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel WHERE id_mapel='$rowmapelkelas[id_mapel]'"));
		$nilai = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM nilai_akhir_mid WHERE id_mapel_kelas='$rowmapelkelas[id_mapel_kelas]' AND id_siswa='$siswa[id_siswa]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]'"));

		$nilaimax = mysqli_fetch_array(mysqli_query($mysqli,"SELECT DISTINCT nilai, id_tp FROM n_formatif WHERE id_mapel_kelas='$rowmapelkelas[id_mapel_kelas]' AND id_siswa='$siswa[id_siswa]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]' ORDER BY nilai DESC"));
        $tujuan = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM tp_pembelajaran WHERE id_tp='$nilaimax[id_tp]'"));

        $nilaimin = mysqli_fetch_array(mysqli_query($mysqli,"SELECT DISTINCT nilai, id_tp FROM n_formatif WHERE id_mapel_kelas='$rowmapelkelas[id_mapel_kelas]' AND id_siswa='$siswa[id_siswa]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]' ORDER BY nilai ASC"));

        $tujuanmin = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM tp_pembelajaran WHERE id_tp='$nilaimin[id_tp]'"));
	?>
	<tr>
		<td style="width: 5%; text-align: center; "><?php echo $nomor++ ?></td>
		<td style="width: 35%; text-align: left; padding-left: 5px;"><?php echo $matapelajaran['nama_mapel'] ?></td>
		<td style="width: 10%; text-align: center;"><?php echo $nilai['nilai'] ?></td>
		<td style="width: 50%; text-align: left; padding-left: 5px; padding-right: 5px; padding-top: 5px; padding-bottom: 5px; justify-content: center;">Mampu <?php echo $tujuan['tp'] ?> <br> Perlu Bimbingan dalam <?php echo $tujuanmin['tp'] ?></td>
	</tr>

	<?php } ?>
	<!-- Mata Pelajaran Umum lainnya pada kelas  -->
	<?php  
	$nomor1 = 2;
	$mapelkelas = mysqli_query($mysqli,"SELECT * FROM mapel_kelas 
	JOIN mapel ON mapel_kelas.id_mapel = mapel.id_mapel
	WHERE id_kelas='$siswakelas[id_kelas]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]' AND kelompok = 'A' ");
	while ($rowmapelkelas = mysqli_fetch_array($mapelkelas)) {
		$matapelajaran = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM mapel WHERE id_mapel='$rowmapelkelas[id_mapel]'"));
		$nilai = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM nilai_akhir_mid WHERE id_mapel_kelas='$rowmapelkelas[id_mapel_kelas]' AND id_siswa='$siswa[id_siswa]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]'"));

		$nilaimax = mysqli_fetch_array(mysqli_query($mysqli,"SELECT DISTINCT nilai, id_tp FROM n_formatif WHERE id_mapel_kelas='$rowmapelkelas[id_mapel_kelas]' AND id_siswa='$siswa[id_siswa]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]' ORDER BY nilai DESC"));
		
        $tujuan = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM tp WHERE id_tp='$nilaimax[id_tp]'"));

        $nilaimin = mysqli_fetch_array(mysqli_query($mysqli,"SELECT DISTINCT nilai, id_tp FROM n_formatif WHERE id_mapel_kelas='$rowmapelkelas[id_mapel_kelas]' AND id_siswa='$siswa[id_siswa]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]' ORDER BY nilai ASC"));
        $tujuanmin = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM tp WHERE id_tp='$nilaimin[id_tp]'"));
	?>
	<tr>
		<td style="width: 5%; text-align: center; "><?php echo $nomor++ ?></td>
		<td style="width: 35%; text-align: left; padding-left: 5px;"><?php echo $matapelajaran['nama_mapel'] ?></td>
		<td style="width: 10%; text-align: center;"><?php echo $nilai['nilai'] ?></td>
		<td style="width: 50%; text-align: left; padding-left: 5px; padding-right: 5px; padding-top: 5px; padding-bottom: 5px; justify-content: center;">Mampu <?php echo $tujuan['tp'] ?> <br> Perlu Bimbingan dalam<?php echo $tujuanmin['tp'] ?></td>
	</tr>

	<?php } ?>

	<tr>
		<td style="text-align: right; padding-right: 5px; width: 40%; " colspan="2"> Jumlah Nilai</td>
		<td style="width: 10%; text-align: center;" >
			<b>
			<?php  
			$jumlahnilai = mysqli_fetch_array(mysqli_query($mysqli,"SELECT SUM(nilai) AS jumlahnilai FROM nilai_akhir_mid WHERE id_siswa='$siswa[id_siswa]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]'"));
			echo $totalnilai = $jumlahnilai['jumlahnilai'];
			?>
			</b>
		</td>
		<td style="width: 50%; text-align: left; padding-left: 5px; padding-right: 5px; justify-content: center;">
        <i><?php 
		    $kalimatnya1 = terbilang($totalnilai);
		    echo ucwords($kalimatnya1);
		    ?></i>
		</td>
	</tr>
	<tr>
		<td style="text-align: right; padding-right: 5px; width: 40%; " colspan="2"> Rata-rata Nilai</td>
		<td style="width: 10%; text-align: center;" >
			<b>
				<?php  
				$jumlahmapel = mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM mapel_kelas WHERE id_kelas='$siswakelas[id_kelas]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]'"));
				$totalmapel = $jumlahmapel;
				echo $reratanilai = round($totalnilai/$totalmapel);
				?>
			</b>
		</td>
		<td style="width: 50%; text-align: left; padding-left: 5px; padding-right: 5px; justify-content: center;">
		    <i><?php 
		    $kalimatnya = terbilang($reratanilai);
		    echo ucwords($kalimatnya);
		    ?></i>
		</td>
	</tr>

</table>
<!-- Informasi Data Ekstrakurikuler -->
<br><br>
<?php  
$ekstra = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM ekstra WHERE id_siswa='$_GET[i]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]'"));
?>
<table width="780px" style="border-collapse: collapse;" border="1" >
	<tr>
		<td style="width: 10%; text-align: center; height: 20px;">No</td>
		<td style="width: 40%; text-align: center;">Kegiatan Ekstrakurikuler</td>
		<td style="width: 50%; text-align: center;">Keterangan</td>
	</tr>
	<tr>
		<td style="width: 10%; text-align: center; height: 20px;">1.</td>
		<td style="width: 40%; text-align: left; padding-left: 5px;">Pramuka</td>
		<td style="width: 50%; text-align: left; padding-left: 5px; padding-right: 5px; padding-top: 5px; padding-bottom: 5px;"><?php echo $ekstra['pramuka'] ?></td>
	</tr>
	<tr>
		<td style="width: 10%; text-align: center; height: 20px;">2.</td>
		<td style="width: 40%; text-align: left; padding-left: 5px;">Kesenian</td>
		<td style="width: 50%; text-align: left; padding-left: 5px; padding-right: 5px; padding-top: 5px; padding-bottom: 5px;"><?php echo $ekstra['kesenian'] ?></td>
	</tr>
	<tr>
		<td style="width: 10%; text-align: center; height: 20px;">3.</td>
		<td style="width: 40%; text-align: left; padding-left: 5px;">Olahraga</td>
		<td style="width: 50%; text-align: left; padding-left: 5px; padding-right: 5px; padding-top: 5px; padding-bottom: 5px;"><?php echo $ekstra['olahraga'] ?></td>
	</tr>
</table>


<!-- Informasi Data Kehadiran -->
<br>
<?php  
$absensi = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM absensi WHERE id_siswa='$_GET[i]' AND tahun='$lembaga[tahun]' AND semester='$lembaga[semester]'"));
?>
<table width="780px" style="border-collapse: collapse;" border="1" >
	<tr>
		<td style="width: 50%; text-align: center; height: 20px;" colspan="3">KETIDAKHADIRAN</td>
	</tr>
	<tr>
		<td style="width: 10%; text-align: center;">1.</td>
		<td style="width: 20%; text-align: left; padding-left: 5px;">Sakit</td>
		<td style="width: 20%; text-align: left; padding-left: 5px;"><?php echo $absensi['sakit'] ?> <?php if($absensi['sakit']=="-"){
		 echo "";
		}else{ 
			echo " Hari";
		}?></td>
	</tr>
	<tr>
		<td style="width: 10%; text-align: center;">2.</td>
		<td style="width: 20%; text-align: left; padding-left: 5px;">Izin</td>
		<td style="width: 20%; text-align: left; padding-left: 5px;"><?php echo $absensi['izin'] ?><?php if($absensi['izin']=="-"){
		 echo " ";
		}else{ 
			echo " Hari";
		}?></td>
	</tr>
	<tr>
		<td style="width: 10%; text-align: center;">3.</td>
		<td style="width: 20%; text-align: left; padding-left: 5px;">Tanpa Berita</td>
		<td style="width: 20%; text-align: left; padding-left: 5px;"><?php echo $absensi['apla'] ?> <?php if($absensi['apla']=="-"){
		 echo "";
		}else{ 
			echo " Hari";
		}?></td>
	</tr>
</table>

<!-- Informasi Data Pengesahan -->

<br><br><br>
<table width="780px" style="border-collapse: collapse;"  >
	<tr>
		<td style="width: 32%; text-align: center;">Mengetahui, </td>
		<td style="width: 32%; text-align: center;"></td>
		<td style="width: 32%; text-align: center;"><?php echo $lembaga['desa'] ?>, <?php echo tgl_indonesia(date('Y-m-d')) ?></td>
	</tr>
	<tr>
		<td style="width: 32%; text-align: center;">Orangtua / Wali</td>
		<td style="width: 32%; text-align: center;"></td>
		<td style="width: 32%; text-align: center;">Guru Kelas <?php echo $kelas['nama_kelas'] ?></td>
	</tr>
	<tr>
		<td style="width: 32%; text-align: center; height: 60px;"></td>
		<td style="width: 32%; text-align: center; height: 60px;"></td>
		<td style="width: 32%; text-align: center; height: 60px;"></td>
	</tr>
	<tr>
		<td style="width: 32%; text-align: center;">...............................................</td>
		<td style="width: 32%; text-align: center;"></td>
		<td style="width: 32%; text-align: center;"><b><u><?php echo $walikelas['nama_guru'] ?></u></b></td>
	</tr>
	<tr>
		<td style="width: 32%; text-align: center;"></td>
		<td style="width: 32%; text-align: center;"></td>
		<td style="width: 32%; text-align: center;">NIP. <?php echo $walikelas['nip'] ?></td>
	</tr>
	<tr>
		<td style="width: 32%; text-align: center; height: 10px;"></td>
		<td style="width: 32%; text-align: center; height: 10px;"></td>
		<td style="width: 32%; text-align: center; height: 10px;"></td>
	</tr>
	<tr>
		<td style="width: 32%; text-align: center;"></td>
		<td style="width: 32%; text-align: center;">Mengesahkan,</td>
		<td style="width: 32%; text-align: center;"></td>
	</tr>
	<tr>
		<td style="width: 32%; text-align: center;"></td>
		<td style="width: 32%; text-align: center;">Kepala Sekolah</td>
		<td style="width: 32%; text-align: center;"></td>
	</tr>
	<tr>
		<td style="width: 32%; text-align: center; height: 60px;"></td>
		<td style="width: 32%; text-align: center; height: 60px;"></td>
		<td style="width: 32%; text-align: center; height: 60px;"></td>
	</tr>
	<tr>
		<td style="width: 32%; text-align: center;"></td>
		<td style="width: 32%; text-align: center;"><b><u><?php echo $lembaga['kepala_sekolah'] ?></u></b></td>
		<td style="width: 32%; text-align: center;"></td>
	</tr>
	<tr>
		<td style="width: 32%; text-align: center;"></td>
		<td style="width: 32%; text-align: center;">NIP. <?php echo $lembaga['nip_kepala_sekolah'] ?></td>
		<td style="width: 32%; text-align: center;"></td>
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
<?php  
session_start();
ob_start();
if (empty($_SESSION['username']) or empty($_SESSION['password']) ) {
	?>
	<script type="text/javascript">
	alert('Anda Harus Login Terlebih Dahulu!');
	window.location.href="login.php";
	</script>
	<?php
}else{
	include "../../../config/koneksi.php";
	include "../../../config/function_date.php";
	$lembaga = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sekolah 
	JOIN tahun_pelajaran ON sekolah.tahun = tahun_pelajaran.id_tahun_pelajaran
	JOIN semester ON sekolah.semester = semester.id_semester
	WHERE username='$_SESSION[username]' AND password='$_SESSION[password]'"));

	$mutasi = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM siswa_keluar 
	JOIN kelas ON siswa_keluar.id_kelas = kelas.id_kelas
	WHERE id_siswa='$_GET[i]'"));

	$siswa = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM siswa 
	WHERE id_siswa='$_GET[i]'"));

	$tanggal = date('Y-m-d');
	$x = explode("-", $tanggal);
	$tahun = $x[0];
?>

<style type="text/css">
table.page_header {width: 780px; border: none; padding: 2mm; margin-top: -30px; font-size: 10px; margin-left: -10px;}

table.page_footer {width: 760px; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm; margin-left: -10px; }
h1 {color: #000033}
h2 {color: #000055}
h3 {color: #000077}
</style>

<page backtop="7mm" backbottom="14mm" backleft="1mm" backright="3mm">
	<table width="790px" style="border-collapse: collapse; font-size: 11px; margin-top: 1px;" >
		<tr>
			<td style="width: 10%; text-align: center;" rowspan="4"><img src="../dist/img/DINAS.png" style="width: 70%;"></td>
			<td style="width: 50%;">PEMERINTAH KABUPATEN FLORES TIMUR</td>
			<td style="width: 10%;"></td>
			<td style="width: 30%; text-align: right;" rowspan="4">Surat ini adalah dokumen resmi yang diterbitkan oleh <br><b><?php echo $lembaga['nama_sekolah'] ?></b> <br> melalui https://penggerak.com/</td>
		</tr>
		<tr>
			<td style="width: 50%; font-size: 20px;"><b><?php echo $lembaga['nama_sekolah'] ?></b></td>
			<td style="width: 10%;"></td>
		</tr>
		<tr>
			<td style="width: 50%;"><?php echo $lembaga['alamat'] ?>, Kabupaten. <?php echo $lembaga['kabupaten'] ?></td>
			<td style="width: 10%;"></td>
		</tr>
		<tr>
			<td style="width: 50%;">Email : <?php echo $lembaga['email'] ?>, Kontak : <?php echo $lembaga['no_telepon'] ?></td>
			<td style="width: 10%;"></td>
		</tr>
	</table>
	<hr>
	<br><br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 14px; font-family: Arial; " align="center">
	    <tr><td style="text-align:center;"><b><u>SURAT KETERANGAN PINDAH SEKOLAH</u></b></td></tr>
	    <tr><td style="text-align:center;">No. <?php echo $mutasi['no_surat']?>/I21.25.12/SMAN I/LL/<?php echo $tahun?></td></tr>
	</table>
	<br><br>
	<table style="font-family: Arial; font-size:14px; width:100%; margin-left: 30px;"  >
	    <tr>
	        <td style="line-height:20px; width: 97%;">
	            Kepala <?php echo $lembaga['nama_sekolah'] ?>, Kabupaten Flores Timur, Provinsi Nusa Tenggara Timur dengan ini menerangkan bahwa :
	        </td>
	    </tr>
	</table>
	<br><br>
	<table style="font-family: Arial; font-size:14px; margin-left:80px;"  >
	    <tr>
	        <td style="line-height:20px; width:200px;">NAMA</td>
	        <td style="line-height:20px; width:15px;">:</td>
	        <td style="line-height:20px; width:600px;"><?php echo strtoupper($siswa['nama_siswa'])?></td>
	    </tr>
	    <tr>
	        <td style="line-height:20px; width:200px;">NIS / NISN</td>
	        <td style="line-height:20px; width:15px;">:</td>
	        <td style="line-height:20px; width:600px;"><?php echo strtoupper($siswa['nis'])?> / <?php echo strtoupper($siswa['nisn'])?></td>
	    </tr>
	    <tr>
	        <td style="line-height:20px; width:200px;">JENIS KELAMIN</td>
	        <td style="line-height:20px; width:15px;">:</td>
	        <td style="line-height:20px; width:600px;"><?php echo strtoupper($siswa['kelamin'])?></td>
	    </tr>
	    <tr>
	        <td style="line-height:20px; width:200px;">KELAS</td>
	        <td style="line-height:20px; width:15px;">:</td>
	        <td style="line-height:20px; width:600px;"><?php echo strtoupper($mutasi['nama_kelas'])?></td>
	    </tr>
	    <tr>
	        <td style="line-height:20px; width:200px;">TAHUN PELAJARAN</td>
	        <td style="line-height:20px; width:15px;">:</td>
	        <td style="line-height:20px; width:600px;"><?php echo strtoupper($lembaga['tahun_pelajaran'])?></td>
	    </tr>
	</table>
	<br><br>
	<table style="font-family: Arial; font-size:14px; width:100%; margin-left: 30px;"  >
	    <tr>
	        <td style="line-height:20px; width: 97%;">
	            Adalah benar-benar peserta didik <?php echo $lembaga['nama_sekolah'] ?>, yang telah mengajukan permohonan pindah sekolah ke <b><?php echo strtoupper($mutasi['sekolah_tujuan']) ?></b>. <br>
	            Bagi Peserta Didik yang telah Pindah / Keluar tidak dapat diterima kembali pada Sekolah ini.
	        </td>
	    </tr>
	</table>
	
	<br><br><br><br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 14px;" >
		<tr>
			<td style="width: 60%; padding-left: 25px; line-height: 20px;">
				
			</td>
			<td style="width: 40%; padding-left: 25px; line-height: 20px; text-align: left;">
				<?php echo $lembaga['desa'] ?>, <?php echo tgl_indonesia(date('Y-m-d')) ?>
			</td>
		</tr>
		<tr>
			<td style="width: 60%; padding-left: 25px; line-height: 20px;">
				
			</td>
			<td style="width: 40%; padding-left: 25px; line-height: 20px; text-align: left;">
				Kepala Sekolah,
			</td>
		</tr>
		<tr>
			<td style="width: 60%; padding-left: 25px; line-height: 20px; height: 80px;"></td>
			<td style="width: 40%; padding-left: 25px; line-height: 20px; text-align: left; height: 80px;"></td>
		</tr>
		<tr>
			<td style="width: 60%; padding-left: 25px; line-height: 20px;">
				
			</td>
			<td style="width: 40%; padding-left: 25px; line-height: 20px; text-align: left;">
				<b><?php echo $lembaga['kepala_sekolah'] ?></b> <br>
				NIP. <?php echo $lembaga['nip_kepala_sekolah'] ?>
			</td>
		</tr>
	</table>
</page>

<page backtop="7mm" backbottom="14mm" backleft="1mm" backright="3mm">
	<table width="790px" style="border-collapse: collapse; font-size: 15px; margin-top: 1px;" align="center;" >
		<tr>
			<td style="width: 100%; text-align: center; line-height: 20px;"><b><u>KETERANGAN PINDAH SEKOLAH</u></b> <br>
				<label style="font-size: 12px;">( Diisi oleh sekolah yang ditinggalkan )</label>
			</td>
		</tr>
		
	</table>
	<br><br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 12px; margin-top: 1px;" align="center;">
		<tr>
			<td style="width: 20%;">Nama Peserta Didik</td>
			<td style="width: 3%; text-align: center;">:</td>
			<td style="width: 40%;"><?php echo $siswa['nama_siswa'] ?></td>

			<td style="width: 5%;"></td>

			<td style="width: 15%;">Kelas / Semester</td>
			<td style="width: 3%; text-align: center;">:</td>
			<td style="width: 15%;"><?php echo $lembaga['semester'] ?></td>
		</tr>

		<tr>
			<td style="width: 20%;">NIS / NISN</td>
			<td style="width: 3%; text-align: center;">:</td>
			<td style="width: 40%;"><?php echo $siswa['nis'] ?> / <?php echo $siswa['nisn'] ?></td>

			<td style="width: 5%;"></td>

			<td style="width: 15%;">T. Pelajaran</td>
			<td style="width: 3%; text-align: center;">:</td>
			<td style="width: 15%;"><?php echo $lembaga['tahun_pelajaran'] ?></td>
		</tr>

		<tr>
			<td style="width: 20%;">Nama Sekolah</td>
			<td style="width: 3%; text-align: center;">:</td>
			<td style="width: 40%;"><?php echo $lembaga['nama_sekolah'] ?></td>

			<td style="width: 5%;"></td>

			<td style="width: 15%;">Kelas</td>
			<td style="width: 3%; text-align: center;">:</td>
			<td style="width: 15%;">Kelas <?php echo $mutasi['nama_kelas'] ?></td>
		</tr>
		
	</table>
	<hr>
	<br>
	<table width="790px" style="border-collapse: collapse; font-size: 12px; margin-top: 1px;" align="center;" border="1">
		<tr>
			<td style="text-align: center; width: 5%; height: 50px;">NO</td>
			<td style="text-align: center; width: 30%; height: 50px;">KELAS DAN SEMESTER YANG DITINGGALKAN</td>
			<td style="text-align: center; width: 30%; height: 50px;">SEBAB-SEBAB KELUAR DAN PERMINTAAN TERTULIS DARI :</td>
			<td style="text-align: center; width: 35%; height: 50px;">TANDA TANGAN KEPALA SEKOLAH DAN ORANG TUA / WALI</td>
		</tr>
		<tr>
			<td style="text-align: center; width: 5%; height: 200px;">1.</td>
			<td style="text-align: center; width: 30%; height: 200px; font-size: 14px;">
				Kelas <?php echo $mutasi['nama_kelas'] ?> / <?php echo $lembaga['semester'] ?>
			</td>
			<td style="text-align: center; width: 30%; height: 200px; font-size: 14px;">
				<?php echo $mutasi['alasan'] ?>
			</td>
			<td style="text-align: center; width: 35%; height: 200px;">
				<br>
				<?php echo $lembaga['desa'] ?>, <?php echo tgl_indonesia($mutasi['tanggal']) ?> <br>
				Kepala Sekolah, <br><br><br><br><br><br>
				<b><u><?php echo $lembaga['kepala_sekolah'] ?></u></b><br>
				NIP. <?php echo $lembaga['nip_kepala_sekolah'] ?> <br><br><br>
				Orang Tua / Wali <br><br><br><br><br><br>
				(..........................................................) <br><br>
			</td>
		</tr>

		<tr>
			<td style="text-align: center; width: 5%; height: 200px;">2.</td>
			<td style="text-align: center; width: 30%; height: 200px;">
				
			</td>
			<td style="text-align: center; width: 30%; height: 200px;">
				
			</td>
			<td style="text-align: center; width: 35%; height: 200px;">
				
			</td>
		</tr>
		<tr>
			<td style="text-align: center; width: 5%; height: 200px;">3.</td>
			<td style="text-align: center; width: 30%; height: 200px;">
				
			</td>
			<td style="text-align: center; width: 30%; height: 200px;">
				
			</td>
			<td style="text-align: center; width: 35%; height: 200px;">
				
			</td>
		</tr>
	</table>

<page_footer>
<table class="page_footer">

<tr>
<td style="width: 50%; text-align: left; font-size: 10px;">
<b>Rapor Projek Penguatan Profil Pelajar Pancasila <?php echo $lembaga['nama_sekolah'] ?></b> <br>
| <?php echo $siswa['nisn'] ?> | <?php echo $siswa['nama_siswa'] ?> | Kelas : <?php echo $mutasi['nama_kelas'] ?>
</td>
<td style="width: 50%; text-align: right; font-size: 10px;">
Page [[page_cu]] of [[page_nb]] pages
</td>
</tr>
</table>
</page_footer>

</page>


<?php 
require_once('../html2pdf/html2pdf.class.php');
$content = ob_get_clean();
$html2pdf = new HTML2PDF('P','F4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('kartu.pdf');


} ?>
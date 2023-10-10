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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Depan Raport</title>
</head>
<body>
	<br><br><br><br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 11px; margin-top: 50px;" >
		<tr>
			<td style="width: 100%; text-align: center; font-size: 20px;"><b>BUKU LAPORAN PENILAIAN <br> HASIL PEMBELAJARAN</b></td>
		</tr>
		
	</table>
	<br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 11px; margin-top: 50px;" >
		<tr>
			<td style="width: 100%; text-align: center; ">
				<?php if(empty($lembaga['logo'])){ ?>
				<img src="../dist/img/DINAS.png" style="width: 25%;">
				<?php }else{ ?>
				<img src="../dist/img/<?php echo $lembaga['logo'] ?>" style="width: 25%;">
				<?php } ?>
			</td>
		</tr>
		
	</table>
	<br><br>
	<table width="300px" style="border-collapse: collapse; font-size: 11px; margin-top: 50px;" align="center">
		<tr>
			<td style="width: 50%; text-align: center; font-size: 20px;">
				NAMA PESERTA DIDIK
			</td>
		</tr>
		
	</table>

	<table width="300px" style="border-collapse: collapse; font-size: 11px; margin-top: 15px;" align="center" rules="rows" border="1">
		<tr>
			<td style="width: 50%; text-align: center; font-size: 20px; padding-top: 10px; padding-bottom: 10px; " >
				<?php echo $siswa['nama_siswa'] ?>
			</td>
		</tr>
		
	</table>
	<br>
	<table width="300px" style="border-collapse: collapse; font-size: 11px; margin-top: 20px;" align="center">
		<tr>
			<td style="width: 50%; text-align: center; font-size: 20px;">
				NOMOR INDUK SISWA NASIONAL
			</td>
		</tr>
		
	</table>
	<table width="300px" style="border-collapse: collapse; font-size: 11px; margin-top: 15px;" align="center" rules="rows" border="1">
		<tr>
			<td style="width: 50%; text-align: center; font-size: 20px; padding-top: 10px; padding-bottom: 10px; " >
				<?php echo $siswa['nisn'] ?>
			</td>
		</tr>
		
	</table>

	<br><br><br><br><br><br><br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 11px; margin-top: 50px;" >
		<tr>
			<td style="width: 100%; text-align: center; font-size: 20px;">
				<b>
					PEMERINTAH KABUPATEN <?php echo strtoupper($lembaga['kabupaten']) ?>
					<br>
					<?php echo $lembaga['nama_sekolah'] ?>
				</b>
			</td>
		</tr>
		<tr>
			<td style="width: 100%; text-align: center; font-size: 12px; ">
				Alamat : <?php echo $lembaga['alamat'] ?>, No. Telepon : <?php echo $lembaga['no_telepon'] ?> <br>
				Email : <?php echo $lembaga['email'] ?>, Website : <?php echo $lembaga['website'] ?>
			</td>
		</tr>
		
	</table>
	

</body>
</html>
<?php 
require_once('../html2pdf/html2pdf.class.php');
$content = ob_get_clean();
$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('kartu.pdf');


} ?>
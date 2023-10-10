<?php  
session_start();
ob_start();
if (empty($_SESSION['kode_guru']) or empty($_SESSION['password']) or empty($_SESSION['tugas'])) {
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
	$kelasterima = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM kelas WHERE id_kelas='$siswa[terima_kelas]'"));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman IDENTITAS</title>
</head>
<body>
	<br><br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 11px; margin-top: 20px;" >
		<tr>
			<td style="width: 100%; text-align: center; font-size: 20px;"><b>IDENTITAS PESERTA DIDIK</b></td>
		</tr>
		
	</table>
	<br><br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 11px; margin-top: 20px;" >
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">1. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">NAMA PESERTA DIDIK</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['nama_siswa'] ?></td>	
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">2. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">NIS / NISN</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['nis'] ?> / <?php echo $siswa['nisn'] ?></td>	
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">3. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">JENIS KELAMIN</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['kelamin'] ?></td>	
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">4. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">AGAMA</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['agama'] ?></td>	
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">5. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">TEMPAT, TANGGAL LAHIR</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['tempat_lahir'] ?>, <?php echo tgl_indonesia(strtoupper(date('Y-m-d'))) ?></td>	
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">6. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">ALAMAT</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['alamat_siswa'] ?></td>	
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">7. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">NO. HANDPHONE</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['kontak_siswa'] ?></td>	
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">8. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">SEKOLAH ASAL</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['sekolah_asal'] ?></td>	
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">9. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">DITERIMA DI SEKOLAH INI</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"></td>	
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;"></td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">A. KELAS</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $kelasterima['nama_kelas'] ?></td>	
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;"></td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">B. TANGGAL</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo tgl_indonesia($siswa['tanggal_terima']) ?></td>	
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">10. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">NAMA AYAH</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['nama_ayah'] ?></td>
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">11. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">NAMA IBU</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['nama_ibu'] ?></td>
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">12. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">PEKERJAAN AYAH</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['pekerjaan_ayah'] ?></td>
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">13. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">PEKERJAAN IBU</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['pekerjaan_ibu'] ?></td>
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">14. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">ALAMAT ORANG TUA</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['alamat_orang_tua'] ?></td>
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">15. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">KONTAK ORANG TUA</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['kontak_ortu'] ?></td>
		</tr>


		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">16. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">NAMA WALI</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['nama_wali'] ?></td>
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">17. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">PEKERJAAN WALI</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['pekerjaan_wali'] ?></td>
		</tr>

		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">18. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">ALAMAT WALI</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['alamat_wali'] ?></td>
		</tr>
		<tr>
			<td style="width: 10%; text-align: center; font-size: 14px; height: 20px;">19. </td>	
			<td style="width: 30%; text-align: left; font-size: 14px;">KONTAK WALI</td>
			<td style="width: 10%; text-align: center; font-size: 14px;">:</td>	
			<td style="width: 50%; text-align: left; font-size: 14px;"><?php echo $siswa['kontak_wali'] ?></td>
		</tr>
	</table>
	<br><br><br>
	<table width="600px" style="border-collapse: collapse; font-size: 14px; margin-top: 5px;" align="center">
		<tr>
			<td style="width: 18%; border-collapse: collapse;" rowspan="5" border="1" ></td>
			<td style="width: 20%;" rowspan="5"></td>
			<td style="width: 35%; text-align: center;" ><?php echo $lembaga['kabupaten'] ?>, <?php echo tgl_indonesia($siswa['tanggal_terima']) ?></td>
		</tr>
		<tr>
			<td style="width: 35%; text-align: center;" >KEPALA SEKOLAH,</td>
		</tr>
		<tr>
			<td style="width: 35%; text-align: center; height: 70px;" ></td>
		</tr>
		<tr>
			<td style="width: 35%; text-align: center;" ><b><u><?php echo $lembaga['kepala_sekolah'] ?></u></b></td>
		</tr>
		<tr>
			<td style="width: 35%; text-align: center;" >NIP. <?php echo $lembaga['nip_kepala_sekolah'] ?></td>
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
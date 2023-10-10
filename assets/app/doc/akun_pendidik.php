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
	$lembaga = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM sekolah WHERE username='$_SESSION[username]' AND password='$_SESSION[password]'"));
	$guru = mysqli_fetch_array(mysqli_query($mysqli,"SELECT * FROM guru WHERE id_guru='$_GET[i]'"));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Akun Pendidik</title>
</head>
<body>
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
			<td style="width: 50%;"><?php echo $lembaga['alamat'] ?></td>
			<td style="width: 10%;"></td>
		</tr>
		<tr>
			<td style="width: 50%;">Email : <?php echo $lembaga['email'] ?>, Kontak : <?php echo $lembaga['no_telepon'] ?></td>
			<td style="width: 10%;"></td>
		</tr>
	</table>
	<br>
	<table width="790px" style="border-collapse: collapse; font-size: 11px;" border="1" >
		<tr>
			<td style="width: 100%; padding-left: 5px; font-size: 16px; padding-top: 10px; padding-bottom: 10px;">
				<table width="790px" style="border-collapse: collapse; font-size: 11px;" >
					<tr>
						<td style="width: 80%; padding-left: 5px; font-size: 16px; padding-top: 5px; padding-bottom: 5px;"><b>SURAT PEMBERITAHUAN RESET PASSWORD</b><br>
							PUSAT LAYANAN PTK <br>
							<?php echo $lembaga['nama_sekolah'] ?> - KAB. <?php echo strtoupper($lembaga['kabupaten']) ?>
						</td>
						<td style="width: 20%; text-align: center;">
							<img src="../dist/img/logo.png" style="width: 25%;">
							<br> Merdeka Belajar 2022
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<br>
	<table width="790px" style="border-collapse: collapse; font-size: 11px;">
		<tr>
			<td style="font-size: 14px; width: 50%; padding-left: 25px;">Kepada Yth, <br>
				<b><?php echo $guru['nama_guru'] ?></b> <br>
				di <?php echo $lembaga['nama_sekolah'] ?> <br>
				Kab. <?php echo $lembaga['kabupaten'] ?> - <?php echo $lembaga['provinsi'] ?>
			</td>
			<td style="font-size: 14px; width: 20%;">
			</td>
			<td style="font-size: 14px; width: 30%;">
				<table width="400px">
					<tr>
						<td >No. Surat</td>
						<td>:</td>
						<td>001</td>
					</tr>
					<tr>
						<td>Tanggal</td>
						<td>:</td>
						<td><?php echo tgl_indonesia(date('Y-m-d')) ?></td>
					</tr>
					<tr>
						<td>Sifat</td>
						<td>:</td>
						<td>Sangat Rahasia</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 14px; ">
		<tr>
			<td style="width: 95%; padding-left: 25px; line-height: 20px;">
				Dengan hormat, <br><br>
				Sehubungan dengan permintaan saudara untuk melakukan RESET PASSWORD atas PTK dengan informasi sebagai berikut :
			</td>
		</tr>
	</table>
	<br><br><br>
	<table width="500px" style="border-collapse: collapse; font-size: 14px; " align="center" border="1">
		<tr>
			<td style="width: 20%; padding-left: 25px; line-height: 20px; text-align: right; padding-right: 5px; background-color: #b7b5b5; height: 30px;">
				USER ID
			</td>
			<td style="width: 35%; padding-left: 25px; line-height: 20px; text-align: left; padding-left: 5px; height: 30px;">
				<?php echo $guru['kode_guru'] ?>
			</td>
		</tr>
		<tr>
			<td style="width: 20%; padding-left: 25px; line-height: 20px; text-align: right; padding-right: 5px; background-color: #b7b5b5; height: 30px;">
				NAMA PTK
			</td>
			<td style="width: 35%; padding-left: 25px; line-height: 20px; text-align: left; padding-left: 5px; height: 30px;">
				<?php echo $guru['nama_guru'] ?>
			</td>
		</tr>
	</table>
	<br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 14px;">
		<tr>
			<td style="width: 95%; padding-left: 25px; line-height: 20px;">
				Maka kami telah melakukan RESET PASSWORD anda. Untuk dapat menggunakan kembali layanan PENGGERAK, silahkan gunakan password sebagai berikut :
			</td>
		</tr>
	</table>
	<br><br>
	<table width="500px" style="border-collapse: collapse; font-size: 14px;" align="center" border="1">
		<tr>
			<td style="width: 20%; padding-left: 25px; line-height: 20px; text-align: right; padding-right: 5px; background-color: #b7b5b5; height: 30px;">
				PASSWORD
			</td>
			<td style="width: 35%; padding-left: 25px; line-height: 20px; text-align: left; padding-left: 5px; height: 30px; font-size: 18px;">
				<b><?php echo $guru['pass'] ?></b>
			</td>
		</tr>
	</table>
	<br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 14px;">
		<tr>
			<td style="width: 97%; padding-left: 25px; line-height: 20px;">
				Setelah anda login, lakukan penggantian password demi keamanan dan kemudahan anda. Pastikan password baru
yang anda buat <b>MUDAH DIINGAT </b> dan <b>AMAN</b>. Anda bertanggung jawab penuh terhadap kerahasian dan keamanan
AKUN PTK ini.
			</td>
		</tr>
	</table>
	<br><br><br><br><br>
	<table width="790px" style="border-collapse: collapse; font-size: 14px;">
		<tr>
			<td style="width: 50%; padding-left: 25px; line-height: 20px;">
				
			</td>
			<td style="width: 45%; padding-left: 25px; line-height: 20px; text-align: left;">
				<?php echo $lembaga['kabupaten'] ?>, <?php echo tgl_indonesia(date('Y-m-d')) ?>
			</td>
		</tr>
		<tr>
			<td style="width: 50%; padding-left: 25px; line-height: 20px;">
				
			</td>
			<td style="width: 45%; padding-left: 25px; line-height: 20px; text-align: left;">
				Hormat kami,
			</td>
		</tr>
		<tr>
			<td style="width: 50%; padding-left: 25px; line-height: 20px; height: 50px;"></td>
			<td style="width: 45%; padding-left: 25px; line-height: 20px; text-align: left; height: 50px;"></td>
		</tr>
		<tr>
			<td style="width: 50%; padding-left: 25px; line-height: 20px;">
				
			</td>
			<td style="width: 45%; padding-left: 25px; line-height: 20px; text-align: left;">
				Operator Sekolah, <br>
				<b><?php echo $lembaga['nama_sekolah'] ?></b> <br>
				<?php echo $lembaga['kabupaten'] ?> - <?php echo $lembaga['provinsi'] ?>
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